@extends('layouts.app')
@section('title','Type Examens')
@section('content')

    <br>
    <br>
    <div class="row">
            <div class="col-md-4">
                   <h2>Rechercher un type</h2>
            </div>
            <div class="col-md-8">
                    <form>
                        <div class="input-group">
                            <input type="search" name="search" class="form-control" id="search">
                            <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i> GO</button>
                        </div>
                    </form>
            </div>
    </div>
    <hr>
    <h2>Liste des type Examens</h2>
    @if(count($type_examens) > 0) 
        <table class="table table-striped">
            <thead>
                <tr> 
                <th scope="col">ID</th>
                <th scope="col">NOM</th>
                <th scope="col">TARIF</th>
                <th scope="col">NORME</th>
                <th scope="col">Actions</th>
                <a href="{{ route('type_examens.create') }}" class="btn btn-success"><i class="fas fa-cog"></i> Nouveau type</a>
                </tr>
            </thead>

            
             <tbody> 
                @foreach ($type_examens as $type_examen) 
                    <tr>
                        <th scope="row">{{$type_examen->id}}</th>
                        <td>{{$type_examen->nom}}</td>
                        <td>{{$type_examen->prix}}</td>
                        <td>{{$type_examen->norme}}</td>

                        <td>
                            <a href="{{ route('type_examens.edit', ['type_examen' => $type_examen ]) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('type_examens.destroy',['type_examen' => $type_examen]) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                 @endforeach 
            </tbody>
        </table>

        <div class="row">
            <div class="col">   {{ $type_examens->links()  }} </div>
        </div>     
        @else
        <div class="row">
        <div class="col-md-12">Aucun type trouvé</div>
        </div>

        




    @endif
@endsection


