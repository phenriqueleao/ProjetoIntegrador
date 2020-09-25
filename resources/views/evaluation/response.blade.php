@extends('layouts.auth')

@section('content')
<div class="container">
  <div class="row">
    @include('layouts.navbar')
    <div class="col-md-10">
      <div class="h4">Respostas</div>
      <table class="table table-sm">
      @foreach ($students as $student)
        <thead>
          <div class="h3"> Aluno: {{$student->name}}</div>
          <tr>
            <th scope="col">Número:</th>
            <th scope="col">Enunciado</th>
            <th scope="col">Resposta</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($standardquestions as $question)
          <tr>
            <th scope="row">{{ $question->number }}</th>
            <td>{{ $question->description }}</td>
            @foreach ($responses as $response)
              @if ($question->id == $response->standard_questionnaire_item_id)
                <td>{{$response->response}}</td>
              @endif
            @endforeach
          </tr>
          @endforeach
        </tbody>
      @endforeach
      </table>
    </div>
  </div>
</div>
@endsection

