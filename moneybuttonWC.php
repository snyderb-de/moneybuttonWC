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
        public function __construct() {
            $this->id = 'moneybutton'; // payment gateway plugin ID
            $this->icon = 'the icone URL will go here'; // TODO: make icon and then this is the URL of the icon for payment gateway on checkout page
            $this->has_fields = true; // for the use of custom credit card form fields
            $this->method_title = 'Pay with Moneybutton'; // TODO: make sure you can edit this later
            $this->method_description = 'Use Moneybutton to pay with BSV';

            // TODO: add subscriptions, refunds, save method
            $this->supports = array(
                'products'
            );

            // Method with all the options fields
            $this->init_form_fields();

            // Load the settings
            $this->init_settings();
            $this->title = $this->get_option( 'title' );
            $this->description = $this->get_option( 'description' );
            $this->enabled = $this->get_option( 'enabled' );
            $this->testmode = 'yes' === $this->get_option( 'testmode' );
            $this->private_key = $this->testmode ? $this->get_option( 'test_private_key' ) : $this->get_option( 'private_key' );
            $this->publishable_key = $this->testmode ? $this->get_option( 'test_publishable_key' ) : $this->get_option( 'publishable_key' );

            //Save the settings
            add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));

            //We need custom JavaScript to obtain a token
            add_action( 'wp_enqueue_scripts', array($this, 'payment_scripts'));

            //register more webhooks here if needed

        }

        /* plugin options */
        public function  init_form_fields() {
            $this->form_fields = array(
                'enabled' => array(
                    'title' => 'Enable/Disable',
                    'label' => 'Activate Moneybutton Payment Gateway',
                    'type' => 'checkbox',
                    'description' => 'This allows for the use of Moneybutton as a payment method',
                    'default' => 'no',
                    ),
                'title' => array(
                    'title' => 'Title',
                    'type' => 'text',
                    'description' => 'This controls the title that the user will see on the Front End',
                    'default' => 'Moneybutton',
                    'desc_tip' => true,
                    ),
                'description' => array(
                    'title' => 'Description',
                    'type' => 'text area',
                    'description' => 'This is the description of the gateway',
                    'default' => 'Pay with Moneybutton',
                    ),
                'testmode' => array (
                    'title' => 'Test Mode',
                    'label' => 'Enable Test Mode',
                    'type' => 'checkbox',
                    'description' => 'This is to put the payment gateway into test mode using test API keys',
                    'default' => 'yes',
                    'desc_tip' => true,
                    ),
                'test_publishable_key' => array(
                    'title' => 'Test Publishable Key',
                    'type' => 'text',
                    ),
                'test_private_key' => array(
                    'title' => 'Test Private Key',
                    'type' => 'text',
                    ),
                'publishable_key' => array(
                    'title' => 'Live Publishable Key',
                    'type' => 'text',
                    ),
                'private_key' => array(
                    'title' => 'Live Private Key',
                    'type' => 'password',
                    )
                );
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
