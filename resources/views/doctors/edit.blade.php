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
    <h2>Edycja lekarza</h2>
      <form  action="{{ action('DoctorController@editStore') }}" method="post" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

        <input type="hidden" name="id" value="{{ $doctor->id }}"/>
        <input type="hidden" name="type" value="{{ $doctor->type }}"/>

        <div class="form-group">
          <label for="name">Imię i nazwisko</label>
          <input type="text" class="form-control" name="name" value="{{ $doctor->name }}"/>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" value="{{ $doctor->email }}"/>
        </div>

        <div class="form-group">
          <label for="phone">Telefon</label>
          <input type="text" class="form-control" name="phone" value="{{ $doctor->phone }}"/>
        </div>

        <div class="form-group">
          <label for="adress">Adres</label>
          <input type="text" class="form-control" name="adress" value="{{ $doctor->address }}"/>
        </div>

        <div class="form-group">
          <label for="pesel">PESEL</label>
          <input type="text" class="form-control" name="pesel" value="{{ $doctor->pesel }}"/>
        </div>

        <div class="form-group form-check">
          Specjalizacje <br />

            @foreach($specializations as $specialization)
              @if($doctor->specializations->contains($specialization->id))
                <input type="checkbox" class="form-check-input" name="specializations[]" value="{{ $specialization->id }}" checked/>
                <label class="form-check-label" for="specializations[]">{{ $specialization->name }}</label><br />
              @else
                <input type="checkbox" class="form-check-input" name="specializations[]" value="{{ $specialization->id }}" />
                <label class="form-check-label" for="specializations[]">{{ $specialization->name }}</label><br />
              @endif
            @endforeach
        </div>

        <div class="form-group">
          <label for="status"></label>
          @if($doctor->status == 'Active')
            Aktywny <input type="radio" class="form-control" name="status" value="Active" checked/>
            Nieaktywny <input type="radio" class="form-control" name="status" value="Inactive" />
          @else
            Aktywny <input type="radio" class="form-control" name="status" value="Active" />
            Nieaktywny <input type="radio" class="form-control" name="status" value="Inactive" checked/>
          @endif
        </div>


        <input type="submit" value="Zapisz zmiany" class="btn btn-primary" />
      </form>
  </div>
@endsection('content')
