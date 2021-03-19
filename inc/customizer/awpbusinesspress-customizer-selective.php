<?php
/**
 * Override default customizer options.
 *
 * @package awpbusinesspress
 */

// Settings.
$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

if ( isset( $wp_customize->selective_refresh ) ) {
	
	// site title
	$wp_customize->selective_refresh->add_partial('blogname',array(
		'selector'        => '.site-branding-text .site-title',
		'render_callback' => array( 'awpbusinesspress_Customizer_Partials', 'awpbusinesspress_customize_partial_blogname' ),
	));

    // site tagline
	$wp_customize->selective_refresh->add_partial('blogdescription',array(
		'selector'        => '.site-branding-text .site-description',
		'render_callback' => array( 'awpbusinesspress_Customizer_Partials', 'awpbusinesspress_customize_partial_blogdescription' ),
	));

	// main slider
	$wp_customize->selective_refresh->add_partial(
		'awpbusinesspress_main_slider_content',array(
		'selector'	=> '.theme-main-slider .theme-slider-content',)
	);
	
	// service title
	$wp_customize->selective_refresh->add_partial('awpbusinesspress_service_area_title',
		array(
			'selector'	=> '.service .section-title',
			'render_callback'	=> array( 'awpbusinesspress_Customizer_Partials', 'customize_partial_awpbusinesspress_service_area_title' ),
		)
	);
	
	// service desc
	$wp_customize->selective_refresh->add_partial('awpbusinesspress_service_area_des',
		array(
			'selector'        => '.service .section-subtitle',
			'render_callback' => array( 'awpbusinesspress_Customizer_Partials', 'customize_partial_awpbusinesspress_service_area_des' ),
		)
	);
	
	// service content
	$wp_customize->selective_refresh->add_partial(
		'awpbusinesspress_service_content',
		array(
			'selector'        => '.theme-services .row.theme-services-content',
		)
	);
	
	// testimonial title
	$wp_customize->selective_refresh->add_partial(
		'awpbusinesspress_testimonial_area_title',
		array(
			'selector'        => '.testimonial .section-header h1',
			'render_callback' => array( 'awpbusinesspress_Customizer_Partials', 'customize_partial_awpbusinesspress_testimonial_area_title' ),
		)
	);
	
	// testimonial description
	$wp_customize->selective_refresh->add_partial(
		'awpbusinesspress_testimonial_area_des',
		array(
			'selector'        => '.testimonial .section-header p',
			'render_callback' => array( 'awpbusinesspress_Customizer_Partials', 'customize_partial_awpbusinesspress_testimonial_area_des' ),
		)
	);
	
	// testimonial content
	$wp_customize->selective_refresh->add_partial(
		'awpbusinesspress_testimonial_content',
		array(
			'selector'        => '.theme-testimonial .row.theme-testimonial-content',
		)
	);
	
	// call to action title
	$wp_customize->selective_refresh->add_partial(
		'awpbusinesspress_cta_area_title',
		array(
			'selector'        => '.callout-to-action .title',
			'render_callback' => array( 'awpbusinesspress_Customizer_Partials', 'customize_partial_awpbusinesspress_cta_area_title' ),
		)
	);
	
	// call to action subtitle
	$wp_customize->selective_refresh->add_partial(
		'awpbusinesspress_cta_area_subtitle',
		array(
			'selector'        => '.callout-to-action .title',
			'render_callback' => array( 'awpbusinesspress_Customizer_Partials', 'customize_partial_awpbusinesspress_cta_area_subtitle' ),
		)
	);
	
	// call to action description
	$wp_customize->selective_refresh->add_partial(
		'awpbusinesspress_cta_area_des',
		array(
			'selector'        => '.callout-to-action .subtitle',
			'render_callback' => array( 'awpbusinesspress_Customizer_Partials', 'customize_partial_awpbusinesspress_cta_area_des' ),
		)
	);
	
	// call to action button text
	$wp_customize->selective_refresh->add_partial(
		'awpbusinesspress_cta_button_text',
		array(
			'selector'        => '.callout-to-action .m-top-40 .callout-button',
			'render_callback' => array( 'awpbusinesspress_Customizer_Partials', 'customize_partial_awpbusinesspress_cta_button_text' ),
		)
	);
	
	// blog title
	$wp_customize->selective_refresh->add_partial(
		'awpbusinesspress_blog_area_title',
		array(
			'selector'        => '.home-news .section-title',
			'render_callback' => array( 'awpbusinesspress_Customizer_Partials', 'customize_partial_awpbusinesspress_blog_area_title' ),
		)
	);
	
	// blog description
	$wp_customize->selective_refresh->add_partial(
		'awpbusinesspress_blog_area_des',
		array(
			'selector'        => '.home-news .section-subtitle',
			'render_callback' => array( 'awpbusinesspress_Customizer_Partials', 'customize_partial_awpbusinesspress_blog_area_des' ),
		)
	);

	// footer copyright text
	$wp_customize->selective_refresh->add_partial('awpbusinesspress_footer_copright_text',array(
		'selector'        => '.footer-copyrights .site-info',
		'render_callback' => array( 'awpbusinesspress_Customizer_Partials', 'awpbusinesspress_footer_copyright_text_render_callback' ),
	));
	
	// topbar phone text
	$wp_customize->selective_refresh->add_partial('awpbusinesspress_topbar_text',array(
		'selector'        => '.header-top .header-contact-info .phone-text',
		'render_callback' => array( 'awpbusinesspress_Customizer_Partials', 'awpbusinesspress_topbar_text_render_callback' ),
	));
	
	// topbar phone number
	$wp_customize->selective_refresh->add_partial('awpbusinesspress_topbar_num',array(
		'selector'        => '.header-top .header-contact-info .text-large',
		'render_callback' => array( 'awpbusinesspress_Customizer_Partials', 'awpbusinesspress_topbar_num_render_callback' ),
	));
}