<?php
get_header();
while(have_posts()):
  the_post();
?>
  <section class="single-content">
    <div class="single-content__nav">
      <a href="<?php echo home_url(); ?>#products"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> More products</a>
      <a href="<?php echo home_url(); ?>#products" class="icon-close" ><i class="fa fa-times" aria-hidden="true"></i></a>
    </div>
    <div class="container">
      <?php the_content(); ?>
    </div>
  </section>

<?php
endwhile;
get_footer();