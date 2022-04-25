<?php
/**
 * Displays the Home page Promotion Section
 *
 * @package La Saphire
 */

?>

<?php
$showdeal = get_theme_mod( 'set_deal_show', 0 );
$deal = get_theme_mod( 'set_deal' );
if( $showdeal == 1 && ( !empty( $deal ) ) ):
?>
<section id="promotion" class="mb-10">
	<div class="container">
		<div class="division__header row">
			<h5 class="division__title col-12 col-md-6"><?php echo esc_html( get_theme_mod( 'set_deal_title', 0 ) ); ?></h5>
			<a href="<?php echo esc_url( get_permalink( get_theme_mod( 'set_deal_link' ), 0 ) ); ?>" class="division__link btn-txt col-12 col-md-6"><?php echo esc_html( get_theme_mod( 'set_deal_button_text', 0 ) ); ?></a>
		</div>
		<div class="row no-gutters border-rounded">
			<div class="image col-12 col-md-6">
				<?php echo get_the_post_thumbnail( $deal, 'large', array( 'class' => 'img-fluid' ) ); ?>
			</div>
			<div class="content col-12 col-md-6" style="background-image: url(<?php echo wp_get_attachment_image_url( 	get_theme_mod( 'set_deal_bg_image' ), 'full', false); ?>);">
				<h2><?php echo get_the_title( $deal ); ?></h2>
				<p class="card-text"><?php echo get_the_excerpt( $deal ); ?></p>
				<a href="<?php echo get_the_permalink( $deal ); ?>" class="btn-alt btn-normal"><?php _e( 'I&prime;ll check', 'lasaphire' ); ?></a>
		</div>
	</div>
		</div>
</section>
<?php endif; ?>