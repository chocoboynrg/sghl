@extends('layouts.app')

@section('title','Nouveau type de consultation')

@section('content')
    <div class="row">
        <div class="col"> <h1>Nouveau type d/'examen </h1></div>
    </div>
    <br>
    <form action="{{ route('examens.update',['examen' => $examen]) }}" method="POST">
        @method('PATCH')
         @include('examens.form')
         <div class="form-group">
            <button type="submit"class="btn btn-primary">Enregistrer</button>
        </div>
     </form>

@endsection