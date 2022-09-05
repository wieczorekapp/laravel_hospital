<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Specialization;
use App\Repositories\UserRepository; //repozytorium zapytan zwiazanych z tabela User
use Illuminate\Routing\Controller as BaseController;


class DoctorController extends BaseController
{
    //pole do wstrzykniecia zaleznosci
    protected $userRepo;

//wstrzykniecie zaleznosci repozytorium do kontrolera --------------------------
    public function __construct(UserRepository $userRepo){
        $this->userRepo = $userRepo;
    }

//wyswitlenie wszystkich lekarzy -----------------------------------------------
    public function index(){
        $user = $this->userRepo->getAllDoctors();

        //przekazanie do widoku danych
        return $user->toJson();
    }

 //wyswitlenie szczegolowych informacji o konkretnym lakarzu --------------------
    public function show($id){
        $doctor = $this->userRepo->find($id);

        return $doctor->toJson();
    }

}
