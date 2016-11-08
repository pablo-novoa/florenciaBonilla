<div class="primrose-sow-feature">
	<?php switch ( $instance['icon'] ) {
	 	case 'font':
	 		$icon_styles = array();
			$icon_styles[] = 'font-size: ' . $instance['icon_size'];
			$icon_styles[] = 'color: ' . $instance['icon_color'];

			if ( ! empty( $instance['icon_font'] ) ) echo '<div class="primrose-sow-feature-icon">' . siteorigin_widget_get_icon( $instance['icon_font'], $icon_styles ) . '</div>';
	 		break;

	 	case 'image':
	 		$icon_image = wp_get_attachment_image( $instance['icon_image'], 'full' );
			if ( ! empty( $icon_image ) ) echo '<div class="primrose-sow-feature-icon">' . $icon_image . '</div>';
	 		break;
	 	
	 	default:
	 		break;
	} ?>

	<?php printf(
		'<%s class="primrose-sow-feature-heading" style="color: %s;">%s</%s>',
		$instance['heading_level'],
		$instance['heading_color'],
		$instance['heading'],
		$instance['heading_level']
	); ?>

	<div class="primrose-sow-feature-description"><?php echo ( $instance['description'] ); ?></div>
</div><!-- .primrose-sow-feature -->