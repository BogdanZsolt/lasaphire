<?php
/**
 * Function.php Nav Menu template part.
 *
 * @subpackage  inc
 * @version     1.0.0
 * @since       1.0.0
 */

register_nav_menus(
	array(
		'la_saphire_main_menu' => esc_html__( 'La Saphire Main Menu', 'lasaphire' ),
		'la_saphire_footer_menu' => esc_html__( 'La Saphire Footer Menu', 'lasaphire' ),
		'la_saphire_social_menu' => esc_html__( 'La Saphire Social Menu', 'lasaphire' ),
		'la_sapire_shop_nav' => esc_html__( 'La Saphire Shop Category Menu', 'lasaphire' ),
	)
);

// $locations = get_theme_mod('nav_menu_locations');
// $locations['la_saphire_additional_menu'] = $term_id_of_menu;
// set_theme_mod( 'nav_menu_locations', $locations );

$location = 'la_saphire_main_menu';
$css_class = 'mega-menu-parent';
$locations = get_nav_menu_locations();
if ( isset( $locations[ $location ] ) ) {
	$menu = get_term( $locations[ $location ], 'nav_menu' );
	if ( $items = wp_get_nav_menu_items( $menu->name ) ) {
		foreach ( $items as $item ) {
			if ( in_array( $css_class, $item->classes ) ) {
				register_sidebar( array(
					'id'   => 'mega-menu-item-' . $item->ID,
					'description' => 'Mega Menu items',
					'name' => $item->title . ' - Mega Menu',
					'before_widget' => '<li id="%1$s" class="mega-menu-item">',
					'after_widget' => '</li>',
				));
			}
		}
	}
}

function ls_nav_menu_add_elements_main_menu($items, $args){
	if($args->theme_location == 'la_saphire_main_menu'){
		if( class_exists( 'WooCommerce' ) ){
			$html = '<li id="myaccount-link" class="nav-item ml-md-auto">';
				$html .='<a href="' . esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ) . '" class="nav-link my-account-link" title="' . esc_html__( 'My Account', 'lasaphire' ) . '">';
					if(is_user_logged_in()){
						$current_user = wp_get_current_user();
						$html .= esc_html($current_user->display_name);
					} else {
						$html .= __( 'LogIn', 'lasaphire' );
						$html .= ' / ';
						$html .= __( 'SignUp', 'lasaphire' );
					}
				$html .= '</a>';
			$html .='</li>';
		}
		$html .='<li id="search" ';
		if (!class_exists('WooCommerce')){
			$html .= 'class="search nav-item ml-md-auto"';
		} else {
			$html .= 'class="search nav-item"';
		}
		$html .= '">';
			$html .='<a class="nav-link" id="search-button" title="' . esc_html__('search', 'lasaphire') . '"></a>';
		$html .='</li>';
		if( class_exists( 'WooCommerce' ) ){
			$html .='<li id="cart" class="cart">';
				$html .='<a href="' . esc_url( wc_get_cart_url() ) . '" title="' . esc_html__('cart', 'lasaphire') . '">';
					$html .='<span class="cart-icon">';
						$html .='<i class="fas fa-shopping-bag"></i>';
					$html .='</span>';
					$html .='<span class="items">' . WC()->cart->get_cart_contents_count() . '</span>';
				$html .='</a>';
			$html .='</li>';
		}
		$html .='<li id="change-lang-link"';
		if (!class_exists('WooCommerce')){
			$html .= ' class="nav-item mr-md-5 mb-5 mb-md-0">';
		} else {
			$html .= ' class="nav-item mb-5 mb-md-0">';
		}
			$html .='<a class="nav-link" href="https://' . esc_html__( 'hu', 'lasaphire' ) . '.lasaphire.hu">';
				$html .=esc_html__( 'hu', 'lasaphire');
			$html .='</a>';
		$html .='</li>';

		$items .= $html;
	}
	return $items;
}
add_filter('wp_nav_menu_items', 'ls_nav_menu_add_elements_main_menu', 10, 2);

function ls_nav_menu_add_megamenu_items_title_image( $title, $menu_item ) {

	$menu_item_classes = $menu_item->classes;


	// If menu item doesn't have any classes or children, return unchanged title.
	if ( empty( $menu_item_classes ) || ! in_array( 'mega-column', $menu_item_classes ) ) {
		return $title;
	}

	$image = has_post_thumbnail($menu_item->object_id) ? esc_url(get_the_post_thumbnail_url($menu_item->object_id, 'thumbnail')) : get_placeholder_image('thumbnail');

	// Add div around original text to separate it from down arrow
	// (if you need a way to select only the text with CSS)
	$output_title = '<h5>' . $title . '</h5>';
	$output_title .= '<div class="mega-img">';
	$output_title .= '<img src="' . $image . '">';
	$output_title .= '</div>';

	return $output_title;
}
add_filter( 'nav_menu_item_title', 'ls_nav_menu_add_megamenu_items_title_image', 10, 2 );