<?php

/*
*  ACF - Enhanced Message Field Class
*
*/

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
	exit;

// check if class already exists
if ( ! class_exists('ACF_Field_Enhanced_Message') ) :

	class ACF_Field_Enhanced_Message extends acf_field {

		// Field vars
		var $settings;

		/*
		*  __construct
		*
		*  This function will setup the field type data
		*/

		function __construct( $settings ) {

			// vars
			$this->name = 'enhanced_message';
			$this->label = __( 'Enhanced Message','acf' );
			$this->category = 'layout';
			$this->defaults = array(
				'enhanced_message'	=> '',
				'hide_label' => 'no',
			);

			// settings (array) Store plugin settings (url, path, version)
			// as a reference for later use with assets
			$this->settings = $settings;


			// do not delete!
	        parent::__construct();
		}


		/*
		*  render_field()
		*/

		function render_field( $field ) {

			$stringVal = $field['enhanced_message'];

			ob_start();
			eval( '?>'.$stringVal );
			$stringVal = ob_get_contents();
			ob_end_clean();

			echo $stringVal;
		}

		/*
		*  field_group_admin_head()
		*
		*/

		function field_group_admin_head() {
			?>
	<style>
		.acf-field-list .acf-field-object-enhanced-message tr[data-name="name"],
		.acf-field-list .acf-field-object-enhanced-message tr[data-name="instructions"],
		.acf-field-list .acf-field-object-enhanced-message tr[data-name="required"] { display: none; }
	</style>
			<?php
		}

		/*
		*  field_group_admin_enqueue_scripts()
		*/

		function field_group_admin_enqueue_scripts() {


			$dir = plugin_dir_url( __FILE__ );

			// register & include JS
			wp_register_script( 'acf-input-enhanced_message', "{$dir}js/input.js", array(), false, true );
			wp_enqueue_script('acf-input-enhanced_message');

		}

		/*
		*  load_field()
		*
		*/

		function load_field( $field )
		{
			if ( ! is_admin() ) {
				return $field;
			}

			$current_screen = get_current_screen();

			if ( null !== $current_screen && 'acf-field-group' !== $current_screen->post_type && 'yes' === $field['hide_label'] ) {
				$field['label'] = '';
				echo '<style>body:not(.post-type-acf-field-group) div[data-key="'.$field['key'].'"] .acf-label {display:none;}</style>';
			}

			return $field;
		}

		/*
		*  render_field_settings()
		*/

		function render_field_settings( $field ) {

			// Message
			acf_render_field_setting( $field, array(
				'label'			=> __('Message','acf'),
				'instructions'	=> __('Works like the default Message field but supports PHP and without ','acf') . '<a href="http://codex.wordpress.org/Function_Reference/wpautop" target="_blank">wpautop()</a>',
				'type'			=> 'textarea',
				'name'			=> 'enhanced_message',
			));

			// Hide Label?
			acf_render_field_setting( $field, array(
				'label'			=> __('Hide Label','acf'),
				'type'			=> 'radio',
				'name'			=> 'hide_label',
				'layout'		=> 'horizontal',
				'choices'	=>	array(
					'yes' => __('Yes'),
					'no' => __('No'),
				)
			));

		}

	}

	/**
	 * Initialize field
	 *
	 * @param array $settings  Settings from the main plugin file.
	 */
	new ACF_Field_Enhanced_Message( $this->settings );

	// class_exists check
endif;
