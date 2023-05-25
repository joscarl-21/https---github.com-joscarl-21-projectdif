<?php

namespace App\Http\Controllers;

use App\Models\Circulares;
use Illuminate\Http\Request;
use App\Models\Empleado;
use Illuminate\Support\Facades\Storage;

class CircularesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('admin')->only('edit','update','destroy');
    }

    public function index()
    {
        //
        $datos['circulares']=Circulares::paginate(5);
        return view('circulares.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $empleados=Empleado::all();
        return view('circulares.create',compact('empleados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //$datosCirculares = request()->all();
        $datosCirculares = request()->except('_token');
       

        if($request->hasFile('PDF')){
            $datosCirculares['PDF']=$request->file('PDF')->store('uploads','public');
        }

        Circulares::insert($datosCirculares);

        //return response()->json($datosCirculares);
        return redirect('circulares')->with('mensaje','Circular creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Circulares $circulares)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $empleados=Empleado::all();
        $circulares=Circulares::findOrFail($id);
        return view('circulares.edit', compact('circulares','empleados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datosCirculares=request()->except(['_token','_method']);
        Circulares::where('id','=',$id)->update($datosCirculares);
        // $circulares=Circulares::findOrFail($id);
        // return view('circulares.index', compact('circulares'));
        $datos['circulares']=Circulares::paginate(5);
        return view('circulares.index',$datos);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $circulares=Circulares::findOrFail($id);

        if(Storage::delete('public/'.$circulares->PDF)){
            Circulares::destroy($id);
        }
        
        return redirect('circulares')->with('mensaje','Circular borrado');
    }
}
