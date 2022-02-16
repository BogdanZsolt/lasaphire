<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package La Saphire
 */

?>
<div class="cookie-container container">
	<div class="row">
		<?php
			$cookie_page = get_page_by_path( 'cookies-policy' );
			$cookie_page = get_permalink( $cookie_page->ID );
		?>
		<div class="col-9 cookie-content">
			<h5 class="cookie-title"><?php _e( 'Privacy Note', 'lasaphire' ); ?></h5>
			<p>
				<?php _e( 'Ez a weboldal cookie-kat használ az élmény javítása érdekében. Olvassa el ', 'lasaphire' ); ?>

				<a href="<? echo get_privacy_policy_url(); ?>"><?php _e( 'Adatvédelmi irányelveinket', 'lasaphire' ); ?></a>
				<?php _e( 'and', 'lasaphire' ); ?>
				<a href="<?php echo esc_url( $cookie_page ); ?>"><?php _e( 'Cookie-szabályzatunkat', 'lasaphire' ); ?></a>
				<?php _e( '. Tudjon meg többet.', 'lasaphire' ); ?>
			</p>
		</div>
		<div class="col-md-3 buttons">
			<button class="btn-alt btn-normal" type="submit"><?php _e( 'I understand', 'lasaphire' ) ?></button>
		</div>
	</div>
</div>

<footer class="pt-5 pb-4" style="background-image: linear-gradient(to top, transparent, rgba(255,255,255,0.01) 30%, var(--base-bg-color) 100%), url(<?php echo wp_get_attachment_image_url(get_theme_mod( 'set_footer_image' ), 'full', false); ?>);">
	<div class="container">
		<div class="row">
			<a class="totop shadow">
				<i class="fas fa-chevron-up"></i>
			</a>
		</div>
		<!-- form subscribe -->
		<?php get_template_part( 'template-parts/content/form', 'subscribe' ); ?>
		<!-- Social Media Menu -->
		<div class="row">
			<div class="social-menu col text-center">
				<?php
					wp_nav_menu(
						array(
							'theme_location'	=> 'la_saphire_social_menu',
						)
					);
				?>
			</div>
		</div>
		<!-- Logo -->
		<div class="row">
			<!-- footer logo -->
			<?php get_template_part( 'template-parts/content/content', 'brand' ); ?>
		</div>
		<section class="copyright">
			<div class="row">
				<div class="copyright-text col-12 col-md-3">
					<p><?php echo get_theme_mod( 'set_copyright', __( 'Copyright X - All Rights Reserved', 'lasaphire' ) ); ?></p>
				</div>
				<div class="footer-menu col-12 col-md-6 text-center">
					<?php
						wp_nav_menu(
							array(
								'theme_location'	=> 'la_saphire_footer_menu',
							)
						);
					?>
				</div>
				<div class="madeby-text col-12 col-md-3">
					<a href="https://pegazusdesigns.hu" target="_blank"><?php _e( 'Website by PegazusDesigns', 'lasaphire' ) ?></a>
				</div>
			</div>
		</section>
	</div>
</footer>

	<?php
	get_template_part('template-parts/content/content', 'svgs');
	wp_footer();
	?>
</body>
</html>

