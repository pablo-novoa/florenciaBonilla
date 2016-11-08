<?php
/**
 * Primrose Theme Customizer.
 *
 * @package Primrose
 */

global $primrose_data;

/**
 * Register Customizer config.
 */
SingleStroke_Kirki::add_config( 'primrose', array(
	'option_type' => 'option',
	'option_name' => PRIMROSE_CUSTOMIZER_OPTION_KEY,
) );

/**
 * Register Customizer sections.
 */
$i = 160;
SingleStroke_Kirki::add_section( 'styles', array(
	'title'    => esc_html__( 'Styles', 'primrose' ),
	'priority' => ++$i,
) );
SingleStroke_Kirki::add_section( 'topbar', array(
	'title'    => esc_html__( 'Topbar', 'primrose' ),
	'priority' => ++$i,
) );
SingleStroke_Kirki::add_section( 'header', array(
	'title'    => esc_html__( 'Header', 'primrose' ),
	'priority' => ++$i,
) );
SingleStroke_Kirki::add_section( 'footer', array(
	'title'    => esc_html__( 'Footer', 'primrose' ),
	'priority' => ++$i,
) );
SingleStroke_Kirki::add_section( 'blog', array(
	'title'    => esc_html__( 'Blog', 'primrose' ),
	'priority' => ++$i,
) );
SingleStroke_Kirki::add_section( 'shop', array(
	'title'    => esc_html__( 'Shop (WooCommerce)', 'primrose' ),
	'priority' => ++$i,
) );
SingleStroke_Kirki::add_section( 'social_media', array(
	'title'    => esc_html__( 'Social media settings', 'primrose' ),
	'priority' => ++$i,
) );
SingleStroke_Kirki::add_section( 'custom_css', array(
	'title'    => esc_html__( 'Custom CSS', 'primrose' ),
	'priority' => ++$i,
) );

/**
 * Register Customizer options.
 */
$p = 0;
$hr = 0;

