<?php 
  $url = get_field('webcam_url', 'option');
  $image = get_field('webcam_placeholder_image', 'option');
  $image = $image['sizes']['lg_thumb'];
  $text = get_field('webcam_text', 'option');
?>
  <div class="loop-item">
    <a class="js-popup-video webcam-wrap" href="<?php echo $url ?>">
      <iframe src="<?php echo $url;?>" frameborder="0" allowfullscreen></iframe>
    </a>

    <h3 class="loop-title">
      <a class="js-popup-video" href="<?php echo $url ?>">Live Webcam</a>
    </h3>

    <div class="loop-content">
      <p><?php echo $text; ?></p>
      <a class="btn btn-red js-popup-video" href="<?php echo $url ?>">View Webcam</a>
    </div>
  </div>
  