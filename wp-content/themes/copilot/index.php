<?php
/**
 * The main template file
 */

get_header(); ?>

<?php if ( is_home() && !is_front_page() && !empty( single_post_title( '', false ) ) ) : ?>
<div class="container">

  <h1 class="page-title"><?php single_post_title(); ?></h1>
  <?php endif; ?>

  <?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : ?>
      <?php the_post(); ?>
      <?php get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) ); ?>

      <div class="pagination">
        <?php
        the_posts_pagination( array(
          'mid_size' => 2,
          'prev_text' => __( 'Prev', 'wpbase' ),
          'next_text' => __( 'Next', 'wpbase' ),
        ) ); ?>
      </div>
    <?php endwhile; ?>
  <?php else : ?>

  <?php get_template_part( 'template-parts/content/content-none' ); ?>
</div>
<?php endif; ?>

<?php get_footer(); ?>