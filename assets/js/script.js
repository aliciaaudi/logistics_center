$('#refresh').click(function(){
	window.location.reload(1);
})

$(function() {
	$('#table').bootstrapTable()
})

function cerrarModalOrder(){
	$('#orderModal').modal('hide');
}

function cerrarModalState(){
	$('#stateModal').modal('hide');
}

function mostrarInfo(id){
	$.ajax( {
		dataType: "json", 
		type: 'POST',
		url: 'orders/info/'+id,
		data: {
			id: id
		},
		success: function(result){
			$('#id_order').html(result[0].id_order);
			$('#date_add').html(result[0].date_add);
			$('#clientname').html(result[0].firstname + ' ' + result[0].lastname);
			$('#address').html(result[0].address1 + ', ' + result[0].address2);
			$('#country').html(result[0].country);
			$('#products').html(result[0].products);
			$('#state').html(result[0].name);
			
			$('#orderModal').modal('show');
		}
		
	})
	
}

function mostrarEstado(id){
	
	$.ajax( {
		dataType: "json", 
		type: 'POST',
		url: 'orders/info/'+id,
		data: {
			id: id
		},
		success: function(result){
			$('#state2').html(result[0].name);
			$('.ident2').val(result[0].id_order);
			$('#id_order2').html(result[0].id_order);
			
			$('#stateModal').modal('show');
		}
		
	})
	
}

function changeState(){
	id = $('.ident2').val();
	state = $('#estado1').val();

	$.ajax( {
		dataType: "json", 
		type: 'POST',
		url: 'orders/edit/'+id+'/'+state,
		data: {
			state: state
	},
		success: function(result){			
			$('#stateModal').modal('hide');
			$('#confirmationModal').modal('show');
				
			setTimeout(function(){
	 			window.location.reload(1);
			}, 3000);
				
				
		}
			
	})	

}

