<?php
/**
 * Displays the Home page Products Slider Carousel
 *
 * @package La Saphire
 */
?>

<section class="products-slider my-10">
	<!-- <svg class="decor-triangle">
		<use href="#decor-triangle"></use>
	</svg> -->
	<!-- <svg class="decor-circle">
		<use href="#decor-circle"></use>
	</svg> -->
	<!-- <svg class="decor-elegant-cat">
		<use href="#decor-elegant-cat"></use>
	</svg>
	<svg class="decor-elegant-cat-2">
		<use href="#decor-elegant-cat"></use>
	</svg>
	<svg class="decor-dot-grid">
		<use href="#decor-dot-grid"></use>
	</svg> -->
	<!-- <svg class="decor-cobweb">
		<use href="#decor-cobweb"></use>
	</svg> -->
	<!-- <svg class="decor-rose">
		<use href="#decor-rose"></use>
	</svg>
	<svg class="decor-cat-paw">
		<use href="#decor-cat-paw"></use>
	</svg>
	<svg class="decor-cat-paw-2">
		<use href="#decor-cat-paw"></use>
	</svg> -->
	<!-- <svg class="decor-cat">
		<use href="#decor-cat"></use>
	</svg> -->
	<div class="container col-7">
		<div class="division__header row">
			<h5 class="division__title col-12 col-md-6"><?php echo esc_html( get_theme_mod( 'set_products_title', 0 ) ); ?></h5>
			<a href="<?php echo esc_url( get_permalink( get_theme_mod( 'set_products_link' ) ) ); ?>" class="division__link btn-txt col-12 col-md-6"><?php echo esc_html( get_theme_mod( 'set_products_button_text', 0 ) ); ?></a>
		</div>
		<?php echo do_shortcode( '[products limit="-1" columns="4" orderby="date" class="tiny-slider"]' ); ?>
	</div>
</section>
