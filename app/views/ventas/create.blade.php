
{{ Form::open() }}

    {{ Form::hidden('cliente_id') }}

    <div class="form-body">

        <div class="form-group">
          <label class="col-sm-2 control-label">Cliente</label>
          <div class="col-sm-8">
              {{ Form::text(null, null, array('class'=>'form-control', 'id'=>'cliente_id')) }}
          </div>
          {{ Form::button('<i class="fa fa-pencil" style="font-size:15px;"></i>', array('class'=>'btn-link theme-c', 'id'=>'cliente_edit')) }}
          {{ Form::button('<i class="fa fa-plus-square" style="font-size:15px;"></i>', array('class'=>'btn-link theme-c', 'id'=>'cliente_create')) }}
        </div>

    </div>

    <div class="form-footer">
      <div class="col-sm-offset-11">
        {{ Form::submit('Enviar !', ['class'=>'btn theme-button']) }}
      </div>
    </div>

{{ Form::close() }}

<script type="text/javascript">
    $(function() {
      $("#cliente_id").autocomplete({
        source: function (request, response) {
          $.ajax({
            url: "user/cliente/buscar",
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
          $("input[name='cliente_id']").val(ui.item.id);
        },
        autoFocus: true,
        open: function(event, ui) {
          $(".ui-autocomplete").css("z-index", 100000);
        }
      });
    });

</script>