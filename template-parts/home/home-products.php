<?php
/**
 * Displays the Home page Products Slider Carousel
 *
 * @package La Saphire
 */
?>

<section class="products my-10">
	<div class="container col-7">
		<?php echo do_shortcode( '[products limit="-1" columns="4" orderby="date" class="tiny-slider"]' ); ?>
		<div class="row">
			<div class="col d-flex justify-content-center my-2">
				<a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>" class="btn-txt"><?php _e( 'Browse All Products', 'lasaphire' ); ?></a>
			</div>
		</div>
	</div>

</section>
