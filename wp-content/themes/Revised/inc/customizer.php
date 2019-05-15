<?php
function customize_options( $wp_customize ) {
 
	//site title 
 	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
 	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
        'selector'            => '#blog-title',
        'render_callback'     => 'site_title_selective_refresh',
    ) );


	//service panel
	$wp_customize->add_panel( 'body_panel', array(
				'title'		 => esc_html__( 'Body Panel', 'revised' ),
				'capability' => 'edit_theme_options',
	));

	$wp_customize->add_section( 'body_section', array(
				'title' =>	esc_html__( 'Service Section', 'revised' ),
				'panel'	=>	'body_panel',
	));

	$wp_customize->add_setting( 'body_setting', array(
				'capability' => 'edit_theme_options',
				'default'	 => '',
	));
	$wp_customize->add_control( 'body_setting', array(
				'type'	   => 'text',
				'section'  => 'body_section',
				'settings' => 'body_setting',
				'label'	   =>  esc_html__( 'Heading Text' ),			
	));

}

add_action( 'customize_register', 'customize_options' );
?>
