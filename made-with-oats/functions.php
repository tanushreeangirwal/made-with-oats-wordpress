<?php
/**
 * Made With Oats Theme Functions and Definitions
 *
 * @package Made_With_Oats
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

define( 'MADE_WITH_OATS_VERSION', '2.2.0' );
define( 'MADE_WITH_OATS_DIR', get_template_directory() );
define( 'MADE_WITH_OATS_URI', get_template_directory_uri() );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function made_with_oats_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    // Custom Logo support
    add_theme_support( 'custom-logo', array(
        'height'      => 160,
        'width'       => 160,
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    // Switch default core markup for search form, comment form, and comments to HTML5.
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Register primary navigation menus
    register_nav_menus( array(
        'primary-menu'   => esc_html__( 'Primary Desktop Menu', 'made-with-oats' ),
        'mobile-menu'    => esc_html__( 'Mobile Drawer Menu', 'made-with-oats' ),
        'footer-quick'   => esc_html__( 'Footer Quick Links', 'made-with-oats' ),
        'footer-shop'    => esc_html__( 'Footer Shop Links', 'made-with-oats' ),
        'footer-care'    => esc_html__( 'Footer Customer Care', 'made-with-oats' ),
    ) );

    // Declare WooCommerce Theme Support
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'made_with_oats_setup' );

/**
 * Enqueue scripts and styles.
 */
function made_with_oats_scripts() {
    // Google Fonts: Fraunces, Plus Jakarta Sans, Caveat
    wp_enqueue_style( 
        'made-with-oats-fonts', 
        'https://fonts.googleapis.com/css2?family=Caveat:wght@600&family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,500;0,9..144,600;0,9..144,700;1,9..144,400;1,9..144,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap', 
        array(), 
        null 
    );

    // Design system tokens
    wp_enqueue_style( 'made-with-oats-design-system', MADE_WITH_OATS_URI . '/assets/css/design-system.css', array(), MADE_WITH_OATS_VERSION );

    // Main header, footer & components
    wp_enqueue_style( 'made-with-oats-main', MADE_WITH_OATS_URI . '/assets/css/main.css', array( 'made-with-oats-design-system' ), MADE_WITH_OATS_VERSION );

    // Homepage section styles
    if ( is_front_page() || is_home() ) {
        wp_enqueue_style( 'made-with-oats-home', MADE_WITH_OATS_URI . '/assets/css/home.css', array( 'made-with-oats-main' ), MADE_WITH_OATS_VERSION );
    }

    // WooCommerce styles
    if ( class_exists( 'WooCommerce' ) ) {
        wp_enqueue_style( 'made-with-oats-woocommerce', MADE_WITH_OATS_URI . '/assets/css/woocommerce.css', array( 'made-with-oats-main' ), MADE_WITH_OATS_VERSION );
    }

    // Responsive rules
    wp_enqueue_style( 'made-with-oats-responsive', MADE_WITH_OATS_URI . '/assets/css/responsive.css', array( 'made-with-oats-main' ), MADE_WITH_OATS_VERSION );

    // Core Theme stylesheet
    wp_enqueue_style( 'made-with-oats-style', get_stylesheet_uri(), array(), MADE_WITH_OATS_VERSION );

    // Scripts
    wp_enqueue_script( 'made-with-oats-navigation', MADE_WITH_OATS_URI . '/assets/js/navigation.js', array(), MADE_WITH_OATS_VERSION, true );
    wp_enqueue_script( 'made-with-oats-woo', MADE_WITH_OATS_URI . '/assets/js/woocommerce-enhancements.js', array(), MADE_WITH_OATS_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'made_with_oats_scripts' );

/**
 * Sync WooCommerce Cart Count via AJAX
 */
function made_with_oats_cart_fragment( $fragments ) {
    ob_start();
    ?>
    <span class="cart-counter"><?php echo WC()->cart ? WC()->cart->get_cart_contents_count() : 0; ?></span>
    <?php
    $fragments['span.cart-counter'] = ob_get_clean();
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'made_with_oats_cart_fragment' );

/**
 * Load Template Helpers & Customizer
 */
require_once MADE_WITH_OATS_DIR . '/inc/template-tags.php';
require_once MADE_WITH_OATS_DIR . '/inc/customizer.php';
require_once MADE_WITH_OATS_DIR . '/inc/woocommerce-setup.php';
