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
    <a href="{{ URL::to('/doctors/create') }}"><button type="button" class="btn btn-primary btn-lg">Dodaj lekarza</button></a>

    <table class="table table-hover">
     <thead>
       <tr>
         <th scope="col">Lp</th>
         <th scope="col">Imię i nazwisko</th>
         <th scope="col">Email</th>
         <th scope="col">Telefon</th>
         <th scope="col">Specjalizacje</th>
         <th scope="col">Status</th>
         <th scope="col">Operacje</th>
       </tr>
     </thead>
     <tbody>

     @foreach($doctorList as $doctor)
       <tr>
         <th scope="row">{{ $loop->iteration }}</th>
         <td><a href="{{ URL::to('doctors/' .$doctor->id) }}">{{ $doctor->name }}</a></td>
         <td>{{ $doctor->email }}</td>
         <td>{{ $doctor->phone }}</td>
         <td>
           <ul>
             @foreach($doctor->specializations as $specialization)
              <li>{{ $specialization->name }}</li>
             @endforeach
         </ul>
        </td>
        <td>{{ $doctor->status }}</td>
        <td>
          <a class="btn btn-primary btn-sm" href="{{ URL::to('doctors/delete/' .$doctor->id) }}" role="button" onclick="return confirm('Czy napewno chcesz usunąć?')">Usuń</a>
          <a class="btn btn-primary btn-sm" href="{{ URL::to('doctors/edit/' .$doctor->id) }}" role="button">Edytuj</a>
       </tr>
     @endforeach

     </tbody>
    </table>
    @foreach($statistics as $stat)
      @if($stat->status == 'Active')
        Liczba dostępnych lekarzy: <strong>{{ $stat->user_count }}</strong><br />
      @endif
      @if($stat->status == 'Inactive')
        Liczba niedostępnych lekarzy: <strong>{{ $stat->user_count }}</strong><br />
      @endif
    @endforeach
  </div>
@endsection('content')
