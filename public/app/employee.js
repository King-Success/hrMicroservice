$( document ).ready(function() {
    
	$.ajaxSetup({
		headers:{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
		}
	});
	
	$('#updateDepartment').on('click',function(){
	   // $('#loader').dimmer('show');
	   var request;
	    $.ajax({
            url: "/bank/create", 
            method: 'POST',
            data: request,
            dataType: 'json',
            contentType: 'application/json',
        }).done(function( data ) {
            // $('#loader').dimmer('hide');
            if(data.status){
                alert("Saved");
            }else{
                alert('An error occured');
            }
        });
	});
	
	$('#updateRank').on('click',function(){
	   // $('#loader').dimmer('show');
	   var request;
	    $.ajax({
            url: "/bank/create", 
            method: 'POST',
            data: request,
            dataType: 'json',
            contentType: 'application/json',
        }).done(function( data ) {
            // $('#loader').dimmer('hide');
            if(data.status){
                alert("Saved");
            }else{
                alert('An error occured');
            }
        });
	});
	
	$('#updatePayGrade').on('click',function(){
	   // $('#loader').dimmer('show');
	   var request;
	    $.ajax({
            url: "/bank/create", 
            method: 'POST',
            data: request,
            dataType: 'json',
            contentType: 'application/json',
        }).done(function( data ) {
            // $('#loader').dimmer('hide');
            if(data.status){
                alert("Saved");
            }else{
                alert('An error occured');
            }
        });
	});
	
	
	$('#updateBank').on('click',function(){
	   // $('#loader').dimmer('show');
	   var request;
	    $.ajax({
            url: "/bank/create", 
            method: 'POST',
            data: request,
            dataType: 'json',
            contentType: 'application/json',
        }).done(function( data ) {
            // $('#loader').dimmer('hide');
            if(data.status){
                alert("Saved");
            }else{
                alert('An error occured');
            }
        });
	});
	
	$('#updatePension').on('click',function(){
	   // $('#loader').dimmer('show');
	   var request;
	    $.ajax({
            url: "/bank/create", 
            method: 'POST',
            data: request,
            dataType: 'json',
            contentType: 'application/json',
        }).done(function( data ) {
            // $('#loader').dimmer('hide');
            if(data.status){
                alert("Saved");
            }else{
                alert('An error occured');
            }
        });
	});
	
	$('#updateAllowances').on('click',function(){
	   // $('#loader').dimmer('show');
	   var request;
	    $.ajax({
            url: "/bank/create", 
            method: 'POST',
            data: request,
            dataType: 'json',
            contentType: 'application/json',
        }).done(function( data ) {
            // $('#loader').dimmer('hide');
            if(data.status){
                alert("Saved");
            }else{
                alert('An error occured');
            }
        });
	});
	
    	
	
});