$(document).ready(function(){
  $('.view_form').on('click',function(e){
        e.preventDefault();
        var reqID = $(this).data('id');
        $.ajax({
        type: 'post',
        url:'../controllers/Request.inc.php',
        data:
        {
            reqID:reqID,
            displayRequestForm: 1
          },
          dataType: 'json',
        success: function(response)
        {
          $('#displayRequestForm').html(response);
        }
     });
    });
});
