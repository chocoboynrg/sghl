@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- <a href="/sghl/public/patients/create" class="btn btn-primary">Nouveau Patient</a> --}}
                    {{-- <a href="/patients/create" class="btn btn-primary">Nouveau Patient</a> --}}
                    <a href="{{ route('patients.create') }}" class="btn btn-success"><i class="fas fa-user-plus"></i> Nouveau patient</a>

                              <h3>Mes Patients</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
