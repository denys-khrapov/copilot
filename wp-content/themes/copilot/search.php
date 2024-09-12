<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header(); ?>
  <div class="container">
    <?php if ( have_posts() ) : ?>

      <h1 class="page-title">
        <?php
        printf(
          esc_html__( 'Results for "%s"', 'wpbase' ),
          '<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
        );
        ?>
      </h1>
      <?php get_search_form(); ?>
      <div class="search-result-count default-max-width">
        <?php
        printf(
          esc_html(
            _n(
              'We found %d result for your search.',
              'We found %d results for your search.',
              (int)$wp_query->found_posts,
              'wpbase'
            )
          ),
          (int)$wp_query->found_posts
        );
        ?>
      </div>

      <?php while ( have_posts() ) : ?>
        <?php the_post(); ?>
        <?php get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) ); ?>

      <?php endwhile; ?>
      <div class="pagination">
        <?php
        the_posts_pagination( array(
          'mid_size' => 2,
          'prev_text' => __( 'Prev', 'wpbase' ),
          'next_text' => __( 'Next', 'wpbase' ),
        ) ); ?>
      </div>
    <?php else : ?>

      // If no content, include the "No posts found" template.
      <?php get_template_part( 'template-parts/content/content-none' ); ?>
    <?php endif; ?>
  </div>
<?php get_footer();
