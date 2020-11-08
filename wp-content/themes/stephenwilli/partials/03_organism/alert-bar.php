<?php 
  $alertText = get_field('alert_bar_text', 'option');
  $alertLink = get_field('alert_bar_link', 'option');
?> 
<div class="alert-bar">
  <p class="alert-text"><?php echo $alertText;?> <a class="alert-link" href="<?php echo $alertLink['url'];?>"><?php echo $alertLink['title'];?></a></p>
</div>