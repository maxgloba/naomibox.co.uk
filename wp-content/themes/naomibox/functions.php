<?php

define('ROOT', get_template_directory_uri());
define('IMG', get_template_directory_uri() . '/img');

function TYPE(){
  global $post;
  return $post->post_type;
}

function replace_core_jquery_version() {
  wp_deregister_script( 'jquery' );
  wp_register_script( 'jquery', "https://code.jquery.com/jquery-3.1.1.min.js", array(), '3.1.1' );
}
add_action( 'wp_enqueue_scripts', 'replace_core_jquery_version' );

include('include/clear.php');

include('miniCart/cart-actions.php');

add_theme_support( 'menus' );

function front_scripts() {

// Index page
  if( is_page_template( 'templates/page-index.php' ) ){
    wp_enqueue_style( 'styles', get_template_directory_uri().'/css/styles-index.css');
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts-index.js', false, false, 'in_footer');
  }

  // Single page
  if( is_single() && TYPE() === 'product' ){
    wp_enqueue_style( 'styles', get_template_directory_uri().'/css/styles-product.css');
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts-product.js', false, false, 'in_footer');
  }

// Thank you page
  if( is_order_received_page() ){ }

// Checkout
  if( is_checkout() ){
    wp_enqueue_style( 'styles', get_template_directory_uri().'/css/styles-checkout.css');
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts-checkout.js', false, false, 'in_footer');
  }

// Cart
  if( is_cart() ){}

// Single page
  if( is_single() ){ }

//Default page template
  if( is_page_template('default') ){ }

// 404 page
  if( is_404() ){
    wp_enqueue_style( 'styles', get_template_directory_uri().'/css/styles-404.css');
  }

  if( is_page_template( 'templates/page-thank_you.php' ) ){
    wp_enqueue_style( 'styles', get_template_directory_uri().'/css/styles-thank_you.css');
  }

  if( is_checkout() && empty( $wp->query_vars['order-received'] ) ){
    wp_enqueue_style( 'styles', get_template_directory_uri().'/css/styles-thank_you.css');
  }

}
add_action( 'wp_enqueue_scripts', 'front_scripts' );

function front_variables(){
  wp_localize_script( 'scripts', 'data',
    array(
      'ajax' => admin_url('admin-ajax.php')
    )
  );
}
add_action( 'wp_enqueue_scripts', 'front_variables' );


// remove_theme_support( 'wc-product-gallery-lightbox' );
// remove_theme_support( 'wc-product-gallery-zoom' );
// add_action( 'after_setup_theme', 'remove_pgz_theme_support', 100 );
// function remove_pgz_theme_support() {
//   remove_theme_support( 'wc-product-gallery-zoom' );
// }


/* --------------------
  START discount
-------------------- */
// add_action('woocommerce_before_cart_table', 'discount_when_produts_in_cart');
// function discount_when_produts_in_cart(){
//   global $woocommerce;

//   $items_count = $woocommerce->cart->cart_contents_count;

//   $woocommerce->cart->remove_coupons();

//   if( $items_count == 2 ) {
//     $coupon_code = 'puzzles_2';
//     $woocommerce->cart->add_discount( sanitize_text_field( $coupon_code ) );
//   } else if( $items_count == 3 ){
//     $coupon_code = 'puzzles_3';
//     $woocommerce->cart->add_discount( sanitize_text_field( $coupon_code ) );
//   } else if( $items_count >= 4 ){
//     $coupon_code = 'puzzles_4';
//     $woocommerce->cart->add_discount( sanitize_text_field( $coupon_code ) );
//   }
// }
/* --------------------
  END discount
-------------------- */




add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');
function custom_override_checkout_fields($fields){
 unset($fields['billing']['billing_address_2']);
 unset($fields['billing']['billing_company']);

 $fields['billing']['billing_first_name']['placeholder'] = 'First Name';
 $fields['billing']['billing_last_name']['placeholder'] = 'Last Name';
 $fields['billing']['billing_address_1']['placeholder'] = 'Address';
 $fields['billing']['billing_city']['placeholder'] = 'City';
 $fields['billing']['billing_state']['placeholder'] = 'State';
 $fields['billing']['billing_postcode']['placeholder'] = 'Postcode';
 $fields['billing']['billing_email']['placeholder'] = 'Email';
 $fields['billing']['billing_phone']['placeholder'] = 'Phone';

 $fields['billing']['billing_first_name']['label'] = '';
 $fields['billing']['billing_last_name']['label'] = '';
 $fields['billing']['billing_country']['label'] = '';
 $fields['billing']['billing_address_1']['label'] = '';
 $fields['billing']['billing_city']['label'] = '';
 $fields['billing']['billing_state']['label'] = '';
 $fields['billing']['billing_postcode']['label'] = '';
 $fields['billing']['billing_email']['label'] = '';
 $fields['billing']['billing_phone']['label'] = '';

 return $fields;
}

remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
add_action( 'woocommerce_checkout_before_order_review', 'woocommerce_checkout_coupon_form' );

remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
add_action( 'woocommerce_checkout_mg_payment', 'woocommerce_checkout_payment' );


function my_theme_modify_stripe_fields_styles( $styles ) {
    return array(
        'base' => array(
            'lineHeight'     => '30px',
            'color'         => '#333',
            'fontSize'      => '16px',
            '::placeholder' => array(
                'color' => '#9e9e9e',
            ),
        ),
    );
}

add_filter( 'wc_stripe_elements_styling', 'my_theme_modify_stripe_fields_styles' );



add_filter( 'woocommerce_order_button_text', 'misha_custom_button_text' );

function misha_custom_button_text( $button_text ) {
   return 'Pay Securely Now'; // new text is here
}





/*--------------------*/
function redirect_mg() {
  global $woocommerce;
  if( is_cart() && $woocommerce->cart->is_empty() ){
    wp_redirect(home_url());
    exit();
  } else if( is_cart() && !$woocommerce->cart->is_empty() ){
    wp_redirect(wc_get_checkout_url());
    exit();
  } else if( is_checkout() && !empty( is_wc_endpoint_url('order-received') ) ){
    wp_redirect( get_permalink(131) );
    exit();
  }
}
add_action('template_redirect', 'redirect_mg');