<!-- src/Resources/views/pallets/transport_pallet.html.php -->
<?php $view->extend('layout.html.php') ?>

<h1>Transportar Pallet</h1>

<form>
	<!-- List of source warehouse  -->
   	<fieldset>
   		<!-- Lista de Warehouses -->
		<label>Warehouse de Origem</label><br>
	  	<select id="warehouse_source_id" 
	  			name="Warehouse Origem"
	  			placeholder="Warehouse Origem" >	  	
  		<?php forEach($list_warehouses as $warehouse) { ?>   
		    <option value="<?php echo $warehouse['id'] ?>">
		    	<?php echo $warehouse['value'] ?>
	    	</option>
    	<?php } ?>    	
		</select>   		    		
   	</fieldset>
   	
   	<fieldset>
   		<label>Localizar Pallet de Origem </label><br>
   		<input 
   			type="search" 
   			id="pallet_cod" 
   			name="pallet_cod" 
   			placeholder="C&oacute;digo"/>
   		    		
   	</fieldset>
   	<br>
   	<!-- Table with all pallets in warehouse -->
   	<table >
   		<tr>
	   		<th>Id Pallet</th>
	   		<th>Pallet Name</th>
	   		<th><input type="checkbox"/></th>
   		</tr>
   		<?php for($i = 0; $i < 10; $i++) { ?>
   		<tr>
   			<td><?php echo "id $i"?></td>
   			<td><?php echo "Pallet $i"?></td>
   			<td><input type="checkbox"/></td>
   		</tr>
   		<?php } ?>
   	</table>
	<br>
   	<input 
		type="button" 
		id="add_pallets" 
		name="AddPallet"
		value="Adicionar Pallets"/>
	<br>
	<fieldset>
	
   		<label>Warehouse de Destino</label><br>
   		<select id="warehouse_dest_id" 
	  			name="Warehouse Destiny"
	  			placeholder="Warehouse Destino" >	  	
  		<?php forEach($list_warehouses as $warehouse) { ?>   
		    <option value="<?php echo $warehouse['id'] ?>">
		    	<?php echo $warehouse['value'] ?>
	    	</option>
    	<?php } ?>    	
		</select>
				
   	</fieldset>   	
   	<br>
   	<table 
   		id="table_warehouse_destiny" 
   		name="Warehouse Destiny List" 
   		placeholder="Warehouse Destiny List">
   		<tr>
	   		<th>Id Pallet</th>
	   		<th>Pallet Name</th>
	   		<th>Excluir</th>
   		</tr>
   	</table>
	<br>
   	<!-- Exibir transportadoras em combo -->  	
   	<fieldset>
   		<!-- Lista de Transportadoras -->
		<label>Transportadora</label><br>
	  	<select id="transportation" 
	  			name="transportation"
	  			placeholder="Transportadora" >	  	
  		<?php forEach($list_transporter as $transporter) { ?>   
		    <option value="<?php echo $transporter['id'] ?>">
		    	<?php echo $transporter['value'] ?>
	    	</option>
    	<?php } ?>    	
		</select>				   		    		
   	</fieldset>
   	<!-- TODO: Exibir data em calendario -->   	
   	<br>
   	<fieldset>			
   		<label>Data</label><br>
		<input 
			type="date" 
			id="date" 
			name="date" 
			placeholder="Data"/>			
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
		value="Salvar Transfer&eacute;ncias"/>
		
</form>