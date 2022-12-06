@extends('layouts.app')

@section('content')
<div class="container">
    {{-- SE NON SEI ADMIN FACCIO IL REDIRECT ALLA HOME --}}
    @if(session('message'))
    <div class="alert alert-{{session('type') ?? 'info'}}">
        {{session('message')}}
    </div>
    @endif
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
                    @if ($user->id === 1)
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.woods.index') }}">Gestione Risorse</a>
                        </div>
                    @else
                    <div class="d-flex justify-content-center">
                        <a href="{{ url('/') }}">HOME</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
