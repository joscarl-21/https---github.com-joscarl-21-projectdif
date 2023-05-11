<form action="{{ url('/empleados') }}"  method="post" enctype="multipart/form-data">
@csrf
<label for="Titulo">Nombre </label>
 <input type="text" name="Nombre" id="Nombre">
 <br>

 <label for="Titulo">Apellido Paterno </label>
 <input type="text" name="apellido_paterno" id="apellido_paterno">
 <br>

 <label for="Fecha"> Apellido Materno </label>
 <input type="text" name="apellido_materno" id="apellido_materno">
 <br>

 <label for="Descripcion"> Correo </label>
 <input type="text" name="Correo" id="correo">
 <br>

 <label for="area_id"> id cargo </label>
 <input type="text" name="cargo_id" id="cargo_id">
 <br>

 <label for="area_id"> id area </label>
 <input type="text" name="area_id" id="area_id">
 <br>

  <input type="submit" value="Guardar">
 </form>