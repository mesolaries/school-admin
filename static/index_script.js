$(document).ready(function(){
  $("#add_student_form").submit(function(e){
    e.preventDefault();
    var form = $(this);
    var url = '/app/controller.php';
    $.ajax({
      type: "POST",
      url: url,
      data: form.serialize(),
      success: function(data) {
        console.log("Student added!");
        $('#addStudentModal .modal-body small').attr('style', 'display: block !important');
      },
      error: function(data) {
        console.log("Error");
        console.log(data);
      }
    });
  });


  $("#add_subject_form").submit(function(e){
    e.preventDefault();
    var form = $(this);
    var url = '/app/controller.php';
    $.ajax({
      type: "POST",
      url: url,
      data: form.serialize(),
      success: function(data) {
        if (data == 'exists') {
          console.log("Subject exists!");
          $('#addSubjectModal .modal-body .error').attr('style', 'display: block !important');
          $('#addSubjectModal .modal-body .success').attr('style', 'display: none !important');
        } else {
          console.log("Subject added!");
          $('#addSubjectModal .modal-body .success').attr('style', 'display: block !important');
          $('#addSubjectModal .modal-body .error').attr('style', 'display: none !important');
        }
      },
      error: function(data) {
        console.log("Error");
        console.log(data);
      }
    });
  });


  $("#edit_student_form").submit(function(e){
    e.preventDefault();
    var form = $(this);
    var url = '/app/controller.php';
    $.ajax({
      type: "POST",
      url: url,
      data: form.serialize(),
      success: function(data) {
        console.log("Student edited!");
        $('#editStudentModal .modal-body small').attr('style', 'display: block !important');
      },
      error: function(data) {
        console.log("Error");
        console.log(data);
      }
    });
  });

  $("#edit_subject_form").submit(function(e){
    e.preventDefault();
    var form = $(this);
    var url = '/app/controller.php';
    $.ajax({
      type: "POST",
      url: url,
      data: form.serialize(),
      success: function(data) {
        if (data == 'exists') {
          console.log("Subject exists!");
          $('#editSubjectModal .modal-body .error').attr('style', 'display: block !important');
          $('#editSubjectModal .modal-body .success').attr('style', 'display: none !important');
        } else {
          console.log("Subject edited!");
          $('#editSubjectModal .modal-body .success').attr('style', 'display: block !important');
          $('#editSubjectModal .modal-body .error').attr('style', 'display: none !important');
        }
      },
      error: function(data) {
        console.log("Error");
        console.log(data);
      }
    });
  });


  $("#delete_student_form").submit(function(e){
    e.preventDefault();
    var form = $(this);
    var url = '/app/controller.php';
    $.ajax({
      type: "POST",
      url: url,
      data: form.serialize(),
      success: function(data) {
        console.log("Student deleted!");
        $('#deleteStudentModal .modal-body small').attr('style', 'display: block !important');
      },
      error: function(data) {
        console.log("Error");
        console.log(data);
      }
    });
  });

  $("#delete_subject_form").submit(function(e){
    e.preventDefault();
    var form = $(this);
    var url = '/app/controller.php';
    $.ajax({
      type: "POST",
      url: url,
      data: form.serialize(),
      success: function(data) {
        console.log("Subject deleted!");
        $('#deleteSubjectModal .modal-body small').attr('style', 'display: block !important');
      },
      error: function(data) {
        console.log("Error");
        console.log(data);
      }
    });
  });




  $('#edit-student-nav').on('click', function(){
    $('#edit_student_form .select-student').load('/inc/student_options.php',function(){
    });
  });

  $('#delete-student-nav').on('click', function(){
    $('#delete_student_form .select-student').load('/inc/student_options.php',function(){
    });
  });

  $('#edit-subject-nav').on('click', function(){
    $('#edit_subject_form .select-subject').load('/inc/subject_options.php',function(){
    });
  });

  $('#delete-subject-nav').on('click', function(){
    $('#delete_subject_form .select-subject').load('/inc/subject_options.php',function(){
    });
  });

  $('#rate-student-nav').on('click', function(){
    $('#rate_student_form .select-student').load('/inc/student_options.php',function(){
    });
    $('#rate_student_form .select-subject').load('/inc/subject_options.php',function(){
    });
  });

  $('#filter_report_btn').on('click', function(){
    $('#filter-report-form .select-student').load('/inc/student_options.php',function(){
    });
    $('#filter-report-form .select-subject').load('/inc/subject_options.php',function(){
    });
  });

  $(".modal").on("hidden.bs.modal", function(){
      $(".modal-body .input").val('');
      $(".modal-body small").attr('style', 'display: none !important');
  });



  $('.from, .to').on('change', function(){
    var to_rate = $('#to-rate').val();
    var from_rate = $('#from-rate').val();
    var to_filter = $('#to-filter').val();
    var from_filter = $('#from-filter').val();
    var to_rate_dt = new Date(to_rate).getTime();
    var from_rate_dt = new Date(from_rate).getTime();
    var to_filter_dt = new Date(to_filter).getTime();
    var from_filter_dt = new Date(from_filter).getTime();
    if ((to_rate_dt - 60000*60*24*60 > from_rate_dt) || from_rate_dt > to_rate_dt) {
      $('#date-valid-rate-st').attr('style', 'display: block !important');
      $('#rate-student-button').prop('disabled', true);
    } else {
      $('#date-valid-rate-st').attr('style', 'display: none !important');
      $('#rate-student-button').prop('disabled', false);
    }
    if ((to_filter_dt - 60000*60*24*60 > from_filter_dt) || from_filter_dt > to_filter_dt) {
      $('#date-valid-filter').attr('style', 'display: block !important');
      $('#submit-rate-filter').prop('disabled', true);
    } else {
      $('#date-valid-filter').attr('style', 'display: none !important');
      $('#submit-rate-filter').prop('disabled', false);
    }
});
});
