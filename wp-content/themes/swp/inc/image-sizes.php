<?php

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'full_screen', 1680, 945 );
	add_image_size( 'lg_thumb', 600, 400, true ); // Force crop
	// add_image_size( 'headshot', 600, 450, array('center','top') ); > Set where image crops from
}