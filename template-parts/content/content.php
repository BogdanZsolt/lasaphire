<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package La Saphire
 */

?>
<div class="col-lg-4 col-md-4" <?php post_class(); ?>>
	<h2>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h2>
	<div class="post-thumbnail">
		<?php
		if( has_post_thumbnail() ):
			the_post_thumbnail( 'la-saphire-blog', array( 'class' => 'img-fluid' ) );
		endif;
		?>
	</div>
	<div class="meta">
		<p><?php _e( 'Published by', 'lasaphire' ); ?> <?php the_author_posts_link(); ?> <?php echo get_the_date(); ?>
		<br />
		<?php if( has_category() ): ?>
			<?php _e( 'Categories', 'lasaphire' ); ?>: <span><?php the_category( ' ' ); ?></span>
			<br />
		<?php endif; ?>
		<?php if( has_tag() ): ?>
			<?php _e( 'Tags', 'lasaphire' ); ?>: <span><?php the_tags( '', ', ' ); ?></span>
		<?php endif; ?>
		</p>
	</div>
	<div><?php the_excerpt(); ?></div>
</div>
