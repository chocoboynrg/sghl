@extends('layouts.app')

@section('title','Nouveau type Examen')

@section('content')
    <div class="row">
        <div class="col"> <h1>Nouveau type Examen </h1></div>
    </div>
    <br>
    <form action="{{ route('type_examens.store')}}" method="POST">
         @include('type_examens.form')
         <div class="form-group">
            <button type="submit"class="btn btn-primary">Enregistrer</button>
        </div>
     </form>

@endsection 