<div class="sspf-elm-block" id="sspf-format-video-fields" style="display: none;">
	<?php do_action( 'sspf_before_video_meta' ); ?>
	<label for="sspf-format-video-embed"><?php _e('Video URL (oEmbed) or Embed Code', 'sspf'); ?></label>
	<textarea name="_format_video_embed" id="sspf-format-video-embed" tabindex="1"><?php echo esc_textarea(get_post_meta($post->ID, '_format_video_embed', true)); ?></textarea>
	<?php do_action( 'sspf_after_video_meta' ); ?>
</div>	
