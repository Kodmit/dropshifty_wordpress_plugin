<?php
/**
 *  Views Class
 */

class DropshiftyViews
{

	public function menu_dashboard()
	{
	    echo '<h1>'.get_admin_page_title().'</h1>';
	    echo '<p>Bienvenue sur la page d\'accueil du plugin</p>';
	}

	public function menu_importer()
	{
	    include("views/importer.php");

	    if(isset($_POST['dropshifty_product'])){

	    	$wc = new DsWoocommerce;
	    	//$wc->create_product();

	    }
	}

	public function menu_configuration()
	{
		if(isset($_GET['logout'])){
			update_option("dropshifty_username", "");
			update_option("dropshifty_password", "");
			header("Location: " . get_site_url() . "/wp-admin/admin.php?page=dropshifty_configuration");
		}
	    include("views/configuration.php");
	}

	public function menu_website()
	{
	    echo '<h1>'.get_admin_page_title().'</h1>';
	    echo '<p>Bienvenue sur la page d\'accueil du plugin</p>';
	}

	public function menu_help()
	{
	    echo '<h1>'.get_admin_page_title().'</h1>';
	    echo '<p>Bienvenue sur la page d\'accueil du plugin</p>';
	}
		
}