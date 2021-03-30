<div class="cart cart-hide">
  <div class="cart-wrap">
    <button class="cart-close closeCart"><i class="fas fa-times"></i></button>
    <h3>Basket</h3>
    <div class="cart-reserve">Items reserved for <span data-time="30">30:00</span> min</div>
    <div class="cart-items cartItems">
      <?php echo theCartItems(); ?>
    </div>

    <div class="cart-discount">
      Discount:
      <span class="cartDiscount"><?php echo theDiscount(); ?></span>
    </div>

    <div class="cart-shipping">
      Express Delivery (2-4 working days):
      <span>£5,98</span>
    </div>

    <div class="cart-total">
      Order Total:
      <span class="cartTotal"><?php echo theTotal(); ?></span>
    </div>
    <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="btn btn-add">SECURE CHECKOUT</a>
    <button class="btn btn-link closeCart">Continue shopping</button>
  </div>
</div>
<button class="cart-button openCart <?php if(theItemsCount() == 0){ echo "cart-button-hide"; } ?>" >
  <i class="fas fa-shopping-cart"></i>
  <span class="cartTotal"><?php echo theTotal(); ?></span>
</button>