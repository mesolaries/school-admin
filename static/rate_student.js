jQuery( function($) {
    $('.hover').dblclick( function() {
        $(this).find('.text').hide();
        $(this).find('input').show().focus();
    });

    $('.table input').blur( function(e) {
      e.preventDefault();
      var rating_element = $(this);
      var rate = rating_element.val();

      var date = $(this).siblings('input.date').val();
      var student = $(this).siblings('input.st_id').val();
      var subject = $(this).siblings('input.sb_id').val();
      var rating_student = true;
      $.ajax({
        type: "POST",
        url: "/app/controller.php",
        data: {
          "rating_student": rating_student,
          "rate": rate,
          "date": date,
          "student_id": student,
          "subject_id": subject
        },
        success: function(data) {
          if (data) {
            console.log(data);
            $('.alert').removeClass('invisible');
            var last_rating = rating_element.parent().find('.text').text();
            rating_element.val(last_rating);
          } else {
            rating_element.parent().find('.text').text(rate);
            $('.alert').addClass('invisible');
          }
        },
        error: function(data) {
          console.log("Error");
          console.log(data);
        }
      });

        $(this).hide();
        $(this).siblings('.text').show();
    });


    $('.hover').tooltip({trigger: 'hover'});
});
