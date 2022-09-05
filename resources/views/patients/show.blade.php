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
    <div class="card">
      <div class="card-header">
        {{ $patient->name }}
      </div>
      <div class="card-body">
        <table class="table table-hover">
          <tr>
            <td>PESEL</td>
            <td>{{ $patient->pesel }}</td>
          </tr>
          <tr>
            <td>Email</td>
            <td>{{ $patient->email }}</td>
          </tr>
          <tr>
            <td>Telefon</td>
            <td>{{ $patient->phone }}</td>
          </tr>
          <tr>
            <td>Adres</td>
            <td>{{ $patient->address }}</td>
          </tr>

        </table>
      </div>
    </div>
  </div>
@endsection('content')
