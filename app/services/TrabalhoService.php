<?php

namespace App\Services;

use App\Interfaces\Itrabalho;
use App\Repositories\TrabalhoRepository;
use Illuminate\Http\Request;


class TrabalhoService
{
    protected  $db;

    public function __construct(Itrabalho $trab)
    {
        $this->db= $trab;
    }

    public function getAll()
    {
        return $this->db->getAll();
    }

    public function getById($id)
    {
        return $this->db->getById($id);
    }

    

    public function saveAuto(Request $request)
    {
        return $this->db->saveAuto($request);
    }

    public function saveMediado(Request $request)
    {
        return $this->db->saveMediado($request);
    }

    public function getAllAuto()
    {
        return $this->db->getAllAuto();

    }

    public function getAllMediado()
    {
        return $this->db->getAllMediado();
    }

    public function getAllByTitle()
    {
        return $this->db->getAllByTitle();
    }
    //estatistsica
    public function countTcc()
    {
        return $this->db->countTcc();

    }
    public function countArtigoCientifico()
    {
        return $this->db->countArtigoCientifico();
    }

    public function getLastFiveRecords()
    {
        return $this->db->getLastFiveRecords();

    }

    public function getAllByCollection()
    {
        return $this->db->getAllByCollection();
    }
 

    public function getAllTitlebyColection($id_colection)
    {
        return $this->db->getAllTitlebyColection($id_colection);
    }


    public function aprovar($id)
    {
        return $this->db->aprovar($id);
    }
    public function regeitar($id,$mensagem)
    {
        return $this->db->regeitar($id,$mensagem);
    }

    public function pesquisar($title)
    {
        return $this->db->pesquisar($title);
    }
    public function updateAuto(Request $request)
    {
        return $this->db->updateAuto($request);
    }
    public function updatemediado(Request $request)
    {
        return $this->db->updatemediado($request);
    }



    // Adicione outros métodos conforme necessário
}