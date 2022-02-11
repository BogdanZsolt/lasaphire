<?php
/**
 * Template part for displaying posts content in archive page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package La Saphire
 */

?>
<article <?php post_class(); ?>>
	<h2>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h2>
	<div class="meta">
		<p><?php _e( 'Published by', 'lasaphire' ); ?> <?php the_author_posts_link(); ?> <?php _e( 'on', 'lasaphire' ); ?> <?php echo get_the_date(); ?>
		<br />
		<?php if( has_category() ): ?>
			<?php _e( 'Categories', 'lasaphire'); ?>: <span><?php the_category( ' ' ); ?></span>
			<br />
		<?php endif; ?>
		<?php if( has_tag() ): ?>
			<?php _e( 'Tags', 'lasaphire' ); ?>: <span><?php the_tags( '', ', ' ); ?></span>
		<?php endif; ?>
		</p>
	</div>
	<div><?php the_excerpt(); ?></div>
</article>