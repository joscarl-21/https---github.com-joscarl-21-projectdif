<h1>{{$modo}} circular </h1>

<div class="form-group">
<label for="Titulo">Titulo del circular </label>
 <input class="form-control"  type="text" name="titulo" value="{{ isset($circulares->titulo)?$circulares->titulo:'' }}" id="titulo" >
</div>

<div class="form-group">
 <label for="Fecha"> Fecha del circular </label>
 <input class="form-control"  type="date" name="fecha" id="fecha" value="{{ isset($circulares->fecha)?$circulares->fecha:'' }}">
 </div>

<div class="form-group">
 <label for="Descripcion"> Descripcion del circular </label>
 <input class="form-control" type="text" name="descripcion" id="descripcion" value="{{ isset($circulares->descripcion)?$circulares->descripcion:'' }}">
 </div>

<div class="form-group">
 <label for="PDF"> PDF </label>
 {{ isset($circulares->PDF)?$circulares->PDF:'' }}
 <input class="form-control" type="file" name="PDF" id="PDF" value="">
 </div>

<div class="form-group">
  <label for="PDF"> id empleado </label>
 <input class="form-control" type="text" name="empleado_id" id="empleado_id" value="{{ isset($circulares->empleado_id)?$circulares->empleado_id:'' }}">
 </div>


  <input type="submit" value="{{$modo}} datos" class="btn btn-success">
  <a href="{{url('circulares/')}}" class="btn btn-primary"> Regresar a Inicio </a>
  