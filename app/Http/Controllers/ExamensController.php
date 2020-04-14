<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\Controller;

use App\Examen;
use App\Patient;
use App\Type_examen;
use Carbon\Carbon;
use View;

class ExamensController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        //$examens = examen::orderBy('created_at','asc')->paginate(6);

        $examens = examen::whereDate('created_at', Carbon::today())->where('onWait','=',1)->orderBy('created_at','asc')->paginate(6);
        return view('examens.index')->with('examens', $examens);

    }

    /*  views composer
    *profile Affiche Facture
    */ 
    public function profile(Request $request)
    {
        $patient= $request->session()->get('patient');
        return view('examens.profile'); 
    }

 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $examen = new Examen();
        $patient= $request->session()->get('patient');
        // recuperation de l'id du patient 
        $examen->patient_id = $patient->id ;

    //$patient->user_id = auth()->user()->id;
    //$examen->save();

       // $examen->patient()->id= $request->session()->get('patient');
      // $type_examens = Type_examen::with('examens')->get();
        $type_examens = Type_examen::all();

        return view('examens.create',compact('examen','patient','type_examens'));
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
            'patient_id'=>'',
            'type_examen_id' => '',
            'reference' => '',
            'resultats' => '',
            'conclusion' => ''
        ]); 
        //ma methode de creation de examen
    $examen = new examen;
    $examen ->patient_id = $request->input('patient_id');
    $examen ->type_examen_id = $request->input('type_examen_id');
    $examen ->reference = $request->input('reference');
    $examen ->resultats = $request->input('resultats');
    $examen ->conclusion = $request->input('conclusion');


    //$patient->user_id = auth()->user()->id;
    $examen->save();
    
    $type_examen = Type_examen::find($request); 

    $examen->type_examens()->attach($type_examen);

    return redirect ('\examens\create')->with('success','examen crée');

        }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(examen $examen)
    {
        session(['examen'=>$examen]);
        
        return view('examens.show',compact('examen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $examen = Examen::find($id);
        $type_examen = Type_examen::find($id); 
        return view('examens.edit',compact('examen'));

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
            'resultats' => '',
            'conclusion' => ''
        ]);

        //ma methode de creation
        $examen =  Examen::find($id);
        $examen ->resultats = $request->input('resultats');
        $examen ->conclusion = $request->input('conclusion');

            //$type_consultation->user_id = auth()->user()->id;

        $examen->save();

        return redirect('/examens')->with('success','Examen crée avec succès');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
