<?php

add_filter("gform_init_scripts_footer", "init_scripts");
  function init_scripts() {
  return true;
}

// SCROLL TO FORM CONFIRMATION

add_filter( 'gform_confirmation_anchor', '__return_true' );

?>