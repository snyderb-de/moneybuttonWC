<?php

/**
 *
 * Plugin Name: moneybuttonWC
 * URI: TBD
 * Description: a plugin to use Money Button as a payment method for WooCommerce
 * Author: Bryan Snyder
 * Author URI: https://bryansnyder.dev
 * Version: 0.0.1
 *
 */

/**
 *
 * register the class as a gateway
 *
 */

add_filter('woocommerce_payment_gateways', 'mbwc_class');
function mbwc_class($gateways) {
    $gateways[] = 'MBWC_Gateway';
    return $gateways;
}

/**
 *
 * The class is inside the action hook: plugins_loaded
 *
 */

 add_action('plugins_loaded', 'mbwc_init');
 function mbwc_init() {
    class MBWC_Gateway extends WC_Payment_Gateway {
        /**
         * TODO: create constructor
         * TODO: create options
         * TODO: create payment fields
         * TODO: payment scripts
         * TODO: fields validation
         * TODO: add webhooks -> check MB docs
         */

        /* constructor */
        public function __constructor($class, $version, $parent_class) {

        }

        /* plugin options */
        public function  init_form_fields() {

        }

        /* payment fields */
        public function payment_fields() {

        }

        /* custom CSS & JS to override standard CC fields */
        public function payment_scripts() {

        }

        /* validate fields */
        public function validate_fields() {

        }

        /* process payment */
        public function process_payment($order_id) {

        }

        /* webhook might be needed */
        public function webhook() {

        }
    }
 }
