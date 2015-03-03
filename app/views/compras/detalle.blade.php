{{ Form::open(array('data-remote-mdc-d', 'data-success' => 'Compra Generada', 'method' =>'post', 'role'=>'form', 'class' => 'form-horizontal')) }}
{{ Form::hidden('producto_id') }}
<table>
  <tr>
    <td>
      <i class="fa fa-pencil btn-link theme-c"></i>
      <i class="fa fa-plus-square btn-link theme-c"></i>
      <i class="fa fa-print btn-link theme-c"></i>
    </td>
    <td>Cantidad:</td>
    <td>Costo Unitario:</td>
    <td rowspan="2">
      <button type="button" class="btn btn-default btn-lg">
        <span class="glyphicon glyphicon-barcode" aria-hidden="true"></span>
      </button>
    </td>
  </tr>
  <tr>
    <td>
      <input type="text" id="compra-search-producto"> 
      <i class="fa fa-search btn-link theme-c"></i> 
    </td>
    <td><input type="text" name="cantidad" id="compra-cantidad-producto"> </td>
    <td><input type="text" name="precio" id="compra-save-producto"> </td>
  </tr>
</table>
<strong>
<div class="compra-result-producto" align="center"> </div>
</strong>
{{ Form::close() }}
<div class="compra-detalle" data-spy="scroll" >
  <table class="table">
    <thead>
      <tr>
        <td>Cantidad:</td>
        <td>Descripcion:</td>
        <td>Costo U:</td>
        <td>Total:</td>
      </tr>
    </thead>
  </table>
</div>

<div class="compra-totales" > 
  <table>
    <tr>
      <td>Total:</td>
      <td id="total-compra"> 0.00</td>
    </tr>
    <tr>
      <td>Flete:</td>
      <td> 0.00</td>
    </tr>
    <tr>
      <td>Total a Pagar:</td>
      <td id="total-final"> 0.00</td>
    </tr>
  </table>
</div>
<div class="form-footer">
  <div class="col-sm-offset-11">
    <button class="theme-button eliminar-compra-btn"> Eliminar </button>
    {{ Form::submit('Finalizar!', ['class'=>'theme-button']) }}
  </div>
</div>
