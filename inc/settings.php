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
			'page_title'	=> esc_html__( 'Connections settings', 'lasaphire' ),
			'menu_title' 	=> esc_html__( 'Connections settings', 'lasaphire' ),
			'parent'		=> 'options-general.php',
			'submenu'		=> true,
		),
		'sections'	=> array(
			// Newsletter Settings Section
			array(
				'id'			=> 'newletter_settings',
				'title'			=> esc_html__( 'Newsletter subscribe Settings', 'lasaphire' ),
				'desc'			=> esc_html__( 'These are Newsletter subscribe settings', 'lasaphire' ),
			),
			// Email SMTP Settings Section
			array(
				'id'			=> 'email_smtp_settings',
				'title'			=> esc_html__( 'Email SMTP Settings', 'lasaphire' ),
				'desc'			=> esc_html__( 'These are email smtp settings', 'lasaphire' ),
			)
		),
		'fields'	=> array(
			// For Newsletter Settings Section
			'newletter_settings' => array(
				array(
					'id'		=> 'lasaphire_newsletter_apikey_field',
					'label'		=> esc_html__( 'API Key', 'lasaphire' ),
				),
				array(
					'id'		=> 'lasaphire_newsletter_group',
					'label'		=> esc_html__( 'Subscribe Group', 'lasaphire' ),
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
					'label'		=> esc_html__( 'Host', 'lasaphire' ),
				),
				array(
					'id'		=> 'smtp_auth',
					'label'		=> esc_html__( 'Authentication', 'lasaphire' ),
					'type'		=> 'checkbox',
					'default'	=> true,
				),
				array(
					'id'		=> 'smtp_user',
					'label'		=> esc_html__( 'User', 'lasaphire' ),
				),
				array(
					'id'		=> 'smtp_pass',
					'label'		=> esc_html__( 'Password', 'lasaphire' ),
					'type'		=> 'password',
				),
				array(
					'id'		=> 'smtp_from',
					'label'		=> esc_html__( 'From', 'lasaphire' ),
				),
				array(
					'id'		=> 'smtp_name',
					'label'		=> esc_html__( 'Name', 'lasaphire' ),
				),
				array(
					'id'		=> 'smtp_port',
					'label'		=> esc_html__( 'SMTP Port', 'lasaphire' ),
					'default'	=> 465,
				),
				array(
					'id'		=> 'smtp_secure',
					'label'		=> esc_html__( 'SMTP Secure', 'lasaphire' ),
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