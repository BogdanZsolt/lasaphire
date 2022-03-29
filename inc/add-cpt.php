<?php

/**
 * La Saphire Add Custom Post Types
 *
 * @Package La Saphire
*/

// La Saphire - Custom Post Type

function lasaphire_cpt() {
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