// Styles.
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'color_accent',
	'section'     => 'styles',
	'type'        => 'color',
	'label'       => esc_html__( 'Color accent', 'primrose' ),
	'default'     => '#d2bea0',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => 'a, .woocommerce .star-rating',
			'property' => 'color',
		),
		array(
			'element' => '.header-cart-count, .woocommerce .widget_price_filter .ui-slider .ui-slider-range',
			'property' => 'background-color',
		),
		array(
			'element' => '.woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .lg-outer .lg-thumb-item.active, .lg-outer .lg-thumb-item:hover',
			'property' => 'border-color',
		),
	),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'hr_' . $hr++,
	'section'     => 'styles',
	'type'        => 'custom',
	'default'     => '<hr style="margin: 20px 0;">',
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'color_button_bg',
	'section'     => 'styles',
	'type'        => 'color',
	'label'       => esc_html__( 'Button BG color', 'primrose' ),
	'default'     => '#d2bea0',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '.button, button, input[type="button"], input[type="reset"], input[type="submit"],
				.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt:disabled[disabled], .woocommerce #respond input#submit.alt:disabled[disabled]:hover, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt:disabled[disabled], .woocommerce a.button.alt:disabled[disabled]:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt:disabled[disabled], .woocommerce button.button.alt:disabled[disabled]:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt:disabled[disabled], .woocommerce input.button.alt:disabled[disabled]:hover, .woocommerce span.onsale,
				.woocommerce #respond input#submit.disabled, .woocommerce #respond input#submit:disabled, .woocommerce #respond input#submit:disabled[disabled], .woocommerce a.button.disabled, .woocommerce a.button:disabled, .woocommerce a.button:disabled[disabled], .woocommerce button.button.disabled, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce input.button.disabled, .woocommerce input.button:disabled, .woocommerce input.button:disabled[disabled]',
			'property' => 'background-color',
		),
	),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'color_button_border',
	'section'     => 'styles',
	'type'        => 'color',
	'label'       => esc_html__( 'Button border color', 'primrose' ),
	'default'     => '#d2bea0',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '.button, button, input[type="button"], input[type="reset"], input[type="submit"],
				.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt:disabled[disabled], .woocommerce #respond input#submit.alt:disabled[disabled]:hover, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt:disabled[disabled], .woocommerce a.button.alt:disabled[disabled]:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt:disabled[disabled], .woocommerce button.button.alt:disabled[disabled]:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt:disabled[disabled], .woocommerce input.button.alt:disabled[disabled]:hover, .woocommerce span.onsale,
				.woocommerce #respond input#submit.disabled, .woocommerce #respond input#submit:disabled, .woocommerce #respond input#submit:disabled[disabled], .woocommerce a.button.disabled, .woocommerce a.button:disabled, .woocommerce a.button:disabled[disabled], .woocommerce button.button.disabled, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce input.button.disabled, .woocommerce input.button:disabled, .woocommerce input.button:disabled[disabled]',
			'property' => 'border-color',
		),
	),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'color_button_text',
	'section'     => 'styles',
	'type'        => 'color',
	'label'       => esc_html__( 'Button text color', 'primrose' ),
	'default'     => '#ffffff',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '.button, button, input[type="button"], input[type="reset"], input[type="submit"],
				.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt:disabled[disabled], .woocommerce #respond input#submit.alt:disabled[disabled]:hover, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt:disabled[disabled], .woocommerce a.button.alt:disabled[disabled]:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt:disabled[disabled], .woocommerce button.button.alt:disabled[disabled]:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt:disabled[disabled], .woocommerce input.button.alt:disabled[disabled]:hover, .woocommerce span.onsale,
				.woocommerce #respond input#submit.disabled, .woocommerce #respond input#submit:disabled, .woocommerce #respond input#submit:disabled[disabled], .woocommerce a.button.disabled, .woocommerce a.button:disabled, .woocommerce a.button:disabled[disabled], .woocommerce button.button.disabled, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce input.button.disabled, .woocommerce input.button:disabled, .woocommerce input.button:disabled[disabled]',
			'property' => 'color',
		),
	),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'color_button_bg_hover',
	'section'     => 'styles',
	'type'        => 'color',
	'label'       => esc_html__( 'Button hover BG color', 'primrose' ),
	'default'     => '#ccb593',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '.button:hover, button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, .button:focus, button:focus, input[type="button"]:focus, input[type="reset"]:focus, input[type="submit"]:focus,
				.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit:focus, .woocommerce a.button:focus, .woocommerce button.button:focus, .woocommerce input.button:focus, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit.alt:focus, .woocommerce a.button.alt:focus, .woocommerce button.button.alt:focus, .woocommerce input.button.alt:focus,
				.woocommerce #respond input#submit.disabled:hover, .woocommerce #respond input#submit:disabled:hover, .woocommerce #respond input#submit:disabled[disabled]:hover, .woocommerce a.button.disabled:hover, .woocommerce a.button:disabled:hover, .woocommerce a.button:disabled[disabled]:hover, .woocommerce button.button.disabled:hover, .woocommerce button.button:disabled:hover, .woocommerce button.button:disabled[disabled]:hover, .woocommerce input.button.disabled:hover, .woocommerce input.button:disabled:hover, .woocommerce input.button:disabled[disabled]:hover',
			'property' => 'background-color',
		),
	),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'color_button_border_hover',
	'section'     => 'styles',
	'type'        => 'color',
	'label'       => esc_html__( 'Button hover border color', 'primrose' ),
	'default'     => '#ccb593',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '.button:hover, button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, .button:focus, button:focus, input[type="button"]:focus, input[type="reset"]:focus, input[type="submit"]:focus,
				.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit:focus, .woocommerce a.button:focus, .woocommerce button.button:focus, .woocommerce input.button:focus, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit.alt:focus, .woocommerce a.button.alt:focus, .woocommerce button.button.alt:focus, .woocommerce input.button.alt:focus,
				.woocommerce #respond input#submit.disabled:hover, .woocommerce #respond input#submit:disabled:hover, .woocommerce #respond input#submit:disabled[disabled]:hover, .woocommerce a.button.disabled:hover, .woocommerce a.button:disabled:hover, .woocommerce a.button:disabled[disabled]:hover, .woocommerce button.button.disabled:hover, .woocommerce button.button:disabled:hover, .woocommerce button.button:disabled[disabled]:hover, .woocommerce input.button.disabled:hover, .woocommerce input.button:disabled:hover, .woocommerce input.button:disabled[disabled]:hover',
			'property' => 'border-color',
		),
	),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'color_button_text_hover',
	'section'     => 'styles',
	'type'        => 'color',
	'label'       => esc_html__( 'Button hover text color', 'primrose' ),
	'default'     => '#ffffff',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '.button:hover, button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, .button:focus, button:focus, input[type="button"]:focus, input[type="reset"]:focus, input[type="submit"]:focus,
				.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit:focus, .woocommerce a.button:focus, .woocommerce button.button:focus, .woocommerce input.button:focus, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit.alt:focus, .woocommerce a.button.alt:focus, .woocommerce button.button.alt:focus, .woocommerce input.button.alt:focus,
				.woocommerce #respond input#submit.disabled:hover, .woocommerce #respond input#submit:disabled:hover, .woocommerce #respond input#submit:disabled[disabled]:hover, .woocommerce a.button.disabled:hover, .woocommerce a.button:disabled:hover, .woocommerce a.button:disabled[disabled]:hover, .woocommerce button.button.disabled:hover, .woocommerce button.button:disabled:hover, .woocommerce button.button:disabled[disabled]:hover, .woocommerce input.button.disabled:hover, .woocommerce input.button:disabled:hover, .woocommerce input.button:disabled[disabled]:hover',
			'property' => 'color',
		),
	),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'hr_' . $hr++,
	'section'     => 'styles',
	'type'        => 'custom',
	'default'     => '<hr style="margin: 20px 0;">',
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'typography_subsets',
	'section'     => 'styles',
	'type'        => 'multicheck',
	'label'       => esc_html__( 'Font subsets', 'primrose' ),
	'choices'     => primrose_font_subsets(),
	'default'     => array( 'latin' ),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'typography_body_font_family',
	'section'     => 'styles',
	'type'        => 'select',
	'label'       => esc_html__( 'Body font family', 'primrose' ),
	'description' => esc_html__( 'Used in normal paragraphs.', 'primrose' ),
	'choices'     => primrose_font_choices(),
	'default'     => 'Karla',
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'typography_title_font_family',
	'section'     => 'styles',
	'type'        => 'select',
	'label'       => esc_html__( 'Title font family', 'primrose' ),
	'description' => esc_html__( 'Used in post / page title.', 'primrose' ),
	'choices'     => primrose_font_choices(),
	'default'     => 'Karla',
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'typography_headings_font_family',
	'section'     => 'styles',
	'type'        => 'select',
	'label'       => esc_html__( 'Content headings font family', 'primrose' ),
	'description' => esc_html__( 'Used in content headings (h1 - h6).', 'primrose' ),
	'choices'     => primrose_font_choices(),
	'default'     => 'Karla',
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'typography_menu_font_family',
	'section'     => 'styles',
	'type'        => 'select',
	'label'       => esc_html__( 'Menu and button font family', 'primrose' ),
	'description' => esc_html__( 'Used in header navigation and button.', 'primrose' ),
	'choices'     => primrose_font_choices(),
	'default'     => 'Karla',
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'note_advanced_styles',
	'section'     => 'styles',
	'type'        => 'custom',
	'label'       => esc_html__( 'Changing font sizes etc.', 'primrose' ),
	'default'     => wp_kses(
		__( 'To customize font size, line height, etc, please use Custom CSS. We also recommend <a href="https://siteorigin.com/css/">SiteOrigin CSS Editor</a> plugin for customizing CSS with a nice visual preview.', 'primrose' ),
		array( 'a' => array( 'href' => array() ) )
	),
) );

