<?php
/**
 * WordPress Settings Framework
 *
 * @author  Gilbert Pellegrom, James Kemp
 * @link    https://github.com/gilbitron/WordPress-Settings-Framework
 * @license MIT
 */

/**
 * Define your settings
 *
 * The first parameter of this filter should be wpsf_register_settings_[options_group],
 * in this case "my_example_settings".
 *
 * Your "options_group" is the second param you use when running new WordPressSettingsFramework()
 * from your init function. It's important as it differentiates your options from others.
 *
 * To use the tabbed example, simply change the second param in the filter below to 'wpsf_tabbed_settings'
 * and check out the tabbed settings function on line 156.
 */

add_filter( 'wpsf_register_settings_mtau', 'wpsf_tabbed_settings' );

/**
 * Tabless example
 */

function wpsf_tabless_settings( $wpsf_settings ) {

	// General Settings section
	$wpsf_settings[] = array(
		'section_id'          => 'general',
		'section_title'       => 'General Settings',
		'section_description' => 'Some intro description about this section.',
		'section_order'       => 5,
		'fields'              => array(
			array(
				'id'          => 'text',
				'title'       => 'Text',
				'desc'        => 'This is a description.',
				'placeholder' => 'This is a placeholder.',
				'type'        => 'text',
				'default'     => 'This is default',
			),
			array(
				'id'      => 'number',
				'title'   => 'Number',
				'desc'    => 'This is a description.',
				'type'    => 'number',
				'default' => 10,
			),
			array(
				'id'         => 'time',
				'title'      => 'Time Picker',
				'desc'       => 'This is a description.',
				'type'       => 'time',
				'timepicker' => array(), // Array of timepicker options (http://fgelinas.com/code/timepicker)
			),
			array(
				'id'         => 'date',
				'title'      => 'Date Picker',
				'desc'       => 'This is a description.',
				'type'       => 'date',
				'datepicker' => array(), // Array of datepicker options (http://api.jqueryui.com/datepicker/)
			),
			array(
				'id'         => 'group',
				'title'      => 'Group',
				'desc'       => 'This is a description.',
				'type'       => 'group',
				'subfields' => array(
					// accepts most types of fields
				)
			),
			array(
				'id'          => 'password',
				'title'       => 'Password',
				'desc'        => 'This is a description.',
				'placeholder' => 'This is a placeholder.',
				'type'        => 'password',
				'default'     => 'Example',
			),
			array(
				'id'          => 'textarea',
				'title'       => 'Textarea',
				'desc'        => 'This is a description.',
				'placeholder' => 'This is a placeholder.',
				'type'        => 'textarea',
				'default'     => 'This is default',
			),
			array(
				'id'      => 'select',
				'title'   => 'Select',
				'desc'    => 'This is a description.',
				'type'    => 'select',
				'default' => 'green',
				'choices' => array(
					'red'   => 'Red',
					'green' => 'Green',
					'blue'  => 'Blue',
				),
			),
			array(
				'id'      => 'radio',
				'title'   => 'Radio',
				'desc'    => 'This is a description.',
				'type'    => 'radio',
				'default' => 'green',
				'choices' => array(
					'red'   => 'Red',
					'green' => 'Green',
					'blue'  => 'Blue',
				),
			),
			array(
				'id'      => 'checkbox',
				'title'   => 'Checkbox',
				'desc'    => 'This is a description.',
				'type'    => 'checkbox',
				'default' => 1,
			),
			array(
				'id'      => 'checkboxes',
				'title'   => 'Checkboxes',
				'desc'    => 'This is a description.',
				'type'    => 'checkboxes',
				'default' => array(
					'red',
					'blue',
				),
				'choices' => array(
					'red'   => 'Red',
					'green' => 'Green',
					'blue'  => 'Blue',
				),
			),
			array(
				'id'      => 'color',
				'title'   => 'Color',
				'desc'    => 'This is a description.',
				'type'    => 'color',
				'default' => '#ffffff',
			),
			array(
				'id'      => 'file',
				'title'   => 'File',
				'desc'    => 'This is a description.',
				'type'    => 'file',
				'default' => '',
			),
			array(
				'id'      => 'editor',
				'title'   => 'Editor',
				'desc'    => 'This is a description.',
				'type'    => 'editor',
				'default' => '',
			),
		),
	);

	// More Settings section
	$wpsf_settings[] = array(
		'section_id'    => 'more',
		'section_title' => 'More Settings',
		'section_order' => 10,
		'fields'        => array(
			array(
				'id'      => 'more-text',
				'title'   => 'More Text',
				'desc'    => 'This is a description.',
				'type'    => 'text',
				'default' => 'This is default',
			),
		),
	);

	return $wpsf_settings;
}

/**
 * Tabbed example
 */

function wpsf_tabbed_settings( $wpsf_settings ) {
	// Tabs
	$wpsf_settings['tabs'] = array(
		array(
			'id'    => 'tab_1',
			'title' => __( 'Réglages généraux' ),
		),
		array(
			'id'    => 'tab_2',
			'title' => __( 'Réglages de partage' ),
		),
	);

	// Settings
	$wpsf_settings['sections'] = array(
		array(
			'tab_id'        => 'tab_1',
			'section_id'    => 'section_1',
			'section_title' => 'Twitter',
			'section_order' => 10,
			'fields'        => array(
				array(
					'id'      => 'api-key',
					'title'   => 'API key',
					'desc'    => 'Votre API key.',
					'type'    => 'text',
				),
				array(
					'id'      => 'api-secret-key',
					'title'   => 'API Secret key',
					'desc'    => 'Votre API Secret key',
					'type'    => 'text',
				),
				array(
					'id'      => 'bearer-token',
					'title'   => 'Bearer Token',
					'desc'    => 'Votre Bearer Token',
					'type'    => 'text',
				),
				array(
					'id'      => 'acess-token',
					'title'   => 'Access token',
					'desc'    => 'Votre Access token',
					'type'    => 'text',
				),
				array(
					'id'      => 'access-token-secret',
					'title'   => 'Access token secret',
					'desc'    => 'Votre Access token secret',
					'type'    => 'text',
				),
			),
		),
		array(
			'tab_id'        => 'tab_2',
			'section_id'    => 'section_2',
			'section_title' => 'Twitter',
			'section_order' => 10,
			'fields'        => array(
				array(
					'id'      => 'heure-de-partage',
					'title'   => 'Heure de partage',
					'desc'    => 'L\'heure à laquelle vous souhaitez partager les articles',
					'type'    => 'text',
				),
				array(
					'id'      => 'text-prefix',
					'title'   => 'Prefix',
					'desc'    => 'Texte précédant le contenu partagé',
					'type'    => 'text',
				),
			),
		),

	);

	return $wpsf_settings;
}
