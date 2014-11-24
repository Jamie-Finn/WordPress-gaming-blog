<?php
/*
 * Register colors and layout for the Theme Customizer.
*/
 
function thefunk_customize_register($wp_customize)
{

    $wp_customize->add_panel( 'styling_panel', array(
        'priority'       => 40,
        'capability'     => 'edit_theme_options',
        'title'          => __('Styling', 'the-funk'),
        'description'    => __('This section allows you to customize colors and feel of The Funk theme.', 'the-funk'),
    ) );

    $wp_customize->add_panel( 'layout_panel', array(
        'priority'       => 45,
        'capability'     => 'edit_theme_options',
        'title'          => __('Layout', 'the-funk'),
        'description'    => __('This section allows you to customize the layout of The Funk theme.', 'the-funk'),
    ) );
    
    $wp_customize->add_section('primary_styling', array(
        'priority' => 7,
        'title' => __('Primary Colors', 'the-funk'),
        'panel'  => 'styling_panel',
    ));
    
    $wp_customize->add_section('headnav_styling', array(
        'priority' => 20,
        'title' => __('Navigation Menu - Header', 'the-funk'),
        'panel'  => 'styling_panel',
    ));
    
    $wp_customize->add_section('primarynav_styling', array(
        'priority' => 25,
        'title' => __('Navigation Menu - Primary', 'the-funk'),
        'panel'  => 'styling_panel',
    ));
    
    $wp_customize->add_section('footer_styling', array(
        'priority' => 40,
        'title' => __('Footer', 'the-funk'),
        'panel'  => 'styling_panel',
    ));
    
    $wp_customize->add_section('custom_css_styling', array(
        'priority' => 50,
        'title' => __('Custom CSS', 'the-funk'),
        'panel'  => 'styling_panel',
    ));
    
    $wp_customize->add_section('sidebars', array(
        'priority' => 1,
        'title' => __('Sidebars', 'the-funk'),
        'panel'  => 'layout_panel',
    ));
    
    $wp_customize->add_section('footer', array(
        'priority' => 5,
        'title' => __('Footer', 'the-funk'),
        'panel'  => 'layout_panel',
    ));
    
    $wp_customize->get_control( 'background_color'  )->section = 'background_image';
    $wp_customize->get_section( 'background_image'  )->panel = 'styling_panel';
    $wp_customize->get_section( 'background_image'  )->title = 'Background';
    $wp_customize->get_section( 'background_image'  )->priority = 5;
    $wp_customize->get_section( 'header_image'  )->panel = 'styling_panel';
    $wp_customize->get_section( 'header_image'  )->title = 'Header';
    $wp_customize->get_section( 'header_image'  )->priority = 10;
    $wp_customize->get_control( 'header_image'  )->priority = 100;
 
    $wp_customize->add_setting('thefunk_theme_options[header_color]', array(
        'default' => '#FFF',
        'type' => 'option',
		'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options'
    ));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'thefunk_theme_options[header_color]', array(
        'label' => __('Header Color', 'the-funk'),
        'section' => 'header_image',
        'priority' => 5, 
        'settings' => 'thefunk_theme_options[header_color]'
    )));
	
	$wp_customize->add_setting('thefunk_theme_options[site_title_color]', array(
        'default' => '#000',
        'type' => 'option',
		'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options'
    ));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'thefunk_theme_options[site_title_color]', array(
        'label' => __('Title Color', 'the-funk'),
        'section' => 'header_image',
        'priority' => 10,
        'settings' => 'thefunk_theme_options[site_title_color]'
    )));
	
	$wp_customize->add_setting('thefunk_theme_options[site_title_color_hover]', array(
        'default' => '#999',
        'type' => 'option',
		'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options'
    ));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'thefunk_theme_options[site_title_color_hover]', array(
        'label' => __('Title Color - Hover', 'the-funk'),
        'section' => 'header_image',
        'priority' => 15,
        'settings' => 'thefunk_theme_options[site_title_color_hover]'
    )));
	
	$wp_customize->add_setting('thefunk_theme_options[site_description_color]', array(
        'default' => '#999',
        'type' => 'option',
		'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options'
    ));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'thefunk_theme_options[site_description_color]', array(
        'label' => __('Description Color', 'the-funk'),
        'section' => 'header_image',
        'priority' => 20,
        'settings' => 'thefunk_theme_options[site_description_color]'
    )));
	
	$wp_customize->add_setting('thefunk_theme_options[primary_site_color]', array(
        'default' => '#D55',
        'type' => 'option',
		'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options'
    ));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'thefunk_theme_options[primary_site_color]', array(
        'label' => __('Theme Color', 'the-funk'),
        'section' => 'primary_styling',
        'priority' => 10,
        'settings' => 'thefunk_theme_options[primary_site_color]'
    )));
	
	$wp_customize->add_setting('thefunk_theme_options[primary_color_hover]', array(
        'default' => '#999',
        'type' => 'option',
		'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options'
    ));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'thefunk_theme_options[primary_color_hover]', array(
        'label' => __('Hover Color', 'the-funk'),
        'section' => 'primary_styling',
        'priority' => 15,
        'settings' => 'thefunk_theme_options[primary_color_hover]'
    )));
	
	$wp_customize->add_setting('thefunk_theme_options[post_meta_color]', array(
        'default' => '#FFF',
        'type' => 'option',
		'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options'
    ));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'thefunk_theme_options[post_meta_color]', array(
        'label' => __('Post Meta Color', 'the-funk'),
        'section' => 'primary_styling',
        'priority' => 20,
        'settings' => 'thefunk_theme_options[post_meta_color]'
    )));

	$wp_customize->add_setting('thefunk_theme_options[headnav_color]', array(
        'default' => '#000',
        'type' => 'option',
		'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options'
    ));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'thefunk_theme_options[headnav_color]', array(
        'label' => __('Menu Color', 'the-funk'),
        'section' => 'headnav_styling',
        'priority' => 5,
        'settings' => 'thefunk_theme_options[headnav_color]'
    )));

	$wp_customize->add_setting('thefunk_theme_options[headnav_color_hover]', array(
        'default' => '#999',
        'type' => 'option',
		'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options'
    ));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'thefunk_theme_options[headnav_color_hover]', array(
        'label' => __('Menu Color - Hover', 'the-funk'),
        'section' => 'headnav_styling',
        'priority' => 10,
        'settings' => 'thefunk_theme_options[headnav_color_hover]'
    )));

	$wp_customize->add_setting('thefunk_theme_options[primarynav_color]', array(
        'default' => '#FFF',
        'type' => 'option',
		'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options'
    ));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'thefunk_theme_options[primarynav_color]', array(
        'label' => __('Menu Color', 'the-funk'),
        'section' => 'primarynav_styling',
        'priority' => 5,
        'settings' => 'thefunk_theme_options[primarynav_color]'
    )));

	$wp_customize->add_setting('thefunk_theme_options[primarynav_color_hover]', array(
        'default' => '#000',
        'type' => 'option',
		'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options'
    ));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'thefunk_theme_options[primarynav_color_hover]', array(
        'label' => __('Menu Color - Hover', 'the-funk'),
        'section' => 'primarynav_styling',
        'priority' => 10,
        'settings' => 'thefunk_theme_options[primarynav_color_hover]'
    )));
	
	$wp_customize->add_setting('thefunk_theme_options[primarynav_color_active]', array(
        'default' => '#000',
        'type' => 'option',
		'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options'
    ));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'thefunk_theme_options[primarynav_color_active]', array(
        'label' => __('Menu Color - Active', 'the-funk'),
        'section' => 'primarynav_styling',
        'priority' => 15,
        'settings' => 'thefunk_theme_options[primarynav_color_active]'
    )));

	$wp_customize->add_setting('thefunk_theme_options[footer_background]', array(
        'default' => '#333',
        'type' => 'option',
		'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options'
    ));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'thefunk_theme_options[footer_background]', array(
        'label' => __('Background Color', 'the-funk'),
        'section' => 'footer_styling',
        'priority' => 5,
        'settings' => 'thefunk_theme_options[footer_background]'
    )));

	$wp_customize->add_setting('thefunk_theme_options[footer_title]', array(
        'default' => '#FFF',
        'type' => 'option',
		'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options'
    ));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'thefunk_theme_options[footer_title]', array(
        'label' => __('Title Color', 'the-funk'),
        'section' => 'footer_styling',
        'priority' => 10,
        'settings' => 'thefunk_theme_options[footer_title]'
    )));

	$wp_customize->add_setting('thefunk_theme_options[footer_color]', array(
        'default' => '#FFF',
        'type' => 'option',
		'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options'
    ));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'thefunk_theme_options[footer_color]', array(
        'label' => __('Text Color', 'the-funk'),
        'section' => 'footer_styling',
        'priority' => 15,
        'settings' => 'thefunk_theme_options[footer_color]'
    )));

	$wp_customize->add_setting('thefunk_theme_options[footer_link]', array(
        'default' => '#999',
        'type' => 'option',
		'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options'
    ));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'thefunk_theme_options[footer_link]', array(
        'label' => __('Link Color', 'the-funk'),
        'section' => 'footer_styling',
        'priority' => 20,
        'settings' => 'thefunk_theme_options[footer_link]'
    )));

	$wp_customize->add_setting('thefunk_theme_options[footer_link_hover]', array(
        'default' => '#FFF',
        'type' => 'option',
		'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options'
    ));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'thefunk_theme_options[footer_link_hover]', array(
        'label' => __('Link Color - Hover', 'the-funk'),
        'section' => 'footer_styling',
        'priority' => 25,
        'settings' => 'thefunk_theme_options[footer_link_hover]'
    )));

	$wp_customize->add_setting('thefunk_theme_options[homepage_sidebar]', array(
        'default' => '2',
		'sanitize_callback' => 'thefunk_sanitize_layout',
        'capability' => 'edit_theme_options'
    ));

    $wp_customize->add_control('thefunk_theme_options[homepage_sidebar]', array(
       'label' => __('Homepage', 'the-funk'),
        'section' => 'sidebars',
        'type' => 'select',
        'choices' => array(
            '1' => __('Left Sidebar', 'the-funk'),
            '2' => __('Right Sidebar', 'the-funk'),
            '3' => __('Full Width', 'the-funk')
        )
    ));
	
	$wp_customize->add_setting('thefunk_theme_options[posts_sidebar]', array(
        'default' => '2',
		'sanitize_callback' => 'thefunk_sanitize_layout',
        'capability' => 'edit_theme_options'
    ));

    $wp_customize->add_control('thefunk_theme_options[posts_sidebar]', array(
       'label' => __('Posts', 'the-funk'),
        'section' => 'sidebars',
        'type' => 'select',
        'choices' => array(
            '1' => __('Left Sidebar', 'the-funk'),
            '2' => __('Right Sidebar', 'the-funk'),
            '3' => __('Full Width', 'the-funk')
        )
    ));
	
	$wp_customize->add_setting('thefunk_theme_options[pages_sidebar]', array(
        'default' => '2',
		'sanitize_callback' => 'thefunk_sanitize_layout',
        'capability' => 'edit_theme_options'
    ));

    $wp_customize->add_control('thefunk_theme_options[pages_sidebar]', array(
       'label' => __('Pages', 'the-funk'),
        'section' => 'sidebars',
        'type' => 'select',
        'choices' => array(
            '1' => __('Left Sidebar', 'the-funk'),
            '2' => __('Right Sidebar', 'the-funk'),
            '3' => __('Full Width', 'the-funk')
        )
    ));

	$wp_customize->add_setting('thefunk_theme_options[footer_widgets_section]', array(
        'default' => '1',
		'sanitize_callback' => 'thefunk_sanitize_layout',
        'capability' => 'edit_theme_options'
    ));

    $wp_customize->add_control('thefunk_theme_options[footer_widgets_section]', array(
        'label' => __('Footer Widgets', 'the-funk'),
        'section' => 'footer',
        'type' => 'select',
        'choices' => array(
            '1' => __('Yes', 'the-funk'),
            '2' => __('No', 'the-funk')
        )
    ));

	function thefunk_sanitize_layout( $layout ) {
		if ( ! in_array( $layout, array( '1', '2', '3' ) ) ) {
			$layout = '1';
		}

		return $layout;
    }
    
	$wp_customize->add_setting('thefunk_theme_options[footer_credits_section]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'thefunk_sanitize_text'
    ));

	$wp_customize->add_control('thefunk_theme_options[footer_credits_section]', array(
        'label' => __('Footer Credits', 'the-funk'),
        'section' => 'footer',
        'type' => 'textarea'
    ));
		
	$wp_customize->add_setting('thefunk_theme_options[custom_css_section]', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'thefunk_sanitize_text'
    ));
        
    $wp_customize->add_control('thefunk_theme_options[custom_css_section]', array(
        'label' => __('Put your CSS code here without <style> tags:', 'the-funk'),
        'section' => 'custom_css_styling',
        'type' => 'textarea'
    ));

    function thefunk_sanitize_text( $textbox ) {
        return wp_kses_post( force_balance_tags( $textbox ) );
    }
}
add_action('customize_register', 'thefunk_customize_register');

?>