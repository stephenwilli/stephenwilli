<?php
$weather = TMBR_Weather::i();
?>
<table class="weather">
  <tr>
    <th class="day" style="font-size : 1.5rem;">Currently: &nbsp;
      <?php echo esc_html( round($weather->get_current_temp()) ); ?>&deg;
      <i class="wi <?php echo esc_attr( $weather->get_current_icon() ); ?>"></i>
    </th>
    <th></th>
    <th>High</th>
    <th>Low</th>
    <th>Precip</th>

  </tr>
  <?php for ($i=0; $i <= 4; $i++) {
    $day_weather = $weather->get_weather_for_day( $i );
    ?>
    <tr>
      <td class="summary">
        <div class="summary__copy">
          <p class="day"><?php echo esc_html( date( 'D', strtotime( '+' . $i . ' day' ) ) ); ?></p>
          <p class="small"><?php echo($day_weather->summary); ?></p>
        </div>
      </td>
      <td><i class="wi small <?php echo esc_attr( $weather->get_icon_from_weather( $day_weather) ); ?>"></i></td>
      <td><?php echo esc_html( round($weather->get_weather_for_day($i)->temperatureMax) ); ?>&deg;</td>
      <td><?php echo esc_html( round($weather->get_weather_for_day($i)->temperatureMin) ); ?>&deg;</td>
      <td><?php echo esc_html( $day_weather->precipProbability * 100 ); ?>%</td>
    </tr>
  <?php } ?>
</table>
<p><a href="https://darksky.net/forecast/43.48,-110.7618/us12/en" target="_blank">Full Weather Report</a></p>
<br />