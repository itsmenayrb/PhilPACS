
$(document).ready(function(){

  $('.view_attendance').on('click',function(e){
        e.preventDefault();
        var lastName = $(this).data('id');
        $.ajax({
        type: 'post',
        url:'../models/viewattendance.php',
        data:
        {
            lastName:lastName,
            viewattendanceForm: 1
          },
          dataType: 'json',
        success: function(response)
        {
          $('#attendanceview').html(response);
        }
     });
    });
});
