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
<select class="form-control" name="empleado_id" id="empleado_id" value="{{ isset($empleado->id)?$empleado->id:'' }}" required>
 <option value="">seleccionar</option>
 @foreach ( $empleados as $empleado ) 
 <option value="{{$empleado->id}}">{{$empleado->name}}</option>
 @endforeach 
 </select>
</div>

<div class="form-group">
<label for="descripcion">Descripcion del evento </label>
 <input class="form-control" type="text" name="descripcion" value="{{ isset($eventos->descripcion)?$eventos->descripcion:old('descripcion') }}" id="descripcion" required >
</div>

<div class="form-group">
 <label for="ubicacion_id"> Ubicacion del evento </label>
 <select class="form-control" name="ubicacion_id" id="ubicacion_id"  value="{{ isset($ubicacion->id)?$ubicacion->id:'' }}" required>
    <option value="">seleccionar</option>
 @foreach ( $ubicaciones as $ubicacion ) 
 <option value="{{$ubicacion->id}}">{{$ubicacion->centro}}</option>
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
