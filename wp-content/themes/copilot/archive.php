<?php
/**
 * The template for displaying archive pages
 *
 */

get_header();

?>
  <div class="container">
    <h1 class="archive-title">
      <?php the_archive_title(); ?>
    </h1>
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : ?>
        <?php the_post(); ?>
        <?php get_template_part( 'template-parts/content/content' ); ?>

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
    <?php endif; ?>
  </div>
<?php get_footer();
