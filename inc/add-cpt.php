<?php

/**
 * La Saphire Add Custom Post Types
 *
 * @Package La Saphire
*/

// La Saphire - Custom Post Type

function lasaphire_cpt() {

    // Hero Slider CPT
    $hs_labels = array(
        'name'                  => esc_html__( 'Hero Sliders', 'lasaphire'),
		'add_new_item'			=> esc_html__( 'Add New Hero Slider', 'lasaphire' ),
		'edit_item'				=> esc_html__( 'Edit Hero Slider', 'lasaphire' ),
		'all_items'				=> esc_html__( 'All Hero Sliders', 'lasaphire' ),
        'singular_name'         => esc_html__( 'Hero Slider', 'lasaphire' ),
    );

    $hs_args = array(
		'show_in_rest'			=> true, // Modern block editor
        'rewrite'            	=> array( 'slug' => 'Hero Sliders' ),
        'labels'             	=> $hs_labels,
		'public'             	=> true,
        'show_ui'            	=> true,
        'show_in_menu'       	=> true,
        'query_var'          	=> true,
        'capability_type'    	=> 'post',
        'has_archive'        	=> true,
        'hierarchical'       	=> false,
        'menu_position'      	=> null,
        'supports'           	=> array( 'title', 'editor', 'thumbnail'),
		'menu_icon' 			=> 'dashicons-embed-photo',
    );

    register_post_type( 'heroslider', $hs_args );

    // FAQ CPT
    $faq_labels = array(
        'name'          => esc_html__( 'FAQs', 'lasaphire' ),
        'menu_name'     => esc_html__( 'FAQs', 'lasaphire' ),
        'add_new'       => esc_html__( 'Add New ', 'lasaphire' ),
        'add_new_item'  => esc_html__( 'Add New FAQ', 'lasaphire' ),
        'new_item'      => esc_html__( 'New FAQ', 'lasaphire' ),
        'all_items'     => esc_html__( 'All FAQs', 'lasaphire' ),
        'edit_item'     => esc_html__( 'Edit FAQ', 'lasaphire' ),
        'view_item'     => esc_html__( 'View FAQ', 'lasaphire' ),
        'search_items'  => esc_html__( 'Search FAQs', 'lasaphire' ),
        'not_found'     => esc_html__( 'No FAQs Found', 'lasaphire' ),
    );

    $faq_args = array(
		'show_in_rest'			=> true,
        'rewrite'            	=> array( 'slug' => 'FAQs' ),
        'labels'                => $faq_labels,
        'hierarchical'          => true,
        'description'           => 'FAQs',
        'supports'              => array( 'title', 'editor' ),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'publicly_queryable'    => true,
        'exclude_from_search'   => false,
        'has_archive'           => true,
        'query_var'             => true,
        'can_export'            => true,
        'rewrite'               => true,
        'capability_type'       => 'post',
        'menu_icon' 			=> 'dashicons-list-view',
    );

    register_post_type( 'ls_faq', $faq_args );

}

add_action( 'init', 'lasaphire_cpt' );

// La Saphire - Create taxonomies

function laspahire_create_taxonomies() {

    // FAQ - categories
    register_taxonomy(
        'faq_categories',
        'ls_faq',
        array(
            'labels' => array(
                'name' => esc_html__( 'FAQ Category', 'lasaphire' ),
                'add_new_item' => esc_html__( 'Add New FAQ Category', 'lasaphire' ),
                'new_item_name' => esc_html__( 'New FAQ Category', 'lasaphire' )
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );

}
add_action( 'init', 'laspahire_create_taxonomies', 0 );

function lasaphire_add_heroslider_custom_box() {
    $screens = [ 'post', 'heroslider' ];
    foreach ( $screens as $screen ) {
        add_meta_box(
            'heroslaider_setup',				// Unique ID
            'Hero Slider Setup',				// Box title
            'lasaphire_heroslider_setup_html', 	// Content callback, must be of type callable
            $screen								// Post type
        );
    }
}

add_action( 'add_meta_boxes', 'lasaphire_add_heroslider_custom_box' );

function lasaphire_heroslider_setup_html( $post ) {
    $hslider_btn = get_post_meta( $post->ID, '_heroslider_btn_text', true );
	echo '<label for="hslider_btn">Inscription of the hero\'s button: </label>';
	echo '<input type="text" value="' . $hslider_btn . '" id="hslider_btn" name="hslider_btn"><br><br>';

    $hslider_btn_url = get_post_meta( $post->ID, '_heroslider_btn_url', true );
	echo '<label for="hslider_btn_url">The hero\'s button url: </label>';
	echo '<input type="url" value="' . $hslider_btn_url . '" id="hslider_btn_url" name="hslider_btn_url"><br><br>';
}

function lasaphire_save_heroslider_postdata( $post_id ) {
    if ( array_key_exists( 'hslider_btn', $_POST ) ) {
        update_post_meta(
            $post_id,
            '_heroslider_btn_text',
            $_POST['hslider_btn']
        );
    }
    if ( array_key_exists( 'hslider_btn_url', $_POST ) ) {
        update_post_meta(
            $post_id,
            '_heroslider_btn_url',
            $_POST['hslider_btn_url']
        );
    }
}

add_action( 'save_post', 'lasaphire_save_heroslider_postdata' );


function set_heroslider_columns($columns) {

    $columns = array(

        'title'             => esc_html__( 'Hero Slider Name', 'lasaphire' ),
        'button_text'       => esc_html__( 'Button Text', 'lasaphire' ),
        'button_url'        => esc_html__( 'Button Url', 'lasaphire' ),
        'featured_image'    => esc_html__( 'Featured Image', 'lasaphire' ),
        'date'              => esc_html__( 'Date', 'lasaphire' ),
    );

    return $columns;
}

add_filter('manage_heroslider_posts_columns', 'set_heroslider_columns');

function custom_heroslider_column( $column, $post_id ) {
    switch ( $column ) {

        case 'button_text' :
            echo get_post_meta( $post_id, '_heroslider_btn_text', true);
            break;

        case 'button_url' :
            echo get_post_meta( $post_id, '_heroslider_btn_url', true);
            break;

        case 'featured_image':
            the_post_thumbnail( array(75) );
            break;
    }
}

add_action( 'manage_heroslider_posts_custom_column' , 'custom_heroslider_column', 10, 2 );

// FAQ Custom Box

function set_ls_faq_columns($columns) {

    $columns = array(

        'title'         => esc_html__( 'Question', 'lasaphire' ),
        'faq_category'  => esc_html__( 'Category', 'lasaphire' ),
        'date'          => esc_html__( 'Date', 'lasaphire' ),
    );

    return $columns;
}
add_filter('manage_ls_faq_posts_columns', 'set_ls_faq_columns');

function custom_ls_faq_column( $column, $post_id ) {
    switch ( $column ) {
        case 'faq_category' :
            echo strip_tags( get_the_term_list( $post_id, 'faq_categories', '', ', ' ) );
            break;
    }
}
add_action( 'manage_ls_faq_posts_custom_column' , 'custom_ls_faq_column', 10, 2 );
