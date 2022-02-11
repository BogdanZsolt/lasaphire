<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package La Saphire
 */

?>
<article id="post-"<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php if(get_post_type() === 'post'){?>
			<div class="meta">
				<p><?php _e( 'Publikálta', 'lasaphire' ); ?> <?php the_author_posts_link(); ?> <?php echo get_the_date(); ?><br />
					<?php _e( 'Kategóriák', 'lasaphire' ); ?>: <span><?php the_category( ' ' ); ?></span><br />
					<?php if( has_tag() ): ?>
						<?php _e( 'Cimkék', 'lasaphire' ); ?>: <span><?php the_tags( '', ', ' ); ?></span>
					<?php endif; ?>
				</p>
			</div>
		<?php } ?>
		</div>
	</header>
	<div class="content mb-3">
		<?php the_content(); ?>
		<?php
			wp_link_pages(
				array(
					'before'		=> '<p class="inner-pagination">' . __( 'Pages', 'lasaphire' ),
					'after'			=> '</p>',
				)
			);
		?>
	</div>
</article>
