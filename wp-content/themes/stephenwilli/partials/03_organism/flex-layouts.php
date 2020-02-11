<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
} 
global $post;
?>

  <?php
    if( have_rows('flex_content') ): while ( have_rows('flex_content') ) : the_row();
      
      if( get_row_layout() == 'flex_content_section' ){ 
              $background = get_sub_field('fc_section_background');
              if($background === 'image'){
                $bgImage = get_sub_field('fc_section_background_image');
              }
            ?>
            <section class="flex-section bg-<?php echo $background;?>" <?php if($background === 'image') { ?> style="background-image:url('<?php echo $bgImage['sizes']['full_screen'];?>')" <?php } ?>>
              <?php while (has_sub_field('flex_content_type') ) :
                
                  if( get_row_layout() == 'flex_centered_text' )   {
                    get_template_part( 'partials/04_flex/flex_centered_text' );
                  }
                  
                  elseif( get_row_layout() == 'flex_image_overlay' )   {
                    get_template_part( 'partials/04_flex/flex_image_overlay' );
                  }
                  
                  elseif( get_row_layout() == 'flex_split_content' )   {
                    get_template_part( 'partials/04_flex/flex_split_content' );
                  }
                  
                  elseif( get_row_layout() == 'flex_columns' )   {
                    get_template_part( 'partials/04_flex/flex_columns' );
                  }
                  
                  elseif( get_row_layout() == 'flex_site_links' )   {
                    get_template_part( 'partials/04_flex/flex_site_links' );
                  }
                  
                  elseif( get_row_layout() == 'flex_logo_slider' )   {
                    get_template_part( 'partials/04_flex/flex_logo_slider' );
                  }
                  
                  endwhile;
                ?>
            </section>
      
    <?php  } 
      endwhile; endif;
    ?>
