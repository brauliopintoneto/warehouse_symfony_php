<?php $view->extend('base.html.php') ?>

<h1>Criar Produto</h1>

<form method="post">	
	<!-- Código do produto -->
	<fieldset>   		
		<label>C&oacute;digo</label><br>
	  	<input 
   			type="text" 
   			id="product_code" 
   			name="product_code" 
   			placeholder="C&oacute;digo do Produto"/>
   	</fieldset>
	
	<!-- Nome comercial do produto -->
   	<fieldset>   		
		<label>Nome Comercial</label><br>
	  	<input 
   			type="text" 
   			id="product_commercial_name" 
   			name="product_commercial_name" 
   			placeholder="Nome Comercial do Produto"/>
   	</fieldset>
   	
   	<!-- Preço unitário do produto  -->
   	<fieldset>
   		<label>Pre&ccedil;o Unit&aacute;rio </label><br>
   		<input 
   			type="text" 
   			id="product_unitary_price" 
   			name="product_unitary_price" 
   			placeholder="Pre&ccedil;o Unit&aacute;rio do Produto"/>	    		
   	</fieldset>
   	
   	<!-- Descrição do produto  -->
   	<fieldset>
   		<label>Descri&ccedil;&atilde;o do Produto </label><br>
   		<input 
   			type="text" 
   			id="product_description" 
   			name="product_description" 
   			placeholder="Descri&ccedil;&atilde;o do Produto "/>	    		
   	</fieldset>
   	
   	<input
   		type="button"   
		id="cancel_transfer" 
		name="CancelTransfer"
		value="Cancelar" />
		
	<input 
		type="submit" 
		id="save_transfer" 
		name="SaveTransfer"
		value="Salvar"/>
		
</form>
