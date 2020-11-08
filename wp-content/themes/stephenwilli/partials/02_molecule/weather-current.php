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
$url = 'http://api.openweathermap.org/data/2.5/weather?units=imperial&lat='. $lat . '&lon=' . $lon . '&appid=' . $key;

$currentweather = get_transient('current_weather_'. $location);
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
		$str = file_get_contents( getcwd() . '/wp-content/themes/buckrail/partials/02_molecule/weath-iconmap.txt');
		$icons = json_decode($str, true);

		$obj = json_decode($html);
		// debug($obj);

		$code = intval ( $obj->weather[0]->id );
		$icon = $icons[$code]['icon'];

		if (!($code > 699 && $code < 800) && !($code > 899 && $code < 1000)) {
	    $icon = 'day-' . $icon;
	  }
	  $icon = 'wi wi-' . $icon;

		$currentweather = array(
			"description"			=> $obj->weather[0]->description,
			"icon"						=> $obj->weather[0]->icon,
			"icon-class"			=> $icon,
			"temp"						=> round($obj->main->temp),
			"wind"						=> round($obj->wind->speed),
			"wind-dir"				=> wind_cardinals($obj->wind->deg)

		);
	}

	$expire = ( empty( $html ) )
		? 5 * MINUTE_IN_SECONDS
		: 15 * MINUTE_IN_SECONDS;

	$currentweather = empty( $currentweather )
		? '' // set to empty string so it's not FALSE
		: $currentweather;

	set_transient( 'current_weather_'. $location, $currentweather, $expire );
}

if( $display == 'full'){ ?>
		<div class="snow-stats -station">
			<h2 class="snow-stats__location">Current Weather</h2>

			<div class="snow-stats__stat">
		  	<span class="number"><i class="<?php echo( $currentweather['icon-class'] ); ?>"></i></span>
		  	<span class="label"><?php echo( $currentweather['description'] ); ?></span>
		  </div>

			<div class="snow-stats__stat">
		  	<span class="number"><?php echo( $currentweather['temp'] ); ?>&#176;</span>
		  	<span class="label">Temp</span>
		  </div>

			<div class="snow-stats__stat">
		  	<span class="number"><?php echo( $currentweather['wind'] ); ?><span class="small"> MPH</span></span>
		  	<span class="label"><?php echo( $currentweather['wind-dir'] ); ?> Wind</span>
		  </div>
		</div>
<?php }
if( $display == 'small'){ ?>

	<a class="weather-header" href="/jackson-hole-snow-report/" title="<?php echo( $currentweather['description'] ); ?>">
		<div class="snow-stats__stat">
	  	<span class="number"><?php echo( $currentweather['temp'] ); ?>&#176;</span>
	  	<span class="number"><i class="<?php echo( $currentweather['icon-class'] ); ?>"></i></span>
	  </div>
	</a>

<?php }
if( $display == 'temp'){ ?>

	<div class="snow-stats__stat">
  	<span class="number"><?php echo( $currentweather['temp'] ); ?>&#176;</span>
  	<span class="label">Temp</span>
  </div>

<?php } ?>