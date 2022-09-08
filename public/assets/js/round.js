$('#round_table').DataTable();

$('#SaveRound').on('click',function(){

	var form = $('#roundForm')[0];
	var formData = new FormData(form);

  	$.ajax({

    type: "POST",
    url: APP_URL+'/round/save',
    data: formData,
    processData: false,
    contentType: false,
    success: function( data ) {
		
		if (data['status'] == 1) 
		{
    		swal("Success!", data['msg'], "success");
			$('#modal-round').modal('hide');
    		setTimeout(function()
    		{ 
    			location.reload();

    		}, 3000);

		}
		else
		{
			swal("Error!", data['msg'], "success");
		}

    }

  });

});


/* Edit Round */
function edit_round(elem)
{
	$.post(APP_URL+"/round/edit", { round_id: elem.getAttribute('data-id') }, function(response) {

    	$('#round_id').val(response.data.round_id);
    	$('#round_name').val(response.data.round_name);
    	$('.r_title').html('Add Round');
		$('#modal-round').modal('show');

    });
}

/* Delete Round */
function delete_round(elem)
{
  
  swal({
  title: "Are you sure?",
  text: "Delete this record.",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes!",
  cancelButtonText: "No!",
  closeOnConfirm: false,
  closeOnCancel: false
  },

  function(isConfirm){
    if (isConfirm) {

    $.post(APP_URL+"/round/delete", { round_id: elem.getAttribute('data-id') }, function(response) {

    	if (response['status'] == 1) 
		{
    		swal("Deleted!", "Your record has been deleted.", "success");
    		setTimeout(function()
    		{ 
    			location.reload();

    		}, 3000);

		}
		else
		{
			swal("Error!", 'Round could not be Deleted.', "error");
		}

    });	


    } else {

      swal("Cancelled", "Your Record is safe :)", "error");

    }

  });

}