<?php
    // Theme customization
    function themename_customize_register($wp_customize) {
        // Remove some default sections and controls
        $wp_customize->remove_section('static_front_page');
        $wp_customize->remove_section('header_image');
        $wp_customize->remove_section('colors');

        // Homepage area added
        $wp_customize->add_section('homepage_settings', array(
            'title'             => ('Homepage Settings'),
        ));

        // Social Media - Facebook
             $wp_customize->add_setting('rbf_social', array(
                 'default'           => '',
                 'capability'        => 'edit_theme_options',
                 'type'          	  => 'url'
             ));

         $wp_customize->add_control( 'rbf_social_facebook', array(
            'label'    => __('Facebook Link'),
            'section'  => 'title_tagline',
            'setting'   => 'rbf_social',
            'description' => 'Link to band Facebook page.',
            'input_attrs' => array(
                'placeholder' => __( 'http://www.google.com' ),
              )
        ));


         $wp_customize->add_control( 'rbf_social_twitter', array(
            'label'    => __('Twitter Link'),
            'section'  => 'title_tagline',
            'setting'   => 'rbf_social',
            'description' => 'Link to band Twitter page.',
            'input_attrs' => array(
                'placeholder' => __( 'http://www.google.com' ),
              )
        ));

        // Site header logo added into customization menu
        $wp_customize->add_setting('rbf_header_logo', array(
            'default'           => 'image.jpg',
            'capability'        => 'edit_theme_options',
            'type'          	  => 'theme_mod'
        ));

        $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'rbf_header_logo', array(
            'label'    => __('Header Logo'),
            'section'  => 'title_tagline',
            'settings' => 'rbf_header_logo',
            'description' => 'Used in the banner of the site.'
        )));

        // Adds shortcut for the header logo
        $wp_customize->selective_refresh->add_partial( 'rbf_header_logo', array(
            'selector' => '#rbf_header_logo',
            'render_callback'     => 'render_rbf_header_logo'
        ));


        foreach ($wp_customize->sections() as $section_key => $section_object ) {
            if($section_key === 'static_front_page') {
                echo "<pre>";
                 print_r($section_object);
                 echo "</pre>";
            }
             //print_r($section_key);
        }
    }

    function render_rbf_header_logo() {
       echo get_theme_mod('rbf_header_logo');
    }

    // Add theme customizations
    add_action('customize_register', 'themename_customize_register');

    // Add "Menus" into appearance menu
    add_theme_support( 'menus' );

    // Adds videos to customizer
    add_theme_support( 'custom-header', array(
     'video' => true,
    ) );

    // Add JS for mobile menu
    wp_enqueue_script('sa-header-menu-script', get_template_directory_uri() . "/js/rbf-mobile-menu.js", array('jquery'), null, true);

?>