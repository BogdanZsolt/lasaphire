<?php
/**
 * Displays the Home page About Section
 *
 * @package La Saphire
 */
?>

<?php
	$showabout = get_theme_mod( 'set_about_show', true );
	if( $showabout == true ) :
		$img_src = esc_url( wp_get_attachment_image_url( get_theme_mod( 'set_about_image', '' ), 'woocommerce_thumbnail', false ) );
		// $img_src = wp_get_attachment_image_url( attachment_url_to_postid( esc_url(get_theme_mod( 'set_about_image', 0 ) ) ), 'woocommerce_thumbnail', false );
?>
<section id="about" class="home-about">
  <div class="container">
    <div class="row">
      <div class="home-about__content col-12 col-md-6">
        <h4 class="home-about__subtitle">
          <?php echo esc_html( get_theme_mod( 'set_about_subtitle', __( 'Who we are?' ))); ?></h4>
        <h2 class="home-about__title">
          <?php echo esc_html( get_theme_mod( 'set_about_title', __('Our mission and story') ) ); ?></h2>
        <p class="home-about__text">
          <?php echo esc_html( get_theme_mod( 'set_about_desc', __('I am Petra Csetneki,') ) ); ?></p>
        <div class="home-about__links">
          <a href="<?php echo esc_url( get_permalink( get_theme_mod( 'set_about_link1', '') ) ); ?>"
            class="btn"><?php echo esc_html( get_theme_mod( 'set_about_textlink1', __( 'Our Story' ) ) ); ?></a>
          <a href="<?php echo esc_url( get_permalink( get_theme_mod( 'set_about_link2', '') ) ); ?>"
            class="btn"><?php echo esc_html( get_theme_mod( 'set_about_textlink2', __( 'About Me' ) ) ); ?></a>
          <a href="<?php echo esc_url( get_permalink( get_theme_mod( 'set_about_link3', '') ) ); ?>"
            class="btn"><?php echo esc_html( get_theme_mod( 'set_about_textlink3', __( 'Ars Poetics' ) ) ); ?></a>
        </div>
      </div>
      <div class="home-about__image col-12 col-md-6">
        <!-- <img src="https://en.lasaphire.hu/wp-content/uploads/sites/2/2021/06/image_6483441-2-255x255.jpg" alt="Petra"> -->
        <img src="<?php echo $img_src ?>" alt="Petra">
      </div>

    </div>
  </div>
</section>
<?php endif; ?>