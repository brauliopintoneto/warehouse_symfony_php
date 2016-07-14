<?php $view->extend('base.html.php') ?>
<script type="text/javascript">
	$().ready(function () {
		$("#back_button").click(function() {
			location.href = 'http://google.it';
		});	
		$("#new_product_button").click(function () {
			location.href = 'new';
		});
	});
</script>
<h1>Exibir Master</h1>
<form>
	<!-- Código do produto -->
	
	<?php print_r($master)?>
	<?php print_r($imeis)?>
   	
	<input
   		type="button"
		id="back_button" 
		name="back_button"
		value="Voltar" />
		
	<input 
		type="button" 
		id="new_product_button" 
		name="new_product_button"
		value="Novo"/>
		
</form>