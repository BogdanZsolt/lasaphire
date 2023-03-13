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
			'title'			=> esc_html__( 'Copyright Settings', 'lasaphire' ),
			'description'	=> esc_html__( 'Copyright Section', 'lasaphire' )
		)
	);

		// Copyright Text Box
		$wp_customize->add_setting(
			'set_copyright', array(
				'type'				=> 'theme_mod',
				'default'			=> '',
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
	$wp_customize->add_section(
		'sec_home_page', array(
			'title'			=> esc_html__( 'Home Page Products and Blog Settings', 'lasaphire' ),
			'description'	=> esc_html__( 'Home Page Section', 'lasaphire' )
		)
	);

		// Products Section Title
		$wp_customize->add_setting(
			'set_products_title', array(
				'type'				=> 'theme_mod',
				'default'			=> esc_html__( 'Products' ),
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_products_title', array(
				'label'			=> esc_html__( 'Products Section Title', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire Products section title', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'text'
			)
		);

		// Products Button Text
		$wp_customize->add_setting(
			'set_products_button_text', array(
				'type'				=> 'theme_mod',
				'default'			=> esc_html__( 'Browse Products', 'lasaphire' ),
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_products_button_text', array(
				'label'			=> esc_html__( 'Products Button Text', 'lasaphire' ),
				'description'	=> esc_html__( 'Products Button Text', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'text'
			)
		);


		// Products Button Url 1
		$wp_customize->add_setting(
			'set_products_link', array(
				'type'				=> 'theme_mod',
				'default'			=>  '',
				'sanitize_callback'	=> 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'set_products_link', array(
				'label'			=> esc_html__( 'Select page', 'lasaphire' ),
				'description'	=> esc_html__( 'Which side the button takes you to.', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'dropdown-pages',
				'allow_addition' => true,
			)
		);

		// New Arrivals Checkbox
		$wp_customize->add_setting(
			'set_new_arrivals_show', array(
				'type'				=> 'theme_mod',
				'default'			=> '',
				'sanitize_callback'	=> 'la_saphire_sanitize_checkbox'
			)
		);

		$wp_customize->add_control(
			'set_new_arrivals_show', array(
				'label'			=> esc_html__( 'Show New Arrivals?', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'checkbox'
			)
		);

		// New Arrivals Products Limit
		$wp_customize->add_setting(
			'set_new_arrivals_max_num', array(
				'type'				=> 'theme_mod',
				'default'			=> '',
				'sanitize_callback'	=> 'absint'
			)
		);

		$wp_customize->add_control(
			'set_new_arrivals_max_num', array(
				'label'			=> esc_html__( 'New Arrivals Max Number', 'lasaphire' ),
				'description'	=> esc_html__( 'New Arrivals Max Number', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'number'
			)
		);

		// New Arrivals Product Columns
		$wp_customize->add_setting(
			'set_new_arrivals_max_col', array(
				'type'				=> 'theme_mod',
				'default'			=> '',
				'sanitize_callback'	=> 'absint'
			)
		);

		$wp_customize->add_control(
			'set_new_arrivals_max_col', array(
				'label'			=> esc_html__( 'New Arrivals Max Columns', 'lasaphire' ),
				'description'	=> esc_html__( 'New Arrivals Max Columns', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'number'
			)
		);


		// Deal of the Week Checkbox
		$wp_customize->add_setting(
			'set_deal_show', array(
				'type'				=> 'theme_mod',
				'default'			=> '',
				'sanitize_callback'	=> 'la_saphire_sanitize_checkbox'
			)
		);

		$wp_customize->add_control(
			'set_deal_show', array(
				'label'			=> esc_html__( 'Show Deal of the Week?', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'checkbox'
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
				'label'			=> esc_html__( 'Deal of the Week Product ID', 'lasaphire' ),
				'description'	=> esc_html__( 'Product ID to Display', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'number'
			)
		);


		// Deal of the week Section Title
		$wp_customize->add_setting(
			'set_deal_title', array(
				'type'				=> 'theme_mod',
				'default'			=> esc_html__( 'Featured Stuff' ),
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_deal_title', array(
				'label'			=> esc_html__( 'Deal of the Week Section Title', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire Deal of the Week section title', 'lasaphire' ),
				'section'		=> 'sec_home_page',
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
				'section'		=> 'sec_home_page',
				'type'			=> 'text'
			)
		);

		// Deal of the week Button Url 1
		$wp_customize->add_setting(
			'set_deal_link', array(
				'type'				=> 'theme_mod',
				'default'			=>  '',
				'sanitize_callback'	=> 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'set_deal_link', array(
				'label'			=> esc_html__( 'Select page', 'lasaphire' ),
				'description'	=> esc_html__( 'Which side the button takes you to.', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'dropdown-pages',
				'allow_addition' => true,
			)
		);

		// Deal of the Wook background Image
		$wp_customize->add_setting(
			'set_deal_bg_image', array(
				'default'			=> '',
				'transport' => 'refresh',
				'sanitize_callback'	=> 'absint'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Cropped_Image_Control( $wp_customize, 'set_deal_bg_image',
				array(
					'label'			=> esc_html__( 'Deal of the Week Background Image Set.', 'lasaphire' ),
					'description'	=> esc_html__( 'Deal of the Week Background Image Set.', 'lasaphire' ),
					'section'		=> 'sec_home_page',
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

		// Deal of the Week Checkbox
		$wp_customize->add_setting(
			'set_forme_show', array(
				'type'				=> 'theme_mod',
				'default'			=> '',
				'sanitize_callback'	=> 'la_saphire_sanitize_checkbox'
			)
		);

		$wp_customize->add_control(
			'set_forme_show', array(
				'label'			=> esc_html__( 'Show For me promotion?', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'checkbox'
			)
		);

		// For me bg image
		$wp_customize->add_setting(
			'set_forme_bg_image', array(
				'default'			=> '',
				'transport' => 'refresh',
				'sanitize_callback'	=> 'absint'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Cropped_Image_Control( $wp_customize, 'set_forme_bg_image',
				array(
					'label'			=> esc_html__( 'For me promotion Background Image Set.', 'lasaphire' ),
					'description'	=> esc_html__( 'For me promotion Background Image Set.', 'lasaphire' ),
					'section'		=> 'sec_home_page',
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


		// Show About Section Checkbox
		$wp_customize->add_setting(
			'set_about_show', array(
				'type'				=> 'theme_mod',
				'default'			=> '',
				'sanitize_callback'	=> 'la_saphire_sanitize_checkbox'
			)
		);

		$wp_customize->add_control(
			'set_about_show', array(
				'label'			=> esc_html__( 'Show About Us?', 'lasaphire' ),
				'section'		=> 'sec_home_page',
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
				'section'		=> 'sec_home_page',
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
				'section'		=> 'sec_home_page',
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
				'section'		=> 'sec_home_page',
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
				'section'		=> 'sec_home_page',
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
				'label'			=> esc_html__( 'About Us Link 1', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire About Us Link 1', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'dropdown-pages',
				'allow_addition' => true,
			)
		);

		// About Text of link 2
		$wp_customize->add_setting(
			'set_about_textlink2', array(
				'type'				=> 'theme_mod',
				'default'			=> esc_html__( 'About Me' ),
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_about_textlink2', array(
				'label'			=> esc_html__( 'About Us Text of Link 2', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire About Us Text of Link 2', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'text'
			)
		);

		// About link 2
		$wp_customize->add_setting(
			'set_about_link2', array(
				'type'				=> 'theme_mod',
				'default'			=> '',
				'sanitize_callback'	=> 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'set_about_link2', array(
				'label'			=> esc_html__( 'About Us Link 2', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire About Us Link 2', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'dropdown-pages',
				'allow_addition' => true,
			)
		);

		// About Text of link 3
		$wp_customize->add_setting(
			'set_about_textlink3', array(
				'type'				=> 'theme_mod',
				'default'			=> esc_html__( 'Ars Poetics' ),
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_about_textlink3', array(
				'label'			=> esc_html__( 'About Us Text of Link 3', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire About Us Text of Link 3', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'text'
			)
		);

		// About Text of link 3
		$wp_customize->add_setting(
			'set_about_link3', array(
				'type'				=> 'theme_mod',
				'default'			=> '',
				'sanitize_callback'	=> 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'set_about_link3', array(
				'label'			=> esc_html__( 'About Us Link 3', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire About Us Link 3', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'dropdown-pages',
				'allow_addition' => true,
			)
		);

		// About image
		$wp_customize->add_setting(
			'set_about_image', array(
				'default'			=> '',
				'transport' => 'refresh',
				'sanitize_callback'	=> 'absint',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Media_Control( $wp_customize, 'set_about_image',
				array(
					'label'			=> esc_html__( 'About Us Section Image Set.', 'lasaphire' ),
					'description'	=> esc_html__( 'About Us Section Image Set.', 'lasaphire' ),
					'section'		=> 'sec_home_page',
					'mime_type'	=> 'image',
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


		// Our Values Checkbox
		$wp_customize->add_setting(
			'set_values_show', array(
				'type'				=> 'theme_mod',
				'default'			=> '',
				'sanitize_callback'	=> 'la_saphire_sanitize_checkbox'
			)
		);

		$wp_customize->add_control(
			'set_values_show', array(
				'label'			=> esc_html__( 'Show Ars Poetics Cards?', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'checkbox'
			)
		);

		// Our Values card 1 title
		$wp_customize->add_setting(
			'set_values_card1_title', array(
				'type'				=> 'theme_mod',
				'default'			=> '',
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_values_card1_title', array(
				'label'			=> esc_html__( 'Ars Poetics Card-1 Title', 'lasaphire' ),
				'description'	=> esc_html__( 'Ars Poetics Card-1 Title', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'text'
			)
		);

		// Our Values card 2 title
		$wp_customize->add_setting(
			'set_values_card2_title', array(
				'type'				=> 'theme_mod',
				'default'			=> '',
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_values_card2_title', array(
				'label'			=> esc_html__( 'Ars Poetics Card-2 Title', 'lasaphire' ),
				'description'	=> esc_html__( 'Ars Poetics Card-2 Title', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'text'
			)
		);

		// Our Values card 3 title
		$wp_customize->add_setting(
			'set_values_card3_title', array(
				'type'				=> 'theme_mod',
				'default'			=> '',
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_values_card3_title', array(
				'label'			=> esc_html__( 'Ars Poetics Card-3 Title', 'lasaphire' ),
				'description'	=> esc_html__( 'Ars Poetics Card-3 Title', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'text'
			)
		);

		// Our Values card 4 title
		$wp_customize->add_setting(
			'set_values_card4_title', array(
				'type'				=> 'theme_mod',
				'default'			=> '',
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_values_card4_title', array(
				'label'			=> esc_html__( 'Ars Poetics Card-4 Title', 'lasaphire' ),
				'description'	=> esc_html__( 'Ars Poetics Card-4 Title', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'text'
			)
		);

		// News (Blog) Title
		$wp_customize->add_setting(
			'set_blog_title', array(
				'type'				=> 'theme_mod',
				'default'			=> esc_html__( 'News from @lasaphire', 'lasaphire' ),
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_blog_title', array(
				'label'			=> esc_html__( 'News Title', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire News Section title', 'lasaphire' ),
				'section'		=> 'sec_home_page',
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
				'section'		=> 'sec_home_page',
				'type'			=> 'text'
			)
		);

		// News (Blog) Button Url
		$wp_customize->add_setting(
			'set_blog_link', array(
				'type'				=> 'theme_mod',
				'default'			=> '',
				'sanitize_callback'	=> 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'set_blog_link', array(
				'label'			=> esc_html__( 'Select page', 'lasaphire' ),
				'description'	=> esc_html__( 'Which side the button takes you to.', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'dropdown-pages',
				'allow_addition' => true,
			)
		);

		// Newsletter Subscription Form
		$wp_customize->add_section(
			'sec_subscription', array(
				'title'	=> esc_html__( 'Newsletter Subscription Form', 'lasaphire' ),
				'description'	=> esc_html__( 'Newsletter subscription form settings', 'lasaphire' ),
			)
		);

		//Subscribe checkbox
		$wp_customize->add_setting(
			'set_subscribe_show', array(
				'type'				=> 'theme_mod',
				'default'			=> '',
				'sanitize_callback'	=> 'la_saphire_sanitize_checkbox'
			)
		);

		$wp_customize->add_control(
			'set_subscribe_show', array(
				'label'			=> esc_html__( 'Show Subscribe Section?', 'lasaphire' ),
				'section'		=> 'sec_subscription',
				'type'			=> 'checkbox'
			)
		);

		// Subscription Text
		$wp_customize->add_setting(
			'set_subscription_text', array(
				'type'				=> 'theme_mod',
				'default'			=> esc_html__( 'Sign up to get to know the latest products, stories and nicest offers and tips!', 'lasaphire' ),
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_subscription_text', array(
				'label'			=> esc_html__( 'Newsletter Subscription description', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire Newsletter subscription description', 'lasaphire' ),
				'section'		=> 'sec_subscription',
				'type'			=> 'text'
			)
		);

		// Name placeholder
		$wp_customize->add_setting(
			'set_name_placeholder', array(
				'type'				=> 'theme_mod',
				'default'			=> esc_html__( 'I am called...', 'lasaphire' ),
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_name_placeholder', array(
				'label'			=> esc_html__( 'Name placehoder text', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire Newsletter subscription name placeholder text', 'lasaphire' ),
				'section'		=> 'sec_subscription',
				'type'			=> 'text'
			)
		);

		// Email placeholder
		$wp_customize->add_setting(
			'set_email_placeholder', array(
				'type'				=> 'theme_mod',
				'default'			=> esc_html__( 'Email', 'lasaphire' ),
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_email_placeholder', array(
				'label'			=> esc_html__( 'Email placehoder text', 'lasaphire' ),
				'description'	=> esc_html__( 'La Saphire Newsletter subscription email placeholder text', 'lasaphire' ),
				'section'		=> 'sec_subscription',
				'type'			=> 'text'
			)
		);


		// subscribe background Image
		$wp_customize->add_setting(
			'set_subscribe_bg_image', array(
				'default'			=> '',
				'transport' => 'refresh',
				'sanitize_callback'	=> 'esc_url_raw',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control( $wp_customize, 'set_subscribe_bg_image',
				array(
					'label'			=> esc_html__( 'Subscribe Background Image Set.', 'lasaphire' ),
					'description'	=> esc_html__( 'Subscribe Background Image Set.', 'lasaphire' ),
					'section'		=> 'sec_subscription',
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


	// Image Gallery Section Settings
	$wp_customize->add_section(
		'sec_gallery', array(
			'title'			=> esc_html__( 'Home Page Gallery Images Settings', 'lasaphire' ),
			'description'	=> esc_html__( 'Home Page Gallery Section', 'lasaphire' )
		)
	);

		//  Gallery Image 1
		$wp_customize->add_setting(
			'set_gallery_image1', array(
				'default'			=> '',
				'transport' => 'refresh',
				'sanitize_callback'	=> 'absint'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Cropped_Image_Control( $wp_customize, 'set_gallery_image1',
				array(
					'label'			=> esc_html__( 'Home Gallery Image 1 Setting', 'lasaphire' ),
					'description'	=> esc_html__( 'Home Gallery Image 1 Setting (size max 1500 x auto px)', 'lasaphire' ),
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

		//  Gallery Image 2
		$wp_customize->add_setting(
			'set_gallery_image2', array(
				'default'			=> '',
				'transport' => 'refresh',
				'sanitize_callback'	=> 'absint'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Cropped_Image_Control( $wp_customize, 'set_gallery_image2',
				array(
					'label'			=> esc_html__( 'Home Gallery Image 2 Setting', 'lasaphire' ),
					'description'	=> esc_html__( 'Home Gallery Image 2 Setting (size max 1500 x auto px)', 'lasaphire' ),
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

		//  Gallery Image 3
		$wp_customize->add_setting(
			'set_gallery_image3', array(
				'default'			=> '',
				'transport' => 'refresh',
				'sanitize_callback'	=> 'absint'
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

		//
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
			'title'			=> esc_html__( 'Site Footer', 'lasaphire' ),
			'description'	=> esc_html__( 'Site Footer elements setup.', 'lasaphire' )
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

	/**
	 * For Me Settings
	*/
	$wp_customize->add_section(
		'sec_forme', array(
			'title'			=> esc_html__( 'For Me page', 'lasaphire' ),
			'description'	=> esc_html__( 'For Me elements setup.', 'lasaphire' )
		)
	);

		// Forme grunge image
		$wp_customize->add_setting(
			'set_forme_grunge_image', array(
				'default'			=> '',
				'transport' => 'refresh',
				'sanitize_callback'	=> 'absint'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Cropped_Image_Control( $wp_customize, 'set_forme_grunge_image',
				array(
					'label'			=> esc_html__( 'For Me Grunge Image Set.', 'lasaphire' ),
					'description'	=> esc_html__( 'For Me Page Grunge Image Set.', 'lasaphire' ),
					'section'		=> 'sec_forme',
					'flex_width'	=> 'false',
					'flex_height'	=> 'true',
					'width' 		=> 640,
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
			* About Settings
		*/

		$wp_customize->add_section(
				'sec_about', array(
				'title'			=> esc_html__( 'About menu', 'lasaphire' ),
				'description'	=> esc_html__( 'Settings for the submenus for the "About" menu', 'lasaphire' )
			)
		);

				// Ourvalues video
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

// Output Costumize CSS
function lasaphire_customize_css(){ ?>

<style>
:root {
 --base-bg-color: <?php echo get_theme_mod('set_bg_color');
 ?>;
 /* #ffffff */
 --base-bg-color-rgb: <?php echo hex2rgb(get_theme_mod('set_bg_color'));
 ?>;
 --base-color: <?php echo get_theme_mod('set_base_color');
 ?>;
 /* #ffffff */
 --base-color-rgb: <?php echo hex2rgb(get_theme_mod('set_base_color'));
 ?>;

 --cta-darker-color: <?php echo get_theme_mod('set_cta_darker_color');
 ?>;
 /* #b74005 */
 --cta-color: <?php echo get_theme_mod('set_cta_color');
 ?>;
 /* #f45404 */

 --primary-darker-color: <?php echo get_theme_mod('set_primary_darker_color');
 ?>;
 /* #ECC355 */
 --primary-darker-color-rgb: <?php echo hex2rgb(get_theme_mod('set_primary_darker_color'));
 ?>;
 --primary-color: <?php echo get_theme_mod('set_primary_color');
 ?>;
 /* #F2D98C */
 --primary-color-rgb: <?php echo hex2rgb(get_theme_mod('set_primary_color'));
 ?>;
 --primary-lighter-color: <?php echo get_theme_mod('set_primary_lighter_color');
 ?>;
 /* #F6E5B1 */
 --primary-lighter-color-rgb: <?php echo hex2rgb(get_theme_mod('set_primary_lighter_color'));
 ?>;
 --primary-lightest-color: <?php echo get_theme_mod('set_primary_lightest_color');
 ?>;
 /* #FAF0D1 */
 --primary-lightest-color-rgb: <?php echo hex2rgb(get_theme_mod('set_primary_lightest_color'));
 ?>;

 --secondary-darker-color: <?php echo get_theme_mod('set_secondary_darker_color');
 ?>;
 /* #5C3D2E */
 --secondary-darker-color-rgb: <?php echo hex2rgb(get_theme_mod('set_secondary_darker_color'));
 ?>;
 --secondary-color: <?php echo get_theme_mod('set_secondary_color');
 ?>;
 /* #A37E33 */
 --secondary-color-rgb: <?php echo hex2rgb(get_theme_mod('set_secondary_color'));
 ?>;
 --secondary-lighter-color: <?php echo get_theme_mod('set_secondary_lighter_color');
 ?>;
 /* #C49A45 */
 --secondary-lighter-color-rgb: <?php echo hex2rgb(get_theme_mod('set_secondary_lighter_color'));
 ?>;
 --secondary-lightest-color: <?php echo get_theme_mod('set_secondary_lightest_color');
 ?>;
 /* #D1AF6C */
 --secondary-lightest-color-rgb: <?php echo hex2rgb(get_theme_mod('set_secondary_lightest_color'));
 ?>;

 --tertiary-darker-color: <?php echo get_theme_mod('set_tertiary_darker_color');
 ?>;
 /* #5D8233 */
 --tertiary-darker-color-rgb: <?php echo hex2rgb(get_theme_mod('set_tertiary_darker_color'));
 ?>;
 --tertiary-color: <?php echo get_theme_mod('set_tertiary_color');
 ?>;
 /* #79A842 #518B2B*/
 --tertiary-color-rgb: <?php echo hex2rgb(get_theme_mod('set_tertiary_color'));
 ?>;
 --tertiary-lighter-color: <?php echo get_theme_mod('set_tertiary_lighter_color');
 ?>;
 /* #8FBE5A */
 --tertiary-lighter-color-rgb: <?php echo hex2rgb(get_theme_mod('set_tertiary_lighter_color'));
 ?>;
 --tertiary-lightest-color: <?php echo get_theme_mod('set_tertiary_lightest_color');
 ?>;
 /* #A8CD7F */
 --tertiary-lightest-color-rgb: <?php echo hex2rgb(get_theme_mod('set_tertiary_lightest_color'));
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
 background-image: url('<?php echo esc_url( get_theme_mod( 'set_subscribe_bg_image', 0 ) ); ?>');
}

.glassmorph::after,
#top-bar.scrollBgColor::after,
#top-bar::after,
#top-bar .brand.scroll a:after,
.mega-menu-parent.dropdown .dropdown-menu::after,
#ls-ingredient.lasaphire .ingredient-filter::after,
#ls-ingredient.lasaphire .ingredient-wrapper::after {
 background-image: url('<?php echo wp_get_attachment_image_url(get_theme_mod( 'set_forme_grunge_image' ), 'medium', false); ?>');
}

#for-me .container {
 background-image: url(<?php echo wp_get_attachment_image_url( get_theme_mod( 'set_forme_bg_image' ), 'la-saphire-page-banner', false);
 ?>);
}
</style>
<?php
}
add_action( 'wp_head', 'lasaphire_customize_css' );