$(function() {

  $("form[name='employer_survey']").validate({


    // Specify validation rules
    rules: {
     'name': { 
        required: true 
      },
      'company_organization': { 
        required: true 
      },
      'department_division': { 
        required: true 
      },
      'position': { 
        required: true 
      },
      'years_in_position': { 
        required: true 
      },
      'email': { 
        required: true,
        email:true
      },
      'tel': { 
        required: true 
      },
      'organization': { 
        required: true 
      },
      'staff[]': { 
        required: true 
      },
      'major[]': { 
        required: true 
      },
      'evaluated[]': { 
        required: true 
      },
      'important_1': { 
        required: true 
      },
      'important_2': { 
        required: true 
      },
      'important_3': { 
        required: true 
      },
      'important_4': { 
        required: true 
      },
      'important_5': { 
        required: true 
      },
      'important_6': { 
        required: true 
      },
      'important_7': { 
        required: true 
      },
      'important_8': { 
        required: true 
      },
      'important_9': { 
        required: true 
      },
      'important_10': { 
        required: true 
      },
      'important_11': { 
        required: true 
      },
      'important_12': { 
        required: true 
      },
      'important_13': { 
        required: true 
      },
      'important_14': { 
        required: true 
      },
      'important_15': { 
        required: true 
      },
      'prepared_1': { 
        required: true 
      },
      'prepared_2': { 
        required: true 
      },
      'prepared_3': { 
        required: true 
      },
      'prepared_4': { 
        required: true 
      },
      'prepared_5': { 
        required: true 
      },
      'prepared_6': { 
        required: true 
      },
      'prepared_7': { 
        required: true 
      },
      'prepared_8': { 
        required: true 
      },
      'prepared_9': { 
        required: true 
      },
      'prepared_10': { 
        required: true 
      },
      'prepared_11': { 
        required: true 
      },
      'prepared_12': { 
        required: true 
      },
      'prepared_13': { 
        required: true 
      },
      'prepared_14': { 
        required: true 
      },
      'prepared_15': { 
        required: true 
      },
      'significant_1': { 
        required: true 
      },
      'significant_2': { 
        required: true 
      },
      'significant_3': { 
        required: true 
      },
      'significant_4': { 
        required: true 
      },
      'significant_5': { 
        required: true 
      },
      'significant_6': { 
        required: true 
      },
      'objectives_important_1': { 
        required: true 
      },
      'objectives_important_2': { 
        required: true 
      },
      'objectives_important_3': { 
        required: true 
      },
      'objectives_important_4': { 
        required: true 
      },
      'objectives_important_5': { 
        required: true 
      },
      'objectives_important_6': { 
        required: true 
      },
      'abilities_knowledge': { 
        required: true 
      },
      'compare': { 
        required: true 
      },
      'necessary': { 
        required: true 
      },
      'hiring': { 
        required: true 
      },
      'particular_strengths': { 
        required: true 
      },
      'preparation': { 
        required: true 
      },
      'summary_report': { 
        required: true 
      },
      'participating': { 
        required: true 
      },
    },

    // Specify validation error messages

    messages: {

    },
    errorPlacement: function(label, element) {
      label.addClass('errorMsq');
      element.parent().append(label);
    },

    

    submitHandler: function() {

        var form = document.employer_survey;
        var formData = new FormData(form);
        $("#employer_survey_save").attr("disabled", true);
        $('#employer_survey_save').empty();
        $('#employer_survey_save').append('<span class="spinner-border spinner-border-sm"></span>&nbsp;&nbsp;Processing..');

        $.ajax({
            type: "POST",
            url: APP_URL+'/employer/survey/save',
            data: formData,
            processData: false,
            contentType: false,
            success: function( data ) {

                  $('#employer_survey_save').attr("disabled", false); 
                  $('#employer_survey_save').empty();
                  $('#employer_survey_save').append('Submit');
                if (data.status)  {
                  $('#employer_survey').trigger("reset");
                  $('#employer_survey').hide();
                  $('.thank-you-text').show();
                  $('html, body').animate({ scrollTop: 0 }, 'slow');
                  toastr.success('Success!');

                }            
        }});
    }
  });
});


$('.organization').on('change',function(){

  if ($(this).val() == 'Other') {
    $('#organization_others').show();
  } else {
    $('#organization_others').hide();
  }

});


$('.staff').on('change',function(){

  if($(".staff").prop('checked') == true){
    $('#staff_others').show();
  } else {
    $('#staff_others').hide();
  }

})



$('.necessary').on('change',function(){

  if($(this).val() == 1){
    $('#specify').show();
  } else {
    $('#specify').hide();
  }

})




$('#employer_filter').on('click',function(){

  var form = document.employer_filter;
  var formData = new FormData(form);
  $('#appendData').html('');
  $('.show-load').show();

  $.ajax({
            type: "POST",
            url: APP_URL+'/admin/employer/get/report',
            data: formData,
            processData: false,
            contentType: false,
            success: function( data ) {

                $('.show-load').hide();
                $('#appendData').html('');
                if (data) 
                {
                  $('#appendData').append(data);

                } else {
                  $('#appendData').append('<h2 class="text-center">Data not found!</h2>');
                }
                         
            }
      });

});