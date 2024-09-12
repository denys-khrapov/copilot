<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header();
?>
  <div class="container">
    <h1 class="page-title">
      <?php esc_html_e( 'Nothing here', 'wpbase' ); ?>
    </h1>

    <div class="error-404">
      <div class="page-content">
        <p>
          <?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'wpbase' ); ?>
        </p>
        <?php get_search_form(); ?>
      </div>
    </div>
  </div>
<?php
get_footer();