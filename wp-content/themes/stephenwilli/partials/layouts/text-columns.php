<?php 
  $columns = $data['column'];
?>
<section class="flex-columns container pad-y">
    <div class="grid">

      <?php 
        $i = 1;      
        foreach($columns as $column){
          $title = $column['column_title'];
          $text = $column['column_text'];
          $link = $column['column_link'];
        ?>
        <div class="column" data-animate="fade-right" data-delay="<?= $i; ?>">
          <?php if($title){ ?>
            <h3><?= $title;?></h3>
          <?php } ?>

          <?php if($text){ ?>
            <div><?= $text;?></div>
          <?php } ?>

          <?php if($link){ ?>
            <a href="<?= $link['url'];?>"><?= $link['title'];?></a>
          <?php } ?>
        </div>
      <?php $i++; } ?>
    </div>
</section><!-- /section -->

