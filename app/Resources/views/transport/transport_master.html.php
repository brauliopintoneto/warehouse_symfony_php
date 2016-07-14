<!-- app/Resources/views/pallets/transfer_master.html.php --> 
<?php $view->extend('layout.html.php') ?>

<script type="text/javascript" src="<?php echo $view['assets']->getUrl('js/views/masters/transfer_master.js') ?>"></script>

<h1>Transferir Master</h1>
<form>
   	<fieldset>
   		<!-- add the combobox here -->
   		<label>
   			C&oacute;digo do Pallet<br>
			<input
				type="search" 
				id="pallet_orig_cod" 
				name="pallet_orig_cod"
				placeholder="C&oacute;digo do Pallet"/>
		</label>    		    		
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
    