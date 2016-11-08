;jQuery.noConflict();

(function( $ ) {
	"use strict";

	$( document ).on( 'ready', function() {

		var $window = $( window ),
		    $document = $( document ),
		    $body = $( 'body' );

		/**
		 * Function: Detect Mobile Device.
		 */
		// source: http://www.abeautifulsite.net/detecting-mobile-devices-with-javascript/
		var isMobile = {
			Android: function() {
				return navigator.userAgent.match( /Android/i );
			},
			BlackBerry: function() {
				return navigator.userAgent.match( /BlackBerry/i );
			},
			iOS: function() {
				return navigator.userAgent.match( /iPhone|iPad|iPod/i );
			},
			Opera: function() {
				return navigator.userAgent.match( /Opera Mini/i );
			},
			Windows: function() {
				return navigator.userAgent.match( /IEMobile/i );
			},
			any: function() {
				return ( isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows() );
			},
		}

		/**
		 * Generate parallax background div.
		 */
		$( '[data-primrose-parallax]' ).each(function( i, el ) {
			var $el = $( el ),
			    $img = $( document.createElement( 'img' ) ),
			    $bg,
			    data = JSON.parse( $el.attr( 'data-primrose-parallax' ) );

			$bg = $el.find( '.primrose-sow-parallax-background.primrose-sow-background-cover' );
			if ( $bg.length < 1 ) {
				$bg = $( document.createElement( 'div' ) ).addClass( 'primrose-sow-parallax-background primrose-sow-background-cover' ).prependTo( $el );
			}

			// New background element.
			$img
				.attr( 'src', data.src )
				.attr( 'width', data.width )
				.attr( 'height', data.height )
				.attr( 'data-stellar-ratio', '0.5' )
				.attr( 'alt', '' )
				.css({ 'opacity': 0 })
				.appendTo( $bg );
		});

		/**
		 * Resize background.
		 */
		var resizeBackground = function() {
			$( '.primrose-sow-background-cover video, .primrose-sow-background-cover img' ).each(function( i, el ) {
				var $el       = $( el ),
				    $section  = $el.parent(),
				    min_w     = 0,
				    el_w      = $el.attr( 'width' ) || ( el.tagName == 'VIDEO' ? el.videoWidth : el.naturalWidth ),
				    el_h      = $el.attr( 'height' ) || ( el.tagName == 'VIDEO' ? el.videoHeight : el.naturalHeight ),
				    section_w = $section.innerWidth(),
				    section_h = $section.innerHeight(),
				    scale_w   = section_w / el_w,
				    scale_h   = section_h / el_h,
				    scale     = scale_w > scale_h ? scale_w : scale_h,
				    new_el_w, new_el_h, offset_top, offset_left;

				if ( scale * el_w < min_w ) {
					scale = min_w / el_w;
				}

				// calculate offsets and sizes.
				new_el_w = scale * el_w;
				new_el_h = scale * el_h;
				offset_left = ( new_el_w - section_w ) / 2 * -1;
				offset_top  = ( new_el_h - section_h ) / 2 * -1;

				// apply offsets and sizes.
				$el.css({
					"width" : new_el_w,
					"height" : new_el_h,
					"margin-top" : offset_top,
					"margin-left" : offset_left,
					"opacity" : 1,
				});
			});
		}
		$window.on( 'resize', function() {
			clearTimeout( this.resizeBackgroundTimeout );
			this.resizeBackgroundTimeout = setTimeout( resizeBackground, 100 );
		});
		$( '.primrose-sow-background-cover video, .primrose-sow-background-cover img' ).imagesLoaded(function() {
			resizeBackground();
		});

		/**
		 * Disable background video on mobile devices.
		 */
		if ( isMobile.any() ) {
			$( '.primrose-sow-hero-slide-background-video' ).remove();
		}

		/**
		 * Animations.
		 */
		if ( ! isMobile.any() ) {
			$( '[class*="primrose-sow-animation-"]' ).one( 'inview', function() {
				$( this ).addClass( 'primrose-sow-animation-animate' );
			});
		} else {
			$( '[class*="primrose-sow-animation-"]' ).addClass( 'primrose-sow-animation-no-animate' );
		}

		/**
		 * Counter up.
		 */
		if ( $.fn.counterUp ) {
			$( '.primrose-sow-counter' ).each(function( i, el ) {
				var $el = $( el ),
				    $number = $el.find( '.counter-up' ),
				    duration = $el.attr( 'data-duration' );

				if ( duration > 0 ) {
					$number.counterUp({
						time: duration,
					})
				}
			});
		};

		/**
		 * Accordion.
		 */
		$( '.primrose-sow-accordion' ).each(function( i, el ) {
			var $el = $( el ),
			    multiple_active = $el.attr( 'data-multiple_active' );

			if ( ! multiple_active && $el.find( '.primrose-sow-accordion-item.active' ).length > 1 ) {
				$el.find( '.primrose-sow-accordion-item.active' ).removeClass( 'active' ).last().addClass( 'active' );
			}

			$el.find( '.primrose-sow-accordion-item-title' ).on( 'click', function( e ) {
				var $item = $( this ).parent(),
				    $items = $item.siblings( '.primrose-sow-accordion-item' );

				if ( $item.hasClass( 'active' ) ) {
					// current active item is clicked again.
					$item.removeClass( 'active' );
				} else {
					// other item is clicked.
					$item.addClass( 'active' );
					
					if ( ! multiple_active ) {
						// close others.
						$items.removeClass( 'active' );
					}
				}
			});
		});

		/**
		 * Slick slider.
		 */
		if ( $.fn.slick ) {
			$( '.primrose-sow-hero-slider.slick' ).each(function() {
				var $el = $( this ),
				    autoplay = $el.attr( 'data-autoplay' );

				$el.slick({
					autoplaySpeed: autoplay,
					autoplay: autoplay > 0 ? true : false,
					arrows: true,
					dots: true,
					fade: true,
					infinite: true,
					speed: 500,
					cssEase: 'ease-in-out',
				}).on( 'setPosition', function( e, slick ) {
					var $current = $( slick.$slides[ slick.currentSlide ] ),
					    $current_video = $current.find( 'video' );

					if ( $current_video.length > 0 ) $current_video.get(0).play();
				}).on( 'beforeChange', function( e, slick, currentSlide, nextSlide ) {
					var $current = $( slick.$slides[ currentSlide ] ),
					    $current_video = $( slick.$slides[ currentSlide ] ).find( 'video' ),
					    $next_video = $( slick.$slides[ nextSlide ] ).find( 'video' );

					$current.addClass( 'crossfade' );
					if ( $current_video.length > 0 ) $current_video.get(0).pause();
					if ( $next_video.length > 0 ) $next_video.get(0).play();
				}).on( 'afterChange', function( e, slick, currentSlide ) {
					$( slick.$slides ).removeClass( 'crossfade' );
				}).slick( 'setPosition' );
			});

			$( '.primrose-sow-quotes.slick' ).slick({
				arrows: false,
				dots: true,
				fade: true,
				infinite: true,
				speed: 500,
				cssEase: 'ease-in-out',
				adaptiveHeight: true,
			});
		}

		/**
		 * Progress bars.
		 */
		$( '.primrose-sow-progress-bars' ).each(function( i, el ) {
			var $el = $( el ),
			    $bars = $el.find( '.primrose-sow-progress-bar' );

			$bars.one( 'inview', function() {
				var $bar = $( this ),
				    $block = $bar.find( '.primrose-sow-progress-bar-block' ),
				    $label = $bar.find( '.primrose-sow-progress-bar-percentage' ),
				    target = $bar.attr( 'data-progress-value' );

				$({ progress: 0 }).animate({ progress: target }, {
					duration: target * 15,
					easing: 'swing',
					step: function( now, fx ) {
						$block.css( 'width', now + '%' );
						$label.html( Math.floor( now ) );
					},
				});
			});
		});

		/**
		 * Masonry grid.
		 */
		if ( $.fn.packery ) {
			var resizeMasonry = function() {
				var windowWidth = window.innerWidth,
				    breakPoint = 'mobileSmall';

				if ( windowWidth >= 520 ) breakPoint = 'mobile';
				if ( windowWidth >= 768 ) breakPoint = 'tablet';
				if ( windowWidth >= 1024 ) breakPoint = 'normal';
				if ( windowWidth >= 1200 ) breakPoint = 'desktop';

				$( '.primrose-sow-masonry-grid' ).each(function( i, el ) {
					var $el = $( el ),
					    layouts = $el.data( 'layouts' ),
					    layout = layouts[ breakPoint ],
					    numColumns = layout.numColumns,
					    gutter = ( typeof layout.gutter == 'string' && layout.gutter.indexOf( '%' ) > -1 ) ? ( parseFloat( layout.gutter ) / 100 ) * $el.width() : parseFloat( layout.gutter ),
					    horizontalGutterSpace = gutter * ( numColumns - 1 ),
					    columnWidth = ( $el.width() - horizontalGutterSpace ) / numColumns,
					    rowHeight = ( typeof layout.rowHeight == 'string' && layout.rowHeight.indexOf( '%' ) > -1 ) ? ( parseFloat( layout.rowHeight ) / 100 ) * $el.width() : ( parseFloat( layout.rowHeight ) || columnWidth );

					$el.find( '.primrose-sow-masonry-grid-sizer-width' ).width( columnWidth );
					$el.find( '.primrose-sow-masonry-grid-sizer-height' ).height( rowHeight );
					$el.find( '.primrose-sow-masonry-grid-sizer-gutter' ).width( gutter );

					$el.find( '.primrose-sow-masonry-grid-item' ).each(function() {
						var $item = $( this ),
						    colSpan = Math.max( Math.min( $item.data( 'colSpan' ), layout.numColumns ), 1 ),
						    rowSpan = $item.data( 'rowSpan' );

						$item.width( ( columnWidth * colSpan ) + ( gutter * ( colSpan - 1 ) ) );
						$item.height( ( rowHeight * rowSpan ) + ( gutter * ( rowSpan - 1 ) ) );
					});

					$el.packery({
						itemSelector: '.primrose-sow-masonry-grid-item',
						columnWidth: '.primrose-sow-masonry-grid-sizer-width',
						rowHeight: '.primrose-sow-masonry-grid-sizer-height',
						gutter: '.primrose-sow-masonry-grid-sizer-gutter',
						resize: false,
					}).css({
						"opacity" : 1,
						"visibility" : "visible",
					});
				});
			};
			$window.on( 'resize', resizeMasonry );
			$( '.primrose-sow-masonry-grid' ).imagesLoaded(function() {
				resizeMasonry();
			});
		}

		/**
		 * Stellar js for Parallax background.
		 */
		if ( $.fn.stellar ) {
			// Destory existing stellar instance.
			$window.stellar( 'destroy' );
			
			if ( ! isMobile.any() ) {
				// Reinit stellar on non mobile devices.
				$window.stellar({
					verticalOffset: function() { return $body.offset().top },
					positionProperty: 'transform',
					responsive: true,
					hideDistantElements: false,
					horizontalScrolling: false,
				});
			} else {
				// Remove stellar so SiteOrigin JS doesn't init stellar anymore.
				$.stellar = function() { return; };
			}
		}

		// Trigger scroll.
		$window.trigger( 'scroll' );
	});
})( jQuery );