<?php
// /**
//  * Create Settings Menu
// */

function newsletter_settings(){


	require_once( get_template_directory() . '/inc/class-boo-settings-helper.php' );

	$temps = get_newsletter_group();
	$groups = array();
	$groups[''] = __('Select group', 'lasaphire');
	foreach($temps as $temp){
		$groups[$temp['id']] = $temp['name'];
	}
	$stats = get_newsletter_account_stats();
	$gstats = get_newsletter_groups_stats();
	$desc = '<div class="lasaphire-mailerlite-stats">';
	$desc .= '<div class="lasaphire-account-stats">';
	$desc .= '<h2>Newsletter Account Stats</h2>';
	if(!empty($stats)){
		$desc .= '<p>' . __('Subscribed', 'lasaphire') . ': ' . $stats->subscribed . '</p>';
		$desc .= '<p>' . __('Unsubscribed', 'lasaphire') . ': ' . $stats->unsubscribed . '</p>';
		$desc .= '<p>' . __('Campaigns', 'lasaphire') . ': ' . $stats->campaigns . '</p>';
		$desc .= '<p>' . __('Sent emails', 'lasaphire') . ': ' . $stats->sent_emails . '</p>';
		$desc .= '<p>' . __('Open rate', 'lasaphire') . ': ' . $stats->open_rate . '</p>';
		$desc .= '<p>' . __('Click rate', 'lasaphire') . ': ' . $stats->click_rate . '</p>';
		$desc .= '<p>' . __('Bounce rate', 'lasaphire') . ': ' . $stats->bounce_rate . '</p>';
	}
	$desc .= '</div>';
	$desc .= '<div class="lasaphire-group-stats">';
	$desc .= '<h2>Newsletter Group Stats</h2>';
	if(!empty($gstats)){
		$desc .= '<p>' . __('Name', 'lasaphire') . ': ' . $gstats->name . '</p>';
		$desc .= '<p>' . __('Total', 'lasaphire') . ': ' . $gstats->total . '</p>';
		$desc .= '<p>' . __('Active', 'lasaphire') . ': ' . $gstats->active . '</p>';
		$desc .= '<p>' . __('Bounced', 'lasaphire') . ': ' . $gstats->bounced . '</p>';
		$desc .= '<p>' . __('Unconfirmed', 'lasaphire') . ': ' . $gstats->unconfirmed . '</p>';
		$desc .= '<p>' . __('Junk', 'lasaphire') . ': ' . $gstats->junk . '</p>';
		$desc .= '<p>' . __('Sent', 'lasaphire') . ': ' . $gstats->sent . '</p>';
		$desc .= '<p>' . __('Opened', 'lasaphire') . ': ' . $gstats->opened . '</p>';
		$desc .= '<p>' . __('Clicked', 'lasaphire') . ': ' . $gstats->clicked . '</p>';
		$desc .= '<p>' . __('Date created', 'lasaphire') . ': ' . $gstats->date_created . '</p>';
		$desc .= '<p>' . __('Date updated', 'lasaphire') . ': ' . $gstats->date_updated . '</p>';
	}
	$desc .= '</div>';
	$desc .= '</div>';
	$newsletter_settings = array(
		'tabs'	=> true,
		'menu'	=> array(
			'slug'	=> 'connections',
			'page_title'	=> esc_html__( 'Connections settings', 'lasaphire' ),
			'menu_title' 	=> esc_html__( 'Connections settings', 'lasaphire' ),
			'parent' => 'options-general.php',
			'submenu' => true,
		),
		'sections'	=> array(
			// Newsletter Settings Section
			array(
				'id' => 'newletter_settings',
				'title' => esc_html__( 'Newsletter subscribe Settings', 'lasaphire' ),
				'desc' => esc_html__( 'These are Newsletter subscribe settings', 'lasaphire' ),
			),
			// Email SMTP Settings Section
			array(
				'id' => 'email_smtp_settings',
				'title' => esc_html__( 'Email SMTP Settings', 'lasaphire' ),
				'desc' => esc_html__( 'These are email smtp settings', 'lasaphire' ),
			)
		),
		'fields' => array(
			// For Newsletter Settings Section
			'newletter_settings' => array(
				array(
					'id' => 'lasaphire_newsletter_apikey_field',
					'label' => esc_html__( 'API Key', 'lasaphire' ),
				),
				array(
					'id' => 'lasaphire_newsletter_group',
					'label' => esc_html__( 'Subscribe Group', 'lasaphire' ),
					'type' => 'select',
					'options' => $groups,
				),
				array(
					'id' => 'lasaphire_newsletter_stats',
					'desc' => $desc,
					'type' => 'html',
				),
			),
			'email_smtp_settings' => array(
				array(
					'id' => 'smtp_host',
					'label' => esc_html__( 'Host', 'lasaphire' ),
				),
				array(
					'id' => 'smtp_auth',
					'label' => esc_html__( 'Authentication', 'lasaphire' ),
					'type' => 'checkbox',
					'default' => true,
				),
				array(
					'id' => 'smtp_user',
					'label' => esc_html__( 'User', 'lasaphire' ),
				),
				array(
					'id' => 'smtp_pass',
					'label' => esc_html__( 'Password', 'lasaphire' ),
					'type' => 'password',
				),
				array(
					'id' => 'smtp_from',
					'label' => esc_html__( 'From', 'lasaphire' ),
				),
				array(
					'id' => 'smtp_name',
					'label' => esc_html__( 'Name', 'lasaphire' ),
				),
				array(
					'id' => 'smtp_port',
					'label' => esc_html__( 'SMTP Port', 'lasaphire' ),
					'default' => 465,
				),
				array(
					'id' => 'smtp_secure',
					'label' => esc_html__( 'SMTP Secure', 'lasaphire' ),
					'type' => 'select',
					'options' => array(
						'tls' => 'TLS',
						'ssl' => 'SSL',
					),
					'default'	=> 'ssl'
				),
			)
		)
	);

	new Boo_Settings_Helper( $newsletter_settings );
}
add_action( 'admin_menu', 'newsletter_settings' );