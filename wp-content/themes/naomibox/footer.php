    <?php if( is_front_page() ): ?>
      <footer class="main-footer">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="main-footer__logo">
                <img src="<?php echo IMG; ?>/logo-white.png" alt="">
                <span>Naomi Box</span>
              </div>
            </div>
            <div class="col">
              <h4>Contacts</h4>
              <ul>
                <li>
                  <a href="tel:08082710523">
                    <i class="far fa-phone"></i>
                    0808 271 0523
                  </a>
                </li>
                <li>
                  <a href="mailto:support@naomibox.co.uk">
                    <i class="far fa-envelope"></i>
                    support@naomibox.co.uk
                  </a>
                </li>
              </ul>
            </div>
            <div class="col">
              <h4>Pages</h4>
              <ul>
                <li><a href="#" data-popup="terms">Terms of service</a></li>
                <li><a href="#" data-popup="privacy">Privacy policy</a></li>
                <li><a href="#" data-popup="delivery">Delivery information</a></li>
                <li><a href="#" data-popup="refunds">Refunds and Returns</a></li>
                <li><a href="#" data-popup="contact">Contact Us</a></li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    <?php endif; ?>

    <?php if( is_checkout() ): ?>
      <footer class="main-footer">
        <div class="container">
          <div class="row">
            <div class="col">
              <h4>Pages</h4>
              <ul>
                <li><a href="#" data-popup="terms">Terms of service</a></li>
                <li><a href="#" data-popup="privacy">Privacy policy</a></li>
                <li><a href="#" data-popup="delivery">Delivery information</a></li>
                <li><a href="#" data-popup="refunds">Refunds and Returns</a></li>
                <li><a href="#" data-popup="contact">Contact Us</a></li>
              </ul>
            </div>
            <div class="col">
              <h4>Payments methods</h4>
              <ul>
                <li>
                  <i class="fab fa-cc-visa"></i>
                  <i class="fab fa-cc-mastercard"></i>
                  <i class="fab fa-cc-amex"></i>
                  <i class="fab fa-cc-discover"></i>
                </li>
              </ul>
            </div>
            <div class="col">
              <h4>Guarantee</h4>
              <ul>
                <li>30-Day Moneyback Guarantee</li>
              </ul>
            </div>

            <div class="col">
              <div class="main-footer__logo">
                <img src="<?php echo IMG; ?>/logo-white.png" alt="">
              </div>
            </div>

          </div>
        </div>
      </footer>
    <?php endif; ?>

    <?php wp_footer(); ?>
  </body>
</html>