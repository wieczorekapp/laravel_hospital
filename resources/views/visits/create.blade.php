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
    <h2>Dodawanie wizyt</h2>
      <form  action="{{ action('VisitController@store') }}" method="post" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

        <div class="form-group">
          <label for="doctor">Lekarz:</label>
          <select name="doctor">
            @foreach($doctorsList as $doctor)
              <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="patient">Pacjent:</label>
          <select name="patient">
            @foreach($patientsList as $patient)
              <option value="{{ $patient->id }}">{{ $patient->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="date">Data</label>
          <input type="text" class="form-control" name="date" />
        </div>

        <input type="submit" value="Dodaj" class="btn btn-primary" />
      </form>
  </div>
@endsection('content')
