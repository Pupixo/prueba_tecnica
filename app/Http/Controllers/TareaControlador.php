<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarea;

class TareaControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        // $data = Tarea::latest()->paginate(5);
        // return view('index', compact('data'))
        //         ->with('i', (request()->input('page', 1) - 1) * 5);

        // return view('create');

        
        $data = Tarea::all();
        return view('index', compact('data'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        
        $request->validate([
            'tarea_nom'    =>  'required',
            'estado'     =>  'required',
            'imagen'         =>  'required|mimes:jpeg,png,jpg|max:2048'
        ]);

        $image = $request->file('imagen');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'tarea_nom'       =>   $request->tarea_nom,
            'estado'        =>   $request->estado,
            'image'            =>   $new_name
        );

        Tarea::create($form_data);

        return redirect('tarea_lista')->with('success', 'Datos agregados con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = Tarea::findOrFail($id);
        return view('view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = Tarea::findOrFail($id);
        return view('edit', compact('data'));
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
        
        $image_name = $request->hidden_image;
        $image = $request->file('imagen');
        if($image != '')
        {
            $request->validate([
                'tarea_nom'    =>  'required',
                'estado'     =>  'required',
                'imagen'         =>  'required|mimes:jpeg,png,jpg|max:2048'
            ]);
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $request->validate([
                'tarea_nom'    =>  'required',
                'estado'     =>  'required'
            ]);
        }

        $form_data = array(
            'tarea_nom'    =>  $request->tarea_nom,
            'estado'     =>  $request->estado,
            'image'         =>  $image_name
        );

        Tarea::whereId($id)->update($form_data);
        return redirect('tarea_lista')->with('success', 'Los datos se actualizaron correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $data = Tarea::findOrFail($id);
        $data->delete();
        return redirect('tarea_lista')->with('success', 'Los datos se eliminan con éxito');
    }
}
