document.querySelector('.openCart').onclick = () => {
  callAction('getTotal')
    .then(res => {
      document.querySelector('.cartTotal').innerHTML = res;
    })

    .then(res => callAction('getCartCount'))
      .then(res => {
        console.log(res);
      })

    .then(res => callAction('getCartItems'))
      .then(res => {
        document.querySelector('.cartItems').innerHTML = res;
      })

    .then(res => {
      document.querySelector('.cart').classList.remove('cart-hide');
    })
}