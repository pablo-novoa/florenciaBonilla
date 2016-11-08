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
		 * IE9 placeholder polyfill.
		 */
		if ( ! ( 'placeholder' in document.createElement( 'input' ) ) ) {
			$( 'form' ).on( 'submit', function() {
				$( this ).find( '[placeholder]' ).each(function() {
					var $input = $( this );
					if ( $input.val() == $input.attr( 'placeholder' ) ) {
						$input.val( '' );
					}
				});
			});

			$( '[placeholder]' ).on( 'focus', function() {
				var $input = $( this );
				if ( $input.val() == $input.attr( 'placeholder' ) ) {
					$input.val( '' );
					$input.removeClass( 'placeholder' );
				}
			}).on( 'blur', function() {
				var $input = $( this );
				if ( $input.val() == '' || $input.val() == $input.attr( 'placeholder' ) ) {
					$input.addClass( 'placeholder' );
					$input.val( $input.attr( 'placeholder' ) );
				}
			}).blur();
		}

		/**
		 * Floating header.
		 */
		if ( $( '.navigation-section' ).hasClass( 'navigation-floating' ) ) {
			var detectFloatingHeader = function() {
				if ( $window.scrollTop() >= $( '.navigation-anchor' ).offset().top - $body.offset().top ) {
					$( '.navigation-section' ).addClass( 'floating' ).css( 'top', $body.offset().top );
				} else {
					$( '.navigation-section' ).removeClass( 'floating' ).css( 'top', '' );
				}
			}
			detectFloatingHeader();
			$window.on( 'resize', detectFloatingHeader );
			$window.on( 'scroll', detectFloatingHeader );
		}

		/**
		 * Toggle visibility.
		 */
		$body.on( 'click', '.toggle', function( e ) {
			e.preventDefault();

			$( '.toggle.active' ).not( this ).removeClass( 'active' );
			$( this ).toggleClass( 'active' );
		});

		/**
		 * Smooth Scroll Navigation
		 */
		// $( 'a[href="#"]' ).on( 'click', function( e ) {
		// 	e.preventDefault();
		// });
		$( '.header-navigation ul a, a.anchor-link' ).on( 'click', function( e ) {
			if ( location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname && location.search == this.search ) {
				var $target = $( this.hash ),
				    target_top, speed;

				$target = $target.length ? $target : $( '[name=' + this.hash.slice(1) +']' );
				target_top = $target.offset().top - $( '.header-section' ).innerHeight() - $body.offset().top;
				speed = Math.abs( $window.scrollTop() - target_top ) / 2.5;

				if ( $target.length ) {
					$( 'html,body' ).animate({
						scrollTop: target_top,
					}, speed );
					$( '.header-navigation-toggle' ).removeClass( 'active' );
					return false;
				}
			}
		});

		/**
		 * Light gallery.
		 */
		if ( $.fn.lightGallery ) {
			$( '.woocommerce .product .images' ).lightGallery({
				selector: 'a',
				download: false,
			});
		}

		/**
		 * Slick slider.
		 */
		if ( $.fn.slick ) {
			$( '.entry-gallery.slick' ).slick({
				arrows: true,
				dots: true,
				fade: true,
				infinite: true,
				speed: 300,
				adaptiveHeight: true,
			}).on( 'beforeChange', function( e, slick, currentSlide, nextSlide ) {
				$( slick.$slides[ currentSlide ] ).addClass( 'crossfade' );
			}).on( 'afterChange', function( e, slick, currentSlide ) {
				$( slick.$slides ).removeClass( 'crossfade' );
			});

			$( '.ss-woo-single-product-slider-main.slick' ).slick({
				arrows: true,
				dots: false,
				fade: true,
				infinite: true,
				speed: 300,
				asNavFor: '.ss-woo-single-product-slider-nav',
			}).on( 'beforeChange', function( e, slick, currentSlide, nextSlide ) {
				$( slick.$slides[ currentSlide ] ).addClass( 'crossfade' );
				// $( '.ss-woo-single-product-slider-nav.slick' ).css( 'pointer-events', 'none' );
			}).on( 'afterChange', function( e, slick, currentSlide ) {
				$( slick.$slides ).removeClass( 'crossfade' );
				// $( '.ss-woo-single-product-slider-nav.slick' ).css( 'pointer-events', '' );
			});

			$( '.ss-woo-single-product-slider-nav.slick' ).slick({
				arrows: true,
				dots: false,
				focusOnSelect: true,
				speed: 300,
				centerMode: true,
				centerPadding: '39.375px',
				asNavFor: '.ss-woo-single-product-slider-main',
				slidesToShow: 7,
				slidesToScroll: 1,
				responsive: [{
					breakpoint: 519,
					settings: {
						slidesToShow: 3,
					}
				}],
			});
		}
	});
})( jQuery );
