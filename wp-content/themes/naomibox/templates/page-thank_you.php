<?php
/*
 * Template Name: Thank you
 */
// global $wp;

get_header();
while ( have_posts() ) : the_post(); ?>

<section class="thankyou-content">
	<div class="container">
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</div>
</section>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '248283673407861'); 
fbq('track', 'Purchase');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=248283673407861&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->



<?php
endwhile;
get_footer(); ?>