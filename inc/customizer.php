<?php

/**
 * La Saphire Theme Customizer
 *
 * @Package La Saphire
*/

function la_saphire_customizer( $wp_customize ){

	// Copyright Section
	$wp_customize->add_section(
		'sec_copyright', array(
			'title' => esc_html__( 'Copyright Settings', 'lasaphire' ),
			'description' => esc_html__( 'Copyright Section', 'lasaphire' )
		)
	);

		// Copyright Text Box
		$wp_customize->add_setting(
			'set_copyright', array(
				'type' => 'theme_mod',
				'default' => esc_html__('© 2022-2023 - La\'saphire', 'lasaphire'),
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_copyright', array(
				'label'			=> esc_html__( 'Copyright', 'lasaphire' ),
				'description'	=> esc_html__( 'Please, add your copyright information here', 'lasaphire' ),
				'section'		=> 'sec_copyright',
				'type'			=> 'text'
			)
		);

	/*-----------------------------------------------------------------------------------------*/
	//Home Page Settings
	$wp_customize->add_panel(
		'pa_home_page', array(
			'title' => esc_html__('Home Page', 'lasaphire'),
			'priority' => 160,
		)
	);

	// Home Page Product Slider Settings
	$wp_customize->add_section(
		'sec_home_prod_slider', array(
			'title' => esc_html__( 'Home Page Products slider settings', 'lasaphire' ),
			'description' => esc_html__( 'Home Page Product slider settings Section', 'lasaphire' ),
			'panel' => 'pa_home_page',
		)
	);

		if( class_exists( 'WooCommerce' )){
			// Products Section Title
			$wp_customize->add_setting(
				'set_products_title', array(
					'type' => 'theme_mod',
					'default' => esc_html__( 'Products', 'lasaphire' ),
					'sanitize_callback' => 'sanitize_text_field'
				)
			);

			$wp_customize->add_control(
				'set_products_title', array(
					'label' => esc_html__( 'Products Section Title', 'lasaphire' ),
					'description' => esc_html__( 'La Saphire Products section title', 'lasaphire' ),
					'section' => 'sec_home_prod_slider',
					'type' => 'text'
				)
			);
			// Products Button Text
			$wp_customize->add_setting(
			'set_products_button_text', array(
				'type' => 'theme_mod',
				'default' => esc_html__( 'Browse Products', 'lasaphire' ),
				'sanitize_callback' => 'sanitize_text_field'
				)
			);

			$wp_customize->add_control(
			'set_products_button_text', array(
				'label' => esc_html__( 'Products Button Text', 'lasaphire' ),
				'description' => esc_html__( 'Products Button Text', 'lasaphire' ),
				'section' => 'sec_home_prod_slider',
				'type' => 'text'
				)
			);

			// Products Button Url 1
			$wp_customize->add_setting(
				'set_products_link', array(
					'type' => 'theme_mod',
					'default' =>  '',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);

			$wp_customize->add_control(
				'set_products_link', array(
					'label' => esc_html__( 'Select page', 'lasaphire' ),
					'description' => esc_html__( 'Which side the button takes you to.', 'lasaphire' ),
					'section' => 'sec_home_prod_slider',
					'type' => 'dropdown-pages',
					'allow_addition' => true,
				)
			);

			// Products teszt 1
			$wp_customize->add_setting(
				'set_products_test', array(
					'type' => 'theme_mod',
					'default' =>  '',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);

			$wp_customize->add_control(
				'set_products_link', array(
					'label' => esc_html__( 'Select test', 'lasaphire' ),
					'description' => esc_html__( 'Test dropdown selection.', 'lasaphire' ),
					'section' => 'sec_home_prod_slider',
					'type' => 'dropdown-cats',
					'allow_addition' => true,
				)
			);

		// Home Page New Arrivals Settings
		$wp_customize->add_section(
			'sec_home_new_arrivals', array(
				'title' => esc_html__( 'Home Page New Arrivals settings', 'lasaphire' ),
				'description' => esc_html__( 'Home Page New Arrivals settings Section', 'lasaphire' ),
				'panel' => 'pa_home_page',
			)
		);

			// New Arrivals Checkbox
			$wp_customize->add_setting(
				'set_new_arrivals_show', array(
					'type' => 'theme_mod',
					'default' => false,
					'sanitize_callback' => 'la_saphire_sanitize_checkbox'
				)
			);

			$wp_customize->add_control(
				'set_new_arrivals_show', array(
					'label' => esc_html__( 'Show New Arrivals?', 'lasaphire' ),
					'section' => 'sec_home_new_arrivals',
					'type' => 'checkbox'
				)
			);

			// New Arrivals Products Limit
			$wp_customize->add_setting(
				'set_new_arrivals_max_num', array(
					'type' => 'theme_mod',
					'default' => 4,
					'sanitize_callback' => 'absint'
				)
			);

			$wp_customize->add_control(
				'set_new_arrivals_max_num', array(
					'label' => esc_html__( 'New Arrivals Max Number', 'lasaphire' ),
					'description' => esc_html__( 'New Arrivals Max Number', 'lasaphire' ),
					'section' => 'sec_home_new_arrivals',
					'type' => 'number'
				)
			);

			// New Arrivals Product Columns
			$wp_customize->add_setting(
				'set_new_arrivals_max_col', array(
					'type' => 'theme_mod',
					'default' => 4,
					'sanitize_callback' => 'absint'
				)
			);

			$wp_customize->add_control(
				'set_new_arrivals_max_col', array(
					'label' => esc_html__( 'New Arrivals Max Columns', 'lasaphire' ),
					'description' => esc_html__( 'New Arrivals Max Columns', 'lasaphire' ),
					'section' => 'sec_home_new_arrivals',
					'type' => 'number'
				)
			);

		// Home Page Deal of the Week Settings
		$wp_customize->add_section(
			'sec_home_deal', array(
				'title' => esc_html__( 'Home Page Deal of the Week settings', 'lasaphire' ),
				'description' => esc_html__( 'Home Page Deal of the Week settings Section', 'lasaphire' ),
				'panel' => 'pa_home_page',
			)
		);

			// Deal of the Week Checkbox
			$wp_customize->add_setting(
				'set_deal_show', array(
					'type' => 'theme_mod',
					'default' => false,
					'sanitize_callback' => 'la_saphire_sanitize_checkbox'
				)
			);

			$wp_customize->add_control(
				'set_deal_show', array(
					'label' => esc_html__( 'Show Deal of the Week?', 'lasaphire' ),
					'section' => 'sec_home_deal',
					'type' => 'checkbox'
				)
			);

			// Deal of the Week Product ID
			$wp_customize->add_setting(
				'set_deal', array(
					'type'				=> 'theme_mod',
					'default'			=> '',
					'sanitize_callback'	=> 'absint'
				)
			);

			$wp_customize->add_control(
				'set_deal', array(
					'label' => esc_html__( 'Deal of the Week Product ID', 'lasaphire' ),
					'description' => esc_html__( 'Product ID to Display', 'lasaphire' ),
					'section' => 'sec_home_deal',
					'type' => 'number'
				)
			);

			// Deal of the week Section Title
			$wp_customize->add_setting(
				'set_deal_title', array(
					'type' => 'theme_mod',
					'default' => esc_html__( 'Featured Stuff', 'lasaphire' ),
					'sanitize_callback' => 'sanitize_text_field'
				)
			);

			$wp_customize->add_control(
				'set_deal_title', array(
					'label'			=> esc_html__( 'Deal of the Week Section Title', 'lasaphire' ),
					'description'	=> esc_html__( 'La Saphire Deal of the Week section title', 'lasaphire' ),
					'section'		=> 'sec_home_deal',
					'type'			=> 'text'
				)
			);

			// Deal of the week Button Text
			$wp_customize->add_setting(
				'set_deal_button_text', array(
					'type'				=> 'theme_mod',
					'default'			=> esc_html__( 'Browse Products', 'lasaphire' ),
					'sanitize_callback'	=> 'sanitize_text_field'
				)
			);

			$wp_customize->add_control(
				'set_deal_button_text', array(
					'label'			=> esc_html__( 'Deal of the Week Button Text', 'lasaphire' ),
					'description'	=> esc_html__( 'Deal of the Week Button Text', 'lasaphire' ),
					'section'		=> 'sec_home_deal',
					'type'			=> 'text'
				)
			);

			// Deal of the week Button Url 1
			$wp_customize->add_setting(
				'set_deal_link', array(
					'type' => 'theme_mod',
					'default' =>  '',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);

			$wp_customize->add_control(
				'set_deal_link', array(
					'label' => esc_html__( 'Select page', 'lasaphire' ),
					'description' => esc_html__( 'Which side the button takes you to.', 'lasaphire' ),
					'section' => 'sec_home_deal',
					'type' => 'dropdown-pages',
					'allow_addition' => true,
				)
			);

			// Deal of the Week background Image
			$wp_customize->add_setting(
				'set_deal_bg_image', array(
					'default' => '',
					'transport' => 'refresh',
					'sanitize_callback' => 'absint'
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Cropped_Image_Control( $wp_customize, 'set_deal_bg_image',
					array(
						'label'			=> esc_html__( 'Deal of the Week Background Image Set.', 'lasaphire' ),
						'description'	=> esc_html__( 'Deal of the Week Background Image Set.', 'lasaphire' ),
						'section'		=> 'sec_home_deal',
						'flex_width'	=> 'false',
						'flex_height'	=> 'true',
						'width' 		=> 1500,
						'height'		=> 'auto',
						'button_labels' => array( // Optional.
							'select' 		=>  esc_html__( 'Select Image', 'lasaphire' ),
							'change' 		=>  esc_html__( 'Change Image', 'lasaphire' ),
							'remove' 		=>  esc_html__( 'Remove', 'lasaphire' ),
							'default' 		=>  esc_html__( 'Default', 'lasaphire' ),
							'placeholder' 	=>  esc_html__( 'No image selected', 'lasaphire' ),
							'frame_title' 	=>  esc_html__( 'Select Image', 'lasaphire' ),
							'frame_button' 	=>  esc_html__( 'Choose Image', 'lasaphire' ),
						),
					)
				)
			);
		}

		// // For me section Checkbox
		// $wp_customize->add_setting(
		// 	'set_forme_show', array(
		// 		'type'				=> 'theme_mod',
		// 		'default'			=> '',
		// 		'sanitize_callback'	=> 'la_saphire_sanitize_checkbox'
		// 	)
		// );

		// $wp_customize->add_control(
		// 	'set_forme_show', array(
		// 		'label'			=> esc_html__( 'Show For me promotion?', 'lasaphire' ),
		// 		'section'		=> 'sec_home_page',
		// 		'type'			=> 'checkbox'
		// 	)
		// );

		// // For me bg image
		// $wp_customize->add_setting(
		// 	'set_forme_bg_image', array(
		// 		'default'			=> '',
		// 		'transport' => 'refresh',
		// 		'sanitize_callback'	=> 'absint'
		// 	)
		// );

		// $wp_customize->add_control(
		// 	new WP_Customize_Cropped_Image_Control( $wp_customize, 'set_forme_bg_image',
		// 		array(
		// 			'label'			=> esc_html__( 'For me promotion Background Image Set.', 'lasaphire' ),
		// 			'description'	=> esc_html__( 'For me promotion Background Image Set.', 'lasaphire' ),
		// 			'section'		=> 'sec_home_page',
		// 			'flex_width'	=> 'false',
		// 			'flex_height'	=> 'true',
		// 			'width' 		=> 1500,
		// 			'height'		=> 'auto',
		// 			'button_labels' => array( // Optional.
		// 				'select' 		=>  esc_html__( 'Select Image', 'lasaphire' ),
		// 				'change' 		=>  esc_html__( 'Change Image', 'lasaphire' ),
		// 				'remove' 		=>  esc_html__( 'Remove', 'lasaphire' ),
		// 				'default' 		=>  esc_html__( 'Default', 'lasaphire' ),
		// 				'placeholder' 	=>  esc_html__( 'No image selected', 'lasaphire' ),
		// 				'frame_title' 	=>  esc_html__( 'Select Image', 'lasaphire' ),
		// 				'frame_button' 	=>  esc_html__( 'Choose Image', 'lasaphire' ),
		// 			),
		// 		)
		// 	)
		// );

		// Home Page Show About Section Settings
		$wp_customize->add_section(
			'sec_home_about', array(
				'title' => esc_html__( 'Home Page Show About settings', 'lasaphire' ),
				'description' => esc_html__( 'Home Page Show About settings Section', 'lasaphire' ),
				'panel' => 'pa_home_page',
			)
		);

		// Show About Section Checkbox
		$wp_customize->add_setting(
			'set_about_show', array(
				'type'				=> 'theme_mod',
				'default'			=> true,
				'sanitize_callback'	=> 'la_saphire_sanitize_checkbox'
			)
		);

		$wp_customize->add_control(
			'set_about_show', array(
				'label'			=> esc_html__( 'Show About Us?', 'lasaphire' ),
				'section'		=> 'sec_home_about',
				'type'			=> 'checkbox'
			)
		);

		// About Title
		$wp_customize->add_setting(
			'set_about_title', array(
				'type'				=> 'theme_mod',
				'default'			=> esc_html__( 'Our mission and story' ),
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_about_title', array(
				'label'			=> esc_html__( 'About Us Title', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire About Us title', 'lasaphire' ),
				'section'		=> 'sec_home_about',
				'type'			=> 'text'
			)
		);

		// About Subtitle
		$wp_customize->add_setting(
			'set_about_subtitle', array(
				'type'				=> 'theme_mod',
				'default'			=> esc_html__( 'Who we are?' ),
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_about_subtitle', array(
				'label'			=> esc_html__( 'About Us Subtitle', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire About Us subtitle', 'lasaphire' ),
				'section'		=> 'sec_home_about',
				'type'			=> 'text'
			)
		);

		// About description
		$wp_customize->add_setting(
			'set_about_desc', array(
				'type'				=> 'theme_mod',
				'default'			=> esc_html__( 'I am Petra Csetneki,' ),
				'sanitize_callback'	=> 'sanitize_textarea_field'
			)
		);

		$wp_customize->add_control(
			'set_about_desc', array(
				'label'			=> esc_html__( 'About Us Description', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire About Us description', 'lasaphire' ),
				'section'		=> 'sec_home_about',
				'type'			=> 'textarea'
			)
		);

		// About Text of link 1
		$wp_customize->add_setting(
			'set_about_textlink1', array(
				'type'				=> 'theme_mod',
				'default'			=> esc_html__( 'Our Story' ),
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_about_textlink1', array(
				'label'			=> esc_html__( 'About Us Text of Link 1', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire About Us Text of Link 1', 'lasaphire' ),
				'section'		=> 'sec_home_about',
				'type'			=> 'text'
			)
		);

		// About link 1
		$wp_customize->add_setting(
			'set_about_link1', array(
				'type'				=> 'theme_mod',
				'default'			=>  '',
				'sanitize_callback'	=> 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'set_about_link1', array(
				'label' => esc_html__( 'About Us Link 1', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire About Us Link 1', 'lasaphire' ),
				'section' => 'sec_home_about',
				'type' => 'dropdown-pages',
				'allow_addition' => true,
			)
		);

		// About Text of link 2
		$wp_customize->add_setting(
			'set_about_textlink2', array(
				'type' => 'theme_mod',
				'default' => esc_html__( 'About Me' ),
				'sanitize_callback' => 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_about_textlink2', array(
				'label' => esc_html__( 'About Us Text of Link 2', 'lasaphire' ),
				'description' => esc_html__( 'La Saphire About Us Text of Link 2', 'lasaphire' ),
				'section' => 'sec_home_about',
				'type' => 'text'
			)
		);

		// About link 2
		$wp_customize->add_setting(
			'set_about_link2', array(
				'type' => 'theme_mod',
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'set_about_link2', array(
				'label' => esc_html__( 'About Us Link 2', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire About Us Link 2', 'lasaphire' ),
				'section' => 'sec_home_about',
				'type' => 'dropdown-pages',
				'allow_addition' => true,
			)
		);

		// About Text of link 3
		$wp_customize->add_setting(
			'set_about_textlink3', array(
				'type' => 'theme_mod',
				'default' => esc_html__( 'Ars Poetics' ),
				'sanitize_callback' => 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_about_textlink3', array(
				'label' => esc_html__( 'About Us Text of Link 3', 'lasaphire' ),
				'description' => esc_html__( 'La Saphire About Us Text of Link 3', 'lasaphire' ),
				'section' => 'sec_home_about',
				'type' => 'text'
			)
		);

		// About Text of link 3
		$wp_customize->add_setting(
			'set_about_link3', array(
				'type' => 'theme_mod',
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'set_about_link3', array(
				'label' => esc_html__( 'About Us Link 3', 'lasaphire' ),
				'description' => esc_html__( 'La Saphire About Us Link 3', 'lasaphire' ),
				'section' => 'sec_home_about',
				'type' => 'dropdown-pages',
				'allow_addition' => true,
			)
		);

		// About image
		$wp_customize->add_setting(
			'set_about_image', array(
				'default' => '',
				'transport' => 'refresh',
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Media_Control( $wp_customize, 'set_about_image',
				array(
					'label' => esc_html__( 'About Us Section Image Set.', 'lasaphire' ),
					'description' => esc_html__( 'About Us Section Image Set.', 'lasaphire' ),
					'section' => 'sec_home_about',
					'mime_type' => 'image',
					'button_labels' => array( // Optional.
						'select' =>  esc_html__( 'Select Image', 'lasaphire' ),
						'change' =>  esc_html__( 'Change Image', 'lasaphire' ),
						'remove' =>  esc_html__( 'Remove', 'lasaphire' ),
						'default' =>  esc_html__( 'Default', 'lasaphire' ),
						'placeholder' => esc_html__( 'No image selected', 'lasaphire' ),
						'frame_title' => esc_html__( 'Select Image', 'lasaphire' ),
						'frame_button' => esc_html__( 'Choose Image', 'lasaphire' ),
					),
				)
			)
		);

		// Home Page Our Values Section Settings
		$wp_customize->add_section(
			'sec_home_values', array(
				'title' => esc_html__( 'Home Page Ars Poetics settings', 'lasaphire' ),
				'description' => esc_html__( 'Home Page Ars Poetics settings Section', 'lasaphire' ),
				'panel' => 'pa_home_page',
			)
		);

		// Our Values Checkbox
		$wp_customize->add_setting(
			'set_values_show', array(
				'type' => 'theme_mod',
				'default' => false,
				'sanitize_callback' => 'la_saphire_sanitize_checkbox'
			)
		);

		$wp_customize->add_control(
			'set_values_show', array(
				'label' => esc_html__( 'Show Ars Poetics Cards?', 'lasaphire' ),
				'section' => 'sec_home_values',
				'type' => 'checkbox'
			)
		);

		// Our Values card 1 title
		$wp_customize->add_setting(
			'set_values_card1_title', array(
				'type' => 'theme_mod',
				'default' => esc_html__( 'All natural skin care', 'lasaphire' ),
				'sanitize_callback' => 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_values_card1_title', array(
				'label' => esc_html__( 'Ars Poetics Card-1 Title', 'lasaphire' ),
				'description' => esc_html__( 'Ars Poetics Card-1 Title', 'lasaphire' ),
				'section' => 'sec_home_values',
				'type' => 'text'
			)
		);

		// Our Values card 2 title
		$wp_customize->add_setting(
			'set_values_card2_title', array(
				'type' => 'theme_mod',
				'default' => esc_html__( 'Manufacture of small batches', 'lasaphire' ),
				'sanitize_callback' => 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_values_card2_title', array(
				'label' => esc_html__( 'Ars Poetics Card-2 Title', 'lasaphire' ),
				'description' => esc_html__( 'Ars Poetics Card-2 Title', 'lasaphire' ),
				'section' => 'sec_home_values',
				'type' => 'text'
			)
		);

		// Our Values card 3 title
		$wp_customize->add_setting(
			'set_values_card3_title', array(
				'type' => 'theme_mod',
				'default' => esc_html__( 'Beauty with intent', 'lasaphire' ),
				'sanitize_callback' => 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_values_card3_title', array(
				'label' => esc_html__( 'Ars Poetics Card-3 Title', 'lasaphire' ),
				'description' => esc_html__( 'Ars Poetics Card-3 Title', 'lasaphire' ),
				'section' => 'sec_home_values',
				'type' => 'text'
			)
		);

		// Our Values card 4 title
		$wp_customize->add_setting(
			'set_values_card4_title', array(
				'type' => 'theme_mod',
				'default' => esc_html__( 'Reliability', 'lasaphire' ),
				'sanitize_callback' => 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_values_card4_title', array(
				'label' => esc_html__( 'Ars Poetics Card-4 Title', 'lasaphire' ),
				'description' => esc_html__( 'Ars Poetics Card-4 Title', 'lasaphire' ),
				'section' => 'sec_home_values',
				'type' => 'text'
			)
		);

		// Home Page News (Blog) Section Settings
		$wp_customize->add_section(
			'sec_home_blog', array(
				'title' => esc_html__( 'Home Page Blog settings', 'lasaphire' ),
				'description' => esc_html__( 'Home Page Blog settings Section', 'lasaphire' ),
				'panel' => 'pa_home_page',
			)
		);

		// News (Blog) Title
		$wp_customize->add_setting(
			'set_blog_title', array(
				'type'				=> 'theme_mod',
				'default'			=> esc_html__( 'La\'Saphire Blog', 'lasaphire' ),
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_blog_title', array(
				'label'			=> esc_html__( 'News Title', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire News Section title', 'lasaphire' ),
				'section'		=> 'sec_home_blog',
				'type'			=> 'text'
			)
		);


		// News (Blog) Button Text
		$wp_customize->add_setting(
			'set_blog_button_text', array(
				'type'				=> 'theme_mod',
				'default'			=> esc_html__( 'Check the posts', 'lasaphire' ),
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_blog_button_text', array(
				'label'			=> esc_html__( 'News Button Text', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire News (Blog) Button Text', 'lasaphire' ),
				'section'		=> 'sec_home_blog',
				'type'			=> 'text'
			)
		);

		// News (Blog) Button Url
		$wp_customize->add_setting(
			'set_blog_link', array(
				'type' => 'theme_mod',
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'set_blog_link', array(
				'label' => esc_html__( 'Select page', 'lasaphire' ),
				'description'	=> esc_html__( 'Which side the button takes you to.', 'lasaphire' ),
				'section' => 'sec_home_blog',
				'type' => 'dropdown-pages',
				'allow_addition' => true,
			)
		);

		// Newsletter Subscription Form
		$wp_customize->add_section(
			'sec_subscription', array(
				'title' => esc_html__( 'Newsletter Subscription Form', 'lasaphire' ),
				'description'	=> esc_html__( 'Newsletter subscription form settings', 'lasaphire' ),
				'panel' => 'pa_home_page',
			)
		);

		//Subscribe checkbox
		$wp_customize->add_setting(
			'set_subscribe_show', array(
				'type' => 'theme_mod',
				'default' => true,
				'sanitize_callback'	=> 'la_saphire_sanitize_checkbox'
			)
		);

		$wp_customize->add_control(
			'set_subscribe_show', array(
				'label' => esc_html__( 'Show Subscribe Section?', 'lasaphire' ),
				'section' => 'sec_subscription',
				'type' => 'checkbox'
			)
		);

		// Subscription Text
		$wp_customize->add_setting(
			'set_subscription_text', array(
				'type' => 'theme_mod',
				'default' => esc_html__( 'Sign up to get to know the latest products, stories and nicest offers and tips!', 'lasaphire' ),
				'sanitize_callback' => 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_subscription_text', array(
				'label' => esc_html__( 'Newsletter Subscription description', 'lasaphire' ),
				'description' => esc_html__( 'La Saphire Newsletter subscription description', 'lasaphire' ),
				'section' => 'sec_subscription',
				'type' => 'text'
			)
		);

		// Name placeholder
		$wp_customize->add_setting(
			'set_name_placeholder', array(
				'type' => 'theme_mod',
				'default' => esc_html__( 'I am called...', 'lasaphire' ),
				'sanitize_callback' => 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_name_placeholder', array(
				'label' => esc_html__( 'Name placehoder text', 'lasaphire' ),
				'description' => esc_html__( 'La Saphire Newsletter subscription name placeholder text', 'lasaphire' ),
				'section' => 'sec_subscription',
				'type' => 'text'
			)
		);

		// Email placeholder
		$wp_customize->add_setting(
			'set_email_placeholder', array(
				'type' => 'theme_mod',
				'default' => esc_html__( 'Email', 'lasaphire' ),
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_email_placeholder', array(
				'label' => esc_html__( 'Email placehoder text', 'lasaphire' ),
				'description' => esc_html__( 'La Saphire Newsletter subscription email placeholder text', 'lasaphire' ),
				'section' => 'sec_subscription',
				'type' => 'text'
			)
		);

		// subscribe background Image
		$wp_customize->add_setting(
			'set_subscribe_bg_image', array(
				'default' => '',
				'transport' => 'refresh',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control( $wp_customize, 'set_subscribe_bg_image',
				array(
					'label' => esc_html__( 'Subscribe Background Image Set.', 'lasaphire' ),
					'description' => esc_html__( 'Subscribe Background Image Set.', 'lasaphire' ),
					'section' => 'sec_subscription',
					'button_labels' => array( // Optional.
						'select' =>  esc_html__( 'Select Image', 'lasaphire' ),
						'change' =>  esc_html__( 'Change Image', 'lasaphire' ),
						'remove' =>  esc_html__( 'Remove', 'lasaphire' ),
						'default' =>  esc_html__( 'Default', 'lasaphire' ),
						'placeholder' =>  esc_html__( 'No image selected', 'lasaphire' ),
						'frame_title' =>  esc_html__( 'Select Image', 'lasaphire' ),
						'frame_button' =>  esc_html__( 'Choose Image', 'lasaphire' ),
					),
				)
			)
		);


	// Image Gallery Section Settings
	$wp_customize->add_section(
		'sec_gallery', array(
			'title' => esc_html__( 'Home Page Gallery Images Settings', 'lasaphire' ),
			'description' => esc_html__( 'Home Page Gallery Section', 'lasaphire' ),
			'panel' => 'pa_home_page',
		)
	);

		//  Gallery Image 1
		$wp_customize->add_setting(
			'set_gallery_image1', array(
				'default' => '',
				'transport' => 'refresh',
				'sanitize_callback' => 'absint'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Cropped_Image_Control( $wp_customize, 'set_gallery_image1',
				array(
					'label' => esc_html__( 'Home Gallery Image 1 Setting', 'lasaphire' ),
					'description' => esc_html__( 'Home Gallery Image 1 Setting (size max 1500 x auto px)', 'lasaphire' ),
					'section' => 'sec_gallery',
					'flex_width' => 'false',
					'flex_height' => 'true',
					'width' => 1500,
					'height' => 'auto',
					'button_labels' => array( // Optional.
						'select' => esc_html__( 'Select Image', 'lasaphire' ),
						'change' => esc_html__( 'Change Image', 'lasaphire' ),
						'remove' => esc_html__( 'Remove', 'lasaphire' ),
						'default' =>  esc_html__( 'Default', 'lasaphire' ),
						'placeholder' =>  esc_html__( 'No image selected', 'lasaphire' ),
						'frame_title' =>  esc_html__( 'Select Image', 'lasaphire' ),
						'frame_button' =>  esc_html__( 'Choose Image', 'lasaphire' ),
					),
				)
			)
		);

		//  Gallery Image 2
		$wp_customize->add_setting(
			'set_gallery_image2', array(
				'default' => '',
				'transport' => 'refresh',
				'sanitize_callback' => 'absint'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Cropped_Image_Control( $wp_customize, 'set_gallery_image2',
				array(
					'label' => esc_html__( 'Home Gallery Image 2 Setting', 'lasaphire' ),
					'description' => esc_html__( 'Home Gallery Image 2 Setting (size max 1500 x auto px)', 'lasaphire' ),
					'section' => 'sec_gallery',
					'flex_width' => 'false',
					'flex_height' => 'true',
					'width' => 1500,
					'height' => 'auto',
					'button_labels' => array( // Optional.
						'select' =>  esc_html__( 'Select Image', 'lasaphire' ),
						'change' =>  esc_html__( 'Change Image', 'lasaphire' ),
						'remove' =>  esc_html__( 'Remove', 'lasaphire' ),
						'default' =>  esc_html__( 'Default', 'lasaphire' ),
						'placeholder' =>  esc_html__( 'No image selected', 'lasaphire' ),
						'frame_title' =>  esc_html__( 'Select Image', 'lasaphire' ),
						'frame_button' =>  esc_html__( 'Choose Image', 'lasaphire' ),
					),
				)
			)
		);

		//  Gallery Image 3
		$wp_customize->add_setting(
			'set_gallery_image3', array(
				'default' => '',
				'transport' => 'refresh',
				'sanitize_callback' => 'absint'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Cropped_Image_Control( $wp_customize, 'set_gallery_image3',
				array(
					'label'			=> esc_html__( 'Home Gallery Image 3 Setting', 'lasaphire' ),
					'description'	=> esc_html__( 'Home Gallery Image 3 Setting (size max 1500 x auto px)', 'lasaphire' ),
					'section'		=> 'sec_gallery',
					'flex_width'	=> 'false',
					'flex_height'	=> 'true',
					'width' 		=> 1500,
					'height'		=> 'auto',
					'button_labels' => array( // Optional.
						'select' 		=>  esc_html__( 'Select Image', 'lasaphire' ),
						'change' 		=>  esc_html__( 'Change Image', 'lasaphire' ),
						'remove' 		=>  esc_html__( 'Remove', 'lasaphire' ),
						'default' 		=>  esc_html__( 'Default', 'lasaphire' ),
						'placeholder' 	=>  esc_html__( 'No image selected', 'lasaphire' ),
						'frame_title' 	=>  esc_html__( 'Select Image', 'lasaphire' ),
						'frame_button' 	=>  esc_html__( 'Choose Image', 'lasaphire' ),
					),
				)
			)
		);

		// Gallery Image 4
		$wp_customize->add_setting(
			'set_gallery_image4', array(
				'default'			=> '',
				'transport' => 'refresh',
				'sanitize_callback'	=> 'absint'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Cropped_Image_Control( $wp_customize, 'set_gallery_image4',
				array(
					'label'			=> esc_html__( 'Home Gallery Image 4 Setting', 'lasaphire' ),
					'description'	=> esc_html__( 'Home Gallery Image 4 Setting (size max 1500 x auto px)', 'lasaphire' ),
					'section'		=> 'sec_gallery',
					'flex_width'	=> 'false',
					'flex_height'	=> 'true',
					'width' 		=> 1500,
					'height'		=> 'auto',
					'button_labels' => array( // Optional.
						'select' 		=>  esc_html__( 'Select Image', 'lasaphire' ),
						'change' 		=>  esc_html__( 'Change Image', 'lasaphire' ),
						'remove' 		=>  esc_html__( 'Remove', 'lasaphire' ),
						'default' 		=>  esc_html__( 'Default', 'lasaphire' ),
						'placeholder' 	=>  esc_html__( 'No image selected', 'lasaphire' ),
						'frame_title' 	=>  esc_html__( 'Select Image', 'lasaphire' ),
						'frame_button' 	=>  esc_html__( 'Choose Image', 'lasaphire' ),
					),
				)
			)
		);

		// Gallery Image 5
		$wp_customize->add_setting(
			'set_gallery_image5', array(
				'default'			=> '',
				'transport' => 'refresh',
				'sanitize_callback'	=> 'absint'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Cropped_Image_Control( $wp_customize, 'set_gallery_image5',
				array(
					'label'			=> esc_html__( 'Home Gallery Image 5 Setting', 'lasaphire' ),
					'description'	=> esc_html__( 'Home Gallery Image 5 Setting (size max 1500 x auto px)', 'lasaphire' ),
					'section'		=> 'sec_gallery',
					'flex_width'	=> 'false',
					'flex_height'	=> 'true',
					'width' 		=> 1500,
					'height'		=> 'auto',
					'button_labels' => array( // Optional.
						'select' 		=>  esc_html__( 'Select Image', 'lasaphire' ),
						'change' 		=>  esc_html__( 'Change Image', 'lasaphire' ),
						'remove' 		=>  esc_html__( 'Remove', 'lasaphire' ),
						'default' 		=>  esc_html__( 'Default', 'lasaphire' ),
						'placeholder' 	=>  esc_html__( 'No image selected', 'lasaphire' ),
						'frame_title' 	=>  esc_html__( 'Select Image', 'lasaphire' ),
						'frame_button' 	=>  esc_html__( 'Choose Image', 'lasaphire' ),
					),
				)
			)
		);

		// Gallery Image 6
		$wp_customize->add_setting(
			'set_gallery_image6', array(
				'default'			=> '',
				'transport' => 'refresh',
				'sanitize_callback'	=> 'absint'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Cropped_Image_Control( $wp_customize, 'set_gallery_image6',
				array(
					'label'			=> esc_html__( 'Home Gallery Image 6 Setting', 'lasaphire' ),
					'description'	=> esc_html__( 'Home Gallery Image 6 Setting (size max 1500 x auto px)', 'lasaphire' ),
					'section'		=> 'sec_gallery',
					'flex_width'	=> 'false',
					'flex_height'	=> 'true',
					'width' 		=> 1500,
					'height'		=> 'auto',
					'button_labels' => array( // Optional.
						'select' 		=>  esc_html__( 'Select Image', 'lasaphire' ),
						'change' 		=>  esc_html__( 'Change Image', 'lasaphire' ),
						'remove' 		=>  esc_html__( 'Remove', 'lasaphire' ),
						'default' 		=>  esc_html__( 'Default', 'lasaphire' ),
						'placeholder' 	=>  esc_html__( 'No image selected', 'lasaphire' ),
						'frame_title' 	=>  esc_html__( 'Select Image', 'lasaphire' ),
						'frame_button' 	=>  esc_html__( 'Choose Image', 'lasaphire' ),
					),
				)
			)
		);

		// Gallery Image 7
		$wp_customize->add_setting(
			'set_gallery_image7', array(
				'default'			=> '',
				'transport' => 'refresh',
				'sanitize_callback'	=> 'absint'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Cropped_Image_Control( $wp_customize, 'set_gallery_image7',
				array(
					'label'			=> esc_html__( 'Home Gallery Image 7 Setting', 'lasaphire' ),
					'description'	=> esc_html__( 'Home Gallery Image 7 Setting (size max 1500 x auto px)', 'lasaphire' ),
					'section'		=> 'sec_gallery',
					'flex_width'	=> 'false',
					'flex_height'	=> 'true',
					'width' 		=> 1500,
					'height'		=> 'auto',
					'button_labels' => array( // Optional.
						'select' 		=>  esc_html__( 'Select Image', 'lasaphire' ),
						'change' 		=>  esc_html__( 'Change Image', 'lasaphire' ),
						'remove' 		=>  esc_html__( 'Remove', 'lasaphire' ),
						'default' 		=>  esc_html__( 'Default', 'lasaphire' ),
						'placeholder' 	=>  esc_html__( 'No image selected', 'lasaphire' ),
						'frame_title' 	=>  esc_html__( 'Select Image', 'lasaphire' ),
						'frame_button' 	=>  esc_html__( 'Choose Image', 'lasaphire' ),
					),
				)
			)
		);

		// Gallery Image 8
		$wp_customize->add_setting(
			'set_gallery_image8', array(
				'default'			=> '',
				'transport' => 'refresh',
				'sanitize_callback'	=> 'absint'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Cropped_Image_Control( $wp_customize, 'set_gallery_image8',
				array(
					'label'			=> esc_html__( 'Home Gallery Image 8 Setting', 'lasaphire' ),
					'description'	=> esc_html__( 'Home Gallery Image 8 Setting (size max 1500 x auto px)', 'lasaphire' ),
					'section'		=> 'sec_gallery',
					'flex_width'	=> 'false',
					'flex_height'	=> 'true',
					'width' 		=> 1500,
					'height'		=> 'auto',
					'button_labels' => array( // Optional.
						'select' 		=>  esc_html__( 'Select Image', 'lasaphire' ),
						'change' 		=>  esc_html__( 'Change Image', 'lasaphire' ),
						'remove' 		=>  esc_html__( 'Remove', 'lasaphire' ),
						'default' 		=>  esc_html__( 'Default', 'lasaphire' ),
						'placeholder' 	=>  esc_html__( 'No image selected', 'lasaphire' ),
						'frame_title' 	=>  esc_html__( 'Select Image', 'lasaphire' ),
						'frame_button' 	=>  esc_html__( 'Choose Image', 'lasaphire' ),
					),
				)
			)
		);

	/**
	 * Standard Colors Settings
	*/
	$wp_customize->add_section(
		'sec_standard_color', array(
			'title'			=> esc_html__( 'Standard Color', 'lasaphire' ),
			'description'	=> esc_html__( 'Standard Color Section', 'lasaphire' )
		)
	);

		//
		$wp_customize->add_setting(
			'set_bg_color', array(
				'default'			=> '#ffffff',
				'transport' 		=> 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control( $wp_customize, 'set_bg_color',
				array(
					'label'			=> esc_html__( 'Background Color', 'lasaphire' ),
					'description'	=> esc_html__( 'Setup Background Color', 'lasaphire' ),
					'section'		=> 'sec_standard_color',
				),
			)
		);

		$wp_customize->add_setting(
			'set_base_color', array(
				'default'			=> '#ffffff',
				'transport' 		=> 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control( $wp_customize, 'set_base_color',
				array(
					'label'			=> esc_html__( 'Base Color', 'lasaphire' ),
					'description'	=> esc_html__( 'Setup Base Color', 'lasaphire' ),
					'section'		=> 'sec_standard_color',
				),
			)
		);

		//
		$wp_customize->add_setting(
			'set_cta_darker_color', array(
				'default'			=> '#b74005',
				'transport' 		=> 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control( $wp_customize, 'set_cta_darker_color',
				array(
					'label'			=> esc_html__( 'Call To Action Darker Color', 'lasaphire' ),
					'description'	=> esc_html__( 'Setup Call To Action Darker Color', 'lasaphire' ),
					'section'		=> 'sec_standard_color',
				),
			)
		);

		$wp_customize->add_setting(
			'set_cta_color', array(
				'default'			=> '#f45404',
				'transport' 		=> 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control( $wp_customize, 'set_cta_color',
				array(
					'label'			=> esc_html__( 'Call To Action Color', 'lasaphire' ),
					'description'	=> esc_html__( 'Setup Call To Action Color', 'lasaphire' ),
					'section'		=> 'sec_standard_color',
				),
			)
		);

		//
		$wp_customize->add_setting(
			'set_primary_darker_color', array(
				'default'			=> '#ECC355',
				'transport' 		=> 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control( $wp_customize, 'set_primary_darker_color',
				array(
					'label'			=> esc_html__( 'Primary Darker Color', 'lasaphire' ),
					'description'	=> esc_html__( 'Setup Primary Darker Color', 'lasaphire' ),
					'section'		=> 'sec_standard_color',
				),
			)
		);

		$wp_customize->add_setting(
			'set_primary_color', array(
				'default'			=> '#F2D98C',
				'transport' 		=> 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control( $wp_customize, 'set_primary_color',
				array(
					'label'			=> esc_html__( 'Primary Color', 'lasaphire' ),
					'description'	=> esc_html__( 'Setup Primary Color', 'lasaphire' ),
					'section'		=> 'sec_standard_color',
				),
			)
		);

		$wp_customize->add_setting(
			'set_primary_lighter_color', array(
				'default'			=> '#F6E5B1',
				'transport' 		=> 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control( $wp_customize, 'set_primary_lighter_color',
				array(
					'label'			=> esc_html__( 'Primary Color Lighter', 'lasaphire' ),
					'description'	=> esc_html__( 'Setup Primary Color Lighter', 'lasaphire' ),
					'section'		=> 'sec_standard_color',
				),
			)
		);

		$wp_customize->add_setting(
			'set_primary_lightest_color', array(
				'default'			=> '#FAF0D1',
				'transport' 		=> 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control( $wp_customize, 'set_primary_lightest_color',
				array(
					'label'			=> esc_html__( 'Primary Color Lightest', 'lasaphire' ),
					'description'	=> esc_html__( 'Setup Primary Color Lightest', 'lasaphire' ),
					'section'		=> 'sec_standard_color',
				),
			)
		);


		//
		$wp_customize->add_setting(
			'set_secondary_darker_color', array(
				'default'			=> '#5C3D2E',
				'transport' 		=> 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control( $wp_customize, 'set_secondary_darker_color',
				array(
					'label'			=> esc_html__( 'Secondary Darker Color', 'lasaphire' ),
					'description'	=> esc_html__( 'Setup Secondary Darker Color', 'lasaphire' ),
					'section'		=> 'sec_standard_color',
				),
			)
		);

		$wp_customize->add_setting(
			'set_secondary_color', array(
				'default'			=> '#A37E33',
				'transport' 		=> 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control( $wp_customize, 'set_secondary_color',
				array(
					'label'			=> esc_html__( 'Secondary Color', 'lasaphire' ),
					'description'	=> esc_html__( 'Setup Secondary Color', 'lasaphire' ),
					'section'		=> 'sec_standard_color',
				),
			)
		);

		$wp_customize->add_setting(
			'set_secondary_lighter_color', array(
				'default'			=> '#C49A45',
				'transport' 		=> 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control( $wp_customize, 'set_secondary_lighter_color',
				array(
					'label'			=> esc_html__( 'Secondary Color Lighter', 'lasaphire' ),
					'description'	=> esc_html__( 'Setup Secondary Color Lighter', 'lasaphire' ),
					'section'		=> 'sec_standard_color',
				),
			)
		);

		$wp_customize->add_setting(
			'set_secondary_lightest_color', array(
				'default'			=> '#D1AF6C',
				'transport' 		=> 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control( $wp_customize, 'set_secondary_lightest_color',
				array(
					'label'			=> esc_html__( 'Secondary Color Lightest', 'lasaphire' ),
					'description'	=> esc_html__( 'Setup Secondary Color Lightest', 'lasaphire' ),
					'section'		=> 'sec_standard_color',
				),
			)
		);

		//
		$wp_customize->add_setting(
			'set_tertiary_darker_color', array(
				'default'			=> '#5D8233',
				'transport' 		=> 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control( $wp_customize, 'set_tertiary_darker_color',
				array(
					'label'			=> esc_html__( 'Tertiary Darker Color', 'lasaphire' ),
					'description'	=> esc_html__( 'Setup Tertiary Darker Color', 'lasaphire' ),
					'section'		=> 'sec_standard_color',
				),
			)
		);

		$wp_customize->add_setting(
			'set_tertiary_color', array(
				'default'			=> '#518B2B',
				// 'default'			=> '#79A842',
				'transport' 		=> 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control( $wp_customize, 'set_tertiary_color',
				array(
					'label'			=> esc_html__( 'Tertiary Color', 'lasaphire' ),
					'description'	=> esc_html__( 'Setup Tertiary Color', 'lasaphire' ),
					'section'		=> 'sec_standard_color',
				),
			)
		);

		$wp_customize->add_setting(
			'set_tertiary_lighter_color', array(
				'default'			=> '#8FBE5A',
				'transport' 		=> 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control( $wp_customize, 'set_tertiary_lighter_color',
				array(
					'label'			=> esc_html__( 'Tertiary Color Lighter', 'lasaphire' ),
					'description'	=> esc_html__( 'Setup Tertiary Color Lighter', 'lasaphire' ),
					'section'		=> 'sec_standard_color',
				),
			)
		);

		$wp_customize->add_setting(
			'set_tertiary_lightest_color', array(
				'default'			=> '#A8CD7F',
				'transport' 		=> 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control( $wp_customize, 'set_tertiary_lightest_color',
				array(
					'label'			=> esc_html__( 'Tertiary Color Lightest', 'lasaphire' ),
					'description'	=> esc_html__( 'Setup Tertiary Color Lightest', 'lasaphire' ),
					'section'		=> 'sec_standard_color',
				),
			)
		);

	/**
	 * Footer Settings
	*/
	$wp_customize->add_section(
		'sec_footer', array(
			'title' => esc_html__( 'Site Footer', 'lasaphire' ),
			'description' => esc_html__( 'Site Footer elements setup.', 'lasaphire' )
		)
	);

		//	Footer background Color
		$wp_customize->add_setting(
			'set_footer_bg_color', array(
				'default' => '#FAF0D1',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control( $wp_customize, 'set_footer_bg_color',
				array(
					'label' => esc_html__( 'Background Color', 'lasaphire' ),
					'description' => esc_html__( 'Setup Footer Background Color', 'lasaphire' ),
					'section' => 'sec_footer',
				),
			)
		);

		//	Footer Color
		$wp_customize->add_setting(
			'set_footer_color', array(
				'default' => '#A37E33',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control( $wp_customize, 'set_footer_color',
				array(
					'label' => esc_html__( 'Text, Icon Color', 'lasaphire' ),
					'description' => esc_html__( 'Setup Footer Text, Icon Color', 'lasaphire' ),
					'section' => 'sec_footer',
				),
			)
		);

		//- Footer Image
		$wp_customize->add_setting(
			'set_footer_image', array(
				'default'			=> '',
				'transport' => 'refresh',
				'sanitize_callback'	=> 'esc_url_raw'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control( $wp_customize, 'set_footer_image',
				array(
					'label'			=> esc_html__( 'Site Footer Background Image Set.', 'lasaphire' ),
					'description'	=> esc_html__( 'Site Footer Background Image Set.', 'lasaphire' ),
					'section'		=> 'sec_footer',
					'button_labels' => array( // Optional.
						'select' 		=>  esc_html__( 'Select Image', 'lasaphire' ),
						'change' 		=>  esc_html__( 'Change Image', 'lasaphire' ),
						'remove' 		=>  esc_html__( 'Remove', 'lasaphire' ),
						'default' 		=>  esc_html__( 'Default', 'lasaphire' ),
						'placeholder' 	=>  esc_html__( 'No image selected', 'lasaphire' ),
						'frame_title' 	=>  esc_html__( 'Select Image', 'lasaphire' ),
						'frame_button' 	=>  esc_html__( 'Choose Image', 'lasaphire' ),
					),
				)
			)
		);

	//Other Page Settings
	$wp_customize->add_panel(
		'pa_other_page', array(
			'title' => esc_html__('Other Pages', 'lasaphire'),
			'priority' => 170,
		)
	);

	/**
	 * Menu Style Settings
	*/
	$wp_customize->add_section(
		'sec_style', array(
			'title' => esc_html__( 'Style Settings', 'lasaphire' ),
			'description'	=> esc_html__( 'Elements Style Setups.', 'lasaphire' )
		)
	);

		// Forme grunge image
		$wp_customize->add_setting(
			'set_style_grunge_image', array(
				'default' => '',
				'transport' => 'refresh',
				'sanitize_callback' => 'absint'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Cropped_Image_Control( $wp_customize, 'set_style_grunge_image',
				array(
					'label' => esc_html__( 'Background image Setup.', 'lasaphire' ),
					'description' => esc_html__( 'Main Menu, Ingredient background image, and other elements grunge image Setup.', 'lasaphire' ),
					'section' => 'sec_style',
					'flex_width' => 'false',
					'flex_height' => 'true',
					'width' => 640,
					'height' => 'auto',
					'button_labels' => array( // Optional.
						'select' => esc_html__( 'Select Image', 'lasaphire' ),
						'change' => esc_html__( 'Change Image', 'lasaphire' ),
						'remove' => esc_html__( 'Remove', 'lasaphire' ),
						'default' => esc_html__( 'Default', 'lasaphire' ),
						'placeholder' => esc_html__( 'No image selected', 'lasaphire' ),
						'frame_title' => esc_html__( 'Select Image', 'lasaphire' ),
						'frame_button' => esc_html__( 'Choose Image', 'lasaphire' ),
					),
				)
			)
		);

	// /**
	//  * For Me Page Settings
	// */
	// $wp_customize->add_section(
	// 	'sec_forme', array(
	// 		'title' => esc_html__( 'For Me page', 'lasaphire' ),
	// 		'description'	=> esc_html__( 'For Me page elements setup.', 'lasaphire' )
	// 	)
	// );

	// 	// Forme grunge image
	// 	$wp_customize->add_setting(
	// 		'set_forme_grunge_image', array(
	// 			'default'			=> '',
	// 			'transport' => 'refresh',
	// 			'sanitize_callback'	=> 'absint'
	// 		)
	// 	);

	// 	$wp_customize->add_control(
	// 		new WP_Customize_Cropped_Image_Control( $wp_customize, 'set_forme_grunge_image',
	// 			array(
	// 				'label'			=> esc_html__( 'For Me Grunge Image Set.', 'lasaphire' ),
	// 				'description'	=> esc_html__( 'For Me Page Grunge Image Set.', 'lasaphire' ),
	// 				'section'		=> 'sec_forme',
	// 				'flex_width'	=> 'false',
	// 				'flex_height'	=> 'true',
	// 				'width' 		=> 640,
	// 				'height'		=> 'auto',
	// 				'button_labels' => array( // Optional.
	// 					'select' 		=>  esc_html__( 'Select Image', 'lasaphire' ),
	// 					'change' 		=>  esc_html__( 'Change Image', 'lasaphire' ),
	// 					'remove' 		=>  esc_html__( 'Remove', 'lasaphire' ),
	// 					'default' 		=>  esc_html__( 'Default', 'lasaphire' ),
	// 					'placeholder' 	=>  esc_html__( 'No image selected', 'lasaphire' ),
	// 					'frame_title' 	=>  esc_html__( 'Select Image', 'lasaphire' ),
	// 					'frame_button' 	=>  esc_html__( 'Choose Image', 'lasaphire' ),
	// 				),
	// 			)
	// 		)
	// 	);

		/**
		 * Contact Page Settings
		*/
		$wp_customize->add_section(
			'sec_contact', array(
				'title' => esc_html__( 'Contact Page', 'lasaphire' ),
				'description' => esc_html__( 'Contact Page elements setup.', 'lasaphire'),
				'panel' => 'pa_other_page',
			)
		);

		// Contact Address line 1
		$wp_customize->add_setting(
			'set_address_1', array(
				'type'				=> 'theme_mod',
				'default'			=> esc_html__( '1122 Budapest Határőr út 40.', 'lasaphire' ),
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_address_1', array(
				'label' => esc_html__( 'Address line 1', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire Contact Address line 1.', 'lasaphire' ),
				'section'	=> 'sec_contact',
				'type' => 'text'
			)
		);

		// Contact Address line 2
		$wp_customize->add_setting(
			'set_address_2', array(
				'type' => 'theme_mod',
				'default' => esc_html__( 'Hungary' ),
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_address_2', array(
				'label' => esc_html__( 'Contact Address line 2', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire Contact Address line 2.', 'lasaphire' ),
				'section'	=> 'sec_contact',
				'type' => 'text'
			)
		);

		// Contact hours
		$wp_customize->add_setting(
			'set_contact_hours', array(
				'type' => 'theme_mod',
				'default' => esc_html__( 'Monday - Friday 9:00am - 6:00pm' ),
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_contact_hours', array(
				'label' => esc_html__( 'Set Contact Hours', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire Contact Hours setup.', 'lasaphire' ),
				'section'	=> 'sec_contact',
				'type' => 'text'
			)
		);

		// Contact Telephone
		$wp_customize->add_setting(
			'set_contact_phone', array(
				'type' => 'theme_mod',
				'default' => esc_html__( '+36 (30) 422-5096' ),
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_contact_phone', array(
				'label' => esc_html__( 'Set Contact Telephone', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire Contact Telephone setup.', 'lasaphire' ),
				'section'	=> 'sec_contact',
				'type' => 'text'
			)
		);

		// Contact Email
		$wp_customize->add_setting(
			'set_contact_email', array(
				'type' => 'theme_mod',
				'default' => esc_html__( 'cspetra8@gmail.com' ),
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_contact_email', array(
				'label' => esc_html__( 'Set Contact Email', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire Contact Email setup.', 'lasaphire' ),
				'section'	=> 'sec_contact',
				'type' => 'text'
			)
		);

		// Contact form Name placeholder
		$wp_customize->add_setting(
			'set_contactform_name_place', array(
				'type' => 'theme_mod',
				'default' => esc_html__( 'Name...' ),
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_contactform_name_place', array(
				'label' => esc_html__( 'Set Contact Form Name Placeholder', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire Contact Form Name Placeholder setup.', 'lasaphire' ),
				'section'	=> 'sec_contact',
				'type' => 'text'
			)
		);

		// Contact form Email placeholder
		$wp_customize->add_setting(
			'set_contactform_email_place', array(
				'type' => 'theme_mod',
				'default' => esc_html__( 'Email...' ),
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_contactform_email_place', array(
				'label' => esc_html__( 'Set Contact Form Email Placeholder', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire Contact Form Email Placeholder setup.', 'lasaphire' ),
				'section'	=> 'sec_contact',
				'type' => 'text'
			)
		);

		// Contact form Email Note
		$wp_customize->add_setting(
			'set_contactform_email_note', array(
				'type' => 'theme_mod',
				'default' => esc_html__( 'We′ll never share your email with anyone else.' ),
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_contactform_email_note', array(
				'label' => esc_html__( 'Set Contact Form Email Note', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire Contact Form Email Note setup.', 'lasaphire' ),
				'section'	=> 'sec_contact',
				'type' => 'text'
			)
		);

		// Contact form Phone Placeholder
		$wp_customize->add_setting(
			'set_contactform_phone_place', array(
				'type' => 'theme_mod',
				'default' => esc_html__( 'Phone number...' ),
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_contactform_phone_place', array(
				'label' => esc_html__( 'Set Contact Form Phone Number Placeholder', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire Contact Form Phone Number Placeholder setup.', 'lasaphire' ),
				'section'	=> 'sec_contact',
				'type' => 'text'
			)
		);

		// Contact form Message Placeholder
		$wp_customize->add_setting(
			'set_contactform_message_place', array(
				'type' => 'theme_mod',
				'default' => esc_html__( 'Tell me what\'s up...' ),
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_contactform_message_place', array(
				'label' => esc_html__( 'Set Contact Form Message Placeholder', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire Contact Form Message Placeholder setup.', 'lasaphire' ),
				'section'	=> 'sec_contact',
				'type' => 'text'
			)
		);

		// Contact form button text
		$wp_customize->add_setting(
			'set_contactform_button_text', array(
				'type' => 'theme_mod',
				'default' => esc_html__( 'Send' ),
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_contactform_button_text', array(
				'label' => esc_html__( 'Set Contact Form Button Text', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire Contact Form Button Text setup.', 'lasaphire' ),
				'section'	=> 'sec_contact',
				'type' => 'text'
			)
		);



		/**
			* About Settings
		*/

		$wp_customize->add_section(
				'sec_about', array(
				'title'			=> esc_html__( 'Ars Poetics page', 'lasaphire' ),
				'description'	=> esc_html__( 'Ars Poetics Page settings', 'lasaphire' ),
				'panel' => 'pa_other_page',
			)
		);

				// Ourvalues video banner
		$wp_customize->add_setting(
			'set_ourvalues_video', array(
				'default'			=> '',
				'transport' => 'refresh',
				'sanitize_callback'	=> 'absint'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Media_Control( $wp_customize, 'set_ourvalues_video',
				array(
					'mime-type' => 'video',
					'label'			=> esc_html__( 'Video banner set.', 'lasaphire' ),
					'description'	=> esc_html__( '"Ars Poetics" page banner video setting', 'lasaphire' ),
					'section'		=> 'sec_about',
					'button_labels' => array( // Optional.
						'select' 		=>  esc_html__( 'Select video', 'lasaphire' ),
						'change' 		=>  esc_html__( 'Change video', 'lasaphire' ),
						'remove' 		=>  esc_html__( 'Remove', 'lasaphire' ),
						'default' 		=>  esc_html__( 'Default', 'lasaphire' ),
						'placeholder' 	=>  esc_html__( 'No video selected', 'lasaphire' ),
						'frame_title' 	=>  esc_html__( 'Select video', 'lasaphire' ),
						'frame_button' 	=>  esc_html__( 'Choose video', 'lasaphire' ),
					),
				)
			)
		);

// 		/* Test */

// 		$wp_customize->add_section( 'homepage', array(
// 		'title' => esc_html_x( 'Homepage Options', 'customizer section title', 'olsen-light-child' ),
// 	) );

// 	$wp_customize->add_setting( 'home_slider_category', array(
// 		'default' => 0,
// 		'sanitize_callback' => 'absint',
// 	) );

// 	$wp_customize->add_control( new LS_Dropdown_Category_Control( $wp_customize, 'home_slider_category', array(
// 		'section'       => 'homepage',
// 		'label'         => esc_html__( 'Slider posts category', 'olsen-light-child' ),
// 		'description'   => esc_html__( 'Select the category that the slider will show posts from. If no category is selected, the slider will be disabled.', 'olsen-light-child' ),
// 		'dropdown_args' => array(
// 			'taxonomy' => 'category',
// 		),
// 	) ) );

// 		// Test
// 		$wp_customize->add_setting(
// 			'home_slider_test', array(
// 				'default' => '',
// 				'sanitize_callback'	=> 'sanitize_text_field'
// 			)
// 		);

// 		$wp_customize->add_control(new LS_Dropdown_Product_Control( $wp_customize, 'home_slider_test', array(
// 				'section'	=> 'homepage',
// 				'label' => esc_html__( 'Just a test', 'lasaphire' ),
// 				'description'	=> esc_html__( 'La Saphire dropdown test.', 'lasaphire' ),
// 				'dropdown_args' => array(
// 					'post_type' => 'page',
// 					'hierarchical' => 1,
// 				),
// 			),)
// 		);

}
add_action( 'customize_register', 'la_saphire_customizer' );

function la_saphire_sanitize_checkbox( $checked ){
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function hex2rgb($color) {
	$hex = str_replace('#','', $color);
	if(strlen($hex) == 3){
		$rgbArray['r'] = hexdec(substr($hex,0,1).substr($hex,0,1));
		$rgbArray['g'] = hexdec(substr($hex,1,1).substr($hex,1,1));
		$rgbArray['b'] = hexdec(substr($hex,2,1).substr($hex,2,1));
	} else {
		$rgbArray['r'] = hexdec(substr($hex,0,2));
		$rgbArray['g'] = hexdec(substr($hex,2,2));
		$rgbArray['b'] = hexdec(substr($hex,4,2));
	}

	$rgb = '';
	$rgb = $rgbArray['r'] . ', ' . $rgbArray['g'] . ', ' . $rgbArray['b'];
	return $rgb;
}

function hex2hsl($color){
	$hex = str_replace('#','', $color);
	if(strlen($hex) == 3){
		$R = hexdec(substr($hex,0,1).substr($hex,0,1));
		$G = hexdec(substr($hex,1,1).substr($hex,1,1));
		$B = hexdec(substr($hex,2,1).substr($hex,2,1));
	} else {
		$R = hexdec(substr($hex,0,2));
		$G = hexdec(substr($hex,2,2));
		$B = hexdec(substr($hex,4,2));
	}
	$r = $R/255;
	$g = $G/255;
	$b = $B/255;
	$cmin = min($r, $g, $b);
	$cmax = max($r, $g, $b);
	$d = $cmax - $cmin;

	if($d == 0){
		$h = 0;
	} elseif($cmax === $r){
		$h = (($g - $b) / $d);
	} elseif($cmax === $g){
		$h = ($b - $r) / $d + 2;
	} else {
		$h = ($r - $gr) / $d + 4;
	}

	$h = round($h * 60);
	if ($h < 0) {
		$h += 360;
	}

	$l = (($cmax + $cmin) / 2);
	$s = $d === 0 ? 0 : ($d / (1 - abs(2 * $l - 1)));

	if ($s < 0) {
		$s += 1;
	}

	$l = round($l*100);
	$s = round($s*100);

	return array(round($h, 2), round($s, 2), round($l, 2));
}


function hsl2hex($h,$s,$l){
	$c=(1-abs(2*($l/100)-1))*$s/100;
	$x=$c*(1-abs(fmod(($h/60),2)-1));
	$m=($l/100)-($c/2);

	if($h<60){
		$r=$c;
		$g=$x;
		$b=0;
	} elseif($h<120){
		$r=$x;
		$g=$c;
		$b=0;
	}elseif($h<180){
		$r=0;
		$g=$c;
		$b=$x;
	}elseif($h<240){
		$r=0;
		$g=$x;
		$b=$c;
	}elseif($h<300){
		$r=$x;
		$g=0;
		$b=$c;
	}else{
		$r=$c;
		$g=0;
		$b=$x;
	}

	$hex = [dechex(round(($r+$m)*255)),dechex(round(($g+$m)*255)),dechex(round(($b+$m)*255))];
	return '#' . $hex[0] . $hex[1] . $hex[2];
}

// Output Costumize CSS
function lasaphire_customize_css(){ ?>

<style>
:root {
  <?php $color=get_theme_mod('set_bg_color', '#FFFFFF');
  ?>--base-bg-color: <?php echo $color;
  ?>;
  /* #ffffff */
  --base-bg-color-rgb: <?php echo hex2rgb($color);
  ?>;
  <?php $color=get_theme_mod('set_base_color', '#FFFFFF');
  ?>--base-color: <?php echo $color;
  ?>;
  /* #ffffff */
  --base-color-rgb: <?php echo hex2rgb($color);
  ?>;
  <?php $color=get_theme_mod('set_base_color', '#B74005');
  ?>--cta-darker-color: <?php echo $color;
  ?>;
  /* #b74005 */
  <?php $color=get_theme_mod('set_cta_color', '#F45404');
  ?>--cta-color: <?php echo $color;
  ?>;
  /* #f45404 */
  <?php $color=get_theme_mod('set_footer_bg_color', '#FAF0D1');
  $hsl=hex2hsl($color);
  ?>--hue: <?php echo $hsl[0];
  ?>;
  --sat: <?php echo $hsl[1];
  ?>;
  --light: <?php echo $hsl[2];
  ?>;
  --threshold: 60;
  --switch: calc((var(--light) - var(--threshold)) * -100%);
  /* --footer-color: hsl(0, 0%, var(--switch)); */
  --footer-bg-color: hsl(var(--hue), calc(var(--sat)*1%), calc(var(--light)*1%));
  <?php $color=esc_html(get_theme_mod('set_footer_color', '#A37E33'));
  ?>--footer-color: <?php echo $color;
  ?>;
  /* #A37E33 */
  <?php $color=get_theme_mod('set_primary_darker_color', '#ECC355');
  ?>--primary-darker-color: <?php echo $color;
  ?>;
  /* #ECC355 */
  --primary-darker-color-rgb: <?php echo hex2rgb($color);
  ?>;
  <?php $color=get_theme_mod('set_primary_color', '#F2D98C');
  ?>--primary-color: <?php echo $color;
  ?>;
  /* #F2D98C */
  --primary-color-rgb: <?php echo hex2rgb($color);
  ?>;
  <?php $color=get_theme_mod('set_primary_lighter_color', '#F6E5B1');
  ?>--primary-lighter-color: <?php echo $color;
  ?>;
  /* #F6E5B1 */
  --primary-lighter-color-rgb: <?php echo hex2rgb($color);
  ?>;
  <?php $color=get_theme_mod('set_primary_lightest_color', '#FAF0D1');
  ?>--primary-lightest-color: <?php echo $color;
  ?>;
  /* #FAF0D1 */
  --primary-lightest-color-rgb: <?php echo hex2rgb($color);
  ?>;
  <?php $color=get_theme_mod('set_secondary_darker_color', '#5C3D2E');
  ?>--secondary-darker-color: <?php echo $color;
  ?>;
  /* #5C3D2E */
  --secondary-darker-color-rgb: <?php echo hex2rgb($color);
  ?>;
  <?php $color=get_theme_mod('set_secondary_color', '#A37E33');
  ?>--secondary-color: <?php echo $color;
  ?>;
  /* #A37E33 */
  --secondary-color-rgb: <?php echo hex2rgb($color);
  ?>;
  <?php $color=get_theme_mod('set_secondary_lighter_color', '#C49A45');
  ?>--secondary-lighter-color: <?php echo $color;
  ?>;
  /* #C49A45 */
  --secondary-lighter-color-rgb: <?php echo hex2rgb($color);
  ?>;
  <?php $color=get_theme_mod('set_secondary_lightest_color', '#D1AF6C');
  ?>--secondary-lightest-color: <?php echo $color;
  ?>;
  /* #D1AF6C */
  --secondary-lightest-color-rgb: <?php echo hex2rgb($color);
  ?>;
  <?php $color=get_theme_mod('set_tertiary_darker_color', '#5D8233');
  ?>--tertiary-darker-color: <?php echo $color;
  ?>;
  /* #5D8233 */
  --tertiary-darker-color-rgb: <?php echo hex2rgb($color);
  ?>;
  <?php $color=get_theme_mod('set_tertiary_color', '#79a842');
  ?>--tertiary-color: <?php echo $color;
  ?>;
  /* #79A842 #518B2B*/
  --tertiary-color-rgb: <?php echo hex2rgb($color);
  ?>;
  <?php $color=get_theme_mod('set_tertiary_lighter_color', '#8FBE5A');
  ?>--tertiary-lighter-color: <?php echo $color;
  ?>;
  /* #8FBE5A */
  --tertiary-lighter-color-rgb: <?php echo hex2rgb($color);
  ?>;
  <?php $color=get_theme_mod('set_tertiary_lightest_color', '#A8CD7F');
  ?>--tertiary-lightest-color: <?php echo $color;
  ?>;
  /* #A8CD7F */
  --tertiary-lightest-color-rgb: <?php echo hex2rgb($color);
  ?>;
}

footer {
  background-image: linear-gradient(to top, transparent, rgba(255, 255, 255, 0.01) 30%, var(--base-color) 100%), url(<?php echo esc_url(get_theme_mod( 'set_footer_image' ), 'full', false);
  ?>);
}

.home footer {
  background-image: linear-gradient(to top, transparent, rgba(255, 255, 255, 0.01) 30%, var(--base-bg-color) 100%), url(<?php echo esc_url(get_theme_mod( 'set_footer_image' ), 'full', false);
  ?>);
}

.home-subscribe .container {
  background-image: url('<?php echo esc_url( get_theme_mod( 'set_subscribe_bg_image', '' ) ); ?>');
}

.glassmorph::after,
#top-bar.scrollBgColor::after,
#top-bar::after,
#top-bar .brand.scroll a:after,
.mega-menu-parent.dropdown .dropdown-menu::after,
#ls-ingredient.lasaphire .ingredient-filter::after,
#ls-ingredient.lasaphire .ingredient-wrapper::after {
  background-image: url('<?php echo wp_get_attachment_image_url(get_theme_mod( 'set_style_grunge_image' ), 'medium', false); ?>');
}

/* #for-me .container {
  background-image: url(<?php echo wp_get_attachment_image_url( get_theme_mod( 'set_forme_bg_image', '' ), 'la-saphire-banner', false);
  ?>);
} */
</style>
<?php
}
add_action( 'wp_head', 'lasaphire_customize_css' );