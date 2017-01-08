<?php get_header(); ?>

<div class="container" id="content" role="main">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
        <h2><?php the_title(); ?></h2>
        <small><p class="postmetadata"> Posted in <?php the_category(', ') ?> | </p></small>
        <div class="img-reponsive">

        <?php the_post_thumbnail(); ?>
</div>
        <div class="entry text">
            <?php the_content('full'); ?>
        </div>


    </div>
    <?php endwhile; endif; ?>

</div><!-- #content -->