// Topbar.
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'topbar',
	'section'     => 'topbar',
	'type'        => 'switch',
	'label'       => esc_html__( 'Topbar', 'primrose' ),
	'default'     => 0,
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'topbar_layout',
	'section'     => 'topbar',
	'type'        => 'select',
	'label'       => esc_html__( 'Topbar layout', 'primrose' ),
	'choices'     => array(
		'wrapped'    => esc_html__( 'Centered (wrapped)', 'primrose' ),
		'full-width' => esc_html__( 'Full width', 'primrose' ),
	),
	'default'     => 'wrapped',
	'partial_refresh' => array(
		$p++ => array(
			'selector'        => '#topbar',
			'render_callback' => 'primrose_topbar',
			'container_inclusive' => true,
		),
	),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'topbar_text',
	'section'     => 'topbar',
	'type'        => 'textarea',
	'label'       => esc_html__( 'Topbar text', 'primrose' ),
	'default'     => '',
	'partial_refresh' => array(
		$p++ => array(
			'selector'        => '#topbar',
			'render_callback' => 'primrose_topbar',
			'container_inclusive' => true,
		),
	),
	'sanitize_callback' => 'primrose_unfiltered_sanitize',
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'topbar_navigation',
	'section'     => 'topbar',
	'type'        => 'custom',
	'label'       => esc_html__( 'Topbar navigation', 'primrose' ),
	'default'     => esc_html__( 'To activate topbar navigation, please go to Appearance > Menus, and assign your created menu to "Topbar Menu" location.', 'primrose' ),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'color_topbar_bg',
	'section'     => 'topbar',
	'type'        => 'color',
	'label'       => esc_html__( 'Topbar BG color', 'primrose' ),
	'default'     => '#f3f3f3',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '.topbar-section',
			'property' => 'background-color',
		),
	),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'color_topbar_border',
	'section'     => 'topbar',
	'type'        => 'color',
	'label'       => esc_html__( 'Topbar border color', 'primrose' ),
	'default'     => '#f3f3f3',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '.topbar-section',
			'property' => 'border-color',
		),
	),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'color_topbar_text',
	'section'     => 'topbar',
	'type'        => 'color',
	'label'       => esc_html__( 'Topbar text color', 'primrose' ),
	'default'     => '#888888',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '.topbar-section',
			'property' => 'color',
		),
	),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'color_topbar_link',
	'section'     => 'topbar',
	'type'        => 'color',
	'label'       => esc_html__( 'Topbar link color', 'primrose' ),
	'default'     => '#333333',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '.topbar-section a',
			'property' => 'color',
		),
	),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'color_topbar_link_hover',
	'section'     => 'topbar',
	'type'        => 'color',
	'label'       => esc_html__( 'Topbar link hover color', 'primrose' ),
	'default'     => '#888888',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '.topbar-section a:hover, .topbar-section a:focus',
			'property' => 'color',
		),
	),
) );

