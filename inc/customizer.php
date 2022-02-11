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
			'title'			=> __( 'Copyright Settings', 'lasaphire' ),
			'description'	=> __( 'Copyright Section', 'lasaphire' )
		)
	);

		// Field 1 - Copyright Text Box
		$wp_customize->add_setting(
			'set_copyright', array(
				'type'				=> 'theme_mod',
				'default'			=> '',
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_copyright', array(
				'label'			=> __( 'Szerzői jog', 'lasaphire' ),
				'description'	=> __( 'Kérem, add meg itt a szerzői jogi információd', 'lasaphire' ),
				'section'		=> 'sec_copyright',
				'type'			=> 'text'
			)
		);

	/*-----------------------------------------------------------------------------------------*/
	//Home Page Settings
	$wp_customize->add_section(
		'sec_home_page', array(
			'title'			=> __( 'Kezdőoldal Termékek és Blog beállítások', 'lasaphire' ),
			'description'	=> __( 'Kezdőoldal Section', 'lasaphire' )
		)
	);

		// Field 1 - Products Button Text
		$wp_customize->add_setting(
			'set_products_button_text', array(
				'type'				=> 'theme_mod',
				'default'			=> '',
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_products_button_text', array(
				'label'			=> __( 'Termékek gomb szövege', 'lasaphire' ),
				'description'	=> __( 'Termékek gomb szövege', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'text'
			)
		);

		// Field 2 - New Arrivals Checkbox
		$wp_customize->add_setting(
			'set_new_arrivals_show', array(
				'type'				=> 'theme_mod',
				'default'			=> '',
				'sanitize_callback'	=> 'la_saphire_sanitize_checkbox'
			)
		);

		$wp_customize->add_control(
			'set_new_arrivals_show', array(
				'label'			=> __( 'Megjeleníti az újdonságokat?', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'checkbox'
			)
		);

		// field 3 - New Arrivals Products Limit
		$wp_customize->add_setting(
			'set_new_arrivals_max_num', array(
				'type'				=> 'theme_mod',
				'default'			=> '',
				'sanitize_callback'	=> 'absint'
			)
		);

		$wp_customize->add_control(
			'set_new_arrivals_max_num', array(
				'label'			=> __( 'Újdonságok maximális mennyisége', 'lasaphire' ),
				'description'	=> __( 'Újdonságok maximális mennyisége', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'number'
			)
		);

		// Field 4 - New Arrivals Product Columns
		$wp_customize->add_setting(
			'set_new_arrivals_max_col', array(
				'type'				=> 'theme_mod',
				'default'			=> '',
				'sanitize_callback'	=> 'absint'
			)
		);

		$wp_customize->add_control(
			'set_new_arrivals_max_col', array(
				'label'			=> __( 'Újdonságok max. oszlopa', 'lasaphire' ),
				'description'	=> __( 'Újdonságok max. oszlopa', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'number'
			)
		);


		// Field 5 - Deal of the Week Checkbox
		$wp_customize->add_setting(
			'set_deal_show', array(
				'type'				=> 'theme_mod',
				'default'			=> '',
				'sanitize_callback'	=> 'la_saphire_sanitize_checkbox'
			)
		);

		$wp_customize->add_control(
			'set_deal_show', array(
				'label'			=> __( 'Megjeleníti a hét ajánlatát?', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'checkbox'
			)
		);

		// Field 6 - Deal of the Week Product ID
		$wp_customize->add_setting(
			'set_deal', array(
				'type'				=> 'theme_mod',
				'default'			=> '',
				'sanitize_callback'	=> 'absint'
			)
		);

		$wp_customize->add_control(
			'set_deal', array(
				'label'			=> __( 'A hét ajánlatának termék azonosítója', 'lasaphire' ),
				'description'	=> __( 'Termék azonosító a megjelenítésre', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'number'
			)
		);


		// Field 7 - Products Button Text
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
					'label'			=> __( 'A hét ajánlat Háttérkép beállítás', 'lasaphire' ),
					'description'	=> __( 'A hét ajánlat Háttérkép beállítás', 'lasaphire' ),
					'section'		=> 'sec_home_page',
					'flex_width'	=> 'false',
					'flex_height'	=> 'true',
					'width' 		=> 1500,
					'height'		=> 'auto',
					'button_labels' => array( // Optional.
						'select' 		=>  __( 'Válasszon képet', 'lasaphire' ),
						'change' 		=>  __( 'Kép cseréje', 'lasaphire' ),
						'remove' 		=>  __( 'Eltávolít', 'lasaphire' ),
						'default' 		=>  __( 'Alapértelmezett', 'lasaphire' ),
						'placeholder' 	=>  __( 'Nincs kép kiválasztva', 'lasaphire' ),
						'frame_title' 	=>  __( 'Válasszon képet', 'lasaphire' ),
						'frame_button' 	=>  __( 'Válasszon képet', 'lasaphire' ),
					),
				)
			)
		);

		// Field 8 - Products Button Text
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
					'label'			=> __( '"Nekem" promóció Háttérkép beállítása.', 'lasaphire' ),
					'description'	=> __( '"Nekem" promóció Háttérkép beállítása.', 'lasaphire' ),
					'section'		=> 'sec_home_page',
					'flex_width'	=> 'false',
					'flex_height'	=> 'true',
					'width' 		=> 1500,
					'height'		=> 'auto',
					'button_labels' => array( // Optional.
						'select' 		=>  __( 'Válasszon képet', 'lasaphire' ),
						'change' 		=>  __( 'Kép cseréje', 'lasaphire' ),
						'remove' 		=>  __( 'Eltávolít', 'lasaphire' ),
						'default' 		=>  __( 'Alapértelmezett', 'lasaphire' ),
						'placeholder' 	=>  __( 'Nincs kép kiválasztva', 'lasaphire' ),
						'frame_title' 	=>  __( 'Válasszon képet', 'lasaphire' ),
						'frame_button' 	=>  __( 'Válasszon képet', 'lasaphire' ),
					),
				)
			)
		);

		// field X - Our Values card 1 title
		$wp_customize->add_setting(
			'set_values_card1_title', array(
				'type'				=> 'theme_mod',
				'default'			=> '',
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_values_card1_title', array(
				'label'			=> __( 'Ars Poetika kártya-1 Címe', 'lasaphire' ),
				'description'	=> __( 'Ars Poetika kártya-1 Címe', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'text'
			)
		);

		// field X - Our Values card 2 title
		$wp_customize->add_setting(
			'set_values_card2_title', array(
				'type'				=> 'theme_mod',
				'default'			=> '',
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_values_card2_title', array(
				'label'			=> __( 'Ars Poetika kártya-2 Címe', 'lasaphire' ),
				'description'	=> __( 'Ars Poetika kártya-2 Címe', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'text'
			)
		);

		// field X - Our Values card 3 title
		$wp_customize->add_setting(
			'set_values_card3_title', array(
				'type'				=> 'theme_mod',
				'default'			=> '',
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_values_card3_title', array(
				'label'			=> __( 'Ars Poetika kártya-3 Címe', 'lasaphire' ),
				'description'	=> __( 'Ars Poetika kártya-3 Címe', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'text'
			)
		);

		// field X - Our Values card 4 title
		$wp_customize->add_setting(
			'set_values_card4_title', array(
				'type'				=> 'theme_mod',
				'default'			=> '',
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_values_card4_title', array(
				'label'			=> __( 'Ars Poetika kártya-4 Címe', 'lasaphire' ),
				'description'	=> __( 'Ars Poetika kártya-4 Címe', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'text'
			)
		);

		// field X - News (Blog) Title
		$wp_customize->add_setting(
			'set_blog_title', array(
				'type'				=> 'theme_mod',
				'default'			=> 'Hírem @lasaphire-tól',
				'sanitize_callback'	=> 'sanitize_text_field'
			)
		);

		$wp_customize->add_control(
			'set_blog_title', array(
				'label'			=> __( 'Hírek Címe', 'lasaphire' ),
				'description'	=> __( 'La Saphire Hírek Szekció (blog) címe', 'lasaphire' ),
				'section'		=> 'sec_home_page',
				'type'			=> 'text'
			)
		);

	//Image Gallery Section Settings
	$wp_customize->add_section(
		'sec_gallery', array(
			'title'			=> __( 'Kezdőlap Galéria Képek beállítása', 'lasaphire' ),
			'description'	=> __( 'Kezdőlap Galéria Szekció', 'lasaphire' )
		)
	);

		// Field 1 - Products Button Text
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
					'label'			=> __( 'Kezdőlap Galéria Kép 1 beállítása', 'lasaphire' ),
					'description'	=> __( 'Kezdőlap Galéria Kép 1 beállítása (méret max 1500 x auto pixel)', 'lasaphire' ),
					'section'		=> 'sec_gallery',
					'flex_width'	=> 'false',
					'flex_height'	=> 'true',
					'width' 		=> 1500,
					'height'		=> 'auto',
					'button_labels' => array( // Optional.
						'select' 		=>  __( 'Válasszon képet', 'lasaphire' ),
						'change' 		=>  __( 'Kép cseréje', 'lasaphire' ),
						'remove' 		=>  __( 'Eltávolít', 'lasaphire' ),
						'default' 		=>  __( 'Alapértelmezett', 'lasaphire' ),
						'placeholder' 	=>  __( 'Nincs kép kiválasztva', 'lasaphire' ),
						'frame_title' 	=>  __( 'Válasszon képet', 'lasaphire' ),
						'frame_button' 	=>  __( 'Válasszon képet', 'lasaphire' ),
					),
				)
			)
		);

		// Field 2 - Products Button Text
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
					'label'			=> __( 'Kezdőlap Galéria Kép 2 beállítása', 'lasaphire' ),
					'description'	=> __( 'Kezdőlap Galéria Kép 2 beállítása (méret max 1500 x auto pixel)', 'lasaphire' ),
					'section'		=> 'sec_gallery',
					'flex_width'	=> 'false',
					'flex_height'	=> 'true',
					'width' 		=> 1500,
					'height'		=> 'auto',
					'button_labels' => array( // Optional.
						'select' 		=>  __( 'Válasszon képet', 'lasaphire' ),
						'change' 		=>  __( 'Kép cseréje', 'lasaphire' ),
						'remove' 		=>  __( 'Eltávolít', 'lasaphire' ),
						'default' 		=>  __( 'Alapértelmezett', 'lasaphire' ),
						'placeholder' 	=>  __( 'Nincs kép kiválasztva', 'lasaphire' ),
						'frame_title' 	=>  __( 'Válasszon képet', 'lasaphire' ),
						'frame_button' 	=>  __( 'Válasszon képet', 'lasaphire' ),
					),
				)
			)
		);

		// Field 3 - Products Button Text
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
					'label'			=> __( 'Kezdőlap Galéria Kép 3 beállítása', 'lasaphire' ),
					'description'	=> __( 'Kezdőlap Galéria Kép 3 beállítása (méret max 1500 x auto pixel)', 'lasaphire' ),
					'section'		=> 'sec_gallery',
					'flex_width'	=> 'false',
					'flex_height'	=> 'true',
					'width' 		=> 1500,
					'height'		=> 'auto',
					'button_labels' => array( // Optional.
						'select' 		=>  __( 'Válasszon képet', 'lasaphire' ),
						'change' 		=>  __( 'Kép cseréje', 'lasaphire' ),
						'remove' 		=>  __( 'Eltávolít', 'lasaphire' ),
						'default' 		=>  __( 'Alapértelmezett', 'lasaphire' ),
						'placeholder' 	=>  __( 'Nincs kép kiválasztva', 'lasaphire' ),
						'frame_title' 	=>  __( 'Válasszon képet', 'lasaphire' ),
						'frame_button' 	=>  __( 'Válasszon képet', 'lasaphire' ),
					),
				)
			)
		);

		// Field 4 - Products Button Text
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
					'label'			=> __( 'Kezdőlap Galéria Kép 4 beállítása', 'lasaphire' ),
					'description'	=> __( 'Kezdőlap Galéria Kép 4 beállítása (méret max 1500 x auto pixel)', 'lasaphire' ),
					'section'		=> 'sec_gallery',
					'flex_width'	=> 'false',
					'flex_height'	=> 'true',
					'width' 		=> 1500,
					'height'		=> 'auto',
					'button_labels' => array( // Optional.
						'select' 		=>  __( 'Válasszon képet', 'lasaphire' ),
						'change' 		=>  __( 'Kép cseréje', 'lasaphire' ),
						'remove' 		=>  __( 'Eltávolít', 'lasaphire' ),
						'default' 		=>  __( 'Alapértelmezett', 'lasaphire' ),
						'placeholder' 	=>  __( 'Nincs kép kiválasztva', 'lasaphire' ),
						'frame_title' 	=>  __( 'Válasszon képet', 'lasaphire' ),
						'frame_button' 	=>  __( 'Válasszon képet', 'lasaphire' ),
					),
				)
			)
		);

		// Field 5 - Products Button Text
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
					'label'			=> __( 'Kezdőlap Galéria Kép 5 beállítása', 'lasaphire' ),
					'description'	=> __( 'Kezdőlap Galéria Kép 5 beállítása (méret max 1500 x auto pixel)', 'lasaphire' ),
					'section'		=> 'sec_gallery',
					'flex_width'	=> 'false',
					'flex_height'	=> 'true',
					'width' 		=> 1500,
					'height'		=> 'auto',
					'button_labels' => array( // Optional.
						'select' 		=>  __( 'Válasszon képet', 'lasaphire' ),
						'change' 		=>  __( 'Kép cseréje', 'lasaphire' ),
						'remove' 		=>  __( 'Eltávolít', 'lasaphire' ),
						'default' 		=>  __( 'Alapértelmezett', 'lasaphire' ),
						'placeholder' 	=>  __( 'Nincs kép kiválasztva', 'lasaphire' ),
						'frame_title' 	=>  __( 'Válasszon képet', 'lasaphire' ),
						'frame_button' 	=>  __( 'Válasszon képet', 'lasaphire' ),
					),
				)
			)
		);

		// Field 6 - Products Button Text
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
					'label'			=> __( 'Kezdőlap Galéria Kép 6 beállítása', 'lasaphire' ),
					'description'	=> __( 'Kezdőlap Galéria Kép 6 beállítása (méret max 1500 x auto pixel)', 'lasaphire' ),
					'section'		=> 'sec_gallery',
					'flex_width'	=> 'false',
					'flex_height'	=> 'true',
					'width' 		=> 1500,
					'height'		=> 'auto',
					'button_labels' => array( // Optional.
						'select' 		=>  __( 'Válasszon képet', 'lasaphire' ),
						'change' 		=>  __( 'Kép cseréje', 'lasaphire' ),
						'remove' 		=>  __( 'Eltávolít', 'lasaphire' ),
						'default' 		=>  __( 'Alapértelmezett', 'lasaphire' ),
						'placeholder' 	=>  __( 'Nincs kép kiválasztva', 'lasaphire' ),
						'frame_title' 	=>  __( 'Válasszon képet', 'lasaphire' ),
						'frame_button' 	=>  __( 'Válasszon képet', 'lasaphire' ),
					),
				)
			)
		);

		// Field 7 - Products Button Text
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
					'label'			=> __( 'Kezdőlap Galéria Kép 7 beállítása', 'lasaphire' ),
					'description'	=> __( 'Kezdőlap Galéria Kép 7 beállítása (méret max 1500 x auto pixel)', 'lasaphire' ),
					'section'		=> 'sec_gallery',
					'flex_width'	=> 'false',
					'flex_height'	=> 'true',
					'width' 		=> 1500,
					'height'		=> 'auto',
					'button_labels' => array( // Optional.
						'select' 		=>  __( 'Válasszon képet', 'lasaphire' ),
						'change' 		=>  __( 'Kép cseréje', 'lasaphire' ),
						'remove' 		=>  __( 'Eltávolít', 'lasaphire' ),
						'default' 		=>  __( 'Alapértelmezett', 'lasaphire' ),
						'placeholder' 	=>  __( 'Nincs kép kiválasztva', 'lasaphire' ),
						'frame_title' 	=>  __( 'Válasszon képet', 'lasaphire' ),
						'frame_button' 	=>  __( 'Válasszon képet', 'lasaphire' ),
					),
				)
			)
		);

		// Field 8 - Products Button Text
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
					'label'			=> __( 'Kezdőlap Galéria Kép 8 beállítása', 'lasaphire' ),
					'description'	=> __( 'Kezdőlap Galéria Kép 8 beállítása (méret max 1500 x auto pixel)', 'lasaphire' ),
					'section'		=> 'sec_gallery',
					'flex_width'	=> 'false',
					'flex_height'	=> 'true',
					'width' 		=> 1500,
					'height'		=> 'auto',
					'button_labels' => array( // Optional.
						'select' 		=>  __( 'Válasszon képet', 'lasaphire' ),
						'change' 		=>  __( 'Kép cseréje', 'lasaphire' ),
						'remove' 		=>  __( 'Eltávolít', 'lasaphire' ),
						'default' 		=>  __( 'Alapértelmezett', 'lasaphire' ),
						'placeholder' 	=>  __( 'Nincs kép kiválasztva', 'lasaphire' ),
						'frame_title' 	=>  __( 'Válasszon képet', 'lasaphire' ),
						'frame_button' 	=>  __( 'Válasszon képet', 'lasaphire' ),
					),
				)
			)
		);

	/**
	 * Standard Colors Settings
	*/
	$wp_customize->add_section(
		'sec_standard_color', array(
			'title'			=> __( 'Standard Szín', 'lasaphire' ),
			'description'	=> __( 'Standard Színek Szekció', 'lasaphire' )
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
					'label'			=> __( 'Alapszín', 'lasaphire' ),
					'description'	=> __( 'Alapszín beállítása', 'lasaphire' ),
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
					'label'			=> __( 'Cselekvésre ösztönző Sötétebb szín', 'lasaphire' ),
					'description'	=> __( 'Cselekvésre ösztönző Sötétebb szín beállítása', 'lasaphire' ),
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
					'label'			=> __( 'Cselekvésre ösztönző szín', 'lasaphire' ),
					'description'	=> __( 'Cselekvésre ösztönző szín beállítása', 'lasaphire' ),
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
					'label'			=> __( 'Elsődleges sötétebb szín', 'lasaphire' ),
					'description'	=> __( 'Elsődleges sötétebb szín beállítása', 'lasaphire' ),
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
					'label'			=> __( 'Elsődleges szín', 'lasaphire' ),
					'description'	=> __( 'Elsődleges szín beállítása', 'lasaphire' ),
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
					'label'			=> __( 'Elsődleges világosabb szín', 'lasaphire' ),
					'description'	=> __( 'Elsődleges világosabb szín beállítása', 'lasaphire' ),
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
					'label'			=> __( 'Elsődleges legvilágosabb szin', 'lasaphire' ),
					'description'	=> __( 'Elsődleges legvilágosabb szin beállítása', 'lasaphire' ),
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
					'label'			=> __( 'Másodlagos sötétebb szín', 'lasaphire' ),
					'description'	=> __( 'Másodlagos sötétebb szín beállítása', 'lasaphire' ),
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
					'label'			=> __( 'Másodlagos szín', 'lasaphire' ),
					'description'	=> __( 'Másodlagos szín beállítása', 'lasaphire' ),
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
					'label'			=> __( 'Másodlagos világosabb szín', 'lasaphire' ),
					'description'	=> __( 'Másodlagos világosabb szín beállítása', 'lasaphire' ),
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
					'label'			=> __( 'Másodlagos legvilágosabb szín', 'lasaphire' ),
					'description'	=> __( 'Másodlagos legvilágosabb szín beállítása', 'lasaphire' ),
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
					'label'			=> __( 'Harmadlagos sötétebb szín', 'lasaphire' ),
					'description'	=> __( 'Harmadlagos sötétebb szín beállítása', 'lasaphire' ),
					'section'		=> 'sec_standard_color',
				),
			)
		);

		$wp_customize->add_setting(
			'set_tertiary_color', array(
				'default'			=> '#79A842',
				'transport' 		=> 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control( $wp_customize, 'set_tertiary_color',
				array(
					'label'			=> __( 'Harmadlagos szín', 'lasaphire' ),
					'description'	=> __( 'Harmadlagos szín beállítása', 'lasaphire' ),
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
					'label'			=> __( 'Harmadlagos világosabb szín', 'lasaphire' ),
					'description'	=> __( 'Harmadlagos világosabb szín beállítása', 'lasaphire' ),
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
					'label'			=> __( 'Harmadlagos legvilágosabb szín', 'lasaphire' ),
					'description'	=> __( 'Harmadlagos legvilágosabb szín beállítása', 'lasaphire' ),
					'section'		=> 'sec_standard_color',
				),
			)
		);

	/**
	 * Footer Settings
	*/
	$wp_customize->add_section(
		'sec_footer', array(
			'title'			=> __( 'Webhely Lábléc', 'lasaphire' ),
			'description'	=> __( 'Webhely lábléc elemeinek beállítása.', 'lasaphire' )
		)
	);

		// Field 1 - Products Button Text
		$wp_customize->add_setting(
			'set_footer_image', array(
				'default'			=> '',
				'transport' => 'refresh',
				'sanitize_callback'	=> 'absint'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Cropped_Image_Control( $wp_customize, 'set_footer_image',
				array(
					'label'			=> __( 'Webhely lábléc Háttérkép Beállítása.', 'lasaphire' ),
					'description'	=> __( 'Webhely lábléc Háttérkép Beállítása.', 'lasaphire' ),
					'section'		=> 'sec_footer',
					'flex_width'	=> 'false',
					'flex_height'	=> 'true',
					'width' 		=> 1500,
					'height'		=> 'auto',
					'button_labels' => array( // Optional.
						'select' 		=>  __( 'Válasszon képet', 'lasaphire' ),
						'change' 		=>  __( 'Kép cseréje', 'lasaphire' ),
						'remove' 		=>  __( 'Eltávolít', 'lasaphire' ),
						'default' 		=>  __( 'Alapértelmezett', 'lasaphire' ),
						'placeholder' 	=>  __( 'Nincs kép kiválasztva', 'lasaphire' ),
						'frame_title' 	=>  __( 'Válasszon képet', 'lasaphire' ),
						'frame_button' 	=>  __( 'Válasszon képet', 'lasaphire' ),
					),
				)
			)
		);

	/**
	 * For Me Settings
	*/
	$wp_customize->add_section(
		'sec_forme', array(
			'title'			=> __( '"Nekem" oldal', 'lasaphire' ),
			'description'	=> __( '"Nekem" oldal elemeinek beállítása', 'lasaphire' )
		)
	);

		// Field 1 - Products Button Text
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
					'label'			=> __( '"Nekem" oldal grunge háttér', 'lasaphire' ),
					'description'	=> __( '"Nekem" oldal grunge háttér beállítása', 'lasaphire' ),
					'section'		=> 'sec_forme',
					'flex_width'	=> 'false',
					'flex_height'	=> 'true',
					'width' 		=> 640,
					'height'		=> 'auto',
					'button_labels' => array( // Optional.
						'select' 		=>  __( 'Válasszon képet', 'lasaphire' ),
						'change' 		=>  __( 'Kép cseréje', 'lasaphire' ),
						'remove' 		=>  __( 'Eltávolít', 'lasaphire' ),
						'default' 		=>  __( 'Alapértelmezett', 'lasaphire' ),
						'placeholder' 	=>  __( 'Nincs kép kiválasztva', 'lasaphire' ),
						'frame_title' 	=>  __( 'Válasszon képet', 'lasaphire' ),
						'frame_button' 	=>  __( 'Válasszon képet', 'lasaphire' ),
					),
				)
			)
		);

		/**
			* About Settings
		*/

		$wp_customize->add_section(
				'sec_about', array(
				'title'			=> __( 'Rólunk oldalak beállításai', 'lasaphire' ),
				'description'	=> __( 'A "Rólunk" menühöz tartozó almenük beállításai', 'lasaphire' )
			)
		);

				// Field 1 - Products Button Text
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
					'label'			=> __( 'Banner video beállítása', 'lasaphire' ),
					'description'	=> __( '"Ars Poetika" oldal banner video beállítása', 'lasaphire' ),
					'section'		=> 'sec_about',
					'button_labels' => array( // Optional.
						'select' 		=>  __( 'Válasszon videót', 'lasaphire' ),
						'change' 		=>  __( 'videó cseréje', 'lasaphire' ),
						'remove' 		=>  __( 'Eltávolít', 'lasaphire' ),
						'default' 		=>  __( 'Alapértelmezett', 'lasaphire' ),
						'placeholder' 	=>  __( 'Nincs videó kiválasztva', 'lasaphire' ),
						'frame_title' 	=>  __( 'Válasszon videót', 'lasaphire' ),
						'frame_button' 	=>  __( 'Válasszon videót', 'lasaphire' ),
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
			--base-color: <?php echo get_theme_mod( 'set_base_color' ); ?>; /* #ffffff */
			--base-color-rgb: <?php echo hex2rgb( get_theme_mod( 'set_base_color' ) ); ?>;

			--cta-darker-color: <?php echo get_theme_mod( 'set_cta_darker_color' ); ?>; /* #b74005 */
			--cta-color: <?php echo get_theme_mod( 'set_cta_color' ); ?>; /* #f45404 */

			--primary-darker-color: <?php echo get_theme_mod( 'set_primary_darker_color' ); ?>; /* #ECC355 */
			--primary-darker-color-rgb: <?php echo hex2rgb( get_theme_mod( 'set_primary_darker_color' ) ); ?>;
			--primary-color: <?php echo get_theme_mod( 'set_primary_color' ); ?>; /* #F2D98C */
			--primary-color-rgb: <?php echo hex2rgb( get_theme_mod( 'set_primary_color' ) ); ?>;
			--primary-lighter-color: <?php echo get_theme_mod( 'set_primary_lighter_color' ); ?>; /* #F6E5B1 */
			--primary-lighter-color-rgb: <?php echo hex2rgb( get_theme_mod( 'set_primary_lighter_color' ) ); ?>;
			--primary-lightest-color: <?php echo get_theme_mod( 'set_primary_lightest_color' ); ?>; /* #FAF0D1 */
			--primary-lightest-color-rgb: <?php echo hex2rgb( get_theme_mod( 'set_primary_lightest_color' ) ); ?>;

			--secondary-darker-color: <?php echo get_theme_mod( 'set_secondary_darker_color' ); ?>; /* #5C3D2E */
			--secondary-darker-color-rgb: <?php echo hex2rgb( get_theme_mod( 'set_secondary_darker_color' ) ); ?>;
			--secondary-color: <?php echo get_theme_mod( 'set_secondary_color' ); ?>; /* #A37E33 */
			--secondary-color-rgb: <?php echo hex2rgb( get_theme_mod( 'set_secondary_color' ) ); ?>;
			--secondary-lighter-color: <?php echo get_theme_mod( 'set_secondary_lighter_color' ); ?>; /* #C49A45 */
			--secondary-lighter-color-rgb: <?php echo hex2rgb( get_theme_mod( 'set_secondary_lighter_color' ) ); ?>;
			--secondary-lightest-color: <?php echo get_theme_mod( 'set_secondary_lightest_color' ); ?>; /* #D1AF6C */
			--secondary-lightest-color-rgb: <?php echo hex2rgb( get_theme_mod( 'set_secondary_lightest_color' ) ); ?>;

			--tertiary-darker-color: <?php echo get_theme_mod( 'set_tertiary_darker_color' ); ?>; /* #5D8233 */
			--tertiary-darker-color-rgb: <?php echo hex2rgb( get_theme_mod( 'set_tertiary_darker_color' ) ); ?>;
			--tertiary-color: <?php echo get_theme_mod( 'set_tertiary_color' ); ?>; /* #79A842 */
			--tertiary-color-rgb: <?php echo hex2rgb( get_theme_mod( 'set_tertiary_color' ) ); ?>;
			--tertiary-lighter-color: <?php echo get_theme_mod( 'set_tertiary_lighter_color' ); ?>; /* #8FBE5A */
			--tertiary-lighter-color-rgb: <?php echo hex2rgb( get_theme_mod( 'set_tertiary_lighter_color' ) ); ?>;
			--tertiary-lightest-color: <?php echo get_theme_mod( 'set_tertiary_lightest_color' ); ?>; /* #A8CD7F */
			--tertiary-lightest-color-rgb: <?php echo hex2rgb( get_theme_mod( 'set_tertiary_lightest_color' ) ); ?>;
		}
		.glassmorph::after,
		#top-bar.scrollBgColor::after,
		#top-bar::after,
		.mega-menu-parent.dropdown .dropdown-menu::after {
			background-image: url('<?php echo wp_get_attachment_image_url(get_theme_mod( 'set_forme_grunge_image' ), 'medium', false); ?>');
		}

		#for-me .container {
			background-image: url(<?php echo wp_get_attachment_image_url( get_theme_mod( 'set_forme_bg_image' ), 'la-saphire-page-banner', false ); ?>);
		}
	</style>
	<?php
}
add_action( 'wp_head', 'lasaphire_customize_css' );