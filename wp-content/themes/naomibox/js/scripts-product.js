/* --------------------
  START mini cart
-------------------- */
(function(){
const cartAction = actionName => {
  return new Promise((resolve, reject) => {
    const
      formData = new FormData(),
      request = new XMLHttpRequest()

    formData.append("action", actionName)
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

    document.querySelector('.loader').classList.remove('loader-hide');

    cartActionAdd(id, q)
      .then(() => cartAction('getItemsCount'))
      .then(itemsCount => {
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
        document.querySelector('.loader').classList.add('loader-hide');

        quantity();

      });

  }
});
const cartActionRemove = (id, q) => {
  return new Promise((resolve, reject) => {
    const
      formData = new FormData(),
      request = new XMLHttpRequest()

    formData.append("action", 'removeFromCart')
    formData.append("p_id", id)

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

let removeFromCart = () => {
  let removeFromCart = document.querySelectorAll('.removeFromCart');
  removeFromCart.forEach(remove => {
    remove.addEventListener('click', e => {
      e.preventDefault();

      let id = e.target.dataset.product_id;

      document.getElementById('product-'+id).remove();

      cartActionRemove(id)
        .then(() => cartAction('getTotal'))
        .then(getTotal => {
          const cartTotals = document.querySelectorAll('.cartTotal');
          cartTotals.forEach(total => {
            total.innerHTML = getTotal;
          })
        })
        .then(() => cartAction('getDiscount'))
        .then(getDiscount => {
          const cartDiscounts = document.querySelectorAll('.cartDiscount');
          cartDiscounts.forEach(cartDiscount => {
            cartDiscount.innerHTML = getDiscount;
          });

          let cartItems = document.querySelectorAll('.cart-item');
          if(cartItems.length === 0){
            document.querySelector('.cart').classList.add('cart-hide');
            document.querySelector('.cart-button').classList.add('cart-button-hide');
          }
          quantity();
        })

    });
  });
}
removeFromCart();
let timerFlag = true;
const openCart = document.querySelectorAll('.openCart');
openCart.forEach(btn => {
  btn.onclick = () => {

    document.querySelector('.discount').classList.add('discount-hide');

    document.querySelector('.loader').classList.remove('loader-hide');

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
        document.querySelector('.loader').classList.add('loader-hide');
      })
    if(timerFlag) timer_counter(document.querySelector('[data-time]'));

    quantity();

  }
});
const closeCart = document.querySelectorAll('.closeCart');
closeCart.forEach(btn => {
  btn.onclick = e => {
    e.preventDefault();
    document.querySelector('.cart').classList.add('cart-hide');
  }
});
const closeDiscount = document.querySelectorAll('.closeDiscount');
closeDiscount.forEach(close => {
  close.addEventListener('click', e => {
    e.preventDefault();
    document.querySelector('.discount').classList.add('discount-hide');
  });
});
})();
/* --------------------
  END mini cart
-------------------- */