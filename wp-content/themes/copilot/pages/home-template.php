<?php
/*
Template Name: Home Template
*/
?>
<?php get_header(); ?>
<div class="container">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
    <?php edit_post_link( __( 'Edit', 'wpbase' ), '<p>', '</p>' ); ?>
  <?php endwhile; ?>
</div>
<?php get_footer(); ?>
