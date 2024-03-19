<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * All functions, variables in this file has to be prefixed with expertrec to avoid a name collision
 * as they are on global namespace.
 *
 * All classes are to follow this convention too.  Functions/variables inside the classes are free from this constraint.
 *
 * @link              https://www.expertrec.com/
 * @since             1.0.0
 * @package           Expertrecsearch
 *
 * @wordpress-plugin
 * Plugin Name:       WP Fastest Site Search
 * Plugin URI:        https://blog.expertrec.com/wordpress-search-not-working-how-to-fix/
 * Description:       Expertrec Search enhances your site's search functionality with both <strong>speed</strong> and <strong>reliability</strong>. It effectively <strong>prevents adding any load to your WordPress server</strong> while your users perform searches.
 * Version:           5.1.32
 * Author:            Expertrec
 * Author URI:        https://www.expertrec.com/wordpress-search-plugin/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       expertrecsearch
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die( "You can't access this file directly" );
}
require_once __DIR__ . '/vendor/autoload.php';

define( 'EXPERTREC_VERSION', '5.1.32' );
define( 'EXPERTREC_NAME', 'expertrecsearch' );


// Lets define all the string keys that are used with DB.
define( 'EXPERTREC_DB_OPTIONS_KEY', 'expertrec_options' );
define( 'EXPERTREC_DB_OPTIONS_KEY_JSON', 'expertrec_options_RO' );
define( 'EXPERTREC_DB_OPTIONS_KEY_PRODUCT_ATTRIBUTES', 'exp_woocommerce_product_attributes' );
define( 'EXPERTREC_DB_OPTIONS_KEY_META_ATTRIBUTES', 'exp_meta_keys' );
define( 'EXPERTREC_DB_OPTIONS_SELECTED_DOC_TYPES', 'exp_selected_doc_types' );
define( 'EXPERTREC_DB_OPTIONS_LAST_SUCCESSFUL_SYNC', 'exp_last_successful_sync' );
define( 'EXPERTREC_DB_OPTIONS_SENTRY_ENABLED', 'exp_sentry_enabled' );
define( 'EXPERTREC_DB_OPTIONS_INDEX_VARIANTS', 'exp_index_variants' );
define( 'EXPERTREC_DB_OPTIONS_SUBSEQUENT_UPDATES', 'exp_subsequent_updates' );
define( 'EXPERTREC_DB_OPTIONS_INIT', 'exp_init' );
define( 'EXPERTREC_DB_OPTIONS_BRAND_TAXONOMY', 'exp_brand_taxonomy' );
add_option( 'EXPERTREC_MOCK_API' );
// It will be true if general debug is enabled or expertrec_debug is enabled in options.
$expertrec_debug_status = WP_DEBUG || get_option( 'expertrec_debug' );

if ( $expertrec_debug_status ) {
	do_action( 'er/debug', 'In the main file of expertrec' );
	// for satisfying woocommerce lint check error - Empty ELSE statement detected
	1 == 1;
}


/**
 * Register all the hooks related to the public-facing functionality
 * of the plugin.
 * This has to be called only after proper activation and signup.
 *
 * @since    1.0.0
 */
function expertrec_define_public_hooks() {
	do_action( 'er/debug', 'Defining public hooks' );
	require 'public/class-expertrecsearch-public.php';
	require 'includes/class-expertrecsearch-loader.php';

	$plugin_public = new Expertrecsearch_Public( EXPERTREC_NAME, EXPERTREC_VERSION );
	$loader        = new Expertrecsearch_Loader();
	$loader->add_action( 'wp_head', $plugin_public, 'expertrec_js_snippet', 4 );
	$options = get_option( EXPERTREC_DB_OPTIONS_KEY );
	do_action( 'er/debug', 'reading expertrec options as ' . print_r( $options, true ) );
	$hook_on_existing_input_box = $options['hook_on_existing_input_box'];
	if ( ! $hook_on_existing_input_box ) {
		$loader->add_filter( 'get_search_form', $plugin_public, 'ci_search_form', 990 );
	}
	$loader->run();
}


if ( ! is_admin() ) {
	$options = get_option( EXPERTREC_DB_OPTIONS_KEY );
	if ( ! $options ) {
		// this happens when activation/account creation is not done.
		return;
	}
	expertrec_define_public_hooks();
	// Now the frontend work is done, return to save time.
	// return;
}


// More DB keys needed for the admin interface.
// variables starting with OPTIONS_ are keys in the options array.
define( 'EXPERTREC_DB_OPTIONS_VERSION_KEY', 'version' );


function expertrec_setup_sentry() {
	do_action( 'er/debug', 'In sentry client initialization' );
	// Initializing sentry - with melchi@gmail.com account (deprecated dsn).
	$sentry_client = new Raven_Client(
	// 'https://6b79e8c7a8b34ffca53f01e467dccd08:98c641a4d5b5424aaf2f5a2d6cdd9d40@o1334740.ingest.sentry.io/6601655'
		'https://9ffb0574113c4550ba9fe339464efd20:04512b3c755a4eb5859087a5a99a1ff0@o4504643239149568.ingest.sentry.io/4504643240984576'
	);

	// providing a bit of additional context
	$sentry_client->user_context( array( 'email' => get_option( 'admin_email', 'NA' ) ) );
	$sentry_client->extra_context(
		array(
			'plugin_version' => EXPERTREC_VERSION,
			'php_version'    => phpversion(),
		)
	);
	// Excluding errors that are not from our plugin.  Check if the filename has our plugin name(folder) in it.
	$sentry_client->setSendCallback(
		function ( $data ) {
			$plugin_error = false;
			$frames       = $data['exception']['values'][0]['stacktrace']['frames'];
			foreach ( $frames as $frame ) {
				if ( strpos( $frame['filename'], 'wp-fastest-site-search' ) ) {
					$plugin_error = true;
					break;
				}
			}
			if ( ! $plugin_error ) {
				return false;
			}
			return $data;
		}
	);
	$error_handler = new Raven_ErrorHandler( $sentry_client );
	$error_handler->registerExceptionHandler();
	$error_handler->registerErrorHandler();
	$error_handler->registerShutdownFunction();
	return $sentry_client;
}


$sentry_flag = get_option( EXPERTREC_DB_OPTIONS_SENTRY_ENABLED );

// setup sentry client
// if sentry is enabled
if ( 'on' == $sentry_flag ) {
	$expertrec_sentry_client = expertrec_setup_sentry();
}

$expertrecPluginPath = plugin_dir_path( __FILE__ );

define( 'EXPERTREC_PLUGIN_DIR_PATH', $expertrecPluginPath );
define( 'EXPERTREC_PLUGIN_ROOT_FILE', __FILE__ );

require_once 'includes/class-expertrecsearch.php';
// not sure if these includes are needed.
// this is needed only if active.
require_once 'hooks/expertrecsearch-ajax.php';

$expertrec_search = new Expertrecsearch( __FILE__ );
// sleep(20);
$expertrec_search->run();
