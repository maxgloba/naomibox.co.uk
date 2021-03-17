<?php
/* --------------------
  START getTotal
-------------------- */

function theTotal(){
  global $woocommerce;
  return $woocommerce->cart->total;
}
function getTotal(){
  echo theTotal();
  wp_die();
}
add_action('wp_ajax_getTotal', 'getTotal');
add_action('wp_ajax_nopriv_getTotal', 'getTotal');
/* --------------------
  END getTotal
-------------------- */
/* --------------------
  START getCartItems
-------------------- */
function theCartItems() {
  global $woocommerce;
  $items = $woocommerce->cart->get_cart();
  $items_html = ' ';
  foreach($items as $item => $values) {
    $p =  wc_get_product( $values['data']->get_id());
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $values['product_id'] ), 'thumbnail' );
    $price = get_post_meta($values['product_id'] , '_price', true);
    $items_html .= '<div class="cart-item" id="product-'.$values['product_id'].'">';
      $items_html .= '<button class="cart-remove removeFromCart" data-product_id="'.$values['product_id'].'">+</button>';
      $items_html .= '<img src="'. $image[0] .'">';
      $items_html .= '<div class=".info">';
        $items_html .= '<h4>'.$p->get_title().'</h4>';
        $items_html .= '<div class="excerpt">'. $p->get_short_description() .'</div>';
        // $items_html .= '<div class="quantity"><button class="quantity-minus">-</button><span class="quantity-num">'. $values['quantity'] .'</span><button class="quantity-plus addToCart" data-product_id="'.$values['product_id'].'" data-quantity="1">+</button><span class="price">'. $price .'</span></div>';
        $items_html .= '<div class="quantity"><span class="quantity-num" style="width:80px;">Quantity: '. $values['quantity'] .'</span><span class="price">'. $price .'</span></div>';
      $items_html .= '</div>';
    $items_html .= '</div>';
  }
  return $items_html;
}
function getCartItems() {
  echo theCartItems();
  wp_die();
}
add_action('wp_ajax_getCartItems', 'getCartItems');
add_action('wp_ajax_nopriv_getCartItems', 'getCartItems');
/* --------------------
  END getCartItems
-------------------- */
/* --------------------
  START addToCart
-------------------- */
function addToCart(){
  global $woocommerce;

  $woocommerce->cart->remove_coupons();
  wc_clear_notices();

  $p_id = $_POST['p_id'];
  $p_q = $_POST['p_q'];

  if( $woocommerce->cart->add_to_cart( $product_id = $p_id, $quantity = $p_q ) ){

    $items_count = $woocommerce->cart->cart_contents_count;

    if( $items_count == 2 ) {
      $coupon_code = 'puzzles_2';
    } else if( $items_count == 3 ){
      $coupon_code = 'puzzles_3';
    } else if( $items_count >= 4 ){
      $coupon_code = 'puzzles_4';
    }

    $woocommerce->cart->add_discount( sanitize_text_field( $coupon_code ) );
    wc_clear_notices();

    return 'Added product with id: '.$p_id;

  }

  wp_die();
}
add_action('wp_ajax_addToCart', 'addToCart');
add_action('wp_ajax_nopriv_addToCart', 'addToCart');
/* --------------------
  END addToCart
-------------------- */
/* --------------------
  START removeFromCart
-------------------- */
function removeFromCart(){
  global $woocommerce;

  $woocommerce->cart->remove_coupons();

  $p_id = $_POST['p_id'];

  foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) {
    if($cart_item['product_id'] == $p_id ){
      if( $woocommerce->cart->remove_cart_item( $cart_item_key ) ){
        $items_count = $woocommerce->cart->cart_contents_count;

        if( $items_count == 2 ) {
          $coupon_code = 'puzzles_2';
        } else if( $items_count == 3 ){
          $coupon_code = 'puzzles_3';
        } else if( $items_count >= 4 ){
          $coupon_code = 'puzzles_4';
        }

        $woocommerce->cart->add_discount( sanitize_text_field( $coupon_code ) );

        return 'Removed product with id: '.$p_id;
      }
    }
  }
  wp_die();
}
add_action('wp_ajax_removeFromCart', 'removeFromCart');
add_action('wp_ajax_nopriv_removeFromCart', 'removeFromCart');
/* --------------------
  END removeFromCart
-------------------- */
/* --------------------
  START CartDiscount
-------------------- */
function theDiscount(){
  global $woocommerce;
  $items_count = $woocommerce->cart->cart_contents_count;
  $discount = false;
  if( $items_count == 1 ) {
    $discount = '0%';
  } else if( $items_count == 2 ) {
    $discount = '-10%';
  } else if( $items_count == 3 ){
    $discount = '-15%';
  } else if( $items_count >= 4 ){
    $discount = '-20%';
  }
  return $discount;
}
function getDiscount(){
  echo theDiscount();
  wp_die();
}
add_action('wp_ajax_getDiscount', 'getDiscount');
add_action('wp_ajax_nopriv_getDiscount', 'getDiscount');
/* --------------------
  END CartDiscount
-------------------- */
/* --------------------
  START itemsCount
-------------------- */
function theItemsCount(){
  global $woocommerce;
  return $woocommerce->cart->cart_contents_count;
}
function getItemsCount(){
  echo theItemsCount();
  wp_die();
}
add_action('wp_ajax_getItemsCount', 'getItemsCount');
add_action('wp_ajax_nopriv_getItemsCount', 'getItemsCount');
/* --------------------
  END CartDiscount
-------------------- */