// Header.
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'header_logo',
	'section'     => 'header',
	'type'        => 'image',
	'label'       => esc_html__( 'Logo', 'primrose' ),
	'description' => esc_html__( 'Please upload the actual size.', 'primrose' ),
	'default'     => '',
	'partial_refresh' => array(
		$p++ => array(
			'selector'            => '#masthead',
			'render_callback'     => 'primrose_header',
			'container_inclusive' => true,
		),
	),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'header_logo_margin_top',
	'section'     => 'header',
	'type'        => 'dimension',
	'label'       => esc_html__( 'Logo margin top', 'primrose' ),
	'default'     => '80px',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '.header-logo',
			'property' => 'margin-top',
			'suffix' => ' !important',
		),
	),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'header_logo_margin_bottom',
	'section'     => 'header',
	'type'        => 'dimension',
	'label'       => esc_html__( 'Logo margin bottom', 'primrose' ),
	'default'     => '20px',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '.header-logo',
			'property' => 'margin-bottom',
			'suffix' => ' !important',
		),
	),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'logo_url',
	'section'     => 'header',
	'type'        => 'text',
	'label'       => esc_html__( 'Logo URL', 'primrose' ),
	'description' => esc_html__( 'Default (blank) is the front page URL.', 'primrose' ),
	'default'     => '',
	'partial_refresh' => array(
		$p++ => array(
			'selector'        => '#masthead',
			'render_callback' => 'primrose_header',
			'container_inclusive' => true,
		),
		$p++ => array(
			'selector'        => '#navigation',
			'render_callback' => 'primrose_header_navigation',
			'container_inclusive' => true,
		),
	),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'header_floating_logo',
	'section'     => 'header',
	'type'        => 'image',
	'label'       => esc_html__( 'Floating logo', 'primrose' ),
	'description' => esc_html__( 'Displayed when navigation bar is floating. Please upload the actual size. Maximum size is 50x50px.', 'primrose' ),
	'default'     => '',
	'partial_refresh' => array(
		$p++ => array(
			'selector'        => '#navigation',
			'render_callback' => 'primrose_header_navigation',
			'container_inclusive' => true,
		),
	),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'hr_' . $hr++,
	'section'     => 'header',
	'type'        => 'custom',
	'default'     => '<hr style="margin: 20px 0;">',
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'header_navigation_layout',
	'section'     => 'header',
	'type'        => 'select',
	'label'       => esc_html__( 'Header navigation layout', 'primrose' ),
	'choices'     => array(
		'wrapped'    => esc_html__( 'Centered (wrapped)', 'primrose' ),
		'full-width' => esc_html__( 'Full width', 'primrose' ),
	),
	'default'     => 'wrapped',
	'partial_refresh' => array(
		$p++ => array(
			'selector'        => '#navigation',
			'render_callback' => 'primrose_header_navigation',
			'container_inclusive' => true,
		),
	),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'header_border_bottom',
	'section'     => 'header',
	'type'        => 'select',
	'label'       => esc_html__( 'Thin bottom border', 'primrose' ),
	'choices'     => array(
		false        => esc_html__( 'Disabled', 'primrose' ),
		'wrapped'    => esc_html__( 'Centered (wrapped)', 'primrose' ),
		'full-width' => esc_html__( 'Full width', 'primrose' ),
	),
	'default'     => 'wrapped',
	'partial_refresh' => array(
		$p++ => array(
			'selector'        => '#navigation',
			'render_callback' => 'primrose_header_navigation',
			'container_inclusive' => true,
		),
	),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'header_search',
	'section'     => 'header',
	'type'        => 'switch',
	'label'       => esc_html__( 'Search', 'primrose' ),
	'default'     => 1,
	'partial_refresh' => array(
		$p++ => array(
			'selector'        => '#navigation',
			'render_callback' => 'primrose_header_navigation',
			'container_inclusive' => true,
		),
	),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'header_search_mode',
	'section'     => 'header',
	'type'        => 'select',
	'label'       => esc_html__( 'Search mode', 'primrose' ),
	'choices'     => array(
		'all'         => esc_html__( 'All post types', 'primrose' ),
		'products'    => esc_html__( 'Products only', 'primrose' ),
		'posts-pages' => esc_html__( 'Posts and Pages only', 'primrose' ),
	),
	'default'     => 'all',
	'active_callback' => array(
		array(
			'setting'  => 'header_search',
			'operator' => '==',
			'value'    => 1,
		),
	),
	'partial_refresh' => array(
		$p++ => array(
			'selector'        => '#navigation',
			'render_callback' => 'primrose_header_navigation',
			'container_inclusive' => true,
		),
	),
) );
if ( class_exists( 'WooCommerce' ) ) {
	SingleStroke_Kirki::add_field( 'primrose', array(
		'settings'    => 'header_cart',
		'section'     => 'header',
		'type'        => 'switch',
		'label'       => esc_html__( 'Shopping cart', 'primrose' ),
		'default'     => 1,
		'partial_refresh' => array(
			$p++ => array(
				'selector'        => '#navigation',
				'render_callback' => 'primrose_header_navigation',
				'container_inclusive' => true,
			),
		),
	) );
	SingleStroke_Kirki::add_field( 'primrose', array(
		'settings'    => 'header_cart_icon',
		'section'     => 'header',
		'type'        => 'select',
		'label'       => esc_html__( 'Cart icon', 'primrose' ),
		'choices'     => array(
			'handbag' => esc_html__( 'handbag', 'primrose' ),
			'basket'  => esc_html__( 'basket', 'primrose' ),
		),
		'default'     => 'handbag',
		'active_callback' => array(
			array(
				'setting'  => 'header_cart',
				'operator' => '==',
				'value'    => 1,
			),
		),
		'partial_refresh' => array(
			$p++ => array(
				'selector'        => '#navigation',
				'render_callback' => 'primrose_header_navigation',
				'container_inclusive' => true,
			),
		),
	) );
	SingleStroke_Kirki::add_field( 'primrose', array(
		'settings'    => 'header_cart_widget',
		'section'     => 'header',
		'type'        => 'switch',
		'label'       => esc_html__( 'Show cart dropdown list (widget)', 'primrose' ),
		'default'     => 0,
		'active_callback' => array(
			array(
				'setting'  => 'header_cart',
				'operator' => '==',
				'value'    => 1,
			),
		),
		'partial_refresh' => array(
			$p++ => array(
				'selector'        => '#navigation',
				'render_callback' => 'primrose_header_navigation',
				'container_inclusive' => true,
			),
		),
	) );
}

