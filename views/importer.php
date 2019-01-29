<div class="ds_loader" id="ds_loader">
	<img src="<?= plugin_dir_url(__FILE__) ?>../loader.svg">
</div>

<div class="container">

<div style="display: none;" id="modal_products">
	<h1><span id="ds_nb_founds">0</span> version(s) trouvé(s)</h1>

	<div class="list">

	</div>

</div>

<img src="<?= plugin_dir_url(__FILE__) ?>../logo.png" width="250px">

<div style="height: 80px"></div>

<h1>Importateur de produits</h1>

<div id="ds_errorbox" style="display: none">
	Identifiants incorrects
</div>

<div style="height: 20px"></div>


<form method="POST">
	<div style="margin: 10px">
		<label class="ds_label">URL de votre produit</label>
		<input class="ds_field" type="text" id="dropshifty_sku" name="dropshifty_product" placeholder="Entrez l'url du produit ici..." />
	</div>
	<button onclick="ds_product_submit(event)" id="ds_product_submit_btn" class="ds_button_submit">Importer</button>
</form>

<script type="text/javascript">
	loader("hide");
</script>