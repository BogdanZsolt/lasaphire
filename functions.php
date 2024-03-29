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
	wp_enqueue_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js', array( 'jquery' ), '4.6.1', true );
	wp_enqueue_script( 'main-lasaphire-js', get_template_directory_uri() . '/build/index.js', array(), '1.0', true );
	wp_enqueue_style( 'google-poppins', 'https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap' );
	wp_enqueue_style( 'google-fondamento', 'https://fonts.googleapis.com/css2?family=Fondamento&display=swap' );
	// wp_enqueue_style( 'google-montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap' );
	// wp_enqueue_style( 'google-pattaya', 'https://fonts.googleapis.com/css2?family=Pattaya&display=swap' );
	wp_enqueue_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), '5.15.3', 'all' );

	wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css', array(), '4.6.1', 'all' );
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
	wp_enqueue_style('la-saphire-admin-style', get_template_directory_uri() . '/build/main-admin.css', array(), '1.0', 'all');
}
add_action('admin_enqueue_scripts', 'la_saphire__admin_scripts');

function lasaphire_custom_rest(){
	register_rest_field( 'post', 'authorName', array(
		'get_callback' => function(){return get_the_author();},
	) );
}
add_action('rest_api_init', 'lasaphire_custom_rest');

function la_saphire_config(){

	require get_theme_file_path( '/inc/nav-functions.php' );

	// var_dump(get_pages(array('post_type' => 'product')));

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
		'thumbnail_image_width' => 300,
		'product_grid' => array(
			'default_rows' => 4,
			'min_rows' => 1,
			'max_rows' => 10,
			'default_columns' => 4,
			'min_columns' => 1,
			'max_columns' => 6,
		)
	));

	// add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'wc-product-gallery-lightbox' );

	add_theme_support( 'custom-logo', array(
		'width' => 200, /* 160 */
		'height' => 100, /* 85 */
		'flex_height' => true,
		'flex_width' => true,
	) );

	//add featured image
	add_theme_support( 'post-thumbnails' );

	// add_filter( 'big_image_size_threshold', '__return_false');
	// function ls_remove_default_image_sizes( $sizes ) {
	// 	/* With WooCommerce */
	// 	unset( $sizes[ '1536x1536' ]);
	// 	unset( $sizes[ '2048x2048' ]);

	//   return $sizes;
	// }
	// add_filter( 'intermediate_image_sizes_advanced', 'ls_remove_default_image_sizes' );

	// Large Size Thumbnail
	if(!get_option( 'large_crop')){
		add_option('large_crop', '1');
	} else {
		update_option('large_crop', '1');
	}

	update_option('large_size_w', 900);
	update_option('large_size_h', 900);

	remove_image_size( '1536x1536' );
	remove_image_size( '2048x2048' );

	// Register new image size
	add_image_size( 'la-saphire-background', 1600, 900, array( 'center', 'center' ) );
	add_image_size( 'la-saphire-banner', 1280, 360, array( 'center', 'center') );
	add_image_size( 'la-saphire-mobile', 300, 300, array( 'center', 'center' ) );
	add_image_size( 'la-saphire-featured-landscape', 640, 360, array( 'center', 'center') );
	add_image_size( 'la-saphire-featured-portrait', 360, 640, array( 'center', 'center') );
	// add_image_size( 'la-saphire-blog', 960, 540, array( 'center', 'center' ) );

	if ( ! isset( $content_width ) ) {
		$content_width = 640;
	}

	// SEO Titles
	add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'la_saphire_config', 0 );

add_filter('intermediate_image_sizes', function($sizes) {
  return array_diff($sizes, ['medium_large']);  // Medium Large (768 x 0)
});

add_filter('woocommerce_get_image_size_single', function($size){
	return array(
		'width' => 640,
		'height' => 360,
		'crop' => 1,
	);
});

if( class_exists( 'WooCommerce' )){
	require get_template_directory() . '/inc/wc-modifications.php';
}

/**
 * Show cart contents / total Ajax
 */

function la_saphire_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
<span class="items"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
<?php
	$fragments['span.items'] = ob_get_clean();
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'la_saphire_woocommerce_header_add_to_cart_fragment' );

