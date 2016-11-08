;jQuery.noConflict();

(function($) {
	"use strict";

	var SSPF = SSPF || {};
	
	SSPF.postFormats = {
		switchTab: function(clicked) {
			var $this = $(clicked),
				$tab = $this.closest('li');

			if (!$this.hasClass('current')) {
				$this.addClass('current');
				$tab.siblings().find('a').removeClass('current');
				this.switchWPFormat($this.attr('href'));
			}
		},
		
		switchWPFormat: function(formatHash) {
			$(formatHash).trigger('click');
			switch (formatHash) {
				case '#post-format-0':
				case '#post-format-aside':
				case '#post-format-chat':
					SSPF.postFormats.standard();
					break;
				case '#post-format-status':
				case '#post-format-link':
				case '#post-format-image':
				case '#post-format-gallery':
				case '#post-format-video':
				case '#post-format-quote':
				case '#post-format-audio':
					SSPF.postFormats[formatHash.replace('#post-format-', '')]();
					break;
			}
			$(document).trigger('sspf-switch', formatHash);
		},

		standard: function() {
			$('#sspf-format-link-url, #sspf-format-quote-fields, #sspf-format-video-fields, #sspf-format-audio-fields, #sspf-format-gallery-preview').hide();
			$('#titlewrap').show();
			$('#postimagediv-placeholder').replaceWith($('#postimagediv'));
		},
		
		status: function() {
			$('#titlewrap, #sspf-format-link-url, #sspf-format-quote-fields, #sspf-format-video-fields, #sspf-format-audio-fields, #sspf-format-gallery-preview').hide();
			$('#postimagediv-placeholder').replaceWith($('#postimagediv'));
			$('#content:visible').focus();
		},

		link: function() {
			$('#sspf-format-quote-fields, #sspf-format-video-fields, #sspf-format-audio-fields, #sspf-format-gallery-preview').hide();
			$('#titlewrap, #sspf-format-link-url').show();
			$('#postimagediv-placeholder').replaceWith($('#postimagediv'));
		},
		
		image: function() {
			$('#sspf-format-link-url, #sspf-format-quote-fields, #sspf-format-video-fields, #sspf-format-audio-fields, #sspf-format-gallery-preview').hide();
			$('#titlewrap').show();
			$('#postimagediv').after('<div id="postimagediv-placeholder"></div>').insertAfter('#titlediv');
		},

		gallery: function() {
			$('#sspf-format-link-url, #sspf-format-quote-fields, #sspf-format-video-fields, #sspf-format-audio-fields').hide();
			$('#titlewrap, #sspf-format-gallery-preview').show();
			$('#postimagediv-placeholder').replaceWith($('#postimagediv'));
		},

		video: function() {
			$('#sspf-format-link-url, #sspf-format-quote-fields, #sspf-format-gallery-preview, #sspf-format-audio-fields').hide();
			$('#titlewrap, #sspf-format-video-fields').show();
			$('#postimagediv-placeholder').replaceWith($('#postimagediv'));
		},

		quote: function() {
			$('#titlewrap, #sspf-format-link-url, #sspf-format-video-fields, #sspf-format-audio-fields, #sspf-format-gallery-preview').hide();
			$('#sspf-format-quote-fields').show().find(':input:first').focus();
			$('#postimagediv-placeholder').replaceWith($('#postimagediv'));
		},

		audio: function() {
			$('#sspf-format-link-url, #sspf-format-quote-fields, #sspf-format-video-fields, #sspf-format-gallery-preview').hide();
			$('#titlewrap, #sspf-format-audio-fields').show();
			$('#postimagediv-placeholder').replaceWith($('#postimagediv'));
		},

		initGallery: function() {

			// Gallery Management
			var postId   = $('#post_ID').val(),
			    $gallery = $('.sspf-gallery-picker .gallery');
		
			var SSPFMediaControl = {

				// Init a new media manager or returns existing frame
				frame: function() {
					if( this._frame )
						return this._frame;

					this._frame = wp.media({
						title: sspf_post_format.media_title,
						library: {
							type: 'image'
						},
						button: {
							text: sspf_post_format.media_button
						},
						multiple: true
					});

					this._frame.on('open', this.updateFrame).state('library').on('select', this.select);

					return this._frame;
				},

				select: function() {
					var selection = this.get('selection');

					selection.each(function(model) {
						var thumbnail = model.attributes.url;
						if( model.attributes.sizes !== undefined && model.attributes.sizes.thumbnail !== undefined )
							thumbnail = model.attributes.sizes.thumbnail.url;
						$gallery.append('<span data-id="' + model.id + '" title="' + model.attributes.title + '"><img src="' + thumbnail + '" alt="" /><span class="close">x</span></span>');
						$gallery.trigger('update');
					});
				},

				updateFrame: function() {
				},

				init: function() {
					$('#wpbody').on('click', '.sspf-gallery-button', function(e){
						e.preventDefault();
						SSPFMediaControl.frame().open();
					});
				}
			};
			SSPFMediaControl.init();

			$gallery.on('update', function(){
				var ids = [];
				$(this).find('> span').each(function(){
					ids.push($(this).data('id'));
				});
				$('[name="_format_gallery_images"]').val(ids.join(','));
			});

			$gallery.sortable({
				placeholder: "sspf-ui-state-highlight",
				revert: 200,
				tolerance: 'pointer',
				stop: function () {
					$gallery.trigger('update');
				}
			});

			$gallery.on('click', 'span.close', function(e){
				$(this).parent().fadeOut(200, function(){
					$(this).remove();
					$gallery.trigger('update');
				});
			});
		},
	};
	
	// move tabs in to place
	$('#sspf-tabs').insertBefore($('form#post')).show();
	$('#sspf-format-link-url, #sspf-format-video-fields, #sspf-format-audio-fields').insertAfter($('#titlediv'));
	$('#sspf-format-gallery-preview').find('dt a').each(function() {
		$(this).replaceWith($(this.childNodes)); // remove links
	}).end().insertAfter($('#titlediv'));
	$('#sspf-format-quote-fields').insertAfter($('#titlediv'));
	
	$(document).trigger('sspf-init');
	
	// tab switch
	$(document).on('click', '#sspf-tabs a', function(e) {
		SSPF.postFormats.switchTab(this);
		e.stopPropagation();
		e.preventDefault();
	});
	$('#sspf-tabs a').filter('.current').each(function() {
		SSPF.postFormats.switchWPFormat($(this).attr('href'));
	});

	SSPF.postFormats.initGallery();

})(jQuery);
