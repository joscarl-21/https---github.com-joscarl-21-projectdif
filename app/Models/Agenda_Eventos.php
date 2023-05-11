<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda_Eventos extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion','ubicacion_id','fecha','hora_inicio','hora_fin','empleado_id'];

    public function ubicacion(){
        return $this->belongsTo(Ubicaciones::class,'ubicacion_id','id');
    }

    public function empleado(){
        return $this->belongsTo(Empleado::class,'empleado_id','id');
    }


}

