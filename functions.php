<?php
/**
 * La Saphire functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package La Saphire
*/

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	// require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
	require_once get_template_directory() . '/inc/wp_bootstrap4-mega-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

function register_customizer(){
	require_once get_template_directory() . '/inc/customizer.php';
}
add_action( 'after_setup_theme', 'register_customizer' );

function register_settings(){
	require_once get_template_directory() . '/inc/settings.php';
}
add_action( 'after_setup_theme', 'register_settings' );

require get_theme_file_path( '/inc/search-route.php' );

function la_saphire_scripts(){
	wp_enqueue_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', null, '3.6.0', true );
	wp_enqueue_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js', array( 'jquery' ), '4.6.1', true );
	wp_enqueue_script( 'main-lasaphire-js', get_template_directory_uri() . '/build/index.js', array(), '1.0', true );
	wp_enqueue_style( 'google-poppins', 'https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap' );
	wp_enqueue_style( 'google-fondamento', 'https://fonts.googleapis.com/css2?family=Fondamento&display=swap' );
	// wp_enqueue_style( 'google-montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap' );
	// wp_enqueue_style( 'google-pattaya', 'https://fonts.googleapis.com/css2?family=Pattaya&display=swap' );
	wp_enqueue_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), '5.15.3', 'all' );

	wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css', array(), '4.6.1', 'all' );
	wp_enqueue_style( 'la-saphire-style', get_template_directory_uri() . '/build/index.css', array(), '1.0', 'all' );

	wp_localize_script('main-lasaphire-js', 'lasaphireData', array(
		'root_url'	=> get_site_url(),
		'currencySymbol'	=> class_exists( 'WooCommerce' ) ? get_woocommerce_currency_symbol() : '',
		'currencyPos'	=> get_option( 'woocommerce_currency_pos', '' ),
		'inputPlaceholder'	=> esc_html__( 'start typing what you are looking for', 'lasaphire'),
		'productsName' => esc_html__( 'products', 'lasaphire' ),
		'ingredientsName' => esc_html__( 'ingredients', 'lasaphire' ),
		'postsName' => esc_html__( 'posts', 'lasaphire' ),
		'pagesName' => esc_html__( 'pages', 'lasaphire' ),
		'faqsName'	=> esc_html__( 'faqs', 'lasaphire' ),
		'noResults'	=> esc_html__( 'unfortunately there are no results for your search.', 'lasaphire' ),
	));
}
add_action('wp_enqueue_scripts', 'la_saphire_scripts');

function la_saphire__admin_scripts( $hook ) {
	wp_enqueue_script ( 'main-admin-js', get_template_directory_uri() . '/build/main-admin.js' );
}
add_action('admin_enqueue_scripts', 'la_saphire__admin_scripts');

function lasaphire_custom_rest(){
	register_rest_field( 'post', 'authorName', array(
		'get_callback' => function(){return get_the_author();},
	) );
}
add_action('rest_api_init', 'lasaphire_custom_rest');

