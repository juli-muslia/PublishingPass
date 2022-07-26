<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://julianmuslia.com
 * @since      1.0.0
 *
 * @package    Publishing_Pass
 * @subpackage Publishing_Pass/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Publishing_Pass
 * @subpackage Publishing_Pass/admin
 * @author     Julian Muslia <#>
 */
class Publishing_Pass_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Publishing_Pass_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Publishing_Pass_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$valid_pages = array("publishing-pass");

		$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : "";

		if (in_array($page, $valid_pages)) {
			wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/publishing-pass-admin.css', array(), $this->version, 'all');
			wp_enqueue_style('roboto-font', 'https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap');
			wp_enqueue_style('Bootstrap min cdn', 'https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css');
			wp_enqueue_style('Datatables min cdn', 'https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css');
		}
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Publishing_Pass_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Publishing_Pass_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$valid_pages = array("publishing-pass");

		$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : "";

		if (in_array($page, $valid_pages)) {
			wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/publishing-pass-admin.js', array('jquery'), $this->version, false);
			wp_enqueue_script('Jquery cdn', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js');
			//wp_enqueue_script('Jquery GoogleCdn', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js');
			wp_enqueue_script('Popper ', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js');
			wp_enqueue_script('Bootstrap js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js');
			wp_enqueue_script('Datatables js', 'https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js');
			wp_enqueue_script('Datatables bootstrap js', 'https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js');
		}
	}

	/**
	 * Add custom menu
	 *
	 * @since    1.0.0
	 */
	function PublishingMenu()
	{


		add_menu_page('Publishing Pass', 'Publishing Pass', 'manage_options', 'publishing-pass', array($this, 'PublishingAdminDashboard'), plugin_dir_url(__FILE__) . 'img/pg-logo.png', 2);

	}



	public function PublishingAdminDashboard()
	{
		//return views 
		require_once 'partials/publishing-pass-admin-display.php';
		echo crudPublishingPass();
	}


}
