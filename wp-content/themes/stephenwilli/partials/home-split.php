<?php 
  $leftImage = get_field('left_image');
  $leftLink = get_field('left_link');
  $rightImage = get_field('right_image');
  $rightLink = get_field('right_link');
  ?>
  <section class="home-split">
    <div class="split-half -left">
      <div class="overlay"></div>
      <img src="<?= $leftImage['sizes']['large'];?>">
      <h1 class="h3"><?= $leftLink['title'];?><?= icon('arrow-right'); ?></h3>
      
      <a class="split-link" href="<?= $leftLink['url'];?>"></a>
    </div>
    <div class="split-half -right">
      <div class="overlay"></div>
      <img src="<?= $rightImage['sizes']['large'];?>">
      <h1 class="h3"><?= $rightLink['title'];?><?= icon('arrow-left'); ?></h3>
      
      <a class="split-link" href="<?= $rightLink['url'];?>"></a>
    </div>    
  </section>