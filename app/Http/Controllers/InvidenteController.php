<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invidente;

class InvidenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return Persona::where('user_id', auth()->id())->get();

        if($request->ajax()){
            return Invidente::where('user_id', auth()->id())->get();
        }else{
            return view('invidentes');
        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invidente = new Invidente();
        $invidente->nombre = $request->nombre;
        $invidente->ap_paterno = $request->ap_paterno;
        $invidente->ap_materno = $request->ap_materno;
        $invidente->edad = $request->edad;
        $invidente->direccion = $request->direccion;
        $invidente->tipo_sangre = $request->tipo_sangre;
        $invidente->telefono = $request->telefono;

        $invidente->user_id = auth()->id();
        $invidente->save();
        return $invidente;    
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $invidente = Invidente::find($id);
        $invidente->nombre = $request->nombre;
        $invidente->ap_paterno = $request->ap_paterno;
        $invidente->ap_materno = $request->ap_materno;
        $invidente->edad = $request->edad;
        $invidente->direccion = $request->direccion;
        $invidente->tipo_sangre = $request->tipo_sangre;
        $invidente->telefono = $request->telefono;
        $invidente->save();
        return $invidente;  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invidente = Invidente::find($id);
        $invidente->delete();    
    }
}
