<?php

namespace App\Repositories;

use App\Interfaces\Icolecao;
use App\Models\Colecao; // Supondo que você tenha um modelo chamado Example
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ColecaoRepository implements Icolecao
{
    public function getAll()
    {
        return Colecao::all();
    }

    public function getById($id)
    {
        return Colecao::find($id);
    }

    public function save(Request $request)
    {
        $c=new Colecao();
        $c->descricao=$request->descricao;
        $c->save();
        return true;
    }


    public function update(Request $request)
    {
        $s=['descricao'=> addslashes($request->descricao)];
        $t=Colecao::findOrFail(addslashes($request->id));
        $t->update($s);
        return true;
    }



    // Implemente outros métodos conforme necessário
}