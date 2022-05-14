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
							<button class="navbar-toggler col-2" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'lasaphire' ); ?>">
								<div class="navbar-toggler-btn">
									<div class="navbar-toggler-burger"></div>
									<!-- <i class="fas fa-bars"></i> -->
								</div>
							</button>

							<?php
							wp_nav_menu( array(
								'theme_location'    => 'la_saphire_main_menu',
								'depth'             => 3,
								'container'         => 'div',
								'container_class'   => 'collapse navbar-collapse',
								'container_id'      => 'bs-example-navbar-collapse-1',
								'menu_class'        => 'nav navbar-nav',
								'fallback_cb'       => 'BootstrapNavMenuWalker::fallback',
								'walker'            => new BootstrapNavMenuWalker(),
							) );
							?>
							<div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
								<ul id="la-saphire-additional-menu" class="nav navbar-nav ml-auto mr-5">
									<?php if( class_exists( 'WooCommerce' ) ) : ?>
									<li id="myaccount-link" class="nav-item">
										<a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>" class="nav-link"><?php esc_html_e( 'My Account', 'lasaphire' ); ?></a>
									</li>
									<?php endif; ?>
									<li id="search" class="search nav-item">
										<a class="nav-link" id="search-button"></a>
									</li>
									<?php if( class_exists( 'WooCommerce' ) ) : ?>
									<li id="cart" class="cart">
										<a href="<?php echo wc_get_cart_url(); ?>"><span class="cart-icon"><i class="fas fa-shopping-bag"></i></span></a>
										<span class="items"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
									</li>
									<?php endif; ?>
									<li id="change-lang-link" class="nav-item">
										<a class="nav-link" href="https://<?php esc_html_e( 'hu', 'lasaphire' ); ?>.lasaphire.hu"><?php esc_html_e( 'hu', 'lasaphire'); ?></a>
									</li>
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
