<?php
/**
 * Primrose functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Primrose
 */

/**
 * Define constant variables.
 */
define( 'PRIMROSE_CSS_DIR', get_template_directory() . '/css' );
define( 'PRIMROSE_JS_DIR', get_template_directory() . '/js' );
define( 'PRIMROSE_INCLUDES_DIR', get_template_directory() . '/inc' );
define( 'PRIMROSE_IMAGES_DIR', get_template_directory() . '/images' );
define( 'PRIMROSE_WIDGETS_DIR', get_template_directory() . '/widgets' );
define( 'PRIMROSE_PAGE_TEMPLATES_DIR', get_template_directory() . '/page-templates' );
define( 'PRIMROSE_PLUGINS_DIR', get_template_directory() . '/plugins' );
define( 'PRIMROSE_SITEORIGIN_DIR', get_template_directory() . '/siteorigin' );
define( 'PRIMROSE_DEMO_DIR', get_template_directory() . '/demo' );

define( 'PRIMROSE_CSS', get_template_directory_uri() . '/css' );
define( 'PRIMROSE_JS', get_template_directory_uri() . '/js' );
define( 'PRIMROSE_INCLUDES', get_template_directory_uri() . '/inc' );
define( 'PRIMROSE_IMAGES', get_template_directory_uri() . '/images' );
define( 'PRIMROSE_WIDGETS', get_template_directory_uri() . '/widgets' );
define( 'PRIMROSE_PAGE_TEMPLATES', get_template_directory_uri() . '/page-templates' );
define( 'PRIMROSE_PLUGINS', get_template_directory_uri() . '/plugins' );
define( 'PRIMROSE_SITEORIGIN', get_template_directory_uri() . '/siteorigin' );
define( 'PRIMROSE_DEMO', get_template_directory_uri() . '/demo' );

define( 'PRIMROSE_CUSTOMIZER_OPTION_KEY', 'singlestroke_primrose_customizer' );
define( 'PRIMROSE_VERSION_OPTION_KEY', 'singlestroke_primrose_version' );

/**
 * Define theme's global data.
 */
global $primrose_data;

// Theme data.
$primrose_data['theme_data'] = is_child_theme() ? wp_get_theme( 'primrose' ) : wp_get_theme();

// Social media links.
$primrose_data['social_media_links'] = apply_filters( 'primrose_social_media', array(
	'behance' => esc_html__( 'Behance', 'primrose' ),
	'bloglovin' => esc_html__( 'Bloglovin&#39;', 'primrose' ),
	'dribbble' => esc_html__( 'Dribbble', 'primrose' ),
	'facebook' => esc_html__( 'Facebook', 'primrose' ),
	'google-plus' => esc_html__( 'Google Plus', 'primrose' ),
	'instagram' => esc_html__( 'Instagram', 'primrose' ),
	'linkedin' => esc_html__( 'LinkedIn','primrose' ),
	'pinterest' => esc_html__( 'Pinterest', 'primrose' ),
	'rss' => esc_html__( 'RSS', 'primrose' ),
	'snapchat-ghost' => esc_html__( 'Snapchat', 'primrose' ),
	'tumblr' => esc_html__( 'Tumblr', 'primrose' ),
	'twitter' => esc_html__( 'Twitter', 'primrose' ),
	'vimeo' => esc_html__( 'Vimeo', 'primrose' ),
	'youtube' => esc_html__( 'Youtube', 'primrose' ),
) );

// Typography types.
$primrose_data['typography_types'] = apply_filters( 'primrose_typography_types', array(
	'body' => esc_html__( 'Body', 'primrose' ),
	'title' => esc_html__( 'Title', 'primrose' ),
	'headings' => esc_html__( 'Content Headings (h1 - h6)', 'primrose' ),
	'menu' => esc_html__( 'Menu', 'primrose' ),
) );

