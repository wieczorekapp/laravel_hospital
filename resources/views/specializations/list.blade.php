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
    <h2>Specjalizacje</h2>
    <a href="{{ URL::to('/specializations/create') }}"><button type="button" class="btn btn-primary btn-lg">Dodaj specjalizacje</button><a/>
    <table class="table table-hover">
     <thead>
       <tr>
         <th scope="col">Lp</th>
         <th scope="col">Nazwa specializacji</th>
       </tr>
     </thead>
     <tbody>

     @foreach($specialList as $specialization)
       <tr>
         <th scope="row">{{ $loop->iteration }}</th>
         <td><a href="{{ URL::to('doctors/specializations/' .$specialization->id) }}">{{ $specialization->name }}</a></td>
       </tr>
     @endforeach

     </tbody>
    </table>
  </div>
@endsection('content')
