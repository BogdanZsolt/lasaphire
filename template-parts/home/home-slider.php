<?php
/**
 * Displays the Home page Hero Slider
 *
 * @package La Saphire
 */
?>

<section class="slider">
	<div id="hero-slider">
		<?php

		$args = array(
			'post_type'			=> 'heroslider',
			'posts_per_page'	=> -1,
		);
		$slider_loop = new WP_Query( $args );
		if( $slider_loop->have_posts() ) :
			while( $slider_loop->have_posts()) : $slider_loop->the_post();
				$btn_text = get_post_meta( get_the_ID(), '_heroslider_btn_text', true);
				$btn_url = get_post_meta( get_the_ID(), '_heroslider_btn_url', true);
				if(has_post_thumbnail()){
				?>
				<div class="slide">
					<?php the_post_thumbnail( 'la-saphire-slider', array( 'class' => 'img-fluid' ) ); ?>
					<div class="overlay"></div>
					<div class="container">
						<div class="slider-details-container">
							<div class="slider-title">
								<h1><?php the_title(); ?></h1>
							</div>
							<div class="slider-description">
								<div class="subtitle"><?php the_content(); ?></div>
								<?php if($btn_text) { ?>
									<a href="<?php echo $btn_url; ?>" class="btn-alt btn-normal link"><?php echo $btn_text; ?></a>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<?php
				}
			$j++;
			endwhile;
			wp_reset_postdata();
		endif;
		?>
	</div>
</section>
