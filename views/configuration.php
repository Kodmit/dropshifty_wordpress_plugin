<div class="ds_loader" id="ds_loader">
	<img src="<?= plugin_dir_url(__FILE__) ?>../loader.svg">
</div>

<div class="container">

	<img src="<?= plugin_dir_url(__FILE__) ?>../logo.png">

<h1>Configuration</h1>

<div id="ds_errorbox" style="display: none">
	Identifiants incorrects
</div>

<div id="ds_successbox" style="display: none">
	<p>Vous êtes connecté à DropShifty !</p>
	<a href="#" onclick="show_login_form()" id="ds_custom_id">Modifier mes identifiants</a>
	<br>
	<a href="#" onclick="logout()">Déconnexion</a>
</div>


<form method="POST" action="options.php" id="ds_config_form">
	<?php settings_fields('dropshifty_settings') ?>
	<div style="margin: 10px">
		<label class="ds_label">Nom d'utilisateur</label>
		<input class="ds_field" type="text" id="dropshifty_username" name="dropshifty_username" value="<?php echo get_option('dropshifty_username')?>"/>
	</div>
	<br>
	<div style="margin: 10px">
		<label class="ds_label">Mot de passe</label>
		<input class="ds_field" type="password" id="dropshifty_password" name="dropshifty_password" value="<?php echo get_option('dropshifty_password')?>"/>
	</div>
	<button class="ds_button_submit" onclick="ds_config_submit(event)">Sauvegarder les modifications</button>
</form>

<p>Vous n'avez pas encore de compte ? <a href="">Inscrivez-vous</a> et découvrez nos offres !</p>

</div>	