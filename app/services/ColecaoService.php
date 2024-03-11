<?php

namespace App\Services;

use App\Interfaces\Icolecao;
use App\Repositories\ColecaoRepository;
use Illuminate\Http\Request;


class ColecaoService
{
    protected  $db;

    public function __construct(Icolecao $cat)
    {
        $this->db= $cat;
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