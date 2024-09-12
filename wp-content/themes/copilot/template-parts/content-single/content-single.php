<?php
/**
 * Template part for displaying posts
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php the_title( '<h1 class="title">', '</h1>' );
  ?>
  <?php  if ( has_post_thumbnail() ) : ?>
    <?php the_post_thumbnail('thumbnail_single_post'); ?>
  <?php endif; ?>

  <div class="entry-content">
    <?php
    the_content();
    ?>

    <div class="navigation">
      <span class="prev"><?php previous_post_link(); ?></span>
      <span class="next"><?php next_post_link(); ?></span>
    </div>

  </div>

</article>
