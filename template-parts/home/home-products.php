<?php
/**
 * Displays the Home page Products Slider Carousel
 *
 * @package La Saphire
 */
?>

<section class="products-slider my-10">
	<div class="container col-7">
		<div class="division__header row">
			<h5 class="division__title col-12 col-md-6"><?php echo esc_html( get_theme_mod( 'set_products_title', 0 ) ); ?></h5>
			<a href="<?php echo esc_url( get_permalink( get_theme_mod( 'set_products_link' ) ) ); ?>" class="division__link btn-txt col-12 col-md-6"><?php echo esc_html( get_theme_mod( 'set_products_button_text', 0 ) ); ?></a>
		</div>
		<?php echo do_shortcode( '[products limit="-1" columns="4" orderby="date" class="tiny-slider"]' ); ?>
	</div>
</section>