function la_saphire_wc_placeholder_src($src){
	$src = get_template_directory_uri() . '/img/placeholders/placeholder-woocommerce_thumbnail.webp';
	return $src;
}
add_filter('woocommerce_placeholder_img_src', 'la_saphire_wc_placeholder_src');

// add_action( 'customize_register', 'ls_customize_register' );
// function ls_customize_register( WP_Customize_Manager $wp_customize ) {
// 	require_once get_stylesheet_directory() . '/inc/customizer-controls/dropdown-category.php';
// 	require_once get_stylesheet_directory() . '/inc/customizer-controls/dropdown-product.php';
// }

// Widgets Setup

function images_sizes_set() {
 global $_wp_additional_image_sizes;
 $get_sizes = get_intermediate_image_sizes();
 $list = "<ul>";
 foreach($get_sizes as $image){
  $list .= "<li>".$image."</li>";
 }
 $list .= "<ul>";
 echo $list;
}

 add_action( 'wp_dashboard_setup', 'md_dashboard_add_widgets');
 function md_dashboard_add_widgets() {
  if (current_user_can('manage_options')){
   wp_add_dashboard_widget( 'md_dashboard_widget_images_set', 'Image sizes set on this site', 'images_sizes_set' );
  }
 }

add_action( 'widgets_init', 'la_saphire_sidebars' );
function la_saphire_sidebars(){
	register_sidebar(
		array(
			'name' => esc_html__( 'La Saphire Main Sidebar', 'lasaphire' ),
			'id' => 'la_saphire-sidebar-1',
			'description' => esc_html__( 'Drag and drop your widgets here', 'lasaphire' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name' => esc_html__( 'La Saphire Sidebar Shop', 'lasaphire' ),
			'id' => 'la_saphire-sidebar-shop',
			'description' => esc_html__( 'Drag and drop your WooCommerce widgets here', 'lasaphire' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name' => esc_html__('La Saphire Footer Sidebar 1', 'lasaphire' ),
			'id' => 'la_saphire-footer-sidebar-1',
			'description' => esc_html__('Drag and drop your widgets here', 'lasaphire' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name' => esc_html__( 'La Saphire Footer Sidebar 2', 'lasaphire' ),
			'id' => 'la_saphire-footer-sidebar-2',
			'description' => esc_html__( 'Drag and drop your widgets here', 'lasaphire' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name' => esc_html__( 'La Saphire Footer Sidebar 3', 'lasaphire' ),
			'id' => 'la_saphire-footer-sidebar-3',
			'description' => esc_html__( 'Drag and drop your widgets here', 'lasaphire' ),
			'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		)
	);
}

// Implement Custom Post Type Setup

require get_template_directory() . '/inc/add-cpt.php';

function get_placeholder_image($size){
	$output = get_template_directory_uri() . '/img/placeholders/placeholder-' . $size . '.webp';
	return $output;
}


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

function get_newsletter_group(){
	$return = array();
	$apikey = sanitize_text_field(get_option( 'lasaphire_newsletter_apikey_field' ));
	$url = 'https://api.mailerlite.com/api/v2/groups';
	$args = array(
		'headers' => array(
			'Content-Type' => 'application/json',
			'X-MailerLite-ApiKey' => $apikey,
		)
	);
	$response = wp_remote_get($url, $args);
	$response_code = wp_remote_retrieve_response_code($response);
	if( 200 !== $response_code){
		return array();
	} else {
		$temps = json_decode($response['body']);
		$return = array();
		foreach($temps as $temp){
			$tmp = array(
				'id' => $temp->id,
				'name' => $temp->name,
			);
			array_push($return, $tmp);
		}
		return $return;
	}
}

function get_newsletter_account_stats(){
	$return = array();
	$apikey = sanitize_text_field(get_option( 'lasaphire_newsletter_apikey_field' ));
	$url = 'https://api.mailerlite.com/api/v2/stats';
	$args = array(
		'headers' => array(
			'Content-Type' => 'application/json',
			'X-MailerLite-Apikey' => $apikey,
		)
	);
	$response = wp_remote_get($url, $args);
	$response_code = wp_remote_retrieve_response_code($response);
	if( 200 !== $response_code){
		return $return;
	} else {
		$return = json_decode($response['body']);
	}
	return $return;
}

function get_newsletter_groups_stats(){
	$return = array();
	$apikey = sanitize_text_field(get_option( 'lasaphire_newsletter_apikey_field' ));
	$groupid = sanitize_text_field(get_option('lasaphire_newsletter_group'));
	$url = 'https://api.mailerlite.com/api/v2/groups/' . $groupid;
	$args = array(
		'headers' => array(
			'Content-Type' => 'application/json',
			'X-MailerLite-Apikey' => $apikey,
		),
	);
	$response = wp_remote_get($url, $args);
	$response_code = wp_remote_retrieve_response_code($response);
	if( 200 !== $response_code || empty($groupid)){
		return $return;
	} else {
		$return = json_decode($response['body']);
	}
	return $return;
}

//MailerLite Get Subscribe Group
// add_action( 'wp_ajax_get_newsletter_group', 'get_newsletter_group' );
// add_action( 'wp_ajax_nopriv_get_newsletter_group', 'get_newsletter_group' );
// function get_newsletter_group(){
// 	$return = array();
// 	if( !wp_verify_nonce( $_POST['nonce'], 'ajax-nonce' ) ){
// 		$return = array(
// 			'status' => 'error',
// 			'message' => 'nonce error',
// 		);
// 		wp_send_json( $return, 401);
// 		die();
// 	}
// 	$apikey = get_option( 'lasaphire_newsletter_apikey_field' );
// 	$url = 'https://api.mailerlite.com/api/v2/groups';
// 	$args = array(
// 		'headers' => array(
// 			'Content-Type' => 'application/json',
// 			'X-MailerLite-ApiKey' => $apikey,
// 		)
// 	);
// 	$response = wp_remote_get($url, $args);
// 	$response_code = wp_remote_retrieve_response_code($response);

// 	if( 401 === $response_code) {
// 		$return = array(
// 			'status' => 'error',
// 			'message' => 'Unauthorized access',
// 		);
// 	};
// 	if ( 200 !== $response_code){
// 		$return = array(
// 			'status' => 'error',
// 			'message' => 'Error in pinging API',
// 		);
// 	} else {
// 		$return = array(
// 			'status' => 'success',
// 			'message' => 'Subscribe is success',
// 		);
// 	};

// 	wp_send_json($return);
// 	wp_die();
// }



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
	var_dump($apikey);
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

/**
 * Install require plugins
 */
require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );

function my_theme_register_required_plugins() {
	$plugins = array(
		array(
			'name' => 'La Saphire Our Values',
			'slug' => 'la-saphire-our-values',
			'source' => get_stylesheet_directory() . '/bundled-plugins/la-saphire-our-values.zip',
			'required' => true,
		),
		array(
			'name' => 'LS Ingredient',
			'slug' => 'ls-ingredien',
			'source' => get_stylesheet_directory() . '/bundled-plugins/ls-ingredient.zip',
			'required' => true,
		),
		array(
			'name' => 'ZSB Slider',
			'slug' => 'zsb-slider',
			'source' => get_stylesheet_directory() . '/bundled-plugins/zsb-slider.zip',
			'required' => true,
		),
		array(
			'name' => 'Network Media Library',
			'slug' => 'network-media-library',
			'source' => get_stylesheet_directory() . '/bundled-plugins/network-media-library.zip',
			'required' => true,
		),
		array(
			'name' => 'WooCommerce',
			'slug' => 'woocommerce',
			'required' => true,
		),
		array(
			'name' => 'Regenerate Thumbnails',
			'slug' => 'regenerate-thumbnails',
			'required' => true
		),
	);

	$config = array(
		'id' => 'lasaphire',
		'default_path' => '',
		'menu' => 'tgmpa-install-plugins',
		'parent_slug' => 'themes.php',
		'capability' => 'edit_theme_options',
		'has_notices' => true,
		'dismissable' => true,
		'dismiss_msg' => '',
		'is_automatic' => false,
		'message' => '',
		'strings' => array(
			'page_title' => __( 'Install Required Plugins', 'lasaphire' ),
			'menu_title' => __( 'Install Plugins', 'lasaphire' ),
			'nag_type' => 'updated',
		)
	);
	tgmpa( $plugins, $config );
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