// Footer.
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'footer_border_top',
	'section'     => 'footer',
	'type'        => 'select',
	'label'       => esc_html__( 'Thin top border', 'primrose' ),
	'choices'     => array(
		false        => esc_html__( 'Disabled', 'primrose' ),
		'wrapped'    => esc_html__( 'Centered (wrapped)', 'primrose' ),
		'full-width' => esc_html__( 'Full width', 'primrose' ),
	),
	'default'     => 'wrapped',
	'partial_refresh' => array(
		$p++ => array(
			'selector'        => '#colophon',
			'render_callback' => 'primrose_footer',
			'container_inclusive' => true,
		),
	),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'footer_instagram',
	'section'     => 'footer',
	'type'        => 'switch',
	'label'       => esc_html__( 'Instagram feed', 'primrose' ),
	'description' => esc_html__( 'Please make sure you have "WP Instagram Widget" plugin installed.', 'primrose' ),
	'default'     => 0,
	'partial_refresh' => array(
		$p++ => array(
			'selector'        => '#footer-instagram',
			'render_callback' => 'primrose_footer_instagram',
			'container_inclusive' => true,
		),
	),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'footer_instagram_layout',
	'section'     => 'footer',
	'type'        => 'select',
	'label'       => esc_html__( 'Instagram feed layout', 'primrose' ),
	'choices'     => array(
		'full-width' => esc_html__( 'Full width', 'primrose' ),
		'wrapped'    => esc_html__( 'Centered (wrapped)', 'primrose' ),
	),
	'default'     => 'full-width',
	'partial_refresh' => array(
		$p++ => array(
			'selector'        => '#footer-instagram',
			'render_callback' => 'primrose_footer_instagram',
			'container_inclusive' => true,
		),
	),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'footer_instagram_username',
	'section'     => 'footer',
	'type'        => 'text',
	'label'       => esc_html__( 'Instagram username', 'primrose' ),
	'default'     => '',
	'active_callback' => array(
		array(
			'setting'  => 'footer_instagram',
			'operator' => '==',
			'value'    => 1,
		),
	),
	'partial_refresh' => array(
		$p++ => array(
			'selector'        => '#footer-instagram',
			'render_callback' => 'primrose_footer_instagram',
			'container_inclusive' => true,
		),
	),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'footer_instagram_link_text',
	'section'     => 'footer',
	'type'        => 'text',
	'label'       => esc_html__( 'Link text', 'primrose' ),
	'default'     => '',
	'active_callback' => array(
		array(
			'setting'  => 'footer_instagram',
			'operator' => '==',
			'value'    => 1,
		),
	),
	'partial_refresh' => array(
		$p++ => array(
			'selector'        => '#footer-instagram',
			'render_callback' => 'primrose_footer_instagram',
			'container_inclusive' => true,
		),
	),
	'sanitize_callback' => 'primrose_unfiltered_sanitize',
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'footer_instagram_link_target',
	'section'     => 'footer',
	'type'        => 'select',
	'label'       => esc_html__( 'Link target', 'primrose' ),
	'choices'     => array(
		'_self'  => '_self',
		'_blank' => '_blank',
	),
	'default'     => '_self',
	'active_callback' => array(
		array(
			'setting'  => 'footer_instagram',
			'operator' => '==',
			'value'    => 1,
		),
	),
	'partial_refresh' => array(
		$p++ => array(
			'selector'        => '#footer-instagram',
			'render_callback' => 'primrose_footer_instagram',
			'container_inclusive' => true,
		),
	),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'footer_widgets_area_columns',
	'section'     => 'footer',
	'type'        => 'repeater',
	'label'       => esc_html__( 'Footer Widgets Area Columns', 'primrose' ),
	'description' => esc_html__( 'Leave this blank means disable footer widgets area. If set, all columns width should be 100% in total. You can insert widgets to each columns from Appearance > Widgets, after you save this setting.', 'primrose' ),
	'row_label'   => array(
		'type'  => 'text',
		'value' => esc_html__( 'column', 'primrose' ),
	),
	'fields'      => array(
		'width' => array(
			'type'    => 'text',
			'label'   => esc_html__( 'Width (%)', 'primrose' ),
			'default' => '33.33',
		),
		'align' => array(
			'type'    => 'select',
			'label'   => esc_html__( 'Text align', 'primrose' ),
			'choices' => array(
				'left'  => esc_html__( 'left', 'primrose' ),
				'right' => esc_html__( 'right', 'primrose' ),
				'center' => esc_html__( 'center', 'primrose' ),
			),
			'default' => 'left',
		),
	),
	'default'     => array(
		array( 'width' => '33.33', 'align' => 'left' ),
		array( 'width' => '33.33', 'align' => 'left' ),
		array( 'width' => '33.33', 'align' => 'left' ),
	),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'footer_widgets_title',
	'section'     => 'footer',
	'type'        => 'select',
	'label'       => esc_html__( 'Footer widgets title', 'primrose' ),
	'choices' => array(
		'standard' => esc_html__( 'standard', 'primrose' ),
		'border'   => esc_html__( 'with border', 'primrose' ),
	),
	'default'     => 'border',
	'partial_refresh' => array(
		$p++ => array(
			'selector'        => '#colophon',
			'render_callback' => 'primrose_footer',
			'container_inclusive' => true,
		),
	),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'footer_social_media',
	'section'     => 'footer',
	'type'        => 'switch',
	'label'       => esc_html__( 'Social media links', 'primrose' ),
	'default'     => 1,
	'partial_refresh' => array(
		$p++ => array(
			'selector'        => '#colophon',
			'render_callback' => 'primrose_footer',
			'container_inclusive' => true,
		),
	),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'footer_copyright_text',
	'section'     => 'footer',
	'type'        => 'textarea',
	'label'       => esc_html__( 'Copyright text', 'primrose' ),
	'default'     => sprintf(
		esc_html__( 'Copyright &copy; %s &mdash; designed by %s', 'primrose' ),
		date( 'Y' ),
		'<a href="' . esc_url( $primrose_data['theme_data']->get( 'AuthorURI' ) ) . '">' . $primrose_data['theme_data']->get( 'Author' ) . '</a>'
	),
	'partial_refresh' => array(
		$p++ => array(
			'selector'        => '#colophon',
			'render_callback' => 'primrose_footer',
			'container_inclusive' => true,
		),
	),
	'sanitize_callback' => 'primrose_unfiltered_sanitize',
) );

