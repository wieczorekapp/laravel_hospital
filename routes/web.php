<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Routing stworzony przy tworzeniu atuentykacji dla uzytkownikow
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Routing wyswietlajacy standardowy widok powitalny
Route::get('/', function () {
    return view('welcome');
});

//==============================================================================
// ROUTING DLA KONTROLERA DOCTOR ===============================================
//==============================================================================
//Routing wywolujacy kontroler dla listy uzytkowinkow bedacych lekarzami
Route::get('/doctors', 'DoctorController@index');

//Routing wywolujacy kontroler do ekranu z formularzem dodania lekarza
Route::get('/doctors/create', 'DoctorController@create');

//Routing wywolujacy kontroler do ekranu z formularzem dodania lekarza
Route::post('/doctors', 'DoctorController@store');

//Routing wywolujacy dla wyswietlenia konkretnego lekarza, przkazanie jego id
Route::get('/doctors/{id}', 'DoctorController@show');

//Routing wywolujacy kontroler do modyfikowania uzytkownika, do zpisu do bazy dancyh
Route::post('/doctors/edit/', 'DoctorController@editStore');

//Routing wywolujacy kontroler do wyswietlenia formularza do edycji uzytkownika
Route::get('/doctors/edit/{id}', 'DoctorController@edit');

//Routing wywolujacy dla wyswietlenia listy lekarzy z dana specjalizacja
Route::get('/doctors/specializations/{id}', 'DoctorController@listBySpecialization');

//Routing wywolujacy kontroler do usuniecia lekarza
Route::get('/doctors/delete/{id}', 'DoctorController@delete');

//==============================================================================
// ROUTING DLA KONTROLERA SPECIALIZATION =======================================
//==============================================================================
//Routing wywolujacy kontroler dla listy specializacji
Route::get('/specializations', 'SpecializationController@index');

//Routing wywolujacy kontroler dla ekranu dodawania specjalizacji
Route::get('/specializations/create', 'SpecializationController@create');

//Routing wywolujacy zapisanie danych w bazie danych
Route::post('/specializations', 'SpecializationController@store');

//==============================================================================
// ROUTING DLA KONTROLERA VISIT ================================================
//==============================================================================
//Routing wywolujacy kontroler dla listy wizyt
Route::get('/visits', 'VisitController@index');

//Routing wywolujacy kontroler dla listy wizyt
Route::get('/visits/create', 'VisitController@create');

//Routing wywolujacy kontroler dla listy wizyt
Route::post('/visits', 'VisitController@store');

//==============================================================================
// ROUTING DLA KONTROLERA PATIENT ==============================================
//==============================================================================
//Routing wywolujacy kontroler dla listy uzytkowinkow bedacych pacjentammi
Route::get('/patients', 'PatientController@index');

//Routing wywolujacy dla wyswietlenia konkretnego pacjenta, przkazanie jego id
Route::get('/patients/{id}', 'PatientController@show');
