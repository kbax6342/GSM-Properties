<?php
	// Footer copyright
	$wp_customize->add_setting('awpbusinesspress_footer_copright_text',array(
		'sanitize_callback'	=>  'sanitize_text_field',
		'default'			=> __('Copyright &copy; 2021 | Powered by <a href="//wordpress.org/">WordPress</a> <span class="sep"> | </span> awpbusinesspress theme by <a target="_blank" href="//awplife.com/">A WP Life</a>', 'awpbusinesspress'),
		'transport'			=> $selective_refresh,
	));
	
	$wp_customize->add_control('awpbusinesspress_footer_copright_text', array(
			'label'		=> esc_html__('Footer Copyright','awpbusinesspress'),
			'section'	=> 'awpbusinesspress_footer_copyright',
			'priority'	=> 10,
			'type'		=>  'textarea'
	));