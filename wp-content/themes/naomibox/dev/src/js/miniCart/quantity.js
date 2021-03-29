let quantity = () => {
  let quantityPlus = document.querySelectorAll('.quantity-plus');
  quantityPlus.forEach(btn => {
    btn.addEventListener('click', e => {
      e.preventDefault();
      console.dir(e.target);
    });
  });
  let quantityMinus = document.querySelectorAll('.quantity-minus');
  quantityMinus.forEach(btn => {
    btn.addEventListener('click', e => {
      e.preventDefault();
      console.dir(e.target);
    });
  });
  console.log('quantity');
}
quantity();