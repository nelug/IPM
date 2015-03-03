$(document).on('submit', 'form[data-remote]', function(e) {

    $('input[type=submit]', this).attr('disabled', 'disabled');

    var form = $(this);

    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize(),
        success: function (data) {

            if (data == 'success')
            {
                msg.success(form.data('success'), 'Listo!');
                $('.bs-modal').modal('hide');
            }
            else
            {
                msg.warning(data, 'Advertencia!');
            }
        },
        error: function(errors){
            msg.error('Hubo un error, intentelo de nuevo', 'Advertencia!');
        }
    });

    $('input[type=submit]', this).removeAttr('disabled');

    e.preventDefault();

});
