<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type_examen; 

class Type_examensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type_examens = Type_examen::orderBy('id','asc')->paginate(20);
        return view('type_examens.index')->with('type_examens', $type_examens);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_examen = new Type_examen();
        return view('type_examens.create',compact('type_examen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->Validate($request,[
            'nom' => 'required',
            'prix' => 'required', 
            'norme' => 'required',
        ]);

        //ma methode de creation
        $type_examen = new Type_examen;
        $type_examen ->nom = $request->input('nom');
        $type_examen ->prix = $request->input('prix');
        $type_examen ->norme = $request->input('norme');

        //$type_consultation->user_id = auth()->user()->id;

        $type_examen->save();

        return redirect('/examens')->with('success','Type Examen crée avec succès');

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
    public function edit($id){
        $type_examen = Type_examen::find($id);
        return view('type_examens.edit',compact('type_examen'));

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
        $this->Validate($request,[
            'nom' => 'required',
            'prix' => 'required', 
            'norme' => 'required', 
        ]);

        //ma methode de creation
        $type_examen =  Type_examen::find($id);
        $type_examen ->nom = $request->input('nom');
        $type_examen ->prix = $request->input('prix');
        $type_examen ->norme = $request->input('norme');

        //$type_consultation->user_id = auth()->user()->id;

        $type_examen->save();

        return redirect('/type_examen')->with('success','Type Examen modifié avec succès');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type_examen $type_examen)
    {
        $type_examen->delete();
        return redirect('/type_examens')->with('success','Type Examen supprimé  avec succès');

    }
}
