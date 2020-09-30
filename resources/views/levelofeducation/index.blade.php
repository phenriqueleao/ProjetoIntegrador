@extends('layouts.auth')

@section('content')
<div class="container">
  <div class="row">
    @include('layouts.navbar')
    <div class="col-md-10">
      <div class="h4">Lista de nível de ensino</div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th width="400">Nome:</th>
              <th>Ações:</th>
            </tr>
          </thead>
        <tbody>
          @foreach ($levels as $level)
            <tr>
              <td>{{ $level->name }}</td>
              <td width="10">
                <a class="btn btn-primary float-left" href="{{ route('level.edit', $level->id) }}">Editar</a>
                <form action=" {{ route('level.destroy', $level->id) }} " method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger float-right">Apagar</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
    <a href="{{ route('level.create') }}" class="btn btn-primary">Cadastrar novo nível de educação</a>
      </div>
    </div>
</div>
@endsection
    