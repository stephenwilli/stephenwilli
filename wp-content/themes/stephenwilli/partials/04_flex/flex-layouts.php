<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
} 
global $post;
?>

<?php
  if( have_rows('flex_content') ): while ( have_rows('flex_content') ) : the_row();
            
      if( get_row_layout() == 'flex_wysiwyg' )   {
        get_template_part( 'partials/04_flex/flex-wysiwyg' );
      }
      
      elseif( get_row_layout() == 'flex_split' )   {
        get_template_part( 'partials/04_flex/flex-split' );
      }
      
      elseif( get_row_layout() == 'flex_page_links' )   {
        get_template_part( 'partials/04_flex/flex-page-links' );
      }
      
      elseif( get_row_layout() == 'flex_collapse' )   {
        get_template_part( 'partials/04_flex/flex-collapse' );
      }
      
      elseif( get_row_layout() == 'flex_icon_columns' )   {
        get_template_part( 'partials/04_flex/flex-icon-columns' );
      }
      
      elseif( get_row_layout() == 'flex_gallery' )   {
        get_template_part( 'partials/04_flex/flex-gallery' );
      }

    endwhile; endif;
  ?>
