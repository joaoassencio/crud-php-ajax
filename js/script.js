$(document).on('submit', '#saveStudent', function(e)
{
    e.preventDefault();

    var formData = new FormData(this);
    formData.append("save_student", true)
            
    $.ajax({
        type: 'POST',
        url: 'code.php',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response)
        {
            console.log(response);
            var res = jQuery.parseJSON(response);
            if (res.status == 422)
            {
                $('#errorMessage').removeClass('d-none');
                $('#errorMessage').text(res.message);
            }
            else if (res.status == 200)
            {
                $('#errorMessage').addClass('d-none');
                $('#studentAddModal').modal('hide');
                $('#saveStudent')[0].reset();
            }
        }
    });    
});