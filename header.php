<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package La Saphire
 */

 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="https://gmpg.org/xfn/11" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div id="page" class="site">

    <div class="fixed-top" id="top-bar">
      <div class="container-fluid">
        <div class="row">
          <!-- <div class="search-container"><php get_search_form(); ></div> -->
          <div class="brand">
            <a href="<?php echo home_url( '/' ) ?>">
              <?php if( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
								the_custom_logo();
							} else { ?>
              <svg class="lasaphire-logo">
                <use href="#lasaphire-logo"></use>
              </svg>
              <!-- <span class="brand-logo">La Saphire</span> -->
              <?php } ?>
            </a>
          </div>
          <div class="col-md-9 col-lg-10">
            <nav class="main-menu navbar navbar-expand-md navbar-light" role="navigation">
              <!-- Brand and toggle get grouped for better mobile display -->
              <button class="navbar-toggler col-2" type="button" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1"
                aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'lasaphire' ); ?>">
                <div class="navbar-toggler-btn">
                  <div class="navbar-toggler-burger"></div>
                  <!-- <i class="fas fa-bars"></i> -->
                </div>
              </button>

              <?php
							wp_nav_menu( array(
								'theme_location' => 'la_saphire_main_menu',
								'depth' => 3,
								'container' => 'div',
								'container_class' => 'collapse navbar-collapse',
								'container_id' => 'bs-example-navbar-collapse-1',
								'menu_class' => 'nav navbar-nav fullwidth',
								'fallback_cb' => 'BootstrapNavMenuWalker::fallback',
								'walker' => new BootstrapNavMenuWalker(),
							) );
							?>
            </nav>
          </div>
        </div>
      </div>
    </div>