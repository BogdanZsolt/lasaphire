<?php
/*
Template Name: For-me Page
*/
get_header();
	while( have_posts() ): the_post();
	?>
	<section id="forme">
		<div id="hero" class="slide">
			<?php the_post_thumbnail( 'la-saphire-slider', array( 'class' => 'img-fluid' )  ); ?>
			<div class="overlay">
					<?php endwhile; ?>
			</div>
		</div>
		<div class="content">
			<div class="container">
				<?php echo do_shortcode("[lasaphire_search_helper]"); ?>
			</div>
		</div>
		<div class="container">
			<article class="col">
				<div><?php the_content(); ?></div>
			</article>
		</div>
	</section>
<?php get_footer(); ?>

