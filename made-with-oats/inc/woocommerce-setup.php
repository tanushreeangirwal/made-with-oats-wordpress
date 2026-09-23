<?php
/**
 * WooCommerce Specific Configuration and Custom Hooks
 * Strict compliance with Made With Oats brand rules.
 *
 * @package Made_With_Oats
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Remove default WooCommerce wrappers and replace with Made With Oats layout
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

function made_with_oats_wrapper_start() {
    echo '<div class="container woo-main-container" style="padding-top: var(--space-2xl); padding-bottom: var(--space-4xl);">';
}
add_action( 'woocommerce_before_main_content', 'made_with_oats_wrapper_start', 10 );

function made_with_oats_wrapper_end() {
    echo '</div>';
}
add_action( 'woocommerce_after_main_content', 'made_with_oats_wrapper_end', 10 );

/**
 * Disable Cash On Delivery (COD) strictly
 * Requirement: COD is NOT AVAILABLE. Do not display COD as a payment option.
 */
function made_with_oats_disable_cod_gateway( $available_gateways ) {
    if ( isset( $available_gateways['cod'] ) ) {
        unset( $available_gateways['cod'] );
    }
    return $available_gateways;
}
add_filter( 'woocommerce_available_payment_gateways', 'made_with_oats_disable_cod_gateway', 99 );

/**
 * Customize Sale Badge & Best Seller Badge
 */
function made_with_oats_custom_sale_badge() {
    return '<span class="badge-sale">' . esc_html__( 'SALE', 'made-with-oats' ) . '</span>';
}
add_filter( 'woocommerce_sale_flash', 'made_with_oats_custom_sale_badge' );

/**
 * Set Products Per Row and Page
 */
function made_with_oats_loop_columns() {
    return 4; // 4 columns grid matching editorial design
}
add_filter( 'loop_shop_columns', 'made_with_oats_loop_columns' );

function made_with_oats_loop_shop_per_page() {
    return 12;
}
add_filter( 'loop_shop_per_page', 'made_with_oats_loop_shop_per_page', 20 );

/**
 * Filter WooCommerce Currency Symbol to ₹
 */
function made_with_oats_currency_symbol( $currency_symbol, $currency ) {
    if ( 'INR' === $currency ) {
        return '₹';
    }
    return $currency_symbol;
}
add_filter( 'woocommerce_currency_symbol', 'made_with_oats_currency_symbol', 10, 2 );

/**
 * Shipping Calculation Rule:
 * Free shipping above ₹1299.
 * Standard Delivery: Maharashtra = ₹80 flat rate, Outside Maharashtra / Rest of India = ₹100 flat rate.
 */
function made_with_oats_custom_shipping_rates( $rates, $package ) {
    $free_threshold = 1299;
    $cart_subtotal  = WC()->cart ? WC()->cart->get_subtotal() : 0;
    $destination_state = isset( $package['destination']['state'] ) ? strtoupper( trim( $package['destination']['state'] ) ) : '';
    $is_maharashtra    = ( 'MH' === $destination_state || 'MAHARASHTRA' === $destination_state );

    foreach ( $rates as $rate_id => $rate ) {
        if ( 'flat_rate' === $rate->method_id ) {
            if ( $cart_subtotal >= $free_threshold ) {
                $rates[ $rate_id ]->cost  = 0;
                $rates[ $rate_id ]->label = __( 'Free Delivery (Pan India)', 'made-with-oats' );
            } elseif ( $is_maharashtra ) {
                $rates[ $rate_id ]->cost  = 80;
                $rates[ $rate_id ]->label = __( 'Standard Delivery &ndash; ₹80 (Maharashtra)', 'made-with-oats' );
            } else {
                $rates[ $rate_id ]->cost  = 100;
                $rates[ $rate_id ]->label = __( 'Standard Delivery &ndash; ₹100 (Rest of India)', 'made-with-oats' );
            }
        }
    }
    return $rates;
}
add_filter( 'woocommerce_package_rates', 'made_with_oats_custom_shipping_rates', 10, 2 );

