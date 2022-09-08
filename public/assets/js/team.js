$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });


var temaTable = $('#example1').DataTable({
  processing: true,
  serverSide: true,
  ajax: {
  url:  APP_URL+'/team',
  type: 'GET',
  },
  columns: [
    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
    { data: 'team_name', name: 'team_name' },
    { data: 'team_logo',  "render": function (data, type, full, meta) {
    return "<img src=\""+APP_URL+"/public/upload/TeamLogo/" + data + "\" height=\"100\" width=\"120\"/>";}, },
    { data: 'team_description', name: 'team_description' },
    { data: 'action', name: 'action', orderable: false},
  ],
  order: [[0, 'desc']]
});

$('#SaveTeam').on('click',function(){

	var form = $('#teamForm')[0];
	var formData = new FormData(form);

    console.log(APP_URL);
  	$.ajax({

    type: "POST",
    url: APP_URL+'/team/save',
    data: formData,
    processData: false,
    contentType: false,
    success: function( data ) {
		
		if (data['status'] == 1) 
		{
    		swal("Success!", data['msg'], "success");
    		team_modal();
		}
		else
		{
			swal("Error!", data['msg'], "success");
    		team_modal();
		}

    }

  });

});

/* Delete Team */

function delete_team(elem)
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

    $.post(APP_URL+"/team/delete", { team_id: elem.getAttribute('data-id') }, function(response) {

    	if (response['status'] == 1) 
		{
    		swal("Deleted!", "Your record has been deleted.", "success");
		}
		else
		{
			swal("Error!", 'Team could not be Deleted.', "success");
		}
    	temaTable.ajax.reload();

    });	


    } else {

      swal("Cancelled", "Your Record is safe :)", "error");

    }

  });

}


/* Edit Team */
function edit_team(elem)
{
	 $.post(APP_URL+"/team/edit", { team_id: elem.getAttribute('data-id') }, function(response) {

    	$('#team_id').val(response.data.team_id);
    	$('#team_name').val(response.data.team_name);
    	$('#description').val(response.data.team_description);
		  $('#modal-default').modal('show');

    });

}

/* Modal Action */
function team_modal()
{
	$('#modal-default').modal('hide');
    temaTable.ajax.reload();

}

$('#modal-default').on('hidden.bs.modal', function () {

	$('#teamForm')[0].reset();

});