// Author links.
$primrose_data['user_links'] = apply_filters( 'primrose_user_links', array(
	'behance' => esc_html__( 'Behance', 'primrose' ),
	'bloglovin' => esc_html__( 'Bloglovin&#39;', 'primrose' ),
	'dribbble' => esc_html__( 'Dribbble', 'primrose' ),
	'facebook' => esc_html__( 'Facebook', 'primrose' ),
	'google-plus' => esc_html__( 'Google Plus', 'primrose' ),
	'instagram' => esc_html__( 'Instagram', 'primrose' ),
	'linkedin' => esc_html__( 'LinkedIn','primrose' ),
	'pinterest' => esc_html__( 'Pinterest', 'primrose' ),
	'rss' => esc_html__( 'RSS', 'primrose' ),
	'snapchat-ghost' => esc_html__( 'Snapchat', 'primrose' ),
	'tumblr' => esc_html__( 'Tumblr', 'primrose' ),
	'twitter' => esc_html__( 'Twitter', 'primrose' ),
	'vimeo' => esc_html__( 'Vimeo', 'primrose' ),
	'youtube' => esc_html__( 'Youtube', 'primrose' ),
) );

/**
 * Include additional modules.
 */
// SingleStroke wrapper class & functions for Kirki.
require_once( PRIMROSE_INCLUDES_DIR . '/singlestroke-kirki.php' );

// SingleStroke branding.
require_once( PRIMROSE_INCLUDES_DIR . '/singlestroke-branding.php' );

// Extra functions.
require_once( PRIMROSE_INCLUDES_DIR . '/extras.php' );

// Helper functions.
require_once( PRIMROSE_INCLUDES_DIR . '/helpers.php' );

// Template tags.
require_once( PRIMROSE_INCLUDES_DIR . '/template-tags.php' );

// Customizer options powered by Kirki.
require_once( PRIMROSE_INCLUDES_DIR . '/customizer.php' );

// Import demo data functions.
require_once( PRIMROSE_INCLUDES_DIR . '/import-demo-data.php' );

// Jetpack compatibility.
require_once( PRIMROSE_INCLUDES_DIR . '/jetpack.php' );

// Migrate to newer versions.
require_once( PRIMROSE_INCLUDES_DIR . '/migrate.php' );

/**
 * Include custom widgets.
 */
include_once( PRIMROSE_WIDGETS_DIR . '/singlestroke-widget-about-me.php' );
include_once( PRIMROSE_WIDGETS_DIR . '/singlestroke-widget-posts.php' );
include_once( PRIMROSE_WIDGETS_DIR . '/singlestroke-widget-social.php' );

/**
 * TGMPA.
 */
