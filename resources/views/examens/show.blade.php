@extends('layouts.app')
@section('title','Details examens ')


@section('content')

    <div class="col-md-12 text-right">
    <a  href="/index" class="btn btn-success"><i class="fas fa-user-plus"></i> voir autre Examen</a>
    </div>

    <h1>{{$examen->patient->nom}} {{$examen->patient->prenom}}</h1>
    <hr>
    @foreach ($examen->type_examens as $type_examen)

    <p>Id type Examen: <b>{{$examen->type_examen_id}}</b> <p>
    <p>Examen: <b>{{$examen->type_examen->nom}}</b> <p>   
    <p>Resultats: <b>{{$examen->resultats}} </b> </p>
    <p> Norme:<i>{{$examen->type_examen->norme}}</i></p> 
    <p>Conclusion: <b>{{$examen->conclusion}}</b></p>

    

    <div class="row">
      <div class="col">
        <a href="{{ route('examens.edit', ['examen' => $examen]) }}" class="btn btn-success"> <i class="fas fa-pencil-alt"></i> Modifier</a>
        </div>
        <div class="col">
            <form action="{{ route('examens.destroy',['examen' => $examen]) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Supprimer</button>

            </form>
        </div> 
    </div>
    <hr>  


    {{-- @foreach ($examen->type_examens as $type_examen) --}}

             {{-- <p>Id Examen: <b>{{$type_examen->pivot->examen_id}} {{$type_examen->pivot->type_examen_id}} </b> <p> --}}

         {{-- <span><a href="/all">{{$examen->type_examens->count()-1}} {{ str_plural('autre Examen(s) effectué(s)', $examen->type_examens->count()-1) }}</a></span> --}}

        </table>
        @endforeach
@endsection 