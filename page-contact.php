<?php
/*
Template Name: Contact Page
*/

get_header();
	while( have_posts() ): the_post();
		$src = get_the_post_thumbnail_url( null, 'la-saphire-page-banner' );
		$src_mobile = get_the_post_thumbnail_url( null, 'woocommerce_thumbnail' );
	?>
	<section id="contact" class="mb-5">
		<div class="banner mb-5">
			<img src="<?php echo esc_url($src) ?>" class="img-fluid" alt="banner photo">
			<img src="<?php echo esc_url($src_mobile) ?>" class="img-mobile" alt="banner photo">
			<div class="banner-content overlay">
				<h1><?php the_title(); ?></h1>
				<?php
					// Load posts loop
					endwhile;
				?>
			</div>
		</div>
		<div class="container mt-5">
			<div class="row">
				<div class="col-12 col-md-6">
					<div class="contact-container">
						<h2 class="mb-4"><?php _e( 'Érdeklődjön bátran személyesen!', 'lasaphire' ); ?></h2>
						<h3><i class="fas fa-map-marker-alt"></i><?php _e( 'cím', 'lasaphire' ); ?></h3>
						<p>
							<a href="https://goo.gl/maps/sZa4oh4PzDrCwscn6"target="_blank" rel="noopener">
								1122 Budapest Határőr út 40. <br />Hungary
							</a>
						</p>
						<h3><?php _e( 'Kapcsolattartási órák', 'lasaphire' ); ?></h3>
						<p>Hétfő - péntek 8:30 - 16:30</p>
						<h3><i class="fas fa-phone-alt"></i><?php _e( 'Telefon', 'lasaphire' ); ?></h3>
						<p>
							<a href="tel:+36301234567" title="<?php _e( 'Telefon La Saphire', 'lasaphire' ); ?>">+36 (30) 123-4567</a>
						</p>
						<h3><i class="far fa-envelope"></i><?php _e( 'Email', 'lasaphire' ); ?></h3>
						<p>
							<a href="mailto:info@lasaphire.hu" title="<?php _e( 'email La Saphire', 'lasaphire' ); ?>">info@laspahire.hu</a>
						</p>
						<div class="social-menu mb-4">
							<?php
								wp_nav_menu(
									array(
										'theme_location'	=> 'la_saphire_social_menu',
									)
								);
							?>
						</div>
					</div>
				</div>

				<div class="col-12 col-md-6">
					<h2 class="mb-1"><?php _e( 'Megkeresések', 'lasaphire' ); ?></h2>
					<p>(<?php _e( 'küldjön üzenetet!', 'lasaphire' ); ?>)</p>
					<?php get_template_part('template-parts/content/form', 'contact'); ?>
				</div>
			</div>
		</div>
	</section>
<?php get_footer(); ?>