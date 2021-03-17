<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
  echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
  return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-6 col-left">
      <h3 class="form-title">STEP 1: DELIVERY ADDRESS</h3>
      <div class="form-yellow">
        <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
        <?php do_action( 'woocommerce_checkout_billing' ); ?>
        <?php do_action( 'woocommerce_checkout_shipping' ); ?>
        <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
      </div>
      <h3 class="form-title">STEP 2: PAYMENT METHOD</h3>
      <div class="form-yellow">
        <?php do_action( 'woocommerce_checkout_mg_payment' ); ?>
        <div class="ssl-discreet text-center"><i class="fa fa-lock"></i> 256-bit SSL Encrypted Checkout</div>
        <div class="text-center img-verified"><img src="<?php echo IMG; ?>/verified.png" alt=""></div>
        <div class="seal-container">
          <div class="seal-data-guarantee">
            <div class="seal-title">Our Guarantee</div>
            <div class="seal-content">
                <div><i class="fa fa-check-square"></i> No Hidden Fees</div>
                <div><i class="fa fa-check-square"></i> 30-Day Moneyback Guarantee</div>
            </div>
          </div>
        </div>
        <div class="seal-container">
          <div class="seal-image">
              <img src="<?php echo IMG; ?>/60-day.png">
          </div>
          <div class="seal-data">
              <div class="seal-title">30-Day No-Quibble Return</div>
              <div class="seal-content">We want you to be delighted with your Naomi Box wooden puzzle. If for any reason you change your mind about your purchase, let us know within 30 days of placing the order. We’ll talk you through how to return the item and obtain a refund - no quibbles, no fuss. Your satisfaction is our top priority.</div>
          </div>
        </div>
        <div class="seal-container">
          <div class="seal-image">
              <img src="<?php echo IMG; ?>/lock.png">
          </div>
          <div class="seal-data">
              <div class="seal-title">SHOP WITH CONFIDENCE</div>
              <div class="seal-content">Naomibox.co.uk is Safe &amp; Secure Guaranteed!<br>You'll pay nothing if unauthorized charges are made to your credit card as a result of shopping at Naomibox.co.uk</div>
          </div>
        </div>
        <div class="seal-container">
          <div class="seal-image">
              <img src="<?php echo IMG; ?>/shield.png">
          </div>
          <div class="seal-data">
              <div class="seal-title">YOUR PRIVACY IS IMPORTANT</div>
              <div class="seal-content">All information is encrypted and transmitted without risk using a Secure Socket Layer (SSL) protocol.</div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-right">
      <div id="customer_details">
        <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
        <div class="coupon"><?php do_action( 'woocommerce_checkout_before_order_review' ); ?></div>
        <?php do_action( 'woocommerce_checkout_order_review' ); ?>
        <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

        <div class="reviews hidden-xs">

                            <div class="review">
                                <div class="review-img">
                                    <img src="<?php echo IMG; ?>/user-w.png" alt="">
                                </div>
                                <div class="review-body">
                                    <div class="review-header">
                                        <div class="review-attr">
                                            <span class="review-name">Diana</span> |
                                            <span class="review-verified"><i class="fa fa-check"></i> Verified Review</span>
                                            <span class="review-rate">
                                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="review-text">
                                        This was bought as a gift, so I never actually got to solve the jigsaw. However, the product is very beautiful and the person who received it was pleased.
                                    </div>
                                </div>
                            </div>


                            <div class="review">
                                <div class="review-img">
                                    <img src="<?php echo IMG; ?>/user-w.png" alt="">
                                </div>
                                <div class="review-body">
                                    <div class="review-header">
                                        <div class="review-attr">
                                            <span class="review-name">Lisa</span> |
                                            <span class="review-verified"><i class="fa fa-check"></i> Verified Review</span>
                                            <span class="review-rate">
                                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="review-text">
                                        I have had so much fun putting this puzzle together! I love all the unique pieces and the colors are beautiful!
                                    </div>
                                </div>
                            </div>


                            <div class="review">
                                <div class="review-img">
                                    <img src="<?php echo IMG; ?>/user-w.png" alt="">
                                </div>
                                <div class="review-body">
                                    <div class="review-header">
                                        <div class="review-attr">
                                            <span class="review-name">Alana</span> |
                                            <span class="review-verified"><i class="fa fa-check"></i> Verified Review</span>
                                            <span class="review-rate">
                                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="review-text">
                                        Absolutely amazing. Arrived so quickly and looks beautiful. Have already recommended for friends to buy as gifts for Christmas.
                                    </div>
                                </div>
                            </div>


                            <div class="review">
                                <div class="review-img">
                                    <img src="<?php echo IMG; ?>/user-w.png" alt="">
                                </div>
                                <div class="review-body">
                                    <div class="review-header">
                                        <div class="review-attr">
                                            <span class="review-name">Elizabeth</span> |
                                            <span class="review-verified"><i class="fa fa-check"></i> Verified Review</span>
                                            <span class="review-rate">
                                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="review-text">
                                        The puzzle is absolutely beautiful! The colors are perfect and it even comes in a beautiful wood box for storage with the picture of the finished puzzle on the top for reference. The shipping was quick, too. I'm very happy with my purchase from this shop.
                                    </div>
                                </div>
                            </div>

                        </div>

      </div>
    </div>
  </div>
</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
