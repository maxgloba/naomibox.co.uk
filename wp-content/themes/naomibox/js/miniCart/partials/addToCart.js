const cartActionAdd = (id, q) => {
  return new Promise((resolve, reject) => {
    const
      formData = new FormData(),
      request = new XMLHttpRequest()

    formData.append("action", 'addToCart')
    formData.append("p_id", id)
    formData.append("p_q", q)

    request.open('POST', data.ajax, true)

    request.onload = () => {
      if (this.status >= 200 && this.status < 400) {
        resolve(this.response)
      }
    }

    request.onerror = () => {
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
      .then(res => {
        console.log(res);
        e.target.classList.add('added');
      })
  }
});