<h1>{{$modo}} circular </h1>

<div class="form-group">
<label for="Titulo">Titulo del circular </label>
 <input class="form-control"  type="text" name="titulo" value="{{ isset($circulares->titulo)?$circulares->titulo:'' }}" id="titulo" required>
</div>

<div class="form-group">
 <label for="Fecha"> Fecha del circular </label>
 <input class="form-control"  type="date" name="fecha" id="fecha" value="{{ isset($circulares->fecha)?$circulares->fecha:'' }}" required>
 </div>

<div class="form-group">
 <label for="Descripcion"> Descripcion del circular </label>
 <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control" value="{{ isset($circulares->descripcion)?$circulares->descripcion:'' }}" required></textarea>
 {{-- <input class="form-control" type="text" name="descripcion" id="descripcion" value="{{ isset($circulares->descripcion)?$circulares->descripcion:'' }}" required> --}}
 </div>

<div class="form-group">
 <label for="PDF"> PDF </label>
 {{ isset($circulares->PDF)?$circulares->PDF:'' }}
 <input class="form-control" type="file" name="PDF" id="PDF" value="" required>
 </div>

<div class="form-group">
  <label for="empleado_id"> id empleado </label>
  <select class="form-control" name="empleado_id" id="empleado_id"  value="{{ isset($empleado->id)?$empleado->id:'' }}" required>
    {{-- <option value="">seleccionar</option> --}}
 @foreach ( $empleados as $empleado ) 
 <option value="{{$empleado->id}}">{{$empleado->name}}</option>
 @endforeach 
 </select>
 </div>


  <input type="submit" value="{{$modo}} datos" class="btn btn-success">
  <a href="{{url('circulares/')}}" class="btn btn-primary"> Regresar a Inicio </a>
  