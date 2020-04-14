@extends('layouts.app')
@section('content')

    <div class="col-md-12 text-right">
        <a  href="{{ route('examens.index') }}" class="btn btn-success"><i class="fas fa-user-plus"></i> terminer</a>
    </div>


    <div class="row">
        <div class="col text-center"> 
            Examen du patient N_ {{ $patient->id }} </h1> 
        </div> 
    </div>
    <br> 
    <form  action="{{ route('examens.store') }}" method="POST">
        @method('POST')
        @include('examens.form')
        <div class="form-group">
            <input type="submit" value="Créer" class="btn btn-primary btn-block">
        </div>
    </form>
@endsection
