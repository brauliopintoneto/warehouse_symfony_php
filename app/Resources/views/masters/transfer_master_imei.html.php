<!-- app/Resources/views/pallets/transfer_master.html.php --> 
<?php $view->extend('layout.html.php') ?>

<script type="text/javascript" src="<?php echo $view['assets']->getUrl('js/views/masters/transfer_master.js') ?>"></script>

<script type="text/javascript">
$().ready(function () {
	$('#warehouse_source_selected').change(function() {
		// request the all imei of warehouse
		$.ajax({
			url: '/transport/' + this.value + '/imei',
			success: function(result){
				alert(result);
	    	}
	    });	
	
	});
});

</script>

<h1>Transferir Master</h1>
<form>
	<fieldset>
		<label for="warehouse_source_selected">Warehouse</label>
		<select id="warehouse_source_selected" name="warehouse_source_selected" class="form-control">
    		<option value='0'>Selecione uma Warehouse</option>
	    	<?php foreach ($warehouses as $warehouse)  {?>
	    	<option value='<?php echo $warehouse->getId()?>'><?php echo $warehouse->getLabel() ?></option>
		   	<?php }?>
    	</select>
	</fieldset>
   	<!-- Master Origem -->
   	<fieldset>
    	<label for="master">Selectione um Master</label>
    	<select id="master_product_selected" name="master_selected" class="form-control">
    		<option value='0'>Selecione um Master</option>
	    	<?php foreach ($masters as $master)  {?>
	    	<option value='<?php echo $master->getId()?>'><?php echo $master->getMasterCode() ?></option>
		   	<?php }?>
    	</select>
  	</fieldset>
   	
   	<input
		type="button" 
		id="find_pallet_by_cod_button" 
		name="FindPalletByCode"
		value="Localizar Pallet"/>
   	<br>
   	
   	<table 
   		id="table_masters">
   		<thead>
	   		<tr>
		   		<th>Masters</th>
		   		<th>Descri&ccedil;&atilde;o</th>
		   		<th><input id="check_all_id" type="checkbox"/></th>
	   		</tr>
   		</thead>
   		<tbody></tbody>
   	</table>
	
	<br>
	    	
   	<input
		type="button" 
		id="transfer_master_add" 
		name="TransferMasterAdd"
		value="Transferir"/><p>

   	<table id="transfer_temp_master">
   		<thead>
	   		<tr>
		   		<th>Masters</th>
		   		<th>Descri&ccedil;&atilde;o</th>
		   		<th><input type="checkbox"/></th>
	   		</tr>
   		</thead>
   		<tbody></tbody>
   	</table>
   	
   	<br>
   	
   	<input 
		type="button" 
		id="cancel_transfer_master" 
		name="CancelTransferMaster"
		value="Remover"/>
   	
   	<br><p>
   	
   	<input 
		type="submit" 
		id="cancel_transfer" 
		name="CancelTransfer"
		value="Cancelar"/>
   		
	<input 
		type="submit" 
		id="save_transfer" 
		name="SaveTransfer"
		value="Salvar"/>
		
</form>	
    