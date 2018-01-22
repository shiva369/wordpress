/**
 * Handles sticky navigation for larger screens
 */

( function( $ ) {

	var body, resizeTimer, currentPosition, header, headerImg;

	body = $( document.body );

	// Add 'below-entry-meta' class to elements.
	function belowEntryMetaClass( param ) {
		if ( body.hasClass( 'search' ) ||
			 body.hasClass( 'single-attachment' ) ||
			 body.hasClass( 'error404' ) ) {
			return;
		}

		$( '.entry-content' ).find( param ).each( function() {
			var element            = $( this ),
				elementPos         = element.offset(),
				elementPosTop      = elementPos.top,
				entryMeta          = element.closest( 'article' ).find( '.entry-meta' ),
				entryMetaPos, entryMetaPosBottom;

			if ( 0 != entryMeta.length ) { //If entry meta exists
				entryMetaPos       = entryMeta.offset(),
				entryMetaPosBottom = entryMetaPos.top + ( entryMeta.height() + 28 );
			}
			else {
				entryMetaPos       = 0,
				entryMetaPosBottom = 0;
			}

			// Add 'below-entry-meta' to elements below the entry meta.
			if ( elementPosTop > entryMetaPosBottom ) {
				element.addClass( 'below-entry-meta' );
			} else {
				element.removeClass( 'below-entry-meta' );
			}
		} );
	}

	// Add 'below-sidebar' class to elements.
	function belowSidebarClass( param ) {
		if ( body.hasClass( 'search' ) ||
			 body.hasClass( 'single-attachment' ) ||
			 body.hasClass( 'error404' ) ) {
			return;
		}

		$( '.entry-content' ).find( param ).each( function() {
			var element          = $( this ),
				elementPos       = element.offset(),
				elementPosTop    = elementPos.top,
				sidebar          = $( '#secondary.widget-area' ),
				sidebarPos, sidebarPosBottom;

			if ( 0 != sidebar.length ) { //If a sidebar exists
				sidebarPos       = sidebar.offset();
				sidebarPosBottom = sidebarPos.top + ( sidebar.height() + 28 );
			}
			else {
				sidebarPos       = 0;
				sidebarPosBottom = 0;
			}

			// Add 'below-entry-meta' to elements below the entry meta.
			if ( elementPosTop > sidebarPosBottom ) {
				element.addClass( 'below-sidebar' );
			} else {
				element.removeClass( 'below-sidebar' );
			}
		} );
	}

	//Adjust width of padding on Jetpack Contact Form labels
	function formLabelLength() {
		var form = $( '.entry-content .contact-form' );

		if ( 0 == form.length ) {
			return;
		}

		form.each( function() {

			var labels,
				inputs,
				widths,
				padding;

			// Find all form labels and inputs

			labels = $( this ).find( 'label.text, label.url, label.name, label.email' );
			inputs = $( this ).find( 'input[type="text"], input[type="email"], input[type="url"], input[type="name"]' );

			if ( 0 !== labels.length ) {

				widths = new Array();

				// Get the width of each label

				labels.each( function() {
					
					if ( $( this ).parent().width() - $( this ).width() > 100 ) {
						widths.push( $( this ).outerWidth() );
						$( this ).addClass( 'absolute' );
					} else {
						$( this ).next( 'input[type="text"], input[type="email"], input[type="url"], input[type="name"]' ).addClass( 'no-padding' );
					}

				} );

				// Get longest value and add extra for padding

				padding = Math.max.apply( Math, widths ) + 28;

				// Set right/left-hand padding on the fields
				
				if ( $( 'html' ).attr( 'dir' ) == 'rtl') {
					inputs.css( { 'padding-right' : padding } );
				} else {
					inputs.css( { 'padding-left' : padding } );
				}

			}

		} );
	}

	//Apply classes to aligned left and right elements (blockquotes, captions, images)
	function moveAlignedElements() {

		var ltr = true;
		if ( $( 'html' ).attr( 'dir' ) == 'rtl') {
			ltr = false;
		}

		$( window )
			.on( 'resize post-load', function() {
				clearTimeout( resizeTimer );
				resizeTimer = setTimeout( function() {

					if ( true == ltr ) {
						belowEntryMetaClass( 'img.alignleft, figure.alignleft' );
						belowEntryMetaClass( 'blockquote.alignleft' );

						belowSidebarClass( 'img.alignright, figure.alignright' );
						belowSidebarClass( 'blockquote.alignright' );
					}
					else {
						belowEntryMetaClass( 'img.alignright, figure.alignright' );
						belowEntryMetaClass( 'blockquote.alignright' );

						belowSidebarClass( 'img.alignleft, figure.alignleft' );
						belowSidebarClass( 'blockquote.alignleft' );
					}

					if ( $( window ).width() >= 736 ) {
						headerImg.css( 'min-height', header.outerHeight() + 'px' );
					}
				}, 300 );
			} );

		if ( true == ltr ) {
			belowEntryMetaClass( 'img.alignleft, figure.alignleft' );
			belowEntryMetaClass( 'blockquote.alignleft' );

			belowSidebarClass( 'img.alignright, figure.alignright' );
			belowSidebarClass( 'blockquote.alignright' );
		}
		else {
			belowEntryMetaClass( 'img.alignright, figure.alignright' );
			belowEntryMetaClass( 'blockquote.alignright' );

			belowSidebarClass( 'img.alignleft, figure.alignleft' );
			belowSidebarClass( 'blockquote.alignleft' );
		}

	}

	//Resize the header to fit its contents
	function sizeHeader() {

		if ( $( window ).width() < 736 ) {
			return;
		}

		currentPosition = window.pageYOffset;
		header          = $( '.header-wrapper' );
		headerImg       = $( '.site-header .custom-header' );

		if ( currentPosition > ( headerImg.height() + 32 ) ) {
			header.addClass( 'without-transparency' );
		}

		headerImg.css( 'min-height', header.outerHeight() + 'px' );
	}

	//Give header navigation a background color when scrolling past the header
	function headerTransparency() {

		currentPosition = window.pageYOffset;
		header          = $( '.header-wrapper' );
		headerImg       = $( '.site-header .custom-header' );

		if ( currentPosition > ( headerImg.height() - header.height() ) ) {
			header.addClass( 'without-transparency' );
		} else {
			header.removeClass( 'without-transparency' );
		}

	}

	//Masonry for Guestbook template

	function guestbookMasonry() {

		body = $( document.body );

		if ( ! body.hasClass( 'page-template-guestbook' ) ) {
			return;
		}

		var ltr = true;
		if ( $( 'html' ).attr( 'dir' ) == 'rtl') {
			ltr = false;
		}

		var $guestbookContainer = $( '.page-template-guestbook .comments-area .comment-list');

		$guestbookContainer.imagesLoaded( function() {
			$guestbookContainer.masonry( {
				itemSelector: '.comment',
				isOriginLeft: ltr,
				gutter: 30,
			} );
		} );
	}

	/* Functions to fire on document ready */
	$( document ).ready( function() {

		moveAlignedElements();

	} );

	/* Functions to fire on window load */
	$( window ).load( function() {

		guestbookMasonry();
		formLabelLength();
		sizeHeader();

	} );

	/* Functions to fire on infinite scroll's post-load */
	$( window ).on( 'post-load', function() {

		formLabelLength();

	} );

	/* Functions to fire on resize */
	$( window ).on( 'resize', function() {

		sizeHeader();

	} );

	/* Functions to fire on document scroll */
	$( document ).on( 'scroll', function() {

		headerTransparency();

	});

} )( jQuery );