function la_saphire_config(){
	register_nav_menus(
		array(
			'la_saphire_main_menu'	=> esc_html__( 'La Saphire Main Menu', 'lasaphire' ),
			'la_saphire_footer_menu' => esc_html__( 'La Saphire Footer Menu', 'lasaphire' ),
			'la_saphire_social_menu' => esc_html__( 'La Saphire Social Menu', 'lasaphire' ),
			'la_sapire_shop_nav' => esc_html__( 'La Saphire Shop Category Menu', 'lasaphire' ),
		)
	);

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

	// var_dump(get_pages(array('post_type' => 'product')));

function ls_nav_menu_add_megamenu_items_title_image( $title, $menu_item ) {

	$menu_item_classes = $menu_item->classes;


	// If menu item doesn't have any classes or children, return unchanged title.
	if ( empty( $menu_item_classes ) || ! in_array( 'mega-column', $menu_item_classes ) ) {
		return $title;
	}

	$image = has_post_thumbnail($menu_item->object_id) ? esc_url(get_the_post_thumbnail_url($menu_item->object_id, 'thumbnail')) : '';

	// Add div around original text to separate it from down arrow
	// (if you need a way to select only the text with CSS)
	$output_title = '<h5>' . $title . '</h5>';
	$output_title .= '<div class="mega-img">';
	$output_title .= '<img src="' . $image . '">';
	$output_title .= '</div>';

	return $output_title;
}

add_filter( 'nav_menu_item_title', 'ls_nav_menu_add_megamenu_items_title_image', 10, 2 );

	/**
		* Gutenberg block editor disabled
	*/
	// add_filter( 'use_block_editor_for_post', '__return_false' );

	/* specified post type */
	// add_filter( 'use_block_editor_for_post_type', function( $enabled, $post_type ) {
	//     return 'ls_quiz' === $post_type ? false : $enabled;
	// }, 10, 2 );

	$textdomain = 'lasaphire';
	load_theme_textdomain( $textdomain, get_stylesheet_directory() . '/languages/' );
	load_theme_textdomain( $textdomain, get_template_directory() . '/languages/' );

	// WooCommerce Support Setup
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 255,
		'single_image_width'	=> 255,
		'product_grid'			=> array(
			'default_rows'		=> 4,
			'min_rows'			=> 1,
			'max_rows'			=> 10,
			'default_columns'	=> 4,
			'min_columns'		=> 1,
			'max_columns'		=> 6,
		)
	) );

	// add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'wc-product-gallery-lightbox' );

	add_theme_support( 'custom-logo', array(
		'height' 		=> 85,
		'width'			=> 160,
		'flex_height'	=> true,
		'flex_width'	=> true,
	) );

	//add featured image
	add_theme_support( 'post-thumbnails' );

	// Register new image size
	add_image_size( 'la-saphire-slider', 1920, 1080, array( 'center', 'center' ) );
	add_image_size( 'la-saphire-page-banner', 1920, 540, array( 'center', 'top') );
	// add_image_size( 'la-saphire-page-banner', 1280, 180, array( 'center', 'center' ) );
	add_image_size( 'la-saphire-blog', 960, 640, array( 'center', 'center' ) );

	if ( ! isset( $content_width ) ) {
		$content_width = 600;
	}

	// SEO Titles
	add_theme_support( 'title-tag' );
}

add_action( 'after_setup_theme', 'la_saphire_config', 0 );

if( class_exists( 'WooCommerce' )){
	require get_template_directory() . '/inc/wc-modifications.php';
}

/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'la_saphire_woocommerce_header_add_to_cart_fragment' );

function la_saphire_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
<span class="items"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
<?php
	$fragments['span.items'] = ob_get_clean();
	return $fragments;
}

// add_action( 'customize_register', 'ls_customize_register' );
// function ls_customize_register( WP_Customize_Manager $wp_customize ) {
// 	require_once get_stylesheet_directory() . '/inc/customizer-controls/dropdown-category.php';
// 	require_once get_stylesheet_directory() . '/inc/customizer-controls/dropdown-product.php';
// }

// Widgets Setup

