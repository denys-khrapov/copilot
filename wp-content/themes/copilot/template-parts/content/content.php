<article <?php post_class(); ?>>
	<a class="featured-image" href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail( 'thumbnail_archive_post' ); ?>
	</a>
	<h3><a href="<?php the_permalink(); ?>">
			<?php the_title(); ?>
		</a></h3>
	<a class="author" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
		<?php the_author(); ?>
	</a>
	<time>
		<?php echo get_the_date( 'M j, Y' ); ?>
	</time>
	<a class="comments-link" href="<?php echo esc_url( get_comments_link() ); ?>">
		<?php echo get_comments_number(); ?>
		<span class="sr-only">
			<?php _e( 'Comments', 'wpbase' ); ?>
		</span>
	</a>
	<div class="excerpt">
		<?php the_excerpt(); ?>
	</div>
</article>