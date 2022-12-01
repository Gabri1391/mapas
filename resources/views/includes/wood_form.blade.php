<div class="container">
    @if($wood->exists)

    <h1>Modifica Risorsa</h1>
    <form action="{{ route('admin.woods.update', $wood) }}" method="POST">
        @method('PUT')

        @else
        <h1>Crea Risorsa</h1>
        <form action="{{ route('admin.woods.store') }}" method="POST">
            @endif

            @csrf
            @if ($errors->any())
            <div class="alert alert-danger my-2">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" placeholder="Inserisci un nome" name="name"
                    value="{{ old('name', $wood->name) }}">
            </div>

            <div class="form-group">
                <label for="price">Prezzo al mq</label>
                <input type="number" class="form-control" id="price" name="price"
                    value="{{ old('price', $wood->price) }}">
            </div>
            <button type="submit" class="btn btn-success">Invia</button>
            <a href="{{ route('admin.woods.index') }}" class="btn btn-secondary ml-2">Torna Indietro</a>
        </form>
</div>