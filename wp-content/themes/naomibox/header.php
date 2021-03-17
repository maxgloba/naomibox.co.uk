<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="keywords" content="<?php bloginfo('keywords'); ?>"/>
    <meta name="description" content="<?php bloginfo('description'); ?>"/>
    <meta name="copyright" content="<?php bloginfo('copyright'); ?>">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, user-scalable=no, user-scalable=0, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0 user-scalable=0">
    <meta name="author" content="MaxGloba">
    <meta name="theme-color" content="#ffffff">

    <title>
      <?php
        if(is_front_page()){
          bloginfo('name'); echo ' - '; bloginfo('description');
        } else {
          echo get_bloginfo('name'); wp_title( '|', true, 'left' );
        }
      ?>
    </title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico?v=1.01" />

    <script>
      const vh = window.innerHeight * 0.01;
      document.documentElement.style.setProperty('--vh', `${vh}px`);
    </script>

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?> >

    <?php if( is_front_page() ): ?>
      <header class="main-header">
        <div class="container">
          <div class="main-header__logo">
            <a href="<?php echo home_url(); ?>"><img src="<?php echo IMG; ?>/logo-white.png" alt=""></a>
            <span>Naomi Box</span>
          </div>
          <ul class="main-header__info">
            <li>
              <a target="_blank" href="https://www.instagram.com/naomiboxuk/">
                <i class="fab fa-instagram"></i>
                @naomiboxuk
              </a>
            </li>
            <li>
              <a target="_blank" href="tel:08082710523">
                <i class="far fa-phone"></i>
                0808 271 0523
              </a>
            </li>
          </ul>
        </div>
      </header>

      <?php get_template_part( 'miniCart/cart', 'template' ); ?>
      <?php get_template_part( 'miniCart/discount', 'template' ); ?>
    <?php endif; ?>

    <?php if( is_checkout() || is_page_template( 'templates/page-thank_you.php' ) ): ?>
      <header class="main-header">
        <div class="container">
          <div class="main-header__logo">
            <a href="<?php echo home_url(); ?>"><img src="<?php echo IMG; ?>/logo-white.png" alt=""></a>
          </div>
          <div class="main-header__secure">Secure<br>checkout</div>
          <div class="main-header__right">
              <div class="questions"><i class="fa fa-phone"></i> Questions? Call: <a href="tel:08082710523">0808 271 0523</a></div>
              <div class="feature">
                  <div class="feature-image"><img src="<?php echo IMG; ?>/60-day.png" alt=""></div>
                  <div class="feature-text">30 Day 100% Money<br>Back Guarantee</div>
              </div>
          </div>
        </div>
      </header>
    <?php endif; ?>

    <?php if( is_single() && TYPE() === 'product' ): ?>
      <?php get_template_part( 'miniCart/cart', 'template' ); ?>
      <?php get_template_part( 'miniCart/discount', 'template' ); ?>
    <?php endif; ?>