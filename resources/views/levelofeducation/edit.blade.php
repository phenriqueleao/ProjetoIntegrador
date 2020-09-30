@extends('layouts.auth')

@section('title', 'Editar questionário padrão')

@section('content')
<div class="container">
  <div class="row">
    @include('layouts.navbar')
    <div class="col-md-8">
      <div class="card">
        <div class="card-header h4">Editar nível de ensino: {{ $level->name }}</div>
        <div class="card-body">
          <form action="{{ route('level.update', $level->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group">
              <label for="name">Nome:</label>
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nome: " value=" {{$level->name}} ">
              @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href=" {{ route('level.index') }} " class="btn btn-primary">Voltar</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection