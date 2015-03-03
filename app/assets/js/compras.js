$(function() {
    $(document).on('click', '#f_com_op', function(){ f_com_op(this); });
    $(document).on('click', '.eliminar-compra-btn', function(){ DeleteCompra(this); });
});

function f_com_op() 
{
 $.get( "admin/compras/create", function( data ) 
 {
    $('.panel-title').text('Formulario Compras');
    $(".forms").html(data);
    $(".dt-container").hide();
    $(".form-panel").show();
});
}

$(document).on('submit', 'form[data-remote-mdc]', function(e) {
    $('input[type=submit]', this).attr('disabled', 'disabled');
    var form = $(this);
    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize(),
        success: function (data) {
            if (data.success == true)
            {
                msg.success('Compra Generada..!', 'Listo!');
                $("input[name='compra_id']").val(data.compra_id);
                $.get( "admin/compras/detalle", function( data ) 
                {
                 $('#footer-create-compra').html('');
                 $('#footer-create-compra').hide();
                 $('.compra-body').html(data);
             });
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

$(document).on('keypress', '#compra-search-producto', function(event) 
{
    if ( event.which == 13 ) 
    {
        $.ajax({
            type: 'POST',
            url: 'admin/productos/compra',
            data: {codigo:$(this).val()},
            success: function (data) {
                $('.compra-result-producto').html(data.descripcion);
                $("input[name='producto_id']").val(data.id);
            },
            error: function(errors){
                msg.error('Hubo un error, intentelo de nuevo', 'Advertencia!');
            }
        });
    }

});

$(document).on('keypress', '#compra-save-producto', function(event) 
{
    var cod = '';
    form = $('form[data-remote-mdc-d]');
    compra_id = $("input[name='compra_id']").val();
    producto_id = $("input[name='producto_id']").val();
    formData = form.serialize()+'&compra_id='+compra_id+'&producto_id='+producto_id;

    $("#table-detalle td").each(function() 
    {
        if ($(this).text() === $("input[name='producto_id']").val()) 
        {
            cod = $(this).text();
        }
    });
    if (cod === $("input[name='producto_id']").val())
    {
        msg.error('el Producto y ha sido ingresado en la compra', 'Advertencia!');
    }
    else
    {
        if (event.keyCode == 121) 
        {
            $.ajax({
                type: 'POST',
                url: 'admin/compras/detalle',
                data: formData,
                success: function (data) 
                {
                    if (data.success == true) 
                    {
                        msg.success('Producto Ingresado..!', 'Listo!');
                        $('.compra-detalle').html(data.table);
                        $('#total-compra').html(data.total);
                        $('#total-final').html(data.total);
                    }
                    else
                    {
                        msg.warning(data, 'Advertencia!');
                    }
                },
                error: function(errors)
                {
                    msg.error('Hubo un error, intentelo de nuevo', 'Advertencia!');
                }
            });
        }
    }
});

function DeleteCompra()
{
    $.confirm({
        confirm: function(){
            $.ajax({
                type: 'POST',
                url: 'admin/compras/delete',
                data: { id: $("input[name='compra_id']").val() },
                success: function (data) {

                    if (data == 'success')
                    {
                        f_com_op();
                        msg.success('Compra Eliminada..!', 'Listo!');

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
        }
    });
}
