{{ Form::_open("Proveedor ingresado") }}
    
    {{ Form::_text('nombre') }}

    {{ Form::_text('direccion') }}
  
    {{ Form::_text('telefono') }}

    {{ Form::_text('contacto') }}

    {{ Form::_text('telefono_contacto', null, 'Telefono') }}

    {{ Form::_submit('Enviar') }}

{{ Form::close() }}