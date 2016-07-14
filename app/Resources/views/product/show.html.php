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
<h1>Exibir Produto</h1>
<form>
	<!-- Código do produto -->
	<fieldset class="form-group label-floating">
		<label for="product_code" class="control-label">C&oacute;digo</label>   		
	  	<input 
	  		class="form-control" 
	  		disabled=""  
   			type="text" 
   			id="product_code" 
   			name="product_code"
   			value="<?php echo $product->getCode()?>"/>
   	</fieldset>
	
	<!-- Nome comercial do produto -->
   	<fieldset class="form-group label-floating">
		<label for="product_commercial_name" class="control-label">Nome Comercial</label>
	  	<input 
	  		class="form-control"
	  		disabled=""
   			type="text" 
   			id="product_commercial_name" 
   			name="product_commercial_name" 
   			value="<?php echo $product->getName()?>"/>
   	</fieldset>
   	
   	<!-- Preço unitário do produto  -->
   	<fieldset class="form-group label-floating">
   		<label for="product_unitary_price" class="control-label">Pre&ccedil;o Unit&aacute;rio </label>
   		<input 
   			class="form-control"
	  		disabled=""
   			type="text" 
   			id="product_unitary_price" 
   			name="product_unitary_price" 
   			value="<?php echo $product->getPrice()?>"/>	    		
   	</fieldset>
   	
   	<!-- Descrição do produto  -->
   	<fieldset class="form-group label-floating">
   		<label for="product_description" class="control-label">Descri&ccedil;&atilde;o do Produto </label>
   		<input 
   			class="form-control"
	  		disabled=""
   			type="text" 
   			id="product_description" 
   			name="product_description" 
   			value="<?php echo $product->getDescription()?>" />	    		
   	</fieldset>
   	
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