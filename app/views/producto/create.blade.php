
{{ Form::_open('Producto creado') }}
    
    {{ Form::_text('codigo') }}

    {{ Form::_text('descripcion') }}

    {{ Form::_select('marca_id', Marca::lists('nombre', 'id')) }}

    {{ Form::_select('categoria_id', Categoria::lists('nombre', 'id')) }}

    {{ Form::_text('p_costo') }}
  
    {{ Form::_text('p_publico') }}

    {{ Form::_submit('Enviar') }}

{{ Form::close() }}

