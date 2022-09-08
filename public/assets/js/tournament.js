$('#start_date,#end_date').datepicker({
      autoclose: true
});

var tournament_table = $('#tournament_table').DataTable({
  processing: true,
  serverSide: true,
  ajax: {
  url: APP_URL+'/tournament',
  type: 'GET',
  },
  columns: [
    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
    { data: 'tournament_name', name: 'tournament_name' },
    { data: 'tournament_logo',  "render": function (data, type, full, meta) {
    return "<img src=\""+APP_URL+"/public/upload/TournamentLogo/" + data + "\" height=\"100\" width=\"120\"/>";}, },
    { data: 'tournament_note', name: 'tournament_note' },
    { data: 'tournament_des', name: 'tournament_des' },
    { data: 'action', name: 'action', orderable: false},
  ],
  order: [[0, 'desc']]
});

$('#SaveTournament').on('click',function(){

	var form = $('#tournamentForm')[0];
	var formData = new FormData(form);

  	$.ajax({

    type: "POST",
    url: APP_URL+'/tournament/save',
    data: formData,
    processData: false,
    contentType: false,
    success: function( data ) {
		
		if (data['status'] == 1) 
		{
    		swal("Success!", data['msg'], "success");
    		tournament_modal();
		}
		else
		{
			swal("Error!", data['msg'], "success");
    		tournament_modal();
		}

    }

  });

});


/* Edit */
function edit_tournament(elem)
{
	$.post(APP_URL+"/tournament/edit", { tournament_id: elem.getAttribute('data-id') }, function(response) {

    	$('#tournament_id').val(response.data.tournament_id);
    	$('#tournament_name').val(response.data.tournament_name);
    	$('#start_date').val(response.data.tournament_s_date);
    	$('#end_date').val(response.data.tournament_e_date);
    	$('#t_description').val(response.data.tournament_des);
    	$('#t_note').val(response.data.tournament_note);
    	$('#no_of_team').val(response.data.tournament_no_of_team);
    	$('.t_title').html('Edit Tournament');
		  $('#modal-tournament').modal('show');

    });
}


/* Delete */
function delete_tournament(elem)
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

    $.post(APP_URL+"/tournament/delete", { tournament_id: elem.getAttribute('data-id') }, function(response) {

    	if (response['status'] == 1) 
		{
    		swal("Deleted!", "Your record has been deleted.", "success");
		}
		else
		{
			swal("Error!", 'Team could not be Deleted.', "error");
		}
    	tournament_table.ajax.reload();

    });	


    } else {

      swal("Cancelled", "Your Record is safe :)", "error");

    }

  });
}

function tournament_modal()
{
	$('#modal-tournament').modal('hide');
    tournament_table.ajax.reload();

}



$('#modal-tournament').on('hidden.bs.modal', function () {

	$('#tournamentForm')[0].reset();
    $('.t_title').html('Add Tournament');


});