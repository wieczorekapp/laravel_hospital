@extends('template')


@section('title')
  @if (isset($title))
    - {{ $title }}
  @endif
@endsection('title')

@section('year')
  @if (isset($year))
    - {{ $year }}
  @endif
@endsection('title')

@section('content')
  <div class="container">
    <h2>Dodawanie specjalizacji</h2>
      <form  action="{{ action('SpecializationController@store') }}" method="post" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div class="form-group">
          <label for="name">Nazwa specjalizacji</label>
          <input type="text" class="form-control" name="name" />
        </div>
        <input type="submit" value="Dodaj" class="btn btn-primary" />
      </form>
  </div>
@endsection('content')
