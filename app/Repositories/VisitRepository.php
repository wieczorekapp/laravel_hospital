<?php

namespace App\Repositories;
//pobranie modelu dla tabeli Users
use App\Models\Visit;

//repozytorium dla tabeli user, dziedziczy po bazowym repozytorium
class VisitRepository extends BaseRepository
{
//wstrzykniecie zaleznosci modelu do repozytorium ------------------------------
    public function __construct(Visit $model){
        $this->model = $model;
    }

}
