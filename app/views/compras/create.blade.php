{{ Form::hidden('compra_id') }}

{{ Form::open(array('data-remote-mdc', 'data-success' => 'Compra Generada', 'method' =>'post', 'role'=>'form', 'class' => 'form-horizontal')) }}

{{ Form::hidden('proveedor_id') }}
{{ Form::hidden('user_id',Auth::user()->id) }}
{{ Form::hidden('tienda_id',Auth::user()->tienda_id) }}

<div class="info-proveedor">
  <table >
    <tr>
      <td>Proveedor:</td>
      <td>
        <input type="text" id="proveedor_id" autocomplete="false"> 
        <i class="fa fa-question-circle btn-link theme-c" id="proveedor_help" style="font-size:15px;"></i>
        <i class="fa fa-pencil btn-link theme-c" id="proveedor_edit" style="font-size:15px;"></i>
        <i class="fa fa-plus-square btn-link theme-c" id="proveedor_create" style="font-size:15px;"></i>
      </td>
      <td></td>
      <td class="proveedor_id"></td>
    </tr>
    <tr>
      <td>Factura No.: </td>
      <td> <input type="text" name="numero_documento" autocomplete="false"> </td>
      <td ></td>
      <td class="numero_documento"> </td>
    </tr>
    <tr>
      <td> Fecha de Doc.:</td>
      <td><input type="text" name="fecha_documento" autocomplete="false"> </td>
      <td ></td>
      <td class="fecha_documento"> </td>
    </tr>
  </table>
</div>
<div class="form-footer" id="footer-create-compra">
    <div class="col-sm-offset-11">
      {{ Form::submit('Ok!', ['class'=>'theme-button']) }}
    </div>
  </div>
{{ Form::close() }}
<div class="compra-body">

</div>



<script>

  $(function() {

    $("#proveedor_id").autocomplete({
      source: function (request, response) {
        $.ajax({
          url: "user/buscar_proveedor",
          dataType: "json",
          data: request,
          success: function (data) {
            response(data);
          },
          error: function () {
            response([]);
          }
        });
      },
      minLength: 3,
      select:function( data, ui ){
        $("input[name='proveedor_id']").val(ui.item.id);
        $(".proveedor_id").html('<strong>Direccion:  '+ui.item.descripcion+'</strong>');
        $(".numero_documento").html('<strong>Contacto:   '+ui.item.value+'</strong>');

      },
      autoFocus: true,
      open: function(event, ui) {
        $(".ui-autocomplete").css("z-index", 100000);
      }
    });
  });
</script>