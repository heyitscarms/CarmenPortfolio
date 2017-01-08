<?php get_header(); ?>
<div class="container">
<h2 class="title"><?php single_cat_title(); ?></h2>
<?php
  $args=array(
     'post_type' => 'post',
     'category_name' => 'design',
     'post_status' => 'publish',
     'posts_per_page' => 12
    );

  $my_query = null;
  $my_query = new WP_Query($args);

  if( $my_query->have_posts() ) {

    $i = 0;
    while ($my_query->have_posts()) : $my_query->the_post();
  // modified to work with 3 columns
  // output an open <div>
  if($i % 3 == 0) { ?>

  <div class="row">

  <?php
  }
  ?>

    <div class="col-md-4">
      <div class="my-inner">
        <div class="hover">
          <?php the_post_thumbnail(); ?>
          <div class="overlay">
            <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
              <?php the_title(); ?></a></h2>
            </div>
          </div>
        </div>
      </div>
      <?php $i++;
      if($i != 0 && $i % 3 == 0) { ?>
        </div><!--/.row-->
        <div class="clearfix"></div>

      <?php
       } ?>

      <?php
        endwhile;
        }
        wp_reset_query();
        ?>

</div>

<?php get_footer(); ?>
