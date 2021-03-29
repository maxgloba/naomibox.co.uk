const cartActionAdd = (id, q) => {
  return new Promise((resolve, reject) => {
    const
      formData = new FormData(),
      request = new XMLHttpRequest()

    formData.append("action", 'addToCart')
    formData.append("p_id", id)
    formData.append("p_q", q)

    request.open('POST', data.ajax, true)

    request.onload = function(){
      if (this.status >= 200 && this.status < 400) {
        resolve(this.response)
      }
    }

    request.onerror = function(){
      reject(this.response)
    };

    request.send(formData)
  })
}

let addToCart = document.querySelectorAll('.addToCart');
addToCart.forEach(add => {
  add.onclick = e => {
    e.preventDefault();

    let q = e.target.dataset.quantity,
      id = e.target.dataset.product_id;

    cartActionAdd(id, q)
      .then(() => cartAction('getItemsCount'))
      .then(itemsCount => {
        addToCart = document.querySelectorAll('.addToCart');
        const discountSalesNums = document.querySelectorAll('.discount-sales .num');
        discountSalesNums.forEach(num => {
          num.classList.remove('num-active');
        });
        const cartDiscounts = document.querySelectorAll('.cartDiscount');
        if(itemsCount == 1){
          document.querySelector('.discount-sales .num-10').classList.add('num-active');
          document.querySelector('.discount').classList.remove('discount-hide');
          cartDiscounts.forEach(cartDiscount => {
            cartDiscount.innerHTML = '-10%';
          });
        } else if(itemsCount == 2){
          document.querySelector('.discount-sales .num-15').classList.add('num-active');
          document.querySelector('.discount').classList.remove('discount-hide');
          cartDiscounts.forEach(cartDiscount => {
            cartDiscount.innerHTML = '-15%';
          });
        } else if(itemsCount == 3){
          document.querySelector('.discount-sales .num-20').classList.add('num-active');
          document.querySelector('.discount').classList.remove('discount-hide');
          cartDiscounts.forEach(cartDiscount => {
            cartDiscount.innerHTML = '-20%';
          });
        } else {
          document.querySelector('.openCart').click();
        }
      })
      .then(() => cartAction('getTotal'))
      .then(getTotal => {
        const cartTotals = document.querySelectorAll('.cartTotal');
        cartTotals.forEach(total => {
          total.innerHTML = getTotal;
        });
        document.querySelector('.cart-button').classList.remove('cart-button-hide');
        quantity();
      });
  }
});