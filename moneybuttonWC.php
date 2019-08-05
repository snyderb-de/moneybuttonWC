<?php

/**
 * Plugin Name: moneybuttonWC
 * URI: TBD
 * Description: a plugin to use Money Button as a payment method for WooCommerce
 * Author: Bryan Snyder
 * Author URI: https://bryansnyder.dev
 * Version: 0.0.1
 */

/**
 *
 * register the class as a gateway
 *
 */

add_filter('woocommerce_payment_gateways', 'moneybuttonWC_as_class');
function moneybuttonWC_as_class($gateways) {
    $gateways[] = 'moneybuttonWC_gateway';
    return $gateways;
}

/**
 *
 * The class is inside the action hook: plugins_loaded
 *
 */

