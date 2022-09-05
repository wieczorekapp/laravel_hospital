<?php

namespace App\Repositories;
//pobranie modelu dla tabeli Users
use App\Models\Specialization;

//repozytorium dla tabeli user, dziedziczy po bazowym repozytorium
class SpecializationRepository extends BaseRepository
{
//wstrzykniecie zaleznosci modelu do repozytorium ------------------------------
    public function __construct(Specialization $model){
        $this->model = $model;
    }

}
