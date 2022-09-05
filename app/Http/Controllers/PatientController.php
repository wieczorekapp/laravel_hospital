<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    //pole do wstrzykniecia zaleznosci
    protected $userRepo;

//wstrzykniecie zaleznosci repozytorium do kontrolera --------------------------
    public function __construct(UserRepository $userRepo){
        $this->userRepo = $userRepo;
        $this->middleware('auth');
    }

//wyswitlenie wszystkich pacjentow ---------------------------------------------
    public function index(){
        $user = $this->userRepo->getAllPatients();

        //przekazanie do widoku danych
        return view('patients.list',['patientsList' => $user,
                                    'year'       => date('Y'),
                                    'title'      => 'moduł pacjenci'
                                    ]);
    }
//wyswitlenie szczegolowych informacji o konkretnym pacjencie ------------------
    public function show($id){
        $doctor = $this->userRepo->find($id);

        return view('patients.show',['patient'  => $doctor,
                                      'year'    => date('Y'),
                                      'title'   => 'moduł pacjenci'
                                   ]);
    }
}