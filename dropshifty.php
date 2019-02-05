<?php
/*
Plugin Name: Dropshifty
Plugin URI: https://dropshifty.com/
Description: Dropshifty WooCommerce plugin for dropshipping
Author: Dropshifty Corporation
Version: 1.0
Author URI: http://dropshifty.com/
*/
include_once plugin_dir_path( __FILE__ ).'/class/DsWoocommerce.php';
include_once plugin_dir_path( __FILE__ ).'/views.php';

class Dropshifty{


	public function __construct(){
		add_action('admin_menu', [$this, 'add_admin_menu']);
		add_action('admin_init', [$this, 'register_settings']);

		if(isset($_GET['page'])){
			if (substr_count($_GET['page'], 'dropshifty') > 0) {
			    wp_register_script('sweetalert2', 'https://cdn.jsdelivr.net/npm/sweetalert2@8', null, null, true );
				wp_enqueue_script('sweetalert2');

				wp_enqueue_script('dropshifty_script', plugin_dir_url(__FILE__) . 'script.js', ["sweetalert2"]);	

				wp_enqueue_style('dropshifty_style', plugin_dir_url(__FILE__) . 'style.css');
			}
		}

		$this->check_authent();
	}


	public function register_settings()
	{
	    register_setting('dropshifty_settings', 'dropshifty_username');
	    register_setting('dropshifty_settings', 'dropshifty_password');
	}

	public function add_admin_menu()
	{
		$views = new DropshiftyViews();

	    add_menu_page('Dashboard - Dropshifty', 'Dropshifty', 'manage_options', 'dropshifty', [$views, 'menu_dashboard']);
	    add_submenu_page('dropshifty', 'Importateur - Dropshifty', 'Importateur', 'manage_options', 'dropshifty_importer', [$views, 'menu_importer']);
	    add_submenu_page('dropshifty', 'Configuration - Dropshifty', 'Configuration', 'manage_options', 'dropshifty_configuration', [$views, 'menu_configuration']);
	    add_submenu_page('dropshifty', 'Accès - Dropshifty', 'Accéder au site', 'manage_options', 'dropshifty_website', [$views, 'menu_website']);
	    add_submenu_page('dropshifty', 'Accès - Dropshifty', 'Aide', 'manage_options', 'dropshifty_help', [$views, 'menu_help']);
	}

	private function check_authent(){

		$script_params = array(
		    'ds_username' => get_option('dropshifty_username'),
		    'ds_password' => get_option('dropshifty_password'),
		    'ds_plugin_path' => plugin_dir_url(__FILE__),
		    'ds_plugin_url' => get_site_url()
		);

		wp_localize_script( 'dropshifty_script', 'scriptParams', $script_params );
	}


}

new Dropshifty();
new DropshiftyViews();