$().ready(function () {
	$("#find_pallet_by_cod_button").click(function() {	
		var pallet_orig_cod = $("#pallet_orig_cod").val();
		$.ajax({
			url: '/pallet/find/' + pallet_orig_cod,
			dataType: 'json', 
			success: function(result){
				// clear all data of table
				$("#table_masters input:checkbox").prop('checked', false);
				$("#table_masters tbody tr").remove();
				// clear all data of temporary table
				$("#transfer_temp_master tbody tr").remove();

				// add result to table
				result.forEach(function(entry) {
				    var row = "<tr> <td>" + entry.master_cod + "</td> " + 
				    		  	   "<td>" + entry.master_desc + "</td> " + 
				    		  	   "<td> <input type='checkbox'/> </td> </tr>";
					$("#table_masters tbody").append(row);
				});
				
	    	}
	    });
	});
	
	$("#check_all_id").change(function () {
	    $("#table_masters input:checkbox").prop('checked', $(this).prop("checked"));
	});

	$("#transfer_master_add").click(function() {
		value = $('#table_masters tbody tr').filter(':has(:checkbox:checked)');
		$("#transfer_temp_master tbody").append(value);
		$("#transfer_temp_master input:checkbox").prop('checked', false);
		$("#table_masters input:checkbox").prop('checked', false);
	});
});