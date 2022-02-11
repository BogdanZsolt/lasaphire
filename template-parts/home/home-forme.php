<?php
/**
 * Displays the Home page For Me Section
 *
 * @package La Saphire
 */
?>

<section id="for-me" class="mb-10 col">
	<div class="container border-rounded">
		<div class="row">
			<div class="col">
				<h2><?php _e( 'Találd meg a hozzád legjobban illő termékeket', 'lasaphire' ); ?></h2>
				<p><?php _e( 'Töltsd ki a rövid kvízt, tudj meg többet magadról', 'lasaphire' ); ?></p>
				<a href="<?php echo home_url( '/for-me' ) ?>" class="btn-alt btn-normal"><?php _e( 'Kezdjük el', 'lasaphire' ); ?></a>
			</div>
		</div>
	</div>
</section>
