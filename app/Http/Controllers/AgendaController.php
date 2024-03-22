<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['agenda'] = Agenda::orderBy('id','desc')->paginate(5);
    
        return view('agenda.index', $data);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agenda.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required'
        ]);

        $agenda = new Agenda;

        $agenda->nombre = $request->nombre;
        $agenda->apellido = $request->apellido;
        $agenda->telefono = $request->telefono;

        $agenda->save();

     
        return redirect()->route('agenda.index')
                        ->with('success','Agenda has been created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        return view('agenda.show',compact('agenda'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        return view('agenda.edit',compact('agenda'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required'
        ]);
        
        $agenda = Agenda::find($id);

        $agenda->nombre = $request->nombre;
        $agenda->apellido = $request->apellido;
        $agenda->telefono = $request->telefono;

        $agenda->save();
    
        return redirect()->route('agenda.index')
                        ->with('success','Agenda Has Been updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
    
        return redirect()->route('agenda.index')
                        ->with('success','Agenda has been deleted successfully');
    }
}
