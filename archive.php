<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package La Saphire
 */

get_header();
?>
	<div class="content-area">
		<div class="banner mb-5">
			<?php echo get_the_post_thumbnail( get_option( 'page_for_posts' ), 'la-saphire-page-banner', array( 'class' => 'img-fluid' )  ); ?>
			<div class="banner-content overlay">
				<h1><?php echo the_archive_title( '<h1 class="article-title">', '</h1>' ); ?></h1>
			</div>
		</div>

		<main>
			<div class="container">
				<div class="row">
				<?php if( is_active_sidebar( 'la_saphire-sidebar-1' ) ):  ?>
					<div class="col-lg-9 col-md-8 col-12">
				<?php else : ?>
					<div class="col">
				<?php endif; ?>
				<?php
					// If there are any posts
					if( have_posts() ):

						// Load posts loop
						while( have_posts() ): the_post();
							get_template_part( 'template-parts/content/content', 'archive' );
						endwhile;
						the_posts_pagination(
							array(
								'prev_text'		=> '<',
								'next_text'		=> '>',
							)
						);
					else:
				?>
					<p>Nothing to display.</p>
				<?php endif; ?>
				</div>
				<?php
					get_sidebar();
				?>
			</div>
		</main>
	</div>
<?php get_footer(); ?>