<h1>{{$modo}} Evento </h1>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif

<div class="form-group">
  <label for="empleado_id">Responsable del evento</label>
  <form id="searchForm">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <style>
      .ui-autocomplete {
        max-height: 200px;
        overflow-y: auto;
        overflow-x: hidden;
      }

      .ui-menu-item {
        padding: 5px;
        cursor: pointer;
      }
    </style>
    <input type="text" id="searchInput" name="search" placeholder="Buscar por nombre">
    <ul id="searchResults"></ul>
  </form>
</div>

<div class="form-group">
  <label for="descripcion">Descripción del evento</label>
  <input class="form-control" type="text" name="descripcion" value="{{ isset($eventos->descripcion)?$eventos->descripcion:old('descripcion') }}" id="descripcion" required>
</div>

<div class="form-group">
  <label for="ubicacion_id">Ubicación del evento</label>
  <select class="form-control" name="ubicacion_id" id="ubicacion_id" value="{{ isset($ubicacion->id)?$ubicacion->id:'' }}" required>
    @foreach ( $ubicaciones as $ubicacion ) 
    <option value="{{$ubicacion->id}}">{{$ubicacion->centro}}</option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label for="Fecha">Fecha del evento</label>
  <input class="form-control" type="date" name="fecha" id="fecha" value="{{ isset($eventos->fecha)?$eventos->fecha:old('fecha') }}" required>
</div>

<div class="form-group">
  <label for="hora_inicio">Hora de inicio</label>
  <input class="form-control" type="time" name="hora_inicio" id="hora_inicio" value="{{ isset($eventos->hora_inicio)?$eventos->hora_inicio:old('hora_inicio') }}" required>
</div>

<div class="form-group">
  <label for="hora_fin">Hora de finalización</label>
  <input class="form-control" type="time" name="hora_fin" id="hora_fin" value="{{ isset($eventos->hora_fin)?$eventos->hora_fin:old('hora_fin') }}" required>
</div>

<input type="submit" value="{{$modo}} evento" class="btn btn-success">
<a href="{{url('eventos/')}}" class="btn btn-primary">Regresar a Inicio</a>

<script>
  $(document).ready(function() {
    $('#searchInput').on('input', function() {
      var searchValue = $(this).val();
      $.ajax({
        url: '/search',
        method: 'POST',
        data: {
          _token: '{{ csrf_token() }}',
          search: searchValue
        },
        success: function(response) {
          console.log(response);

          var filteredResults = response.filter(function(item) {
            return item.name !== 'admin';
          });

          $('#searchInput').autocomplete({
            source: filteredResults,
            minLength: 1,
            select: function(event, ui) {
              $('#searchInput').val(ui.item.name + ' ' + ui.item.apaterno + ' ' + ui.item.amaterno);
              return false;
            }
          }).autocomplete("instance")._renderItem = function(ul, item) {
            return $("<li>")
              .append("<div><strong>" + item.name + " " + item.apaterno + " " + item.amaterno + "</strong></div>")
              .appendTo(ul);
          };
        }
      });
    });

    $('#searchForm').submit(function(event) {
      event.preventDefault();

      var selectedValue = $('#searchInput').val();
      var descripcion = $('#descripcion').val();
      var ubicacion_id = $('#ubicacion_id').val();
      var fecha = $('#fecha').val();
      var hora_inicio = $('#hora_inicio').val();
      var hora_fin = $('#hora_fin').val();

      $.ajax({
        url: '/eventos/save', // Reemplaza '/eventos/save' con la URL correcta para guardar los datos en el servidor
        method: 'POST',
        data: {
          _token: '{{ csrf_token() }}',
          responsable: selectedValue,
          descripcion: descripcion,
          ubicacion_id: ubicacion_id,
          fecha: fecha,
          hora_inicio: hora_inicio,
          hora_fin: hora_fin
        },
        success: function(response) {
          console.log(response);
          // Realiza las operaciones necesarias después de guardar los datos en el servidor
        }
      });
    });
  });
</script>
