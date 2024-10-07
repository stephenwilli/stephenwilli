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
      <h2><?= $leftLink['title'];?></h2>
      <a class="split-link" href="<?= $leftLink['url'];?>"></a>
    </div>
    <div class="split-half -right">
      <div class="overlay"></div>
      <img src="<?= $rightImage['sizes']['large'];?>">
      <h2><?= $rightLink['title'];?></h2>
      <a class="split-link" href="<?= $rightLink['url'];?>"></a>
    </div>    
  </section>