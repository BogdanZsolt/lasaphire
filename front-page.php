<?php
/*
Template Name: Home Page
*/
get_header();
?>
	<div class="content-area">
		<main>

			<?php
				get_template_part( 'template-parts/home/home', 'slider' );
				if( class_exists( 'WooCommerce' ) ) {
					get_template_part('template-parts/home/home', 'message');
					get_template_part('template-parts/home/home', 'products');
					get_template_part('template-parts/home/home', 'arrivals');
					get_template_part('template-parts/home/home', 'promotion');
				}
					get_template_part('template-parts/home/home', 'forme');
					get_template_part('template-parts/home/home', 'ourvalues');
					get_template_part('template-parts/home/home', 'news');
					get_template_part('template-parts/home/home', 'gallery');
					?>
					<div class="container">
						<article class="col">
							<div><?php the_content(); ?></div>
						</article>
					</div>
					<?php
			?>
		</main>
	</div>
<?php get_footer(); ?>