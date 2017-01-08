<?php
/*
Template Name: Contact Us
*/
get_header(); ?>

 <div class="container">
   <div class="contact">
     <h3 class="title">Contact</h3>
     <p>
       Does your business need a website? Are you looking to gain a following through social media? Do you have an idea for a mobile app but need a design that attracts users? Fill out the form below and I will get back with you ASAP.
     </p>
    <?php echo do_shortcode( '[contact-form-7 id="49" title="Contact form 1"]' ); ?>
  </div><!-- .contact -->
 </div><!-- .container>
  <?php get_footer(); ?>
