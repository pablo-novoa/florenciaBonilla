<?php
/**
 * Plugin Name: Primrose: SiteOrigin Widgets
 * Plugin URI: http://singlestroke.io/
 * Description: Bundle of widgets 
 * Version: 1.2.1
 * Author: SingleStroke
 * Author URI: http://singlestroke.io/
 */

define( 'PRIMROSE_SOW_VERSION', '1.2.0' );

define( 'PRIMROSE_SOW_CSS', plugin_dir_url( __FILE__ ) . 'css' );
define( 'PRIMROSE_SOW_IMG', plugin_dir_url( __FILE__ ) . 'img' );
define( 'PRIMROSE_SOW_JS', plugin_dir_url( __FILE__ ) . 'js' );
define( 'PRIMROSE_SOW_PREBUILTS', plugin_dir_url( __FILE__ ) . 'prebuilts' );
define( 'PRIMROSE_SOW_WIDGETS', plugin_dir_url( __FILE__ ) . 'widgets' );

define( 'PRIMROSE_SOW_CSS_DIR', plugin_dir_path( __FILE__ ) . 'css' );
define( 'PRIMROSE_SOW_IMG_DIR', plugin_dir_path( __FILE__ ) . 'img' );
define( 'PRIMROSE_SOW_JS_DIR', plugin_dir_path( __FILE__ ) . 'js' );
define( 'PRIMROSE_SOW_PREBUILTS_DIR', plugin_dir_path( __FILE__ ) . 'prebuilts' );
define( 'PRIMROSE_SOW_WIDGETS_DIR', plugin_dir_path( __FILE__ ) . 'widgets' );

/**
 * Load plugin textdomain.
 */
