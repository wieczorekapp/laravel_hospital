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
    <h2>Wizyty</h2>
    <a href="{{ URL::to('/visits/create') }}"><button type="button" class="btn btn-primary btn-lg">Dodaj wizytę</button><a/>
    <table class="table table-hover">
     <thead>
       <tr>
         <th scope="col">Lp</th>
         <th scope="col">Lekarz</th>
         <th scope="col">Pacjent</th>
         <th scope="col">Data</th>
       </tr>
     </thead>
     <tbody>

     @foreach($visitList as $visit)
       <tr>
         <th scope="row">{{ $loop->iteration }}</th>
         <td>{{ $visit->doctor->name }}</td>
         <td>{{ $visit->patient->name}}</td>
         <td>{{ $visit->date }}</td>
       </tr>
     @endforeach

     </tbody>
    </table>
  </div>
@endsection('content')
