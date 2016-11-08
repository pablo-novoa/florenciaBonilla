<div id="sspf-format-quote-fields" style="display: none;">
	<?php do_action( 'sspf_before_quote_meta' ); ?>
	<div class="sspf-elm-block">
		<label for="sspf-format-quote-source-name"><?php _e('Source Name', 'sspf'); ?></label>
		<input type="text" name="_format_quote_source_name" value="<?php echo esc_attr(get_post_meta($post->ID, '_format_quote_source_name', true)); ?>" id="sspf-format-quote-source-name" tabindex="1" />
	</div>
	<div class="sspf-elm-block">
		<label for="sspf-format-quote-source-url"><?php _e('Source URL', 'sspf'); ?></label>
		<input type="text" name="_format_quote_source_url" value="<?php echo esc_attr(get_post_meta($post->ID, '_format_quote_source_url', true)); ?>" id="sspf-format-quote-source-url" tabindex="1" />
	</div>
	<?php do_action( 'sspf_after_quote_meta' ); ?>
</div>