require_once( PRIMROSE_INCLUDES_DIR . '/class-tgm-plugin-activation.php' );
function primrose_tgmpa_register() {
	$plugins = array(
		array(
			'name'               => esc_html__( 'Kirki', 'primrose' ),
			'slug'               => 'kirki',
			'required'           => true,
			'description'        => esc_html__( 'Mandatory plugin used to configure the Customizer (Theme Options) settings.', 'primrose' ),
		),
		array(
			'name'               => esc_html__( 'Page Builder by SiteOrigin', 'primrose' ),
			'slug'               => 'siteorigin-panels',
			'required'           => true,
			'description'        => esc_html__( 'Mandatory plugin used for page builder features.', 'primrose' ),
		),
		array(
			'name'               => esc_html__( 'SiteOrigin Widgets Bundle', 'primrose' ),
			'slug'               => 'so-widgets-bundle',
			'required'           => true,
			'description'        => esc_html__( 'Mandatory plugin used for page builder features.', 'primrose' ),
		),
		array(
			'name'               => esc_html__( 'Primrose SiteOrigin Widgets', 'primrose' ),
			'slug'               => 'primrose-siteorigin-widgets',
			'required'           => true,
			'source'             => PRIMROSE_PLUGINS_DIR . '/primrose-siteorigin-widgets.zip',
			'version'            => '1.2.1',
			'description'        => esc_html__( 'Mandatory plugin used for page builder features.', 'primrose' ),
		),
		array(
			'name'               => esc_html__( 'SingleStroke: Post Formats', 'primrose' ),
			'slug'               => 'singlestroke-post-formats',
			'required'           => false,
			'source'             => PRIMROSE_PLUGINS_DIR . '/singlestroke-post-formats.zip',
			'version'            => '1.1.0',
			'description'        => esc_html__( 'Allow you to create audio, video, gallery post formats on your blog.', 'primrose' ),
		),
		array(
			'name'               => esc_html__( 'WooCommerce', 'primrose' ),
			'slug'               => 'woocommerce',
			'required'           => false,
			'description'        => esc_html__( 'ECommerce module to sell your products / services.', 'primrose' ),
		),
		array(
			'name'               => esc_html__( 'Contact Form 7', 'primrose' ),
			'slug'               => 'contact-form-7',
			'required'           => false,
			'description'        => esc_html__( 'Help you to create an easy and simple contact form.', 'primrose' ),
		),
		array(
			'name'               => esc_html__( 'Mailchimp for WordPress', 'primrose' ),
			'slug'               => 'mailchimp-for-wp',
			'required'           => false,
			'description'        => esc_html__( 'Used to put a Mailchimp subscribe form in your page.', 'primrose' ),
		),
		array(
			'name'               => esc_html__( 'WP Instagram Widget', 'primrose' ),
			'slug'               => 'wp-instagram-widget',
			'required'           => false,
			'description'        => esc_html__( 'Used to generate the footer Instagram feed in this theme.', 'primrose' ),
		),
		array(
			'name'               => esc_html__( 'One Click Demo Import', 'primrose' ),
			'slug'               => 'one-click-demo-import',
			'required'           => false,
			'description'        => esc_html__( 'Allow you to import all data from demo site just in ONE CLICK.', 'primrose' ),
		),
		array(
			'name'               => esc_html__( 'Envato Market', 'primrose' ),
			'slug'               => 'envato-market',
			'required'           => false,
			'source'             => 'http://envato.github.io/wp-envato-market/dist/envato-market.zip',
			'version'            => '1.0.0-RC2',
			'description'        => esc_html__( 'Enable notifications and automatic theme update for this theme.', 'primrose' ),
		),
	);

	$message = '<table class="widefat striped" style="width: auto; margin: 20px 0;"><tbody>';
	foreach ( $plugins as $plugin ) {
		$message .= '<tr><td><strong>' . $plugin['name'] . ':</strong></td><td>' . $plugin['description'] . '</td></tr>';
	}
	$message .= '</tbody></table>';

	$config = array(
		'id'           => 'primrose',
		'message'      => $message,
		'strings'      => array(
			'menu_title' => esc_html__( 'Required Plugins', 'primrose' ) . ' <span class="ss-dashboard-menu-icon dashicons dashicons-warning" style="margin: -0.15em 0;"></span>',
		),
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'primrose_tgmpa_register' );

/**
 * Theme setup.
 */
function primrose_setup() {
	// Translation.
	load_theme_textdomain( 'singlestroke', get_template_directory() . '/languages' );
	load_theme_textdomain( 'primrose', get_template_directory() . '/languages' );
	load_theme_textdomain( 'tgmpa', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Title tag.
	add_theme_support( 'title-tag' );

	// Post thumbnails.
	add_theme_support( 'post-thumbnails' );

	// Post formats.
	add_theme_support( 'post-formats', array(
		'audio',
		'video',
		'gallery',
	) );

	// Register menus.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'primrose' ),
		'topbar'  => esc_html__( 'Topbar Menu', 'primrose' ),
	) );

	// HTML5 tags support.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add image sizes.
	add_image_size( 'content', 1080 );
	add_image_size( 'grid', 480 );

	// WooCommerce
	add_theme_support( 'woocommerce' );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// add_theme_support( 'custom-header' );
	// add_theme_support( 'custom-background' );
	// add_theme_support( 'custom-logo', array(
	// 	'height'      => 240,
	// 	'width'       => 240,
	// 	'flex-height' => true,
	// ) );
}
add_action( 'after_setup_theme', 'primrose_setup' );