function primrose_siteorigin_widgets_load_textdomain() {
	load_plugin_textdomain( 'primrose-siteorigin-widgets', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' ); 
}
add_action( 'plugins_loaded', 'primrose_siteorigin_widgets_load_textdomain' );

/**
 * Enqueue scripts and styles.
 */
function primrose_siteorigin_widgets_scripts() {
	wp_register_script( 'stellar', PRIMROSE_SOW_JS . '/jquery.stellar.min.js', array( 'jquery' ), '0.6.2', true );
	wp_register_script( 'inview', PRIMROSE_SOW_JS . '/jquery.inview.min.js', array( 'jquery' ), '1.0.0', true );
	wp_register_script( 'imagesloaded', PRIMROSE_SOW_JS . '/imagesloaded.pkgd.min.js', array( 'jquery' ), '4.1.0', true );
	wp_enqueue_script( 'primrose-siteorigin-widgets', PRIMROSE_SOW_JS . '/main.js', array(
		'jquery',
		'inview',
		'imagesloaded',
	), PRIMROSE_SOW_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'primrose_siteorigin_widgets_scripts' );

/**
 * Register custom widgets.
 */
global $pagenow;
if ( ! is_admin() || 'widgets.php' != $pagenow ) {
	/**
	 * Add custom widgets folder.
	 */
	function primrose_siteorigin_widgets_widget_folders( $folders ) {
		$folders[] = PRIMROSE_SOW_WIDGETS_DIR . '/';

		return $folders;
	}
	add_filter( 'siteorigin_widgets_widget_folders', 'primrose_siteorigin_widgets_widget_folders' );

	/**
	 * Force activate the custom widgets.
	 */
	function primrose_siteorigin_widgets_active_widgets( $widgets ) {
		$dirs = glob( PRIMROSE_SOW_WIDGETS_DIR . '/*', GLOB_ONLYDIR );

		foreach ( $dirs as $dir ) {
			$dir = str_replace( PRIMROSE_SOW_WIDGETS_DIR . '/', '', $dir );
			$widgets[ $dir ] = true;
		}

		return $widgets;
	}
	add_filter( 'siteorigin_widgets_active_widgets', 'primrose_siteorigin_widgets_active_widgets' );
}

/**
 * Add dialog tabs.
 */
function primrose_siteorigin_panels_widget_dialog_tabs( $tabs ) {
	$tabs['primrose'] = array(
		'title' => esc_html__( 'Primrose Widgets', 'primrose' ) . ' <span class="dashicons dashicons-warning"></span>',
		'filter' => array(
			'groups' => array( 'primrose' ),
		),
	);

	return $tabs;
}
add_filter( 'siteorigin_panels_widget_dialog_tabs', 'primrose_siteorigin_panels_widget_dialog_tabs' );

/**
 * Add custom row / widget styles options.
 */
function primrose_siteorigin_panels_widget_style_fields( $fields ) {
	// Anchor ID.
	$fields['anchor'] = array(
		'name' => esc_html__( 'Anchor ID', 'primrose' ),
		'type' => 'text',
		'group' => 'attributes',
		'description' => esc_html__( 'Used in Smooth Scrolling navigation. Please enter alphanumeric, dash ( _ ), and hyphen ( - ) only.', 'primrose' ),
		'priority' => 11,
	);

	// Animation.
	$fields['animation'] = array(
		'name' => esc_html__( 'Animation', 'primrose' ),
		'type' => 'select',
		'group' => 'attributes',
		'description' => esc_html__( 'Widget\'s enter (inview) animation.', 'primrose' ),
		'options' => array(
			false => esc_html__( 'Disabled', 'primrose' ),
			'fade-in' => esc_html__( 'Fade In', 'primrose' ),
		),
		'priority' => 12,
	);
	
	return $fields;
}
add_filter( 'siteorigin_panels_widget_style_fields', 'primrose_siteorigin_panels_widget_style_fields', 20 );

/**
 * Add custom row styles options.
 */
function primrose_siteorigin_panels_row_style_fields( $fields ) {
	// Anchor ID.
	$fields['anchor'] = array(
		'name' => esc_html__( 'Anchor ID', 'primrose' ),
		'type' => 'text',
		'group' => 'attributes',
		'description' => esc_html__( 'Used in Smooth Scrolling navigation. Please enter alphanumeric, dash ( _ ), and hyphen ( - ) only.', 'primrose' ),
		'priority' => 11,
	);

	// Parallax background.
	$fields['background_display']['options']['primrose-parallax'] = esc_html__( 'Primrose Parallax', 'primrose' );
	
	return $fields;
}
add_filter( 'siteorigin_panels_row_style_fields', 'primrose_siteorigin_panels_row_style_fields', 20 );

/**
 * Add custom row / widget attributes.
 */
function primrose_siteorigin_panels_widget_style_attributes( $attributes, $args ) {
	if ( ! empty( $args['anchor'] ) ) {
		$attributes['id'] = esc_attr( $args['anchor'] );
		$attributes['data-anchor'] = esc_attr( $args['anchor'] );
	}

	if ( ! empty( $args['animation'] ) ) {
		$attributes['class'][] = 'primrose-sow-animation-' . esc_attr( $args['animation'] );
	}

	if ( ! empty( $args['background_display'] ) && ! empty( $args['background_image_attachment'] ) ) {
		$img = wp_get_attachment_image_src( $args['background_image_attachment'], 'full' );

		if( ! empty( $img ) && 'primrose-parallax' == $args['background_display'] ) {
			// remove background-image inline style
			$attributes['style'] = preg_replace( '/background-image: url\((.*?)\);/', '', $attributes['style'] );

			// construct data for generating parallax background on javascript
			$attributes['data-primrose-parallax'] = '{"src":"' . $img[0] . '","width":"' . $img[1] . '","height":"' . $img[2] . '"}';

			wp_enqueue_script( 'stellar' );
		}
	}

	return $attributes;
}
add_filter( 'siteorigin_panels_widget_style_attributes', 'primrose_siteorigin_panels_widget_style_attributes', 20, 2 );
add_filter( 'siteorigin_panels_row_style_attributes', 'primrose_siteorigin_panels_widget_style_attributes', 20, 2 );

/**
 * Add custom widget attributes.
 */
function primrose_siteorigin_widgets_icons_families( $icon_families ) {
	$icon_families['simplelineicons'] = array(
		'name' => __( 'Simple Line Icons', 'primrose' ),
		'style_uri' => PRIMROSE_SOW_CSS . '/sow-simple-line-icons.css',
		'icons' => array(
			'user' => '&#xe005;',
			'people' => '&#xe001;',
			'user-female' => '&#xe000;',
			'user-follow' => '&#xe002;',
			'user-following' => '&#xe003;',
			'user-unfollow' => '&#xe004;',
			'login' => '&#xe066;',
			'logout' => '&#xe065;',
			'emotsmile' => '&#xe021;',
			'phone' => '&#xe600;',
			'call-end' => '&#xe048;',
			'call-in' => '&#xe047;',
			'call-out' => '&#xe046;',
			'map' => '&#xe033;',
			'location-pin' => '&#xe096;',
			'direction' => '&#xe042;',
			'directions' => '&#xe041;',
			'compass' => '&#xe045;',
			'layers' => '&#xe034;',
			'menu' => '&#xe601;',
			'list' => '&#xe067;',
			'options-vertical' => '&#xe602;',
			'options' => '&#xe603;',
			'arrow-down' => '&#xe604;',
			'arrow-left' => '&#xe605;',
			'arrow-right' => '&#xe606;',
			'arrow-up' => '&#xe607;',
			'arrow-up-circle' => '&#xe078;',
			'arrow-left-circle' => '&#xe07a;',
			'arrow-right-circle' => '&#xe079;',
			'arrow-down-circle' => '&#xe07b;',
			'check' => '&#xe080;',
			'clock' => '&#xe081;',
			'plus' => '&#xe095;',
			'close' => '&#xe082;',
			'trophy' => '&#xe006;',
			'screen-smartphone' => '&#xe010;',
			'screen-desktop' => '&#xe011;',
			'plane' => '&#xe012;',
			'notebook' => '&#xe013;',
			'mustache' => '&#xe014;',
			'mouse' => '&#xe015;',
			'magnet' => '&#xe016;',
			'energy' => '&#xe020;',
			'disc' => '&#xe022;',
			'cursor' => '&#xe06e;',
			'cursor-move' => '&#xe023;',
			'crop' => '&#xe024;',
			'chemistry' => '&#xe026;',
			'speedometer' => '&#xe007;',
			'shield' => '&#xe00e;',
			'screen-tablet' => '&#xe00f;',
			'magic-wand' => '&#xe017;',
			'hourglass' => '&#xe018;',
			'graduation' => '&#xe019;',
			'ghost' => '&#xe01a;',
			'game-controller' => '&#xe01b;',
			'fire' => '&#xe01c;',
			'eyeglass' => '&#xe01d;',
			'envelope-open' => '&#xe01e;',
			'envelope-letter' => '&#xe01f;',
			'bell' => '&#xe027;',
			'badge' => '&#xe028;',
			'anchor' => '&#xe029;',
			'wallet' => '&#xe02a;',
			'vector' => '&#xe02b;',
			'speech' => '&#xe02c;',
			'puzzle' => '&#xe02d;',
			'printer' => '&#xe02e;',
			'present' => '&#xe02f;',
			'playlist' => '&#xe030;',
			'pin' => '&#xe031;',
			'picture' => '&#xe032;',
			'handbag' => '&#xe035;',
			'globe-alt' => '&#xe036;',
			'globe' => '&#xe037;',
			'folder-alt' => '&#xe039;',
			'folder' => '&#xe089;',
			'film' => '&#xe03a;',
			'feed' => '&#xe03b;',
			'drop' => '&#xe03e;',
			'drawar' => '&#xe03f;',
			'docs' => '&#xe040;',
			'doc' => '&#xe085;',
			'diamond' => '&#xe043;',
			'cup' => '&#xe044;',
			'calculator' => '&#xe049;',
			'bubbles' => '&#xe04a;',
			'briefcase' => '&#xe04b;',
			'book-open' => '&#xe04c;',
			'basket-loaded' => '&#xe04d;',
			'basket' => '&#xe04e;',
			'bag' => '&#xe04f;',
			'action-undo' => '&#xe050;',
			'action-redo' => '&#xe051;',
			'wrench' => '&#xe052;',
			'umbrella' => '&#xe053;',
			'trash' => '&#xe054;',
			'tag' => '&#xe055;',
			'support' => '&#xe056;',
			'frame' => '&#xe038;',
			'size-fullscreen' => '&#xe057;',
			'size-actual' => '&#xe058;',
			'shuffle' => '&#xe059;',
			'share-alt' => '&#xe05a;',
			'share' => '&#xe05b;',
			'rocket' => '&#xe05c;',
			'question' => '&#xe05d;',
			'pie-chart' => '&#xe05e;',
			'pencil' => '&#xe05f;',
			'note' => '&#xe060;',
			'loop' => '&#xe064;',
			'home' => '&#xe069;',
			'grid' => '&#xe06a;',
			'graph' => '&#xe06b;',
			'microphone' => '&#xe063;',
			'music-tone-alt' => '&#xe061;',
			'music-tone' => '&#xe062;',
			'earphones-alt' => '&#xe03c;',
			'earphones' => '&#xe03d;',
			'equalizer' => '&#xe06c;',
			'like' => '&#xe068;',
			'dislike' => '&#xe06d;',
			'control-start' => '&#xe06f;',
			'control-rewind' => '&#xe070;',
			'control-play' => '&#xe071;',
			'control-pause' => '&#xe072;',
			'control-forward' => '&#xe073;',
			'control-end' => '&#xe074;',
			'volume-1' => '&#xe09f;',
			'volume-2' => '&#xe0a0;',
			'volume-off' => '&#xe0a1;',
			'calendar' => '&#xe075;',
			'bulb' => '&#xe076;',
			'chart' => '&#xe077;',
			'ban' => '&#xe07c;',
			'bubble' => '&#xe07d;',
			'camrecorder' => '&#xe07e;',
			'camera' => '&#xe07f;',
			'cloud-download' => '&#xe083;',
			'cloud-upload' => '&#xe084;',
			'envelope' => '&#xe086;',
			'eye' => '&#xe087;',
			'flag' => '&#xe088;',
			'heart' => '&#xe08a;',
			'info' => '&#xe08b;',
			'key' => '&#xe08c;',
			'link' => '&#xe08d;',
			'lock' => '&#xe08e;',
			'lock-open' => '&#xe08f;',
			'magnifier' => '&#xe090;',
			'magnifier-add' => '&#xe091;',
			'magnifier-remove' => '&#xe092;',
			'paper-clip' => '&#xe093;',
			'paper-plane' => '&#xe094;',
			'power' => '&#xe097;',
			'refresh' => '&#xe098;',
			'reload' => '&#xe099;',
			'settings' => '&#xe09a;',
			'star' => '&#xe09b;',
			'symble-female' => '&#xe09c;',
			'symbol-male' => '&#xe09d;',
			'target' => '&#xe09e;',
			'credit-card' => '&#xe025;',
			'paypal' => '&#xe608;',
			'social-tumblr' => '&#xe00a;',
			'social-twitter' => '&#xe009;',
			'social-facebook' => '&#xe00b;',
			'social-instagram' => '&#xe609;',
			'social-linkedin' => '&#xe60a;',
			'social-pinterest' => '&#xe60b;',
			'social-github' => '&#xe60c;',
			'social-gplus' => '&#xe60d;',
			'social-reddit' => '&#xe60e;',
			'social-skype' => '&#xe60f;',
			'social-dribbble' => '&#xe00d;',
			'social-behance' => '&#xe610;',
			'social-foursqare' => '&#xe611;',
			'social-soundcloud' => '&#xe612;',
			'social-spotify' => '&#xe613;',
			'social-stumbleupon' => '&#xe614;',
			'social-youtube' => '&#xe008;',
			'social-dropbox' => '&#xe00c;',
		),
	);

	return $icon_families;
}
add_filter( 'siteorigin_widgets_icon_families', 'primrose_siteorigin_widgets_icons_families' );

/**
 * Add prebuilt layouts.
 */
function primrose_siteorigin_panels_prebuilt_layouts( $layouts ) {
	$layouts['home-image-slider'] = include( PRIMROSE_SOW_PREBUILTS_DIR . '/home-image-slider.php' );
	$layouts['home-background-video'] = include( PRIMROSE_SOW_PREBUILTS_DIR . '/home-background-video.php' );
	$layouts['home-classic'] = include( PRIMROSE_SOW_PREBUILTS_DIR . '/home-classic.php' );
	$layouts['home-grid'] = include( PRIMROSE_SOW_PREBUILTS_DIR . '/home-grid.php' );
	$layouts['custom-product-page'] = include( PRIMROSE_SOW_PREBUILTS_DIR . '/custom-product-page.php' );
	$layouts['about-us'] = include( PRIMROSE_SOW_PREBUILTS_DIR . '/about-us.php' );
	$layouts['contact-us'] = include( PRIMROSE_SOW_PREBUILTS_DIR . '/contact-us.php' );
	$layouts['faq'] = include( PRIMROSE_SOW_PREBUILTS_DIR . '/faq.php' );
	
	return $layouts;
}
add_filter( 'siteorigin_panels_prebuilt_layouts', 'primrose_siteorigin_panels_prebuilt_layouts' );