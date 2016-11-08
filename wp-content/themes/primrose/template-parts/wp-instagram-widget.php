<?php
switch ( $size ) {
	case 'thumbnail':
		$width = 160;
		$height = 160;
		break;

	case 'small':
		$width = 320;
		$height = 320;
		break;

	case 'large':
		$width = 640;
		$height = 640;
		break;
	
	default:
		$width = 'auto';
		$height = 'auto';
		break;
}
?>
<li class="<?php echo esc_attr( $liclass ); ?>">
	<a href="<?php echo esc_url( $item['link'] ); ?>" target="<?php echo esc_attr( $target ); ?>" class="<?php echo esc_attr( $aclass ); ?>">
		<img widt="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" src="<?php echo esc_url( $item[$size] ); ?>" alt="<?php echo esc_attr( $item['description'] ); ?>" title="<?php echo esc_attr( $item['description'] ); ?>" class="<?php echo esc_attr( $imgclass ); ?>">
	</a>
</li>