<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;
use App\Repositories\VisitRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class VisitController extends Controller
{
    //pole do wstrzykniecia zaleznosci
    protected $visitRepo;

//wstrzykniecie zaleznosci repozytorium do kontrolera --------------------------
    public function __construct(VisitRepository $visitRepo){
        $this->visitRepo = $visitRepo;
        $this->middleware('auth');
    }

//wyswitlenie wszystkich lekarzy -----------------------------------------------
    public function index(){
        $visit = $this->visitRepo->getAll();

        //przekazanie do widoku danych
        return view('visits.list',['visitList' => $visit,
                                    'year'      => date('Y'),
                                    'title'     => 'moduł wizyt'
                                  ]);
    }
//wyswitlenie formularza do dodania wizyty -------------------------------------
    public function create(UserRepository $userRepo){
        $doctors  = $userRepo->getAllDoctors();
        $patients = $userRepo->getAllPatients();
        //przekazanie do widoku danych
        return view('visits.create',['doctorsList'   => $doctors,
                                    'patientsList' => $patients,
                                    'year'         => date('Y'),
                                    'title'        => 'moduł wizyt'
                                    ]);
    }

//zapisanie danych z formulrza do bazy danych ----------------------------------
    public function store(Request $request){
        $visit              = new Visit;
        $visit->doctor_id   = $request->input('doctor');
        $visit->patient_id  = $request->input('patient');
        $visit->date        = $request->input('date');
        $visit->save();

        //przekazanie do widoku danych
        return redirect()->action('VisitController@index');
    }
}
