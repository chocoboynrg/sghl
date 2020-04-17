@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-6">
            <h1>Examen en attente</h1>
        </div>
        <div class="col-md-6 text-right" >
        <a href="{{ route('patients.index') }}" class="btn btn-primary">Ajouter examen</a>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                 <th>PATIENT</th>
                 <th>EXAMEN</th>
                <th>REFERENCE</th>
                <th>Actions</th>
            </tr>
        </thead> 

        <tbody>
            @if(count($examens) > 0)
                @foreach ($examens as $examen)
                <tr>
                    <td>{{$examen->id}}</td>
                <td><a href="{{ route('examens.show', ['examen' => $examen ]) }}">  {{ $examen->patient->nom}} {{ $examen->patient->prenom}}</a></td>                    
                <td> {{ $examen->type_examen->nom}}</td>
                <td> {{ $examen->reference}}</td>

                <td>
                        <a href="{{ route('examens.create', ['examen' => $examen]) }}" class="btn btn-info">Ajouter</a>
                        <a href="{{ route('examens.show', ['examen' => $examen ]) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('examens.edit', ['examen' => $examen ]) }}" class="btn btn-warning">Modifier</a>
                        <a href="{{ route('profile', ['examen' => $examen ]) }}" class="btn btn-warning">Facture</a>

                        <form action="{{ route('examens.destroy',['examen' => $examen]) }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                {{$examens->links()}}
            @else
                <p>Aucun résultat trouvé</p>
            @endif
        </tbody>
    </table>
  
@endsection