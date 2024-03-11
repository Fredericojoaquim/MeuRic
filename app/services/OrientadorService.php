<?php

namespace App\Services;

use App\Interfaces\Iorientador;
use App\Repositories\OrientadorRepository;
use Illuminate\Http\Request;


class OrientadorService
{
    protected  $db;

    public function __construct(OrientadorRepository $orientador)
    {
        $this->db=$orientador;
    }

    public function getAll()
    {
        return $this->db->getAll();
    }

    public function getById($id)
    {
        return $this->db->getById($id);
    }

    public function save(Request $request)
    {
        return $this->db->save($request);

    }

    public function update(Request $request)
    {
        return $this->db->update($request);
    }



    // Adicione outros métodos conforme necessário
}