<?php
// /**
//  * Create Settings Menu
// */

function newsletter_settings(){


	require_once( get_template_directory() . '/inc/class-boo-settings-helper.php' );

	$newsletter_settings = array(
		'tabs'	=> true,
		'menu'	=> array(
			'slug'	=> 'connections',
			'page_title'	=> __( 'Connections settings', 'lasaphire' ),
			'menu_title' 	=> __( 'Connections settings', 'lasaphire' ),
			'parent'		=> 'options-general.php',
			'submenu'		=> true,
		),
		'sections'	=> array(
			// Newsletter Settings Section
			array(
				'id'			=> 'newletter_settings',
				'title'			=> __( 'Newsletter subscribe Settings', 'lasaphire' ),
				'desc'			=> __( 'These are Newsletter subscribe settings', 'lasaphire' ),
			),
			// Email SMTP Settings Section
			array(
				'id'			=> 'email_smtp_settings',
				'title'			=> __( 'Email SMTP Settings', 'lasaphire' ),
				'desc'			=> __( 'These are email smtp settings', 'lasaphire' ),
			)
		),
		'fields'	=> array(
			// For Newsletter Settings Section
			'newletter_settings' => array(
				array(
					'id'		=> 'lasaphire_newsletter_apikey_field',
					'label'		=> __( 'API Key', 'lasaphire' ),
				),
				array(
					'id'		=> 'lasaphire_newsletter_group',
					'label'		=> __( 'Subscribe Group', 'lasaphire' ),
					'type'		=> 'select',
					'options'	=> array(
						'108724643' => 'LaSaphire',
						'108720485'	=> 'Bogdán Zsolt'
					)
				)
			),
			'email_smtp_settings' => array(
				array(
					'id'		=> 'smtp_host',
					'label'		=> __( 'Host', 'lasaphire' ),
				),
				array(
					'id'		=> 'smtp_auth',
					'label'		=> __( 'Authentication', 'lasaphire' ),
					'type'		=> 'checkbox',
					'default'	=> true,
				),
				array(
					'id'		=> 'smtp_user',
					'label'		=> __( 'User', 'lasaphire' ),
				),
				array(
					'id'		=> 'smtp_pass',
					'label'		=> __( 'Password', 'lasaphire' ),
					'type'		=> 'password',
				),
				array(
					'id'		=> 'smtp_from',
					'label'		=> __( 'From', 'lasaphire' ),
				),
				array(
					'id'		=> 'smtp_name',
					'label'		=> __( 'Name', 'lasaphire' ),
				),
				array(
					'id'		=> 'smtp_port',
					'label'		=> __( 'SMTP Port', 'lasaphire' ),
					'default'	=> 465,
				),
				array(
					'id'		=> 'smtp_secure',
					'label'		=> __( 'SMTP Secure', 'lasaphire' ),
					'type'		=> 'select',
					'options'	=> array(
						'tls'	=> 'TLS',
						'ssl'	=> 'SSL',
					),
					'default'	=> 'ssl'
				),
			)
		)
	);

	new Boo_Settings_Helper( $newsletter_settings );
}
add_action( 'admin_menu', 'newsletter_settings' );