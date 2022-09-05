<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Repositories\SpecializationRepository;
use Illuminate\Support\Facades\Auth;

class SpecializationController extends Controller
{
    //pole do wstrzykniecia zaleznosci
    protected $specialRepo;

//wstrzykniecie zaleznosci repozytorium do kontrolera --------------------------
    public function __construct(SpecializationRepository $specialRepo){
        $this->specialRepo = $specialRepo;
        $this->middleware('auth');
    }

//wyswitlenie wszystkich lekarzy -----------------------------------------------
    public function index(){
        $special = $this->specialRepo->getAll();

        //przekazanie do widoku danych
        return view('specializations.list',['specialList' => $special,
                                            'year'        => date('Y'),
                                            'title'       => 'moduł specjalizacje'
                                           ]);
    }

//wyswitlenie formularza do dodawania specjalizacji ----------------------------
    public function create(){
        //wuwolanie widoku z formularzem
        return view('specializations.create',['year'  => date('Y'),
                                              'title' => 'moduł specjalizacje'
                                             ]);
    }

//dodanie specjalizacji do bazu danych, zczytanie danych z formularza ----------
    public function store(Request $request){
        //utworzenie obiektu modelu dla tabeli, zapis danych, przekierunkowanie
        $specialization         = new Specialization;
        $specialization->name   = $request->input('name');
        $specialization->save();

        return redirect()->action('SpecializationController@index');
    }
}
