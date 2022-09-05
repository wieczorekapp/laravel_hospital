<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Specialization;
use App\Repositories\UserRepository; //repozytorium zapytan zwiazanych z tabela User
use Illuminate\Support\Facades\Auth; //uzycie middleware do filtrowania zadan http, tu logowania

class DoctorController extends Controller
{
    //pole do wstrzykniecia zaleznosci
    protected $userRepo;

//wstrzykniecie zaleznosci repozytorium do kontrolera --------------------------
    public function __construct(UserRepository $userRepo){
        $this->middleware('auth');
        $this->userRepo = $userRepo;
    }

//wyswitlenie wszystkich lekarzy -----------------------------------------------
    public function index(){
        if(Auth::user()->type != 'doctor' && Auth::user()->type != 'admin'){
            return redirect()->route('login');
        }

        $user = $this->userRepo->getAllDoctors();
        $statistics = $this->userRepo->getDoctorsStatistics();

        //przekazanie do widoku danych
        return view('doctors.list',['doctorList' => $user,
                                    'year'       => date('Y'),
                                    'title'      => 'moduł lekarze',
                                    'statistics' => $statistics
                                    ]);
    }

//wyswitlenie szczegolowych informacji o konkretnym lakarzu --------------------
    public function show($id){
        if(Auth::user()->type != 'doctor' && Auth::user()->type != 'admin'){
            return redirect()->route('login');
        }

        $doctor = $this->userRepo->find($id);

        return view('doctors.show',['doctor'  => $doctor,
                                    'year'    => date('Y'),
                                    'title'   => 'moduł lekarze'
                                    ]);
    }

//wyswietlenie formularza umozliwiajacego dodanie lekarza  ---------------------
    public function create(){
        if(Auth::user()->type != 'doctor' && Auth::user()->type != 'admin'){
            return redirect()->route('login');
        }

        $specializations = Specialization::all();

        //wyswietlenie formularza
        return view('doctors.create',['specializations' => $specializations,
                                      'year'    => date('Y'),
                                      'title'   => 'moduł lekarze'
                                    ]);
    }

//dodanie lekarza do bazu danych, zczytanie danych z formularza ----------------
    public function store(Request $request){
        if(Auth::user()->type != 'doctor' && Auth::user()->type != 'admin'){
            return redirect()->route('login');
        }

        //walidacja danych z formularza
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'phone' => 'required',
            'adress' => 'required',
            'pesel' => 'required'
        ]);

        //utworzenie obiektu modelu dla tabeli, zapis danych od pol obiektu
        $doctor = new User;
        $doctor->name     = $request->input('name');
        $doctor->email    = $request->input('email');
        $doctor->password = bcrypt($request->input('password'));
        $doctor->address  = $request->input('adress');
        $doctor->pesel    = $request->input('pesel');
        $doctor->phone    = $request->input('phone');
        $doctor->type     = $request->input('type');
        $doctor->status   = $request->input('status');
        $doctor->save();

        //dokananie zapsiu specjalizacji jakie posiada dany lekarz
        $doctor->specializations()->sync($request->input('specializations'));

        //wywolanie listy wszytstkich lekarzy
        return redirect()->action('DoctorController@index');
    }

//wywolanie formularza do zmodyfikowania danych o lekarzu --------------------------
    public function edit($id){
        if(Auth::user()->type != 'doctor' && Auth::user()->type != 'admin'){
            return redirect()->route('login');
        }

        $doctor = $this->userRepo->find($id);
        $specializations = Specialization::all();

        //przekierunkowanie do podanego routingu
        return view('doctors.edit',['specializations' => $specializations,
                                    'doctor'          => $doctor,
                                    'year'            => date('Y'),
                                    'title'           => 'moduł lekarze'
                                    ]);
    }

//modyfikowanie informacji o uzytkowniku o padanym id --------------------------
    public function editStore(Request $request){
        if(Auth::user()->type != 'doctor' && Auth::user()->type != 'admin'){
            return redirect()->route('login');
        }

        //pobranie danych o uzytkowniku, ktorego chcemy edytowac
        $doctor = User::find($request->input('id'));

        //wprowadzenie zmian do pol wyszukanego obiektu,
        //zczytanie danych przkazanych z formularza
        $doctor->name     = $request->input('name');
        $doctor->email    = $request->input('email');
        $doctor->address  = $request->input('adress');
        $doctor->pesel    = $request->input('pesel');
        $doctor->phone    = $request->input('phone');
        $doctor->status   = $request->input('status');
        $doctor->type     = $request->input('type');
        $doctor->save();

        //dokananie zapsiu specjalizacji jakie posiada dany lekarz
        $doctor->specializations()->sync($request->input('specializations'));

        //przekierunkowanie do podanego routingu
        return redirect()->action('DoctorController@index');
    }

//usuwanie uzytkownika o padanym id --------------------------------------------
    public function delete($id){
        if(Auth::user()->type != 'doctor' && Auth::user()->type != 'admin'){
            return redirect()->route('login');
        }

        $this->userRepo->delete($id);

        //przekierunkowanie do podanego routingu
        return redirect()->action('DoctorController@index');
    }

//wyswitlenie lekarzy posiadajacych dana specjalizacje -------------------------
    public function listBySpecialization($id){
        if(Auth::user()->type != 'doctor' && Auth::user()->type != 'admin'){
            return redirect()->route('login');
        }

        $user       = $this->userRepo->getDoctorsBySpecialization($id);
        $statistics = $this->userRepo->getDoctorsStatistics();

        //przekazanie do widoku danych
        return view('doctors.list',['doctorList' => $user,
                                    'year'       => date('Y'),
                                    'title'      => 'moduł lekarze',
                                    'statistics' => $statistics
                                    ]);
    }
}
