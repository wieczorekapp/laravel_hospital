<?php

namespace App\Repositories;
//wykorzystanie do operacji na bazie obiektu Eloquent\Model
use Illuminate\Database\Eloquent\Model;

//podstawowe operacje wykonywane na bazie danych
abstract class BaseRepository
{
    //utworzenie pola do przekazywanie modelu do repozytorium
    protected $model;

//uniwersalna metoda pobierajaca tabele z bazy danych, domyslnie wszystkie kolumny, ktore moze pobrac przez model
    public function getAll($columns = array('*')){
        return $this->model->get($columns);
    }

//uniwersalna metoda dodajaca rekord do bazy danych ----------------------------
    public function create($data){
        return $this->model->create($data);
    }

//uniwersalna metoda aktualizujaca rekord o danym id ---------------------------
    public function update($data, $id){
        return $this->model->where('id', '=', $id)->update($data);
    }

//uniwersalna metoda usuwajaca rekord o danym id--------------------------------
    public function delete($id){
        return $this->model->destroy($id);
    }

//uniwersalna metoda pobierajaca rekord o danym id------------------------------
    public function find($id){
        return $this->model->find($id);
    }

}
