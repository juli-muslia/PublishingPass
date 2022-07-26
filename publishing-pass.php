<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://julianmuslia.com
 * @since             1.0.0
 * @package           Publishing_Pass
 *
 * @wordpress-plugin
 * Plugin Name:       PublishingPass
 * Plugin URI:        https://publishing-group.de/
 * Description:       Password Management for Publishing Group
 * Version:           1.0.0
 * Author:            Julian Muslia
 * Author URI:        https://julianmuslia.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       publishing-pass
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('PUBLISHING_PASS_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-publishing-pass-activator.php
 */
function activate_publishing_pass()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-publishing-pass-activator.php';
	$activator = new Publishing_Pass_Activator();
	$activator->activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-publishing-pass-deactivator.php
 */
function deactivate_publishing_pass()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-publishing-pass-deactivator.php';
	$deactivator = new Publishing_Pass_Deactivator();
	$deactivator->deactivate();
}


/**
 * The code that runs during plugin uninstall.
 * This action is documented in includes/class-publishing-pass-deactivator.php
 */
function uninstall_publishing_pass()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-publishing-pass-uninstall.php';
	$uninstaller = new Publishing_Pass_Uninstall();
	$uninstaller->uninstall();
}

register_activation_hook(__FILE__, 'activate_publishing_pass');
register_deactivation_hook(__FILE__, 'deactivate_publishing_pass');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-publishing-pass.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_publishing_pass()
{

	$plugin = new Publishing_Pass();
	$plugin->run();

}
run_publishing_pass();
