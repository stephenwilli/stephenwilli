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
      
      elseif( get_row_layout() == 'flex_wave_section' )   {
        get_template_part( 'partials/04_flex/flex-wave-section' );
      }
      
      elseif( get_row_layout() == 'flex_page_intro' )   {
        get_template_part( 'partials/04_flex/flex-page-intro' );
      }
      
      elseif( get_row_layout() == 'flex_support_cta' )   {
        get_template_part( 'partials/04_flex/flex-support-cta' );
      }
      
      elseif( get_row_layout() == 'flex_image_columns' )   {
        get_template_part( 'partials/04_flex/flex-image-columns' );
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
      
      elseif( get_row_layout() == 'flex_form' )   {
        get_template_part( 'partials/04_flex/flex-form' );
      }
      
      elseif( get_row_layout() == 'flex_events' )   {
        get_template_part( 'partials/04_flex/flex-events' );
      }
      
      elseif( get_row_layout() == 'flex_gallery' )   {
        get_template_part( 'partials/04_flex/flex-gallery' );
      }
      
      elseif( get_row_layout() == 'flex_amenities_slider' )   {
        get_template_part( 'partials/04_flex/flex-amenities-slider' );
      }
      
      elseif( get_row_layout() == 'flex_team' )   {
        get_template_part( 'partials/04_flex/flex-team' );
      }
      
      elseif( get_row_layout() == 'flex_reports' )   {
        get_template_part( 'partials/04_flex/flex-reports' );
      }
      
      elseif( get_row_layout() == 'flex_counter_columns' )   {
        get_template_part( 'partials/04_flex/flex-counter-columns' );
      }
      
      elseif( get_row_layout() == 'flex_interactive_map' )   {
        get_template_part( 'partials/04_flex/flex-interactive-map' );
      }

    endwhile; endif;
  ?>
