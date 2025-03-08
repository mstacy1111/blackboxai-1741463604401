<?php
function makers_momentum_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('hero_section', array(
        'title' => __('Hero Section', 'makers-momentum'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('hero_title', array(
        'default' => 'Empowering Handmade Sellers Through Digital Marketing',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_title', array(
        'label' => __('Hero Title', 'makers-momentum'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'Transform your handmade business with expert digital marketing strategies, templates, and courses designed specifically for craft sellers.',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_subtitle', array(
        'label' => __('Hero Subtitle', 'makers-momentum'),
        'section' => 'hero_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('hero_button_text', array(
        'default' => 'Explore Our Resources',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_button_text', array(
        'label' => __('Button Text', 'makers-momentum'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_button_url', array(
        'default' => '#services',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('hero_button_url', array(
        'label' => __('Button URL', 'makers-momentum'),
        'section' => 'hero_section',
        'type' => 'url',
    ));

    // About Section
    $wp_customize->add_section('about_section', array(
        'title' => __('About Section', 'makers-momentum'),
        'priority' => 40,
    ));

    $wp_customize->add_setting('about_title', array(
        'default' => 'About Us',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_title', array(
        'label' => __('About Title', 'makers-momentum'),
        'section' => 'about_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_content', array(
        'default' => 'At Maker\'s Momentum Mastery, we\'re passionate about helping handmade sellers succeed in the digital marketplace.',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('about_content', array(
        'label' => __('About Content', 'makers-momentum'),
        'section' => 'about_section',
        'type' => 'textarea',
    ));

    // Statistics
    $stats = array(
        'stat_1' => 'Satisfied Clients',
        'stat_2' => 'Digital Resources',
        'stat_3' => 'Success Rate'
    );

    foreach ($stats as $stat_id => $stat_label) {
        $wp_customize->add_setting($stat_id . '_number', array(
            'default' => '500+',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control($stat_id . '_number', array(
            'label' => sprintf(__('%s Number', 'makers-momentum'), $stat_label),
            'section' => 'about_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting($stat_id . '_label', array(
            'default' => $stat_label,
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control($stat_id . '_label', array(
            'label' => sprintf(__('%s Label', 'makers-momentum'), $stat_label),
            'section' => 'about_section',
            'type' => 'text',
        ));
    }

    // Social Media Links
    $wp_customize->add_section('social_links', array(
        'title' => __('Social Media Links', 'makers-momentum'),
        'priority' => 50,
    ));

    $social_platforms = array(
        'facebook' => 'Facebook',
        'twitter' => 'Twitter',
        'instagram' => 'Instagram',
        'linkedin' => 'LinkedIn'
    );

    foreach ($social_platforms as $platform => $label) {
        $wp_customize->add_setting($platform . '_url', array(
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control($platform . '_url', array(
            'label' => $label . ' URL',
            'section' => 'social_links',
            'type' => 'url',
        ));
    }

    // Contact Form
    $wp_customize->add_section('contact_section', array(
        'title' => __('Contact Section', 'makers-momentum'),
        'priority' => 60,
    ));

    $wp_customize->add_setting('contact_title', array(
        'default' => 'Get In Touch',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_title', array(
        'label' => __('Contact Title', 'makers-momentum'),
        'section' => 'contact_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('contact_form_id', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('contact_form_id', array(
        'label' => __('Contact Form 7 ID', 'makers-momentum'),
        'description' => __('Enter the ID of your Contact Form 7 form', 'makers-momentum'),
        'section' => 'contact_section',
        'type' => 'number',
    ));
}
add_action('customize_register', 'makers_momentum_customize_register');
