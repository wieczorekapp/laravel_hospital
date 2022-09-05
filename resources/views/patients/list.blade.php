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
    <h2>Lekarze</h2>
    <table class="table table-hover">
     <thead>
       <tr>
         <th scope="col">Lp</th>
         <th scope="col">Name</th>
         <th scope="col">PESEL</th>
         <th scope="col">Email</th>
         <th scope="col">Telefon</th>
       </tr>
     </thead>
     <tbody>

     @foreach($patientsList as $patient)
       <tr>
         <th scope="row">{{ $loop->iteration }}</th>
         <td><a href="{{ URL::to('patients/' .$patient->id) }}">{{ $patient->name }}</a></td>
         <td>{{ $patient->pesel }}</td>
         <td>{{ $patient->email }}</td>
         <td>{{ $patient->phone }}</td>
       </tr>
     @endforeach

     </tbody>
    </table>
  </div>
@endsection('content')
