<!-- app/Resources/views/masters/new.html.php -->
<?php $view->extend('layout.html.php') ?>

<script type="text/javascript" src="<?php echo $view['assets']->getUrl('js/views/masters/transfer_master.js') ?>"></script>

<script type="text/javascript">
	$().ready(function () {
		$('#master_product_selected').change(function() {
			$.ajax({
				url: '/product/search/' + this.value,
				dataType: 'json', 
				success: function(result){
					$('#product_id').val(result.id);
					$('#product_code').val(result.code);
					$('#product_name').val(result.name);
					$('#product_description').val(result.description);
					$('#product_price').val(result.price);
		    	}
		    });	
		});

		$('#clear_fields_product').click(function() {
			clear();
		});

		function clear() {
			$('#master_product_selected').val('0');
			$('#product_imei').val('');
			$('#product_id').val('');
			$('#product_code').val('');
			$('#product_name').val('');
			$('#product_description').val('');
			$('#product_price').val('');
		};

		var i = 0;
		function createInputWithId(id, value) {
			console.log("create field with id: " + id + " and value: " + value);
			return value + "<input hidden type='text' id='" + id +"' name='" + id +"' value='" + value + "' />"
		}
		
		// insert product to master
		$('#add_product_to_master').click(function() {
			if ($('#product_id').val() != '' && $('#product_imei').val() != '') {
				// insert value to table
				// add product to table
			    var row = "<tr>  <td>" + createInputWithId('product_imei_' + i ,  $('#product_imei').val()) + "</td> " + 
			    				"<td>" + createInputWithId('product_id_' + i, $('#product_id').val()) + "</td> " +
			    		  	   	"<td>" + createInputWithId('product_code_' + i, $('#product_code').val()) + "</td> " +
			    		  	  	"<td>" + createInputWithId('product_name_' + i, $('#product_name').val()) + "</td> " +
			    		  	  	"<td>" + createInputWithId('product_description_' + i, $('#product_description').val()) + "</td> " +
			    		  	  	"<td>" + createInputWithId('product_price_' + i, $('#product_price').val()) + "</td> " +  
			    		  	   	"<td> <input type='checkbox'/> </td> </tr>";
				i++;
				$("#table_products_master tbody").append(row);
				clear();
			}	
		});
	});
</script>

<h1>Criar Master</h1>

<form method="post">

	<!-- Codigo do Master -->
   	<fieldset>
   		<!-- add the combobox here -->
   		<label>C&oacute;digo do Master</label>
		<input
			type="text" 
			id="master_cod" 
			name="master_cod"
			placeholder="C&oacute;digo do Master"/>
   	</fieldset>
   	   	
   	<!-- Produto pra criar o Master -->
   	<fieldset>
    	<label for="product">Selectione um Produto</label>
    	<select id="master_product_selected" class="form-control">
    		<option value='0'>Selecione um Produto</option>
	    	<?php foreach ($products as $product)  {?>
	    	<option value='<?php echo $product->getId()?>'><?php echo $product->getName() ?></option>
		   	<?php }?>
    	</select>
  	</fieldset>
  	   	
   	<!-- Product IMEI Field -->
   	<fieldset>
   		<label>IMEI</label>
		<input
			type="search" 
			id="product_imei" 
			name="product_imei"
			placeholder="IMEI"/>	    		    		
   	</fieldset>
   	
   	<!-- Product ID Field -->
   	<fieldset>
   		<label>ID</label>
   		<input disabled
			type="text" 
			id="product_id"/>
   	</fieldset>
   	
   	<!-- Product Code Field -->
   	<fieldset>
   		<label>C&oacute;digo</label>
   		<input
   			disabled
			type="text"
			id="product_code"
			name="product_code"/>
   	</fieldset>
   	
   	<!-- Product Name Field -->
   	<fieldset>
   		<label>Nome</label>
   		<input
   			disabled
			type="text" 
			id="product_name"
			name="product_name"/>
   	</fieldset>
   	
   	<!-- Product Description Field -->
   	<fieldset>
   		<label>Descri&ccedil;&atilde;o</label>
   		<input
   			disabled
			type="text" 
			id="product_description"
			name="product_description"/>
   	</fieldset>

   	<!-- Product Price Field -->
   	<fieldset>
   		<label>Pre&ccedil;o</label>
   		<input
   			disabled
			type="text" 
			id="product_price"
			name="product_price"/>
   	</fieldset>   	
   	
   	<!-- Clear field of product -->
   	<input
		type="button" 
		id="clear_fields_product" 
		name="clear_fields_product"
		value="Limpar"/>
   	
   	<!-- Add the product to master -->
   	<input
		type="button"
		id="add_product_to_master" 
		name="add_product_to_master"
		value="Adicionar"/>
		
   	<br>
   	
   	<table id="table_products_master">
   		<thead>
	   		<tr>
	   			<th>IMEI</th>
	   			<th>ID</th>
		   		<th>C&oacute;digo</th>
		   		<th>Nome</th>
		   		<th>Descri&ccedil;&atilde;o</th>
		   		<th>Pre&ccedil;o</th>
		   		<th><input id="check_all_id" type="checkbox"/></th>
	   		</tr>
   		</thead>
   		<tbody></tbody>
   	</table>
	
	<br>
	    	
   	<input
		type="button" 
		id="remove_products_of_master" 
		name="RemoveProductsOfMaster"
		value="Remover"/><p>
		
   	<input 
		type="button" 
		id="cancel_transfer_master" 
		name="CancelTransferMaster"
		value="Cancelar"/>
   	
   	<br><p>
   	
	<input 
		type="submit" 
		id="save" 
		name="Save"
		value="Salvar"/>
		
</form>	
    