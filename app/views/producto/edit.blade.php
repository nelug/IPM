
{{ Form::_open($message) }}
    
    {{ Form::hidden('id', @$producto->id) }}

    {{ Form::_text('codigo', @$producto->codigo) }}

    {{ Form::_text('descripcion', @$producto->descripcion) }}

    {{ Form::_select('marca_id', @$marcas , @$producto->marca_id, 'Marca') }}

    {{ Form::_select('categoria_id', @$categorias , @$producto->categoria_id, 'Categoria') }}

    {{ Form::_text('p_costo', @$producto->p_costo) }}
  
    {{ Form::_text('p_publico', @$producto->p_publico) }}

    {{ Form::_submit('Enviar') }}

{{ Form::close() }}

