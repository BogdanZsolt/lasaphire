<?php

function lasaphireRegisterSearch(){
	register_rest_route( 'lasaphire/v1', 'search', array(
		'methods' => WP_REST_SERVER::READABLE,
		'callback' => 'lasaphireSearchResults',
	) );
}
add_action( 'rest_api_init', 'lasaphireRegisterSearch' );

function lasaphireSearchResults($data){
	$mainQuery = new WP_Query( array(
		'post_type' => array('post', 'page', 'ls-ingredient', 'product', 'ls_faq'),
		'posts_per_page' => -1,
		's' => sanitize_text_field( $data['term'] ),
	));

	$results = array(
		'products' => array(),
		'ingredients' => array(),
		'posts' => array(),
		'pages' => array(),
		'faqs' => array(),
	);

	while( $mainQuery->have_posts() ){
		$mainQuery->the_post();

		if(get_post_type() === 'post'){
			$description = null;
			if(has_excerpt()){
				$description = get_the_excerpt();
			} else {
				$description = wp_trim_words(get_the_content(), 18);
			}

			array_push( $results['posts'], array(
				'title' => get_the_title(),
				'permalink' => get_the_permalink(),
				'authorName' => get_the_author(),
				'authorLink' => get_author_posts_url(get_the_author_ID()),
				'image' => get_the_post_thumbnail_url(0, 'la-saphire-blog'),
				'date' => get_the_date(),
				'description' => $description,
			));
		}

		if(get_post_type() === 'page'){
			$content = null;
			$content = wp_trim_words(get_the_content(), 25);

			array_push( $results['pages'], array(
				'title' => get_the_title(),
				'permalink' => get_the_permalink(),
				'content' => $content,
			));
		}

		if(get_post_type() === 'ls-ingredient'){
			$description = null;
			if(has_excerpt()){
				$description = sanitize_text_field(get_the_excerpt());
			} else {
				$description = wp_trim_words(get_the_content(), 18);
			}

			array_push( $results['ingredients'], array(
				'id' => get_the_id(),
				'title' => get_the_title(),
				'permalink' => get_the_permalink(),
				'image' => get_the_post_thumbnail_url( 0, array( '75' ) ),
				'description' => $description,
			));
		}

		if(get_post_type() === 'product'){
			$product = wc_get_product( get_the_id() );
			if($product->is_type('simple')){
				$salePrice = $product->get_sale_price();
				$regularPrice = $product->get_regular_price();
			} elseif ($product->is_type('variable')){
				$salePrice = $product->get_variation_sale_price( 'min', true );
				$regularPrice = $product->get_variation_regular_price( 'max', true );
			} elseif ( $product->get_type() === "grouped") {
				$child_products = $product->get_children();
				foreach ($child_products as $pid) {
					$product = wc_get_product($pid);
					$price = $product->get_price();
				}
			}
			$description = null;
			if(has_excerpt()){
				$description = sanitize_text_field(get_the_excerpt());
			} else {
				$description = wp_trim_words(get_the_content(), 18);
			}

			array_push( $results['products'], array(
				'title' => get_the_title(),
				'permalink' => get_the_permalink(),
				'image' => get_the_post_thumbnail_url(0, 'woocommerce_thumbnail'),
				'description' => $description,
				'type' => $product->get_type(),
				'status' => $product->get_status(),
				'price' => $price,
				'regularPrice' => $regularPrice,
				'salePrice' => $salePrice,
			));
		}

		if(get_post_type() === 'ls_faq'){
			array_push( $results['faqs'], array(
				'title' => get_the_title(),
				'permalink' => get_the_permalink(),
			));
		}
	}


	if($results['ingredients']){
		$ingredientsMetaQuery = array('relation' => 'OR');

		foreach($results['ingredients'] as $item){
			array_push($ingredientsMetaQuery, array(
					'key' => '_ingredient_select',
					'compare' => 'LIKE',
					'value' => '"' . $item['id'] . '"',
			));
		}

		$ingredientRelationshipQuery = new WP_Query(array(
			'post_type' => 'product',
			'meta_query' => $ingredientsMetaQuery,
		));

		while($ingredientRelationshipQuery->have_posts()){
			$ingredientRelationshipQuery->the_post();

			if(get_post_type() === 'product'){
				$product = wc_get_product( get_the_id() );
				if($product->is_type('simple')){
					$salePrice = $product->get_sale_price();
					$regularPrice = $product->get_regular_price();
				} elseif ($product->is_type('variable')){
					$salePrice = $product->get_variation_sale_price( 'min', true );
					$regularPrice = $product->get_variation_regular_price( 'max', true );
				} elseif ( $product->get_type() === "grouped") {
					$child_products = $product->get_children();
					foreach ($child_products as $pid) {
						$product = wc_get_product($pid);
						$price = $product->get_price();
					}
				}

				$description = null;
				if(has_excerpt()){
					$description = sanitize_text_field(get_the_excerpt());
				} else {
					$description = wp_trim_words(get_the_content(), 18);
				}

				array_push( $results['products'], array(
				'title' => get_the_title(),
				'permalink' => get_the_permalink(),
				'image' => get_the_post_thumbnail_url(0, 'woocommerce_thumbnail'),
				'description' => $description,
				'type' => $product->get_type(),
				'status' => $product->get_status(),
				'price' => $price,
				'regularPrice' => $regularPrice,
				'salePrice' => $salePrice,
				));
			}
		}

		$results['products'] = array_values(array_unique($results['products'], SORT_REGULAR));
	}

	return $results;
}