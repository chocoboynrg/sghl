@extends('layouts.app')
@section('title','Facture ')


@section('content')

    <h1>FACTURE</h1>

<tr>
<th>ID: <b>{{$facture->patient->id}} </b></th> <br>
<th>Patient: <b>{{$facture->patient->nom}} {{$facture->patient->prenom}}</b></th>
</tr>


<table class="table table-bordered">
    <thead>
        <tr>
            <th>Examen</th>
            <th>Montant</th>
       </tr>
        
   </thead> 

@foreach ($facture->type_examens as $type_examen)
    <tr> 
        <td>{{$type_examen->nom}} </td>
        <td>{{$type_examen->prix}}</td>

    </tr>
@endforeach
</table>


    {{-- <p>Test1: <b>{{$examen}}</b></p>
    <p>Test2: <b>{{$type}}</b></p>
    <p>Test3: <b>{{$patient}}</b></p> --}}


    

@endsection 