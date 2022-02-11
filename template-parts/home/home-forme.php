<?php
/**
 * Displays the Home page For Me Section
 *
 * @package La Saphire
 */
?>

<section id="for-me" class="mb-10 col">
<<<<<<< HEAD
	<div class="container border-rounded" style="background-image: url(<?php echo wp_get_attachment_image_url( get_theme_mod( 'set_forme_bg_image' ), 'la-saphire-page-banner', false ); ?>); ">
=======
	<div class="container border-rounded">
>>>>>>> eefff23 (home page style setup change with Pepi)
		<div class="row">
			<div class="col">
				<h2><?php _e( 'Találd meg a hozzád legjobban illő termékeket', 'lasaphire' ); ?></h2>
				<p><?php _e( 'Töltsd ki a rövid kvízt, tudj meg többet magadról', 'lasaphire' ); ?></p>
				<a href="<?php echo home_url( '/for-me' ) ?>" class="btn-alt btn-normal"><?php _e( 'Kezdjük el', 'lasaphire' ); ?></a>
			</div>
		</div>
	</div>
</section>
