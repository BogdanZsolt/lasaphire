<?php
function la_saphire_wc_modify(){
	/**
	 * Modify WooCommerce opening and closing HTML tags
	 * We need Bootstrap-like opening/closing HTML tags
	*/
	add_action('woocommerce_before_main_content', 'la_saphire_add_banner', 1);
	function la_saphire_add_banner() {
		$id = wc_get_page_id( 'shop' );
		$page = get_page_by_path( 'contact' );
		$page = get_permalink( $page->ID );
		$src = wp_get_attachment_image_url(get_post_thumbnail_id( $id ), 'la-saphire-page-banner', false);
		$src_mobile = wp_get_attachment_image_url(get_post_thumbnail_id( $id ), 'woocommerce_thumbnail', false);
		echo '<div class="banner mb-5">
				<img src="' . esc_url($src) . '" id="shop-img" class="img-fluid" alt="shop banner photo">
				<img src="' . esc_url($src_mobile) . '" id="shop-img-mobile" class="img-mobile" alt="shop mobile banner photo">
				<div class="banner-content overlay">
					<h1>' . get_the_title( $id ) . '</h1>
				</div>
			</div>
			<div class="container buy-message mt-5 mb-5">
				<h2>Kedves Látogatók! A shop működéséig egy kis türelmüket kérjük! Addig is a termékekről érdeklődni személyesen( <span><a href="mailto:cspetra8@gmail.com">cspetra8@gmail.com </a>emailben, a </span><span><a href="tel:+36304225096">+36 (30) 422-5096</a> telefonszámon, </span><span>vagy a <a href="' . esc_url( $page ) . '">Kapcsolat</a> oldalon található elérhetőségek egyikén) tudnak.</span> Köszönjük! LaSaphire</h2>
			</div>';
	}

	if( is_shop() || is_product_category()){
		add_action('woocommerce_before_main_content', 'la_saphire_open_category_menu_container_row', 2);
		function la_saphire_open_category_menu_container_row() {
			echo '<div class="container-fluid">
					<div class="row">
						<div class="shop-category-menu col text-center">';
		}

		add_action('woocommerce_before_main_content', 'la_saphire_add_category_menu', 3);
		function la_saphire_add_category_menu() {
			echo wp_nav_menu( array( 'theme_location' => 'la_sapire_shop_nav' ) );
		}

		add_action('woocommerce_before_main_content', 'la_saphire_close_category_menu_container_row', 4);
		function la_saphire_close_category_menu_container_row() {
			echo '</div></div></div>';
		}
	}

	add_action( 'woocommerce_before_main_content', 'la_saphire_open_container_row', 5 );
	function la_saphire_open_container_row(){
		echo '<div class="container shop-content"><div class="row">';
	}

	add_action( 'woocommerce_after_main_content', 'la_saphire_close_container_row', 5 );
	function la_saphire_close_container_row(){
		echo '</div></div>';
	}

	/**
	* remove add to cart button
	*/
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );

	/**
	* remove add to cart button on single product page
	*/
	remove_action( 'woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30 );
	remove_action( 'woocommerce_grouped_add_to_cart', 'woocommerce_grouped_add_to_cart', 30 );

	/**
	 * Remove the main WC sidebar from its original position
	 * We'll be including it somewhere else leter on
	*/
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar' );

	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

	if( is_shop() && is_active_sidebar( 'la_saphire-sidebar-shop' ) ){

		add_action( 'woocommerce_before_main_content', 'la_saphire_add_sidebar_tags', 6 );
		function la_saphire_add_sidebar_tags(){
			echo '<div class="sidebar-shop col-lg-3 col-md-4 order-2 order-md-1">';
		}

		// Put the main WC sidebar back, but using other action hook and on a different position
		add_action( 'woocommerce_before_main_content', 'woocommerce_get_sidebar', 7 );

		add_action( 'woocommerce_before_main_content', 'la_saphire_close_sidebar_tags', 8 );
		function la_saphire_close_sidebar_tags(){
			echo '</div>';
		}

		add_action( 'woocommerce_after_shop_loop_item_title', 'the_excerpt', 1 );
	}

	// Modify HTML tags on a shop page, We also want Bootstrap-like markup here (.primary div)
	add_action( 'woocommerce_before_main_content', 'la_saphire_add_shop_tags', 9 );
	function la_saphire_add_shop_tags(){
		if( is_shop() && is_active_sidebar( 'la_saphire-sidebar-shop' )){
			echo '<div class="col-lg-9 col-md-8 order-1 order-md-2">';
		} else {
			echo '<div class="col">';
		}
	}

	add_action( 'woocommerce_after_main_content', 'la_saphire_close_shop_tags', 4 );
	function la_saphire_close_shop_tags(){
		echo '</div>';
	}

	// Just Test

	add_action ( "woocommerce_before_shop_loop_item", "after_li_start", 5 );

	function after_li_start () {
    	echo '<div data-koa="zoom">';
	}

	add_action( 'woocommerce_before_shop_loop_item_title', 'add_product_image_wrapper', 8 );

	function add_product_image_wrapper(){
		global $product;

		if( $product->get_gallery_image_ids()){
			echo '<div class="woocommerce-img-wrapper">';
		}
	}

	add_action ( 'woocommerce_before_shop_loop_item_title', 'add_product_second_thumbnail', 15 );

	function add_product_second_thumbnail(){
		global $product;

		$img_ids = $product->get_gallery_image_ids();
		if( $img_ids ){
			echo '<div class="woocommerce-product-secondary-img">';
				echo wp_get_attachment_image( $img_ids[0], 'woocommerce_thumbnail' );
				echo '</div>
			</div>';
		}
	}

	add_action ( "woocommerce_after_shop_loop_item", "before_li_start", 10 );

	function before_li_start () {
    	echo "</div>";
	}

	add_filter( 'woocommerce_show_page_title', 'la_saphire_remove_shop_title' );
	function la_saphire_remove_shop_title( $val ){
		$val = false;
		return $val;
	}
}
add_action( 'wp', 'la_saphire_wc_modify' );