<?php

namespace App\Repositories;
//pobranie modelu dla tabeli Users
use App\Models\User;
//uzycie fasady DB do tworzenia zapytan przy pomocy Query Buildera
use DB;

//repozytorium dla tabeli user, dziedziczy po bazowym repozytorium
class UserRepository extends BaseRepository
{
//wstrzykniecie zaleznosci modelu do repozytorium ------------------------------
    public function __construct(User $model){
        $this->model = $model;
    }

//pobranie uzytkownikow bedacych lekarzami -------------------------------------
    public function getAllDoctors(){
        return $this->model->where('type', 'doctor')->get();
    }

//pobranie uzytkownikow bedacych pacjentami-------------------------------------
    public function getAllPatients(){
        return $this->model->where('type', 'patient')->get();
    }

//wykorzystanie fasady DB do napsiania 'surowego' kodu SQL ---------------------
    public function getDoctorsStatistics(){
        return DB::table('users')->select(DB::raw('count(*) as user_count, status'))->where('type','doctor')->groupBy('status')->get();
    }

//pobranie listy lekarzy posiadajacych dana Specjalizacje
    public function getDoctorsBySpecialization($id){
        return $this->model->where('type','doctor')->whereHas('specializations',
                    function($q) use ($id){
                        $q->where('specializations.id', $id);
                     })->orderBy('name','asc')->get();
    }

}