// Blog.
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'blog_home_page_template',
	'section'     => 'blog',
	'type'        => 'select',
	'label'       => esc_html__( 'Blog pages template', 'primrose' ),
	'description' => esc_html__( 'For all blog pages (home, archive, single post pages)', 'primrose' ),
	'choices'     => array(
		'default'      => esc_html__( 'Default (with sidebar)', 'primrose' ),
		'full-width'   => esc_html__( 'Full width', 'primrose' ),
		'narrow-width' => esc_html__( 'Narrow width', 'primrose' ),
	),
	'default'     => 'default',
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'blog_index_read_more_text',
	'section'     => 'blog',
	'type'        => 'text',
	'label'       => esc_html__( 'Index: read more text', 'primrose' ),
	'default'     => esc_html__( 'Continue Reading &rarr;', 'primrose' ),
	'sanitize_callback' => 'primrose_unfiltered_sanitize',
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'blog_single_navigation',
	'section'     => 'blog',
	'type'        => 'switch',
	'label'       => esc_html__( 'Single post: next/prev navigation', 'primrose' ),
	'description' => esc_html__( 'Below the single post content.', 'primrose' ),
	'default'     => 1,
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'blog_single_author_bio',
	'section'     => 'blog',
	'type'        => 'switch',
	'label'       => esc_html__( 'Single post: author bio', 'primrose' ),
	'description' => esc_html__( 'Below the single post content.', 'primrose' ),
	'default'     => 1,
) );

