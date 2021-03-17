<?php
/*
 * Template Name: Index
 */
get_header(); ?>

<section class="banner">
  <video width="100%" muted webkit-playsinline playsinline autoplay loop >
    <source src="<?echo ROOT; ?>/video/video.mp4" type="video/mp4">
  </video>
  <div class="container">
    <div class="banner__content">
      <h2>New customers - enjoy exclusive discounts on us!</h2>
      <div class="banner__sales">
        <div class="banner__sales-box">
          <span class="num">-10%</span> 2 <br> puzzles
        </div>
        <div class="banner__sales-box">
          <span class="num">-15%</span> 3 <br> puzzles
        </div>
        <div class="banner__sales-box">
          <span class="num">-20%</span> 4 <br> puzzles
        </div>
      </div>
    </div>
  </div>
</section>

<section class="products" id="products">
  <div class="container">
    <h2>Unique wood-carved jigsaw puzzles</h2>
    <h3>Bright, beautiful animal puzzles, made individually with love</h3>
    <?php get_template_part( 'partials/mg', 'products' ); ?>
  </div>
</section>

<section class="about">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2>About us</h2>
        <div class="text">
          <p>There are few better ways to while away the time than with a jigsaw. Naomi Box’s range of wooden puzzles encourage exploration and examination – with bright, colourful animal pieces and intricate artistic designs.</p>
          <p>All our puzzles are crafted from wood, and made using non-toxic glue and paint. Robust and well-made, they’re designed to be treasured for years to come.</p>
        </div>
      </div>
      <div class="col-md-6">
        <img src="<?php echo IMG; ?>/about-bg.jpg" alt="" width="100%">
      </div>
    </div>
  </div>
</section>

<section class="jig">
  <div class="container">
    <h2>Our Wooden jigsaws are…</h2>
    <div class="row">
      <div class="col-md-3">
        <i class="fas fa-tree"></i>
        <h4>Eco-friendly</h4>
        <p>We take pride in our environmentally-focused approach</p>
      </div>
      <div class="col-md-3">
        <i class="fas fa-gift"></i>
        <h4>Lovingly packed</h4>
        <p>Each jigsaw comes in an attractive presentation box</p>
      </div>
      <div class="col-md-3">
        <i class="fas fa-paint-brush"></i>
        <h4>Carefully designed</h4>
        <p>Every puzzle piece has its own distinctive, unique shape</p>
      </div>
      <div class="col-md-3">
        <i class="fas fa-thumbs-up"></i>
        <h4>High-quality</h4>
        <p>Your puzzle’s colours won’t fade over time – their vibrancy will last</p>
      </div>
    </div>
  </div>
</section>

<section class="preview">
  <div class="container">
    <h2>Product Preview</h2>
    <h3>Watch Video Below for Product Preview</h3>
    <iframe class="lazy" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen="" src="https://player.vimeo.com/video/509195860"></iframe>
  </div>
</section>

<section class="products">
  <div class="container">
    <h2>Unique wood-carved jigsaw puzzles</h2>
    <h3>Bright, beautiful animal puzzles, made individually with love</h3>
    <?php get_template_part( 'partials/mg', 'products' ); ?>
  </div>
</section>

