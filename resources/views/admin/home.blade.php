@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>{{env('APP_NAME')}}</strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bentornato <strong>{{$user->name}}</strong>!
                </div>

                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.woods.index') }}">Gestione Risorse</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
