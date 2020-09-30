@extends('layouts.auth')

@section('title', 'Editar questão padrão {$item->number}')

@section('content')
<div class="container">
  <div class="row">
    @include('layouts.navbar')
    <div class="col-md-10">
      <div class="card">
      <div class="card-header h4">Editar avaliação {{ $evaluation->game_name }}</div>
      <div class="card-body">
      <form action="{{ route('evaluation.update', $evaluation->id) }}" method="post">
        @method('PUT')
        @csrf
        <label>Nome do jogo:</label>
        <div class="form-group">
          <input type="text" class="form-control" name="game_name" placeholder="Nome do jogo: " value="{{ $evaluation->game_name }}">
        </div>
        <label>Questionário:</label>
        <div class="form-group">
          <select class="form-control" name="standard_questionnaire_id" id="questionnaire">
            @foreach ($questionnaires as $questionnaire)
              <option class="form-control" value="{{ $questionnaire->id }}">{{ $questionnaire->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Nível de ensino:</label>
          <select class="form-control" name="level_of_education_id" id="level">
            @foreach ($levels as $level)
              <option class="form-control" value="{{ $level->id }}">{{ $level->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="course">Área de Conhecimento:</label>
          <input id="course" type="text" class="form-control  @error('course') is-invalid @enderror" name="knowledge_area" placeholder=" " value="{{ $evaluation->knowledge_area }}">
          @error('course')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <label>Curso:</label>
        <div class="form-group">
          <input type="text" class="form-control" name="course" placeholder="Curso: " value="{{ $evaluation->course }}">
        </div>
        <label>Turma:</label>
        <div class="form-group">
          <input type="text" class="form-control" name="class" placeholder="Turma: " value="{{ $evaluation->class }}">
        </div>
        <label>Disciplina:</label>
        <div class="form-group">
          <input type="text" class="form-control" name="discipline" placeholder="Disciplina: " value="{{ $evaluation->discipline }}">
        </div>
        <label>Instituição de ensino:</label>
        <div class="form-group">
          <input type="text" class="form-control" name="institution" placeholder="Instituição: " value="{{ $evaluation->institution }}">
        </div>
        <label>Data:</label>
        <div class="form-group">
          <input type="date" class="form-control" name="date" placeholder="Data: " value="{{ $evaluation->date }}">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success">Salvar</button>
        </div>
      </form>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection