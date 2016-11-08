<div class="sspf-elm-block" id="sspf-format-link-url" style="display: none;">
	<?php do_action( 'sspf_before_link_meta' ); ?>
	<label for="sspf-format-link-url-field"><?php _e('URL', 'sspf'); ?></label>
	<input type="text" name="_format_link_url" value="<?php echo esc_attr(get_post_meta($post->ID, '_format_link_url', true)); ?>" id="sspf-format-link-url-field" tabindex="1" />
	<?php do_action( 'sspf_after_link_meta' ); ?>
</div>	