add_action( 'widgets_init', 'la_saphire_sidebars' );
function la_saphire_sidebars(){
	register_sidebar(
		array(
			'name'										=> esc_html__( 'La Saphire Main Sidebar', 'lasaphire' ),
			'id'												=> 'la_saphire-sidebar-1',
			'description'			=> esc_html__( 'Drag and drop your widgets here', 'lasaphire' ),
			'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">',
			'after_widget'		=> '</div>',
			'before_title'		=> '<h4 class="widget-title">',
			'after_title'			=> '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'										=> esc_html__( 'La Saphire Sidebar Shop', 'lasaphire' ),
			'id'												=> 'la_saphire-sidebar-shop',
			'description'			=> esc_html__( 'Drag and drop your WooCommerce widgets here', 'lasaphire' ),
			'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">',
			'after_widget'		=> '</div>',
			'before_title'		=> '<h4 class="widget-title">',
			'after_title'			=> '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'										=> esc_html__('La Saphire Footer Sidebar 1', 'lasaphire' ),
			'id'												=> 'la_saphire-footer-sidebar-1',
			'description'			=> esc_html__('Drag and drop your widgets here', 'lasaphire' ),
			'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">',
			'after_widget'		=> '</div>',
			'before_title'		=> '<h4 class="widget-title">',
			'after_title'			=> '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'										=> esc_html__( 'La Saphire Footer Sidebar 2', 'lasaphire' ),
			'id'												=> 'la_saphire-footer-sidebar-2',
			'description'			=> esc_html__( 'Drag and drop your widgets here', 'lasaphire' ),
			'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">',
			'after_widget'		=> '</div>',
			'before_title'		=> '<h4 class="widget-title">',
			'after_title'			=> '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'										=> esc_html__( 'La Saphire Footer Sidebar 3', 'lasaphire' ),
			'id'												=> 'la_saphire-footer-sidebar-3',
			'description'			=> esc_html__( 'Drag and drop your widgets here', 'lasaphire' ),
			'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">',
			'after_widget'		=> '</div>',
			'before_title'		=> '<h4 class="widget-title">',
			'after_title'			=> '</h4>',
		)
	);
}

// Implement Custom Post Type Setup

require get_template_directory() . '/inc/add-cpt.php';


// Send Contact Mail
function sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

add_action( 'wp_ajax_contact', 'contact_form' );
add_action( 'wp_ajax_nopriv_contact', 'contact_form' );
function contact_form(){

	if( !wp_verify_nonce( $_POST['nonce'], 'ajax-nonce' ) ){
		$return = array(
			'status' => 'error'
		);
		wp_send_json( $return, 401);
		die();
	}

	// Admin email
	$admin_email = get_option('admin_email');

	// Sanitize data
	$name = sanitize_text_field( $_POST['name'] );
	$email = sanitize_email( $_POST['email'] );
	$enquiry = sanitize_textarea_field( $_POST['enquiry'] );
	$phone = sanitize_phone_number( $_POST['phone'] );

	// Email headers
	$headers[] = 'Content-Type: text/html; charset=UTF-8';
	$headers[] = 'From: My Website <' . $admin_email . '>';
	$headers[] = 'Reply-to:' . $email;

	// who are we sending the email to?
	$send_to = $admin_email;

	// Subject
	$subject = 'Contact message from ' . $name;

	// Message
	$message = '';
	$message .= '<strong>name</strong>: ' . $name . '<br />';
	$message .= '<strong>email</strong>: ' . $email . '<br />';
	$message .= '<strong>phone</strong>: ' . $phone . '<br />';
	$message .= '<strong>message</strong>: ' . $enquiry . '<br />';

	try {
		if( wp_mail( $send_to, $subject, $message, $headers) ){
			$return = array(
				'status' => 'success',
				'message' => 'Email sent',
			);
		} else {
			$return = array (
				'status' => 'error',
			);
		}
	} catch( Exception $e ) {
		$return['message'] = $e->getMessage();
		// wp_send_json( $e->getMessage());
	}

	wp_send_json($return);

	wp_die();
}

// SMTP Setup
function send_smtp_email( $phpmailer ){
	$phpmailer->SMTPDebug = 0;
	$phpmailer->IsSMTP();
	$phpmailer->SMTPAuth = get_option('smtp_auth');
	$phpmailer->Host = get_option('smtp_host');
	// $phpmailer->Port = get_option('smtp_port');
	$phpmailer->Port = SMTP_PORT;
	$phpmailer->Username = get_option('smtp_user');
	// $phpmailer->Password = get_option('smtp_pass');
	$phpmailer->Password = SMTP_PASS;
	// $phpmailer->SMTPSecure = get_option('smtp_secure');
	$phpmailer->SMTPSecure = SMTP_SECURE;
	$phpmailer->From = get_option('smtp_from');
	$phpmailer->FromName = get_option('smtp_name');
}
add_action( 'phpmailer_init', 'send_smtp_email' );

