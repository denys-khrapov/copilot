<?php
/**
 * The template for displaying all single page
 */

get_header(); ?>

<?php if (is_front_page()) : ?>
  <?php while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; ?>
<?php else : ?>
  <?php while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer();