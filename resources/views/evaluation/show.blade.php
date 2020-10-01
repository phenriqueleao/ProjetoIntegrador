@extends('layouts.auth')

@section('title', 'Detalhes questão padrão')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header h3">Avaliação: {{ $evaluation->game_name }}</div>
        <div class="card-body">
  
        @foreach ($standardquestions as $key => $standardquestion)
        <form class="form" action=" {{ route('response.store') }} " method="post">
          @csrf  
          <input type="hidden" name="evaluation_id" value="{{ $evaluation->id }}" >
          <input type="hidden" name="student_id" value="{{ Auth::id() }}" >
          <input type="hidden" name="standard_questionnaire_item_id[{{ $key }}]" value="{{ $standardquestion->id }}" >
          <div class="form-group">
            <label for="{{ $standardquestion->id }}"><strong>{{ $standardquestion->number }}. {{ $standardquestion->description }}</strong></label>
          </div>
          <div class="form-group">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="response[{{ $key }}]" id="inlineRadio1" value="1">
              <label class="form-check-label" for="inlineRadio1">Discordo totalmente</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="response[{{ $key }}]" id="inlineRadio2" value="2">
              <label class="form-check-label" for="inlineRadio2">Discordo</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="response[{{ $key }}]" id="inlineRadio3" value="3">
              <label class="form-check-label" for="inlineRadio3">Nem discordo, nem concordo</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="response[{{ $key }}]" id="inlineRadio4" value="4">
              <label class="form-check-label" for="inlineRadio3">Concordo</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="response[{{ $key }}]" id="inlineRadio5" value="5">
              <label class="form-check-label" for="inlineRadio3">Concordo totalmente</label>
            </div>
          </div>
          @endforeach
          <div class="form-group">
            <button type="submit" class="btn btn-success">Responder</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection