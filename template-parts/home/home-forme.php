<?php
/**
 * Displays the Home page For Me Section
 *
 * @package La Saphire
 */
?>

<?php
	$showvalues = get_theme_mod( 'set_forme_show', 0 );
	if( $showvalues == 1 ) :
?>
<section id="for-me" class="mb-10 col">
	<div class="container border-rounded">
		<div class="row">
			<div class="col">
				<h2><?php _e( 'Find the right products to nourish your skin', 'lasaphire' ); ?></h2>
				<p><?php _e( 'Complete our skin or hair care quiz to find out which products are ideal for you.', 'lasaphire' ); ?></p>
				<a href="<?php echo home_url( '/for-me' ) ?>" class="btn-alt btn-normal"><?php _e( 'Get Started', 'lasaphire' ); ?></a>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>