/**
 * Define content width.
 */
function primrose_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'primrose_content_width', 1080 );
}
add_action( 'after_setup_theme', 'primrose_content_width', 0 );

/**
 * Register widgets area.
 */
function primrose_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'primrose' ),
		'id'            => 'sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title typography-menu">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Shop', 'primrose' ),
		'id'            => 'sidebar-shop',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title typography-menu">',
		'after_title'   => '</h2>',
	) );

	for ( $i = 1; $i <= count( primrose_get_theme_mod( 'footer_widgets_area_columns' ) ); $i++ ) {
		register_sidebar( array(
			'name'          => sprintf( esc_html__( 'Footer Widgets %s', 'primrose' ), $i ),
			'id'            => 'footer-widgets-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h5 class="widget-title typography-menu">',
			'after_title'   => '</h5>',
		) );
	}
}
add_action( 'widgets_init', 'primrose_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function primrose_scripts() {
	global $primrose_data;

	// Google Fonts
	$google_fonts_link = primrose_generate_google_fonts_url();
	if ( ! empty( $google_fonts_link ) ) {
		wp_enqueue_style( 'google-fonts', $google_fonts_link, array(), $primrose_data['theme_data']->get( 'Version' ) );
	}

	// CSS
	wp_register_style( 'simple-line-icons', PRIMROSE_CSS . '/simple-line-icons.min.css', array(), '2.3.2' );
	wp_register_style( 'font-awesome', PRIMROSE_CSS . '/font-awesome.min.css', array(), '4.6.3' );
	wp_register_style( 'slick', PRIMROSE_CSS . '/slick.css', array(), '1.6.0' );
	wp_register_style( 'lightgallery', PRIMROSE_CSS . '/lightgallery.min.css', array(), '1.2.19' );
	wp_enqueue_style( 'primrose', is_child_theme() ? get_template_directory_uri() . '/style.css' : get_stylesheet_uri(), array(
		'google-fonts',
		'simple-line-icons',
		'font-awesome',
		'slick',
	), $primrose_data['theme_data']->get( 'Version' ) );

	ob_start(); include( PRIMROSE_CSS_DIR . '/custom.php' ); $style_custom = ob_get_clean();
	wp_add_inline_style( 'primrose', $style_custom );
	wp_add_inline_style( 'primrose', html_entity_decode( primrose_get_theme_mod( 'custom_css' ) ) );

	// JS
	wp_register_script( 'slick', PRIMROSE_JS . '/slick.min.js', array( 'jquery' ), '1.6.0', true );
	wp_register_script( 'lightgallery', PRIMROSE_JS . '/lightgallery.min.js', array( 'jquery' ), '1.2.19', true );
	wp_enqueue_script( 'primrose', PRIMROSE_JS . '/main.js', array(
		'jquery',
		'slick',
	), $primrose_data['theme_data']->get( 'Version' ), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply', true );
	}
}
add_action( 'wp_enqueue_scripts', 'primrose_scripts' );

/**
 * Editor scripts and styles.
 */
function primrose_editor_style() {
	global $primrose_data;

	// Google Fonts
	$google_fonts_link = primrose_generate_google_fonts_url();
	if ( ! empty( $google_fonts_link ) ) {
		add_editor_style( str_replace( ',', '%2C', $google_fonts_link ) );
	}

	// CSS
	$args = array();
	foreach ( $primrose_data['typography_types'] as $type => $label ) {
		$args[ 'typography_' . $type . '_font_family' ] = urlencode( primrose_format_font_family_css( primrose_get_theme_mod( 'typography_' . $type . '_font_family' ) ) );
	}
	$args[ 'color_accent' ] = urlencode( primrose_get_theme_mod( 'color_accent' ) );
	add_editor_style( add_query_arg( $args, PRIMROSE_CSS . '/editor.php' ) );
}
add_action( 'admin_enqueue_scripts', 'primrose_editor_style' );

