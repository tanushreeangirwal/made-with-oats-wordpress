<?php
/**
 * Made With Oats Theme Customizer
 *
 * @package Made_With_Oats
 */

function made_with_oats_customize_register( $wp_customize ) {
    // 1. Announcement Bar Section
    $wp_customize->add_section( 'made_with_oats_announcements', array(
        'title'    => esc_html__( 'Announcement Bar', 'made-with-oats' ),
        'priority' => 30,
    ) );

    $wp_customize->add_setting( 'announcement_text_1', array(
        'default'           => 'Naturally Wholesome',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'announcement_text_1', array(
        'label'    => esc_html__( 'Announcement Message 1', 'made-with-oats' ),
        'section'  => 'made_with_oats_announcements',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'announcement_text_2', array(
        'default'           => 'Made in Small Batches',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'announcement_text_2', array(
        'label'    => esc_html__( 'Announcement Message 2', 'made-with-oats' ),
        'section'  => 'made_with_oats_announcements',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'announcement_text_3', array(
        'default'           => 'Pan India Delivery',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'announcement_text_3', array(
        'label'    => esc_html__( 'Announcement Message 3', 'made-with-oats' ),
        'section'  => 'made_with_oats_announcements',
        'type'     => 'text',
    ) );

    // 2. Hero Section
    $wp_customize->add_section( 'made_with_oats_hero', array(
        'title'    => esc_html__( 'Hero Section Settings', 'made-with-oats' ),
        'priority' => 35,
    ) );

    $wp_customize->add_setting( 'hero_eyebrow', array(
        'default'           => 'Naturally Wholesome',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'hero_eyebrow', array(
        'label'    => esc_html__( 'Hero Eyebrow Text', 'made-with-oats' ),
        'section'  => 'made_with_oats_hero',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'hero_headline_1', array(
        'default'           => 'Good Food',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'hero_headline_1', array(
        'label'    => esc_html__( 'Headline Line 1', 'made-with-oats' ),
        'section'  => 'made_with_oats_hero',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'hero_headline_2', array(
        'default'           => 'Brighter Days',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'hero_headline_2', array(
        'label'    => esc_html__( 'Headline Line 2 (Editorial Accent)', 'made-with-oats' ),
        'section'  => 'made_with_oats_hero',
        'type'     => 'text',
    ) );

    // 3. Contact & Social Links
    $wp_customize->add_section( 'made_with_oats_contact', array(
        'title'    => esc_html__( 'Contact & Social Links', 'made-with-oats' ),
        'priority' => 40,
    ) );

    $wp_customize->add_setting( 'contact_phone', array(
        'default'           => '+91 96193 49819',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'contact_phone', array(
        'label'    => esc_html__( 'Phone Number', 'made-with-oats' ),
        'section'  => 'made_with_oats_contact',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'contact_email', array(
        'default'           => 'madewithoats09@gmail.com',
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'contact_email', array(
        'label'    => esc_html__( 'Email Address', 'made-with-oats' ),
        'section'  => 'made_with_oats_contact',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'contact_whatsapp', array(
        'default'           => '918355869270',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'contact_whatsapp', array(
        'label'    => esc_html__( 'WhatsApp Number (Digits only with country code)', 'made-with-oats' ),
        'section'  => 'made_with_oats_contact',
        'type'     => 'text',
    ) );
}
add_action( 'customize_register', 'made_with_oats_customize_register' );
