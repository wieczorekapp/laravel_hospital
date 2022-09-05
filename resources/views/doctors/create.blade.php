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
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <h2>Dodawanie lekarza</h2>
      <form  action="{{ action('DoctorController@store') }}" method="post" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

        <div class="form-group">
          <label for="name">Imię i nazwisko</label>
          <input type="text" class="form-control" name="name" />
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" />
        </div>

        <div class="form-group">
          <label for="name">Hasło</label>
          <input type="password" class="form-control" name="password" />
        </div>

        <div class="form-group">
          <label for="phone">Telefon</label>
          <input type="text" class="form-control" name="phone" />
        </div>

        <div class="form-group">
          <label for="adress">Adres</label>
          <input type="text" class="form-control" name="adress" />
        </div>

        <div class="form-group">
          <label for="pesel">PESEL</label>
          <input type="text" class="form-control" name="pesel" />
        </div>

        <div class="form-group form-check">
          Specjalizacje <br />

            @foreach($specializations as $specialization)
              <input type="checkbox" class="form-check-input" name="specializations[]" value="{{ $specialization->id }}" />
              <label class="form-check-label" for="specializations[]">{{ $specialization->name }}</label><br />
            @endforeach
        </div>

        <input type="hidden" name="status" value="Active"/>
        <input type="hidden" name="type" value="doctor"/>

        <input type="submit" value="Dodaj" class="btn btn-primary" />
      </form>
  </div>
@endsection('content')
