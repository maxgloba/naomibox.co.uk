const openCart = document.querySelectorAll('.openCart');
openCart.forEach(btn => {
  btn.onclick = () => {

    document.querySelector('.discount').classList.add('discount-hide');

    cartAction('getTotal')
      .then(res => {
        const cartTotals = document.querySelectorAll('.cartTotal');
        cartTotals.forEach(total => {
          total.innerHTML = res;
        })
      })
      .then(() => cartAction('getCartItems'))
      .then(res => {
        document.querySelector('.cartItems').innerHTML = res;
        removeFromCart();
      })
      .then(() => cartAction('getDiscount'))
      .then(res => {
        const cartDiscounts = document.querySelectorAll('.cartDiscount');
        cartDiscounts.forEach(cartDiscount => {
          cartDiscount.innerHTML = res;
        });
      })
      .then(() => {
        document.querySelector('.cart').classList.remove('cart-hide');
      })
  }
});