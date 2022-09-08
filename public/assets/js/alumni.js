$(function() {

  $("form[name='alumni']").validate({


    // Specify validation rules
    rules: {
      'major[]': { 
        required: true,
        minlength: 1
      },
      'name': { 
        required: true 
      },
      'gender': { 
        required: true 
      },
      'graduation': { 
        required: true 
      },
      'employer': { 
        required: true 
      },
      'job_title': { 
        required: true 
      },
      'job_description': { 
        required: true 
      },
      'mailing_address': { 
        required: true 
      },
      'email': { 
        required: true 
      },
      'degrees': { 
        required: true 
      },
      'university': { 
        required: true 
      },
      'employment': { 
        required: true 
      },
      'membership': { 
        required: true 
      },
      'conferences': { 
        required: true 
      },
      'activities': { 
        required: true 
      },
      'connected': { 
        required: true 
      },
      'importance_1': { 
        required: true 
      },
      'importance_2': { 
        required: true 
      },
      'importance_3': { 
        required: true 
      },
      'importance_4': { 
        required: true 
      },
      'importance_5': { 
        required: true 
      },
      'importance_6': { 
        required: true 
      },
      'attainment_1': { 
        required: true 
      },
      'attainment_2': { 
        required: true 
      },
      'attainment_3': { 
        required: true 
      },
      'attainment_4': { 
        required: true 
      },
      'attainment_5': { 
        required: true 
      },
      'attainment_6': { 
        required: true 
      },
      'questions_1': { 
        required: true 
      },
      'questions_2': { 
        required: true 
      },
      'questions_3': { 
        required: true 
      },
      'questions_4': { 
        required: true 
      },
      'questions_5': { 
        required: true 
      },
      'questions_6': { 
        required: true 
      },
      'questions_7': { 
        required: true 
      },
      'programs': { 
        required: true 
      },
      'performance': { 
        required: true 
      },
      'training_course': { 
        required: true 
      },
      'experience': { 
        required: true 
      },
      'technical': { 
        required: true 
      },
      'improvements': { 
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

        var form = document.alumni;
        var formData = new FormData(form);
        $("#alumnisave").attr("disabled", true);
        $('#alumnisave').empty();
        $('#alumnisave').append('<span class="spinner-border spinner-border-sm"></span>&nbsp;&nbsp;Processing..');

        $.ajax({
            type: "POST",
            url: APP_URL+'/alumni/save',
            data: formData,
            processData: false,
            contentType: false,
            success: function( data ) {

                if (data.status)  {
                  $('#alumni').trigger("reset");
                  $('#alumnisave').attr("disabled", false); 
                  $('#alumnisave').empty();
                  $('#alumnisave').append('Submit');

                  $('html, body').animate({ scrollTop: 0 }, 'slow');
                  toastr.success('Success!');

                }            
        }});
    }
  });
});