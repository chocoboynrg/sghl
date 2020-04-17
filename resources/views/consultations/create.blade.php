@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col text-center"> 
            <h1>Consultation du patient {{ $patient->nom .' '. $patient->prenom  }} </h1>
        </div>
    </div> 
    <br>
    <form  action="{{ route('consultations.store') }}" method="POST">
        @method('POST')
        @include('consultations.form')
        <div class="form-group">
            <input type="submit" value="Créer" class="btn btn-primary btn-block">
        </div>
    </form>

@endsection