<section class="reviews">
  <div class="container">
    <h2>Our reviews</h2>
    <h3>If you’d like to share your thoughts about our jigsaws, you can contact us on social media. Alternatively, email us at support@naomibox.co.uk – we always love hearing from our customers.</h3>
    <div class="row">
      <div class="col-md-6">
        <div class="reviews-text">This was bought as a gift, so I never actually got to solve the jigsaw. However, the product is very beautiful and the person who received it was pleased.</div>
        <div class="reviews-img">
          <i class="fab fa-instagram"></i>
          <img src="<?php echo IMG; ?>/rev-01.png" alt="">
        </div>
        <div class="reviews-name">Diana</div>
      </div>
      <div class="col-md-6">
        <div class="reviews-text">Absolutely amazing. Arrived so quickly and looks beautiful. Have already recommended for friends to buy as gifts for Christmas.</div>
        <div class="reviews-img">
          <i class="fab fa-instagram"></i>
          <img src="<?php echo IMG; ?>/rev-02.png" alt="">
        </div>
        <div class="reviews-name">Alana</div>
      </div>
      <div class="col-md-6">
        <div class="reviews-text">I have had so much fun putting this puzzle together! I love all the unique pieces and the colors are beautiful!</div>
        <div class="reviews-img">
          <i class="fab fa-instagram"></i>
          <img src="<?php echo IMG; ?>/rev-03.png" alt="">
        </div>
        <div class="reviews-name">Lisa</div>
      </div>
      <div class="col-md-6">
        <div class="reviews-text">The puzzle is absolutely beautiful! The colors are perfect and it even comes in a beautiful wood box for storage with the picture of the finished puzzle on the top for reference. The shipping was quick, too. I'm very happy with my purchase from this shop.</div>
        <div class="reviews-img">
          <i class="fab fa-instagram"></i>
          <img src="<?php echo IMG; ?>/rev-04.png" alt="">
        </div>
        <div class="reviews-name">Elizabeth</div>
      </div>
    </div>
  </div>
</section>

<section class="gallery">
  <div class="container">
    <h2>Photo gallery</h2>
    <h3>Bright, beautiful animal puzzles, made individually with love</h3>
    <div class="row gallery-mini">
      <div class="col-md-6"><img class="gs-open" src="<?php echo IMG; ?>/gallery1_mini.jpg" ></div>
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-6"><img class="gs-open" src="<?php echo IMG; ?>/gallery3_mini.jpg" ></div>
          <div class="col-md-6"><img class="gs-open" src="<?php echo IMG; ?>/gallery4_mini.jpg" ></div>
          <div class="col-md-6"><img class="gs-open" src="<?php echo IMG; ?>/gallery6_mini.jpg" ></div>
          <div class="col-md-6"><img class="gs-open" src="<?php echo IMG; ?>/gallery5_mini.jpg" ></div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $gallery_images = [IMG.'/gallery1.jpg', IMG.'/gallery2.jpg', IMG.'/gallery3.jpg', IMG.'/gallery4.jpg', IMG.'/gallery5.jpg', IMG.'/gallery6.jpg']; ?>
<script>
const gs_images = ['<?php echo implode( "','", $gallery_images); ?>'];
</script>
<div class="gs gs-hide">
  <button class="gs-wclose"></button>
  <button class="gs-prev"><i class="fas fa-caret-left"></i></button>
  <button class="gs-next"><i class="fas fa-caret-right"></i></button>
  <div class="gs-wrap">
    <button class="gs-close"><i class="fas fa-times"></i></button>
    <img class="gs-img" src="<?php echo $gallery_images[0]; ?>" data-index="0">
  </div>
</div>

<section class="faqs">
  <div class="container">
    <h2>FAQS</h2>
    <div class="faqs">
      <div class="faq">
        <div class="question">How long will it take to deliver my jigsaw?<i class="fas fa-arrow-down"></i></div>
        <div class="answer">All jigsaw orders are usually processed and shipped within 1-2 business days. Once shipped, please allow 5-8 business days for your order to be delivered.</div>
      </div>
      <div class="faq">
        <div class="question">Are your jigsaws suitable for children?<i class="fas fa-arrow-down"></i></div>
        <div class="answer">Absolutely! They’re ideal for children, but please note, they’re not suitable for kids below the age of three, due to the materials used.</div>
      </div>
      <div class="faq">
        <div class="question">Will you offer more jigsaw puzzle designs in the future?<i class="fas fa-arrow-down"></i></div>
        <div class="answer">Our design team are always working on new designs – watch this space!</div>
      </div>
      <div class="faq">
        <div class="question">How can I get in touch?<i class="fas fa-arrow-down"></i></div>
        <div class="answer">To contact our customer service team, simply email us at support@naomibox.co.uk.</div>
      </div>
      <div class="faq">
        <div class="question">What is the new customer discount scheme?<i class="fas fa-arrow-down"></i></div>
        <div class="answer">If you’re a new customer, you can enjoy a discount when you purchase two jigsaws or more. The discount increases (to a maximum of 20%) with every additional jigsaw you purchase.</div>
      </div>
    </div>
  </div>
</section>

<?php get_footer();