/**
 * User profile links.
 */
function primrose_user_contactmethods( $contactmethods ) {
	global $primrose_data;

	foreach ( $primrose_data['user_links'] as $key => $value ) {
		$contactmethods[ $key ] = $value . esc_html__( ' URL', 'primrose' );
	}

	return $contactmethods;
}
add_filter( 'user_contactmethods', 'primrose_user_contactmethods' );

/**
 * Header search mode.
 */
function primrose_header_get_search_form( $html ) {
	if ( 'products' == primrose_get_theme_mod( 'header_search_mode' ) ) {
		$html = str_replace( '</form>', '<input type="hidden" name="post_type" value="product"></form>', $html );
	} elseif ( 'posts-pages' == primrose_get_theme_mod( 'header_search_mode' ) ) {
		$html = str_replace( '</form>', '<input type="hidden" name="post_type[]" value="post"><input type="hidden" name="post_type[]" value="page"></form>', $html );
	}
	return $html;
}

/**
 * Topbar search mode.
 */
function primrose_topbar_get_search_form( $html ) {
	if ( 'products' == primrose_get_theme_mod( 'topbar_search_mode' ) ) {
		$html = str_replace( '</form>', '<input type="hidden" name="post_type" value="product"></form>', $html );
	} elseif ( 'posts-pages' == primrose_get_theme_mod( 'topbar_search_mode' ) ) {
		$html = str_replace( '</form>', '<input type="hidden" name="post_type[]" value="post"><input type="hidden" name="post_type[]" value="page"></form>', $html );
	}
	return $html;
}

/**
 * Read more text.
 */
function primrose_read_more_link() {
	return '<span class="read-more"><a class="more-link" href="' . get_permalink() . '">' . primrose_get_theme_mod( 'blog_index_read_more_text' ) . '</a></span>';
}
add_filter( 'the_content_more_link', 'primrose_read_more_link' );

/**
 * WP Instagram Widget template path
 */
function primrose_wpiw_template_part( $path ) {
	return 'template-parts/wp-instagram-widget.php';
}
add_filter( 'wpiw_template_part', 'primrose_wpiw_template_part' );

/**
 * Includes SiteOrigin Page Builder compatibility functions
 */
if ( class_exists( 'WooCommerce' ) ) {
	require_once( PRIMROSE_INCLUDES_DIR . '/siteorigin.php' );
}

/**
 * Includes WooCommerce compatibility functions
 */
if ( class_exists( 'WooCommerce' ) ) {
	require_once( PRIMROSE_INCLUDES_DIR . '/woocommerce.php' );
}

/**
 * Add custom scripts to customize editor
 */
function primrose_editor_scripts() {
	?>
	<script type="text/javascript">
	(function( $ ) {
		$( window ).on( 'load', function() {
			var $ed = $( '#content_ifr' ).contents().find( 'body' );

			var resizeEditorBody = function() {
				var pt = $( '#page_template' ).val(),
				    w = 700;

				switch ( pt ) {
					case 'page-templates/blank.php':
					case 'page-templates/full-width.php':
						w = 1080;
						break;

					case 'page-templates/narrow-width.php':
						w = 730;
						break;
				}

				$ed.css( 'max-width', w + 'px' );
			}

			$( '#page_template' ).on( 'change', resizeEditorBody );

			resizeEditorBody();
		});
	})( jQuery );
	</script>
	<?php
}
add_action( 'admin_print_scripts', 'primrose_editor_scripts', 99 );