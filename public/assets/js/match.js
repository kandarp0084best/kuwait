$('#SaveMatch').on('click',function(){

	var form = $('#matchForm')[0];
	var formData = new FormData(form);

  	$.ajax({

    type: "POST",
    url: APP_URL+'/match/save',
    data: formData,
    processData: false,
    contentType: false,
    success: function( data ) {
		
		if (data['status'] == 1) 
		{
    		swal("Success!", data['msg'], "success");
			$('#modal-match').modal('hide');
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


function edit_match(elem)
{
	 $.post(APP_URL+"/match/edit", { match_id: elem.getAttribute('data-id') }, function(response) {

    	$('#team_1_id').val(response.data.team_1_id).change();
    	$('#team_2_id').val(response.data.team_2_id).change();
    	$('#date').val(response.data.date).change();
    	$('#time').val(response.data.time).change();
    	$('#match_id').val(response.data.match_id);
		
    	$('.match_title').html('Edit Match');
		$('#modal-match').modal('show');


    });

}


/* Delete Match */
function delete_match(elem)
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

    $.post(APP_URL+"/match/delete", { match_id: elem.getAttribute('data-id') }, function(response) {

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
			swal("Error!", 'Match could not be Deleted.', "error");
		}

    });	


    } else {

      swal("Cancelled", "Your Record is safe :)", "error");

    }

  });

}


$('#modal-match').on('hidden.bs.modal', function () {

	$('#matchForm')[0].reset();
    $('.match_title').html('Add Match');


});


/* ================ Score Js ==================== */

$(document).ready(function(){
  var match_id = $('#match_id').val();
  ScoreUpdate(match_id);
});

function ScoreUpdate(match_id)
{
  $.ajax({
    type: "POST",
    url: APP_URL+'/match/score',
    data: {match_id:match_id},
    success: function( response ) {
      
      $.each( response.data, function( key, value ) 
      {
        $('#score_input_'+value['team_id']).val(value['team_score']);
      });

    }

  });
}


function scoreEdit(elem)
{
  var team_id = elem.getAttribute('data-id');
  var match_id = elem.getAttribute('match-id');
  var action = elem.getAttribute('data-action');
  var score = elem.getAttribute('data-score');

  $.ajax({
    type: "POST",
    url: APP_URL+'/match/score/update',
    data: {team_id:team_id,match_id:match_id,action:action,score:score},
    success: function( response ) {
      
    ScoreUpdate(match_id);
     
    }

  });

}