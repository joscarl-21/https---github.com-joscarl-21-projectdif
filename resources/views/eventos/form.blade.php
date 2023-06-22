<h1>{{$modo}} Evento </h1>

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
<label for="empleado_id">Responsable del evento </label>
{{-- <select class="form-control" name="empleado_id" id="empleado_id" value="{{ isset($empleado->id)?$empleado->id:'' }}" required>
  <option value="op" for="op"></option> 
 @foreach ( $empleados as $empleado ) 
 <option value="{{$empleado->id}}">{{$empleado->name}} {{$empleado->apaterno}} {{$empleado->amaterno}}</option>
 @endforeach 
 </select> --}}
 <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
 <form id="searchForm">
  <style>
    .ui-autocomplete{
      max-height: 200px;
      overflow-y: auto;
      overflow-x: hidden;
    }
    .ui-menu-item{
      padding: 5px;
      cursor: pointer;
    }
   </style>

  <input type="text" id="searchInput" name="search" placeholder="Buscar por nombre">
 
   <ul id="list"></ul>
    {{-- <div id="searchResults"></div> --}}
 </form>

 <script>
  $(document).ready(function() {
    var typingTimer;
    var doneTypingInterval = 500; // Tiempo de espera después de dejar de escribir (en milisegundos)


    $('#searchInput').on('input', function() {
      clearTimeout(typingTimer); // Borra el temporizador existente
      var searchValue = $(this).val();
      // Comienza un nuevo temporizador
      typingTimer = setTimeout(function() {
        performSearch(searchValue);
      }, doneTypingInterval);
    });

    function performSearch(searchValue) {
      $.ajax({
        url: '/search',
        method: 'POST',
        data: {
          _token: '{{ csrf_token() }}',
          search: searchValue
        },
        success: function(response) {
          console.log(response);
          //$('#searchResults').html(response);

          $('#searchInput').autocomplete({
            source: response,
            minLength: 1,
            select: function(event, ui) {
              $('#searchInput').val(ui.item.name);
              return false;
            }
          }).autocomplete("instance")._renderItem = function(ul, item) {
            return $("<li>")
              .append("<div><strong>" + item.name + "</strong></div>")
              .appendTo(ul);
          };
        }
      });
    }
  });
</script>


{{-- @foreach ($empleados as $empleado)
<p>{{ $empleado->name }}</p>
@endforeach --}}
</div>

<div class="form-group">
<label for="descripcion">Descripcion del evento </label>
 <input class="form-control" type="text" name="descripcion" value="{{ isset($eventos->descripcion)?$eventos->descripcion:old('descripcion') }}" id="descripcion" required >
</div>

<div class="form-group">
 <label for="ubicacion_id"> Ubicacion del evento </label>
 <select class="form-control" name="ubicacion_id" id="ubicacion_id"  value="{{ isset($ubicacion->id)?$ubicacion->id:'' }}" required>
    {{-- <option value=""></option> --}}
 @foreach ( $ubicaciones as $ubicacion ) 
 <option name="ub" id="ub" value="{{$ubicacion->id}}">{{$ubicacion->centro}}</option>
 @endforeach 
 </select>
</div>

<div class="form-group">
 <label for="Fecha"> Fecha del evento </label>  
 <input class="form-control" type="date" name="fecha" id="fecha" value="{{ isset($eventos->fecha)?$eventos->fecha:old('fecha') }}" required>
  </div>

<div class="form-group">
 <label for="hora_inicio"> Hora de inicio </label>
 <input class="form-control" type="time" name="hora_inicio" id="hora_inicio" value="{{ isset($eventos->hora_inicio)?$eventos->hora_inicio:old('hora_inicio') }}" required>
</div>

<div class="form-group">
 <label for="hora_fin"> Hora de finalización </label>
 <input class="form-control" type="time" name="hora_fin" id="hora_fin" value="{{ isset($eventos->hora_fin)?$eventos->hora_fin:old('hora_fin') }}" required>
</div>

  <input type="submit" value="{{$modo}} evento" class="btn btn-success">
  <a href="{{url('eventos/')}}" class="btn btn-primary"> Regresar a Inicio </a>
