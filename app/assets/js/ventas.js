$(function() {
    $(document).on('click', '.f_ven_op', function(){ f_ven_op(this); });
});


function f_ven_op() {

    $.get( "user/ventas/create", function( data ) {
        $('.panel-title').text('Formulario Ventas');
        $(".forms").html(data);
        $(".dt-container").hide();
        $(".form-panel").show();
    });
}