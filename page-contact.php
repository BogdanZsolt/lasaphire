<?php
/*
Template Name: Contact Page
*/

get_header();
	while( have_posts() ): the_post();
		$src = get_the_post_thumbnail_url( null, 'la-saphire-page-banner' );
		$src_mobile = get_the_post_thumbnail_url( null, 'woocommerce_thumbnail' );
	?>
<section id="contact" class="mb-5">
  <div class="banner mb-5">
    <img src="<?php echo esc_url($src) ?>" class="img-fluid" alt="banner photo">
    <img src="<?php echo esc_url($src_mobile) ?>" class="img-mobile" alt="banner photo">
    <div class="banner-content overlay">
      <h1><?php the_title(); ?></h1>
      <?php
					// Load posts loop
					endwhile;
				?>
    </div>
  </div>
  <div class="container mt-5">
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="contact-container">
          <h2 class="mb-4"><?php _e( 'Bravely Reach Out in Person!', 'lasaphire' ); ?></h2>
          <h3><i class="fas fa-map-marker-alt"></i><?php _e( 'Address', 'lasaphire' ); ?></h3>
          <p>
            <a href="https://goo.gl/maps/sZa4oh4PzDrCwscn6" target="_blank" rel="noopener">
              <?php echo esc_html( get_theme_mod( 'set_address_1', __( '1122 Budapest Határőr út 40.', 'lasaphire' ) ) ); ?><br /><?php echo esc_html( get_theme_mod( 'set_address_2', __( 'Hungary', 'lasaphire' ) ) ); ?>
            </a>
          </p>
          <h3><?php _e( 'contact hours', 'lasaphire' ); ?></h3>
          <p>
            <?php echo esc_html( get_theme_mod( 'set_contact_hours', __( 'Monday - Friday 9:00am - 6:00pm', 'lasaphire' ) ) ); ?>
          </p>
          <h3><i class="fas fa-phone-alt"></i><?php _e( 'telephone', 'lasaphire' ); ?></h3>
          <p>
            <a href="tel:<?php echo esc_html( get_theme_mod( 'set_contact_phone', __( '+36 (30) 422-5096', 'lasaphire' ) ) ); ?>"
              title="<?php _e( 'Telefon La Saphire', 'lasaphire' ); ?>"><?php echo esc_html( get_theme_mod( 'set_contact_phone', __( '+36 (30) 422-5096', 'lasaphire' ) ) ); ?></a>
          </p>
          <h3><i class="far fa-envelope"></i><?php _e( 'Email', 'lasaphire' ); ?></h3>
          <p>
            <a href="mailto:<?php echo esc_html( get_theme_mod( 'set_contact_email', __( 'cspetra8@gmail.com', 'lasaphire' ) ) ); ?>"
              title="<?php _e( 'email La Saphire', 'lasaphire' ); ?>"><?php echo esc_html( get_theme_mod( 'set_contact_email', __( 'cspetra8@gmail.com', 'lasaphire' ) ) ); ?></a>
          </p>
          <div class="social-menu mb-4">
            <?php
								wp_nav_menu(
									array(
										'theme_location'	=> 'la_saphire_social_menu',
									)
								);
							?>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6">
        <h2 class="mb-1"><?php _e( 'Waiting for your message!', 'lasaphire' ); ?></h2>
        <!-- <p>(<?php _e( 'Send a message!', 'lasaphire' ); ?>)</p> -->
        <?php get_template_part('template-parts/content/form', 'contact'); ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>