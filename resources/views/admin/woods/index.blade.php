@extends('layouts.app')

@section('content')
<div class="container my-5">

    @if(session('message'))
    <div class="alert alert-{{session('type') ?? 'info'}}">
        {{session('message')}}
    </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Prezzo al mq</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($woods as $wood)
            <tr>
                <td>{{$wood->name}}</td>
                <td>{{$wood->price}}</td>
                <td class="d-flex justify-content-end">
                    <a href="{{route('admin.woods.edit',$wood)}}" class="btn btn-warning">Modifica</a>
                    <form action="{{ route('admin.woods.destroy', $wood) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ml-2">Elimina</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-end mt-3">
        <a href="{{ route('admin.woods.create') }}" class="btn btn-success">Aggiungi Risorsa</a>
    </div>
</div>
@endsection