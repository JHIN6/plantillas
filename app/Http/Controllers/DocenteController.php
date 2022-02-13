<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;
//use App\Http\Controllers\DocenteController;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docentes = Docente::latest()->paginate(5);
        return view('docentes.index', compact('docentes'));

        /*$products = Product::latest()->paginate(5);
          return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('docentes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre'    => 'required',
            'apellido'  => 'required',
            'imagen'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3000',
            'profesion' => 'required',
            'curso'     => 'required'
        ]);

        if ($image = $request->file('imagen')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['imagen'] = "$profileImage";
        }

        $docente = Docente::create([
            'nombre'    => $request->nombre,
            'apellido'  => $request->apellido,
            'imagen'    => $input['imagen'],
            'profesion' => $request->profesion,
            'curso'     => $request->curso
        ]);

        if($docente){
            //Redirigir con mensaje de éxito
            return redirect()->route('docentes.index')->with(['success' => 'Datos guardados exitosamente...']);
        }else{
            //Redirigir con mensaje de error
            return redirect()->route('docentes.index')->with(['error' => 'No se pudieron guardar los datos...']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Docente $docente)
    {
        return view('docentes.show', compact('docente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Docente $docente)
    {
        return view('docentes.edit', compact('docente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre'    => 'required',
            'apellido'  => 'required',
            'imagen'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3000',
            'profesion' => 'required',
            'curso'     => 'required'
        ]);

        //Obtener datos de catequista por ID
        $docente = Docente::findOrFail($id);

        $docente->update([
            'nombre'    => $request->nombre,
            'apellido'  => $request->apellido,
            'imagen'    => $request->imagen,
            'profesion' => $request->profesion,
            'curso'     => $request->curso
        ]);        

        if($docente){
            //Redirigir con mensaje de éxito
            return redirect()->route('docentes.index')->with(['success' => 'Datos actualizados con éxito...']);
        }else{
            //Redirigir con mensaje de error
            return redirect()->route('docentes.index')->with(['error' => 'No se pudieron actualizar los datos...!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $docente = Docente::findOrFail($id);
        $docente->delete();

        if($docente){
            //Redirigir con mensaje de éxito
            return redirect()->route('docentes.index')->with(['success' => 'Datos eliminados con éxito...']);
        }else{
            //Redirigir con mensaje de error
            return redirect()->route('docentes.index')->with(['error' => 'No se pudieron borrar los datos...']);
        }
    }
}