// Shop.
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'shop_breadcrumb',
	'section'     => 'shop',
	'type'        => 'switch',
	'label'       => esc_html__( 'Breadcrumb', 'primrose' ),
	'default'     => 0,
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'shop_breadcrumb_home_text',
	'section'     => 'shop',
	'type'        => 'text',
	'label'       => esc_html__( 'Breadcrumb root label', 'primrose' ),
	'default'     => esc_html__( 'Shop', 'primrose' ),
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'shop_breadcrumb_home_url',
	'section'     => 'shop',
	'type'        => 'text',
	'label'       => esc_html__( 'Breadcrumb root URL', 'primrose' ),
	'description' => esc_html__( 'Default (blank) is the shop page URL.', 'primrose' ),
	'default'     => '',
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'hr_' . $hr++,
	'section'     => 'shop',
	'type'        => 'custom',
	'default'     => '<hr style="margin: 20px 0;">',
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'note_shop_archive',
	'section'     => 'shop',
	'type'        => 'custom',
	'default'     => '<h3 style="text-transform: uppercase;">' . esc_html__( 'Products / shop page', 'primrose' ) . '</h3>',
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'shop_home_page_template',
	'section'     => 'shop',
	'type'        => 'select',
	'label'       => esc_html__( 'Shop page template', 'primrose' ),
	'choices'     => array(
		'default'      => esc_html__( 'Default (with sidebar)', 'primrose' ),
		'full-width'   => esc_html__( 'Full width', 'primrose' ),
		'narrow-width' => esc_html__( 'Narrow width', 'primrose' ),
	),
	'default'     => 'full-width',
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'shop_subcategories',
	'section'     => 'shop',
	'type'        => 'switch',
	'label'       => esc_html__( 'Subcategories tabs', 'primrose' ),
	'default'     => 0,
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'shop_products_filter',
	'section'     => 'shop',
	'type'        => 'switch',
	'label'       => esc_html__( 'Products loop filter', 'primrose' ),
	'default'     => 0,
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'shop_products_add_to_cart',
	'section'     => 'shop',
	'type'        => 'switch',
	'label'       => esc_html__( 'Add to cart button on products list', 'primrose' ),
	'default'     => 0,
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'shop_products_grid_columns',
	'section'     => 'shop',
	'type'        => 'slider',
	'label'       => esc_html__( 'Products grid n.o. columns', 'primrose' ),
	'choices'     => array(
		'min'  => 1,
		'max'  => 4,
		'step' => 1,
	),
	'default'     => 3,
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'shop_products_grid_gutter',
	'section'     => 'shop',
	'type'        => 'slider',
	'label'       => esc_html__( 'Products grid gutter', 'primrose' ),
	'choices'     => array(
		'min'  => 10,
		'max'  => 40,
		'step' => 2,
	),
	'default'     => 40,
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'hr_' . $hr++,
	'section'     => 'shop',
	'type'        => 'custom',
	'default'     => '<hr style="margin: 20px 0;">',
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'note_shop_single',
	'section'     => 'shop',
	'type'        => 'custom',
	'default'     => '<h3 style="text-transform: uppercase;">' . esc_html__( 'Single product page', 'primrose' ) . '</h3>',
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'shop_single_page_template',
	'section'     => 'shop',
	'type'        => 'select',
	'label'       => esc_html__( 'Product page template', 'primrose' ),
	'choices'     => array(
		'default'      => esc_html__( 'Default (with sidebar)', 'primrose' ),
		'full-width'   => esc_html__( 'Full width', 'primrose' ),
		'narrow-width' => esc_html__( 'Narrow width', 'primrose' ),
	),
	'default'     => 'full-width',
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'shop_single_gallery',
	'section'     => 'shop',
	'type'        => 'select',
	'label'       => esc_html__( 'Product images gallery model', 'primrose' ),
	'description' => esc_html__( 'The "default" mode will use the setting from "Enable Lightbox for product images" option on WooCommerce > Settings > Products > Display.', 'primrose' ),
	'choices'     => array(
		'default' => esc_html__( 'Default (WooCommerce lightbox)', 'primrose' ),
		'slider'  => esc_html__( 'Image slider', 'primrose' ),
		'stacked' => esc_html__( 'Stacked images', 'primrose' ),
	),
	'default'     => 'default',
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'shop_related_products_grid_columns',
	'section'     => 'shop',
	'type'        => 'slider',
	'label'       => esc_html__( 'Related products -- columns', 'primrose' ),
	'choices'     => array(
		'min'  => 1,
		'max'  => 4,
		'step' => 1,
	),
	'default'     => 3,
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'shop_related_products_grid_posts',
	'section'     => 'shop',
	'type'        => 'slider',
	'label'       => esc_html__( 'Related products -- maximum posts', 'primrose' ),
	'default'     => esc_html__( 'Set to 0 to disable related products, the maximum posts should follow the grid columns value. If you set 3 columns, then the maximum related products should be either 3 or 6 posts.', 'primrose' ),
	'choices'     => array(
		'min'  => 0,
		'max'  => 8,
		'step' => 1,
	),
	'default'     => 3,
) );

