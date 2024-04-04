import lazySizes from 'lazysizes';
( () => {
	'use strict';
	// Lazyload for background images.
	const lazyloadBackground = ( element ) => {
		let bgValue = element.getAttribute( 'data-bg-image' );
		let property = 'backgroundImage';
		if ( ! bgValue ) {
			bgValue = element.getAttribute( 'data-bg' );
			property = 'background';
		}

		if ( bgValue ) {
			element.style[ property ] = bgValue;
		}
	};

	document.addEventListener( 'lazybeforeunveil', function( e ) {
		// Lazy background image.
		lazyloadBackground( e.target );
	} );

	lazySizes.init();
} )();
