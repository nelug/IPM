$(function() {
    $(document).on("click", "#Inv_dt_open", function(){ Inv_dt_open(this); });
    $(document).on("click", "#logs_productos", function(){ logs_productos(this); });
});


function Inv_dt_open() {

    $.get( "admin/inventario_dt", function( data ) {
        makeTable(data, 'admin/productos/', 'Producto');
    });
};


function logs_productos() {
    
    $.get( "owner/logs/productos", function( data ) {
        $('.table').html(data);
    });
};