// Social media links.
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'social_media_links',
	'section'     => 'social_media',
	'type'        => 'repeater',
	'label'       => esc_html__( 'Social media links', 'primrose' ),
	'row_label'   => array(
		'type'  => 'field',
		'field' => 'link_type',
	),
	'fields'      => array(
		'link_type' => array(
			'type'    => 'select',
			'label'   => esc_html__( 'Type', 'primrose' ),
			'choices' => $primrose_data['social_media_links'],
			'default' => '',
		),
		'link_url' => array(
			'type'    => 'text',
			'label'   => esc_html__( 'Link URL', 'primrose' ),
			'default' => '',
		),
		'link_target' => array(
			'type'    => 'select',
			'label'   => esc_html__( 'Link Target', 'primrose' ),
			'choices' => array(
				'self' => esc_html__( 'same window (tab)', 'primrose' ),
				'blank' => esc_html__( 'new window (tab)', 'primrose' ),
			),
			'default' => 'self',
		),
	),
	'default'     => array(
		array(
			'link_type' => 'facebook',
			'link_url'  => '#',
		),
		array(
			'link_type' => 'twitter',
			'link_url'  => '#',
		),
		array(
			'link_type' => 'instagram',
			'link_url'  => '#',
		),
		array(
			'link_type' => 'pinterest',
			'link_url'  => '#',
		),
		array(
			'link_type' => 'linkedin',
			'link_url'  => '#',
		),
	),
) );

// Custom Scripts.
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'custom_css',
	'section'     => 'custom_css',
	'type'        => 'textarea',
	'label'       => esc_html__( 'Custom CSS', 'primrose' ),
	'description' => esc_html__( 'Your custom CSS to override the default style or anything which can not be configured via this Customizer', 'primrose' ),
	'default'     => '',
	'choices'     => array(
		'language' => 'css',
		'theme'    => 'elegant',
		'height'   => 200,
	),
	'sanitize_callback' => 'primrose_unfiltered_sanitize',
) );
SingleStroke_Kirki::add_field( 'primrose', array(
	'settings'    => 'note_custom_css',
	'section'     => 'custom_css',
	'type'        => 'custom',
	'label'       => esc_html__( 'Using visual CSS editor', 'primrose' ),
	'default'     => wp_kses(
		__( 'We recommend <a href="https://siteorigin.com/css/">SiteOrigin CSS Editor</a> plugin if you want to make custom CSS changes with interactive UI to select the elements.', 'primrose' ),
		array( 'a' => array( 'href' => array() ) )
	),
) );