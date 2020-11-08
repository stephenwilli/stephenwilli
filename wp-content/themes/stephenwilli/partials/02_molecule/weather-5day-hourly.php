<?php
// http://openweathermap.org/img/w/10d.png
//https://openweathermap.org/api
if($lat == ''){
	$lat = '43.479931';
}
if($lon == ''){
	$lon = '-110.762428';
}

$key = '4dc3626d93bf0ebf0fadfc38af8bbb21';
$url = 'http://api.openweathermap.org/data/2.5/forecast/?units=imperial&lat='. $lat . '&lon=' . $lon . '&appid=' . $key;

$currentweather = get_transient('fiveday_weather_'. $location);
$debug = false;

if ( $currentweather === false || $debug === true)
{
	$currentweather = array();

	$request = wp_remote_get($url,
			array( 'sslverify' => false,
						 'timeout' => 60 )
			);

	$html = wp_remote_retrieve_body( $request );

	if(!empty($html)){
		// current directory
		$str = file_get_contents( getcwd() . '/wp-content/themes/astoria/partials/02_molecule/weath-iconmap.txt');
		$icons = json_decode($str, true);

		$obj = json_decode($html);
		//debug($obj);

		foreach ($obj->list as $day) {
			$code = intval ( $day->weather[0]->id );
			$icon = $icons[$code]['icon'];

			if (!($code > 699 && $code < 800) && !($code > 899 && $code < 1000)) {
		    $icon = 'day-' . $icon;
		  }
		  $icon = 'wi wi-' . $icon;

			$currentweather[] = array(
				"time"						=> $day->dt,
				"description"			=> $day->weather[0]->description,
				"icon"						=> $day->weather[0]->icon,
				"icon-class"			=> $icon,
				"temp"						=> round($day->main->temp),
				"wind"						=> round($day->wind->speed),
				"wind-dir"				=> wind_cardinals($day->wind->deg)
			);
		}

		// debug($currentweather);
	}

	$expire = ( empty( $html ) )
		? 5 * MINUTE_IN_SECONDS
		: 15 * MINUTE_IN_SECONDS;

	$currentweather = empty( $currentweather )
		? '' // set to empty string so it's not FALSE
		: $currentweather;

	set_transient( 'fiveday_weather_'. $location, $currentweather, $expire );
}

if( $display == 'full'){ ?>
		<div class="weather-forcast -extended">
			<h2 class="weather__location">Jackson WY, Weather Forecast</h2>
			<table class="weather-forcast__day">
				<tr>
					<th>Date</th>
					<th>Forcast</th>
					<th>Temp</th>
				</tr>
			<?php
			$i = 0;
			foreach ($currentweather as $day) {
				if( $i < 15 ){ ?>
					<tr>
						<td><span class="number"><?php echo ( date("D \- h:i:s A", $day['time']) ); ?></span></td>
			  		<td>
			  			  <span class="number"><i class="<?php echo( $day['icon-class'] ); ?>"></i></span>
			  	  		<span class="label"><?php echo( $day['description'] ); ?></span>
			  	  </td>
			  	  <td><span class="number"><?php echo( $day['temp'] ); ?>&#176;</span></td>
					</tr>
				<?php }
				$i++;
			} ?>

			</table>
		</div>
<?php }