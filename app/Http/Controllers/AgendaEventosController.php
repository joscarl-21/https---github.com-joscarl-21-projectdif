<?php

namespace App\Http\Controllers;

use App\Models\Agenda_Eventos;
use App\Models\Ubicaciones;
use App\Models\Empleado;
use Illuminate\Http\Request;


class AgendaEventosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['eventos']=Agenda_Eventos::paginate(5);
        return view('eventos.index',$datos);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $ubicaciones=Ubicaciones::all();
        $empleados=Empleado::all();
        //dd($empleados);
    
        return view('eventos.create',compact('ubicaciones','empleados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // public function search(Request $request){
        //     $searchValue = $request->input('search');
        //     $results=Empleado::where('name','like','%'.$searchValue.'%')->get();
        //     return view('eventos.search',['results'=>$results]);
        //     dd($results);
        // }
        $campos=[
            'empleado_id'=>'required',
            'descripcion'=>'required|string|max:100',
            'ubicacion_id'=>'required',
            'fecha'=>'required',
            'hora_inicio'=>'required',
            'hora_fin'=>'required',
        ];

        $mensaje=[
            'required'=>' :attribute es requerido'
        ];
           $this->validate($request,$campos,$mensaje);

        // $datosEventos = request()->except('_token');


        return redirect('eventos')->with('mensaje','evento creado con exito');

    }

    /**
     * Display the specified resource.
     */
    public function show(Agenda_Eventos $agenda_Eventos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $ubicaciones=Ubicaciones::all();
        $empleados=Empleado::all();
        //dd($ubicaciones);

        $eventos=Agenda_Eventos::findOrFail($id);
        return view('eventos.edit', compact('eventos','ubicaciones','empleados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datosEventos = request()->except(['_token','_method']);
        Agenda_Eventos::where('id','=',$id)->update($datosEventos);
      
        $datos['eventos']=Agenda_Eventos::paginate(5);
        return view('eventos.index',$datos);
       

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $eventos=Agenda_Eventos::findOrFail($id);
        Agenda_Eventos::destroy($id);
        return redirect('eventos')->with('mensaje','Evento borrado');
    }

  



    public function search(Request $request)
    {
        $searchValue = $request->search;
        // $results = Empleado::where('name', 'like', '%'.$searchValue.'%')->get();
        $results = Empleado::whereRaw("name like '%".$searchValue."%'")->get();
        return response()->json($results);
    }


    
}