/**
 * Phase 3 — Transactional Email Configuration
 * Match emails to the warm artisanal Made With Oats brand palette.
 */
function made_with_oats_custom_email_styles( $css ) {
    $custom_css = '
        #wrapper {
            background-color: #FAF6EE !important;
            padding: 35px 0 !important;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif !important;
        }
        #template_container {
            background-color: #FFFFFF !important;
            border: 1px solid #EBE4D8 !important;
            border-radius: 8px !important;
            box-shadow: 0 4px 16px rgba(33, 21, 16, 0.05) !important;
            overflow: hidden !important;
        }
        #template_header {
            background-color: #211510 !important;
            border-bottom: 3px solid #475437 !important;
            padding: 24px 30px !important;
        }
        #template_header h1 {
            color: #FAF6EE !important;
            font-family: "Playfair Display", Georgia, serif !important;
            font-size: 24px !important;
            font-weight: 500 !important;
            margin: 0 !important;
        }
        #template_body {
            background-color: #FFFFFF !important;
            color: #211510 !important;
            font-size: 15px !important;
            line-height: 1.6 !important;
        }
        #body_content table td {
            color: #5C4A3E !important;
            font-size: 14px !important;
            border-color: #F2ECE2 !important;
        }
        #body_content table th {
            color: #211510 !important;
            border-color: #EBE4D8 !important;
            font-family: "Playfair Display", Georgia, serif !important;
        }
        #template_footer {
            background-color: #FAF6EE !important;
            border-top: 1px solid #EBE4D8 !important;
            padding: 20px 30px !important;
        }
        #template_footer #credit {
            color: #5C4A3E !important;
            font-size: 13px !important;
            text-align: center !important;
        }
        .order-dispatch-note {
            background-color: #FAF6EE;
            border-left: 4px solid #475437;
            padding: 14px 18px;
            margin: 20px 0;
            border-radius: 0 6px 6px 0;
            color: #211510;
            font-size: 13.5px;
        }
    ';
    return $css . $custom_css;
}
add_filter( 'woocommerce_email_styles', 'made_with_oats_custom_email_styles', 99 );

/**
 * Phase 3 — Branded Email Footer Text with Support Links
 */
function made_with_oats_custom_email_footer_text( $text ) {
    return '<strong>Made With Oats</strong> &bull; Handcrafted in Small Batches &bull; Malad West, Mumbai 400095<br>' .
           'Need assistance? WhatsApp: <a href="https://wa.me/918355869270" style="color: #475437; font-weight: 600;">+91 83558 69270</a> &bull; ' .
           'Phone: <a href="tel:+919619349819" style="color: #475437; font-weight: 600;">+91 96193 49819</a> &bull; ' .
           'Email: <a href="mailto:madewithoats09@gmail.com" style="color: #475437;">madewithoats09@gmail.com</a>';
}
add_filter( 'woocommerce_email_footer_text', 'made_with_oats_custom_email_footer_text', 99 );

/**
 * Phase 3 — Add Delivery Timeline and Small-Batch Notice to Confirmation Emails
 */
function made_with_oats_add_email_order_meta( $order, $sent_to_admin, $plain_text, $email ) {
    if ( ! $sent_to_admin && 'customer_processing_order' === $email->id ) {
        echo '<div class="order-dispatch-note">';
        echo '<strong>🌿 Small-Batch Freshness Guarantee:</strong><br>';
        echo 'Your order will be freshly prepared and sealed. Expected delivery: <strong>5-7 business days</strong> within Maharashtra, and <strong>7-10 business days</strong> for the rest of India. You will receive a tracking link via SMS/email as soon as the courier partner receives your parcel.';
        echo '</div>';
    }
}
add_action( 'woocommerce_email_order_meta', 'made_with_oats_add_email_order_meta', 10, 4 );