//MailerLite Get Subscribe Group
add_action( 'wp_ajax_get_newsletter_group', 'get_newsletter_group' );
add_action( 'wp_ajax_nopriv_get_newsletter_group', 'get_newsletter_group' );
function get_newsletter_group(){
	$return = array();
	if( !wp_verify_nonce( $_POST['nonce'], 'ajax-nonce' ) ){
		$return = array(
			'status' => 'error',
			'message' => 'nonce error',
		);
		wp_send_json( $return, 401);
		die();
	}
	$apikey = get_option( 'lasaphire_newsletter_apikey_field' );
	$url = 'https://api.mailerlite.com/api/v2/groups';
	$args = array(
		'headers' => array(
			'Content-Type' => 'application/json',
			'X-MailerLite-ApiKey' => $apikey,
		)
	);
	$response = wp_remote_get($url, $args);
	$response_code = wp_remote_retrieve_response_code($response);

	if( 401 === $response_code) {
		$return = array(
			'status' => 'error',
			'message' => 'Unauthorized access',
		);
	};
	if ( 200 !== $response_code){
		$return = array(
			'status' => 'error',
			'message' => 'Error in pinging API',
		);
	} else {
		$return = array(
			'status' => 'success',
			'message' => 'Subscribe is success',
		);
	};

	wp_send_json($return);
	wp_die();
}

// MailerLite Subscribe
add_action( 'wp_ajax_newsletter_subscribe', 'newsletter_subscribe' );
add_action( 'wp_ajax_nopriv_newsletter_subscribe', 'newsletter_subscribe' );
function newsletter_subscribe(){
	$return = array();
	if( !wp_verify_nonce( $_POST['nonce'], 'ajax-nonce' ) ){
		$return = array(
			'status' => 'error',
			'message' => 'nonce error',
		);
		wp_send_json( $return, 401);
		die();
	}
	$apikey = get_option( 'lasaphire_newsletter_apikey_field' ); //0871466cb349fda223fc4f8c3ddd8e9f
	$group = get_option( 'lasaphire_newsletter_group' ); //108724643
	$url = 'https://api.mailerlite.com/api/v2/groups/' . $group . '/subscribers';
	$name = sanitize_text_field( $_POST['name'] );
	$email = sanitize_email( $_POST['email'] );
	$body = array(
		'email' => $email,
		'name' => $name,
	);
	$args = array(
		'headers' => array(
			'Content-Type' => 'application/json',
			'X-MailerLite-ApiKey' => $apikey,
		),
		'body' => json_encode($body),
	);

	$response = wp_remote_post($url, $args);
	$response_code = wp_remote_retrieve_response_code($response);

	if( 401 === $response_code) {
		$return = array(
			'status' => 'error',
			'message' => 'Unauthorized access',
		);
	};
	if ( 200 !== $response_code){
		$return = array(
			'status' => 'error',
			'message' => 'Error in pinging API',
		);
	} else {
		$return = array(
			'status' => 'success',
			'message' => 'Subscribe is success',
		);
	};

	wp_send_json($return);
	wp_die();
}


// add_action('pre_get_posts', 'exclude_product_category');
// function exclude_product_category( $query ) {

//     if ($query->is_search()) {
//         $tax_query = (array) $query->get('tax_query');

//         $tax_query[] = array(
//                'taxonomy' => 'product_cat',
//                'field' => 'slug',
//                'terms' => array('excluded-category'),
//                'operator' => 'NOT IN'
//         );

//         $query->set('tax_query', $tax_query);

//     }
//     return $query;
// }