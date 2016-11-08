<div class="sspf-elm-block" id="sspf-format-audio-fields" style="display: none;">
	<?php do_action( 'sspf_before_audio_meta' ); ?>
	<label for="sspf-format-audio-embed"><?php _e('Audio URL (oEmbed) or Embed Code', 'sspf'); ?></label>
	<textarea name="_format_audio_embed" id="sspf-format-audio-embed" tabindex="1"><?php echo esc_textarea(get_post_meta($post->ID, '_format_audio_embed', true)); ?></textarea>
	<?php do_action( 'sspf_after_audio_meta' ); ?>
</div>