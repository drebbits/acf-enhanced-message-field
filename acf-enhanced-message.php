<?php
/*
Plugin Name: ACF Enhanced Message Field
Description: Adds an enhanced version of the default Message field to accept PHP and certainly no wpauto().
Version: 1.1.1
Author: Dreb Bits
Author URI: http://drebbits.com
*/

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
	exit;

// check if class already exists
if ( ! class_exists( 'ACF_Plugin_Enhanced_Message' ) ) :
	class ACF_Plugin_Enhanced_Message {

		/*
		*  __construct
		*
		*  This function will setup the class functionality
		*
		*  @type	function
		*  @date	17/02/2016
		*  @since	1.0.0
		*
		*  @param	n/a
		*  @return	n/a
		*/
		function __construct() {

			// vars
			$this->settings = array(
				'version'	=> '1.1.0',
				'url'		=> plugin_dir_url( __FILE__ ),
				'path'		=> plugin_dir_path( __FILE__ ),
			);

			// @todo set text domain

			// include field
			add_action( 'acf/include_field_types', 	array( $this, 'include_field_types' ) ); // v5
			add_action( 'acf/register_fields', 		array( $this, 'include_field_types' ) ); // v4

		}


		/*
		*  include_field_types
		*
		*  This function will include the field type class
		*
		*  @type	function
		*  @date	17/02/2016
		*  @since	1.0.0
		*
		*  @param	$version (int) major ACF version. Defaults to 4
		*  @return	n/a
		*/
		function include_field_types( $version ) {
			if ( empty( $version ) )
				$version = 4;

			// include
			include_once( 'acf-enhanced-message-v' . $version . '.php' );
		}
	}
	// initialize
	new ACF_Plugin_Enhanced_Message();
	// class_exists check
endif;
