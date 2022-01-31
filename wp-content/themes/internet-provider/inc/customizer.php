<?php
/**
 * Internet Provider Theme Customizer
 *
 * @package Internet Provider
 */

get_template_part('/inc/select/category-dropdown-custom-control');

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function internet_provider_customize_register( $wp_customize ) {

	function internet_provider_sanitize_dropdown_pages( $page_id, $setting ) {
  		$page_id = absint( $page_id );
  		return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function internet_provider_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

	function internet_provider_sanitize_email( $email, $setting ) {
		// Strips out all characters that are not allowable in an email address.
		$email = sanitize_email( $email );
		
		// If $email is a valid email, return it; otherwise, return the default.
		return ( ! is_null( $email ) ? $email : $setting->default );
	}

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->add_setting('internet_provider_title_enable',array(
		'default' => true,
		'sanitize_callback' => 'internet_provider_sanitize_checkbox',
	));
	$wp_customize->add_control( 'internet_provider_title_enable', array(
	   'settings' => 'internet_provider_title_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Title','internet-provider'),
	   'type'      => 'checkbox'
	));

	$wp_customize->add_setting('internet_provider_tagline_enable',array(
		'default' => true,
		'sanitize_callback' => 'internet_provider_sanitize_checkbox',
	));
	$wp_customize->add_control( 'internet_provider_tagline_enable', array(
	   'settings' => 'internet_provider_tagline_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Tagline','internet-provider'),
	   'type'      => 'checkbox'
	));

	//Theme Options
	$wp_customize->add_panel( 'internet_provider_panel_area', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'title' => __( 'Theme Options Panel', 'internet-provider' ),
	) );
	
	//Site Layout Section
	$wp_customize->add_section('internet_provider_site_layoutsec',array(
		'title'	=> __('Manage Site Layout Section ','internet-provider'),
		'priority'	=> 1,
		'panel' => 'internet_provider_panel_area',
	));		
	
	$wp_customize->add_setting('internet_provider_box_layout',array(
		'sanitize_callback' => 'internet_provider_sanitize_checkbox',
	));
	$wp_customize->add_control( 'internet_provider_box_layout', array(
	   'section'   => 'internet_provider_site_layoutsec',
	   'label'	=> __('Check to Box Layout','internet-provider'),
	   'type'      => 'checkbox'
 	));

	$wp_customize->add_setting('internet_provider_preloader',array(
		'default' => true,
		'sanitize_callback' => 'internet_provider_sanitize_checkbox',
	));
	$wp_customize->add_control( 'internet_provider_preloader', array(
	   'section'   => 'internet_provider_site_layoutsec',
	   'label'	=> __('Check to remove preloader','internet-provider'),
	   'type'      => 'checkbox'
 	));

	$wp_customize->add_setting('internet_provider_topbar',array(
		'default' => true,
		'sanitize_callback' => 'internet_provider_sanitize_checkbox',
	));
	$wp_customize->add_control( 'internet_provider_topbar', array(
	   'section'   => 'internet_provider_site_layoutsec',
	   'label'	=> __('Check to remove topbar','internet-provider'),
	   'type'      => 'checkbox'
 	));

	// Home Category Dropdown Section
	$wp_customize->add_section('internet_provider_one_cols_section',array(
		'title'	=> __('Manage Slider','internet-provider'),
		'description'	=> __('Select Category from the Dropdowns for slider, Also use the given image dimension (1600 x 600).','internet-provider'),
		'priority'	=> null,
		'panel' => 'internet_provider_panel_area'
	));

	$wp_customize->add_setting('internet_provider_pgboxes_title',array(
		'sanitize_callback' => 'sanitize_text_field',
	));	
	$wp_customize->add_control( 'internet_provider_pgboxes_title', array(
	   'section' 	=> 'internet_provider_one_cols_section',
	   'label'	 	=> __('Short Text','internet-provider'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

	// Add a category dropdown Slider Coloumn
	$wp_customize->add_setting( 'internet_provider_pageboxes', array(
		'default'	=> '0',	
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( new Internet_Provider_Category_Dropdown_Custom_Control( $wp_customize, 'internet_provider_pageboxes', array(
		'section' => 'internet_provider_one_cols_section',
		'settings'   => 'internet_provider_pageboxes',
	) ) );
	
	//Hide Section
	$wp_customize->add_setting('internet_provider_hide_categorysec',array(
		'default' => true,
		'sanitize_callback' => 'internet_provider_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'internet_provider_hide_categorysec', array(
	   'settings' => 'internet_provider_hide_categorysec',
	   'section'   => 'internet_provider_one_cols_section',
	   'label'     => __('Uncheck To Enable This Section','internet-provider'),
	   'type'      => 'checkbox'
	));

	// Home Three Boxes Section 
	$wp_customize->add_section('internet_provider_below_banner_section', array(
		'title'	=> __('Manage Services Section','internet-provider'),
		'description'	=> __('Select Pages from the dropdown for Services, Also use the given image dimension (500 x 500).','internet-provider'),
		'priority'	=> null,
		'panel' => 'internet_provider_panel_area',
	));

	$wp_customize->add_setting('internet_provider_pageboxes1',array(
		'default'	=> '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'internet_provider_sanitize_dropdown_pages'
	));
	$wp_customize->add_control(	'internet_provider_pageboxes1',array(
		'type' => 'dropdown-pages',
		'section' => 'internet_provider_below_banner_section',
	));	

	$wp_customize->add_setting('internet_provider_pageboxes2',array(
		'default'	=> '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'internet_provider_sanitize_dropdown_pages'
	)); 
	$wp_customize->add_control(	'internet_provider_pageboxes2',array(
		'type' => 'dropdown-pages',
		'section' => 'internet_provider_below_banner_section',
	));
	
	$wp_customize->add_setting('internet_provider_pageboxes3',array(
		'default'	=> '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'internet_provider_sanitize_dropdown_pages'
	));

	$wp_customize->add_control(	'internet_provider_pageboxes3',array(
		'type' => 'dropdown-pages',
		'section' => 'internet_provider_below_banner_section',
	));
	
	$wp_customize->add_setting('internet_provider_disabled_pgboxes',array(
		'default' => true,
		'sanitize_callback' => 'internet_provider_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_control( 'internet_provider_disabled_pgboxes', array(
	   'settings' => 'internet_provider_disabled_pgboxes',
	   'section'   => 'internet_provider_below_banner_section',
	   'label'     => __('Uncheck To Enable This Section','internet-provider'),
	   'type'      => 'checkbox'
	));

	// Footer Section 
	$wp_customize->add_section('internet_provider_footer', array(
		'title'	=> __('Manage Footer Section','internet-provider'),
		'priority'	=> null,
		'panel' => 'internet_provider_panel_area',
	));

	$wp_customize->add_setting('internet_provider_copyright_line',array(
		'sanitize_callback' => 'sanitize_text_field',
	));	
	$wp_customize->add_control( 'internet_provider_copyright_line', array(
	   'section' 	=> 'internet_provider_footer',
	   'label'	 	=> __('Copyright Line','internet-provider'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

    // Google Fonts
    $wp_customize->add_section( 'internet_provider_google_fonts_section', array(
		'title'       => __( 'Google Fonts', 'internet-provider' ),
		'priority'    => 24,
	) );

	$font_choices = array(
		'Kaushan Script:' => 'Kaushan Script',
		'Emilys Candy:' => 'Emilys Candy',
		'Poppins:0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900' => 'Poppins',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);

	$wp_customize->add_setting( 'internet_provider_headings_fonts', array(
		'sanitize_callback' => 'internet_provider_sanitize_fonts',
	));
	$wp_customize->add_control( 'internet_provider_headings_fonts', array(
		'type' => 'select',
		'description' => __('Select your desired font for the headings.', 'internet-provider'),
		'section' => 'internet_provider_google_fonts_section',
		'choices' => $font_choices
	));

	$wp_customize->add_setting( 'internet_provider_body_fonts', array(
		'sanitize_callback' => 'internet_provider_sanitize_fonts'
	));
	$wp_customize->add_control( 'internet_provider_body_fonts', array(
		'type' => 'select',
		'description' => __( 'Select your desired font for the body.', 'internet-provider' ),
		'section' => 'internet_provider_google_fonts_section',
		'choices' => $font_choices
	));
}
add_action( 'customize_register', 'internet_provider_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function internet_provider_customize_preview_js() {
	wp_enqueue_script( 'internet_provider_customizer', esc_url(get_template_directory_uri()) . '/js/customize-preview.js', array( 'customize-preview' ), '20161510', true );
}
add_action( 'customize_preview_init', 'internet_provider_customize_preview_js' );