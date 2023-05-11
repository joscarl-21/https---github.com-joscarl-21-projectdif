<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table='users';
    protected $fillable = ['username','noempleado','name','apaterno','amaterno','fechanacimiento','id_sexo','email','id_departamento'];
}
