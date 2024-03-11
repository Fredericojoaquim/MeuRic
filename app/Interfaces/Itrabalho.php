<?php

namespace App\Interfaces;
use Illuminate\Http\Request;

interface Itrabalho
{
    public function getAll();
   // public function getAuto();
    //public function getMediado();
    public function getById($id);
    public function getAllByTitle();
    public function getAllByOrientador();
    public function getAllByCollection();
    public function getAllByCategory();
    public function getLastFiveRecords();
    public function getAllTitlebyColection($id_colection);
    public function aprovar($id);
    public function regeitar($id,$mensagem);
    public function pesquisar($title);
  
    
    public function saveAuto(Request $request);
    public function saveMediado(Request $request);
    public function getAllAuto();
    public function getAllMediado();

    public function updateAuto(Request $request);

    //estatisticas
    public function countTcc();
    public function countArtigoCientifico();
    

    // Adicione outros métodos conforme necessário
}