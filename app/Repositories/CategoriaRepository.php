<?php

namespace App\Repositories;

use App\Interfaces\Icategoria;
use App\Models\Categoria; // Supondo que você tenha um modelo chamado Example
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoriaRepository implements Icategoria
{
    public function getAll()
    {
        return Categoria::all();
    }

    public function getById($id)
    {
        return Categoria::find($id);
    }

    public function save(Request $request)
    {
        $c=new Categoria();
        $c->descricao=$request->descricao;
        $c->save();
        return true;
    }

    public function update(Request $request)
    {
        $s=['descricao'=> addslashes($request->descricao)];
        $t=Categoria::findOrFail(addslashes($request->id));
        $t->update($s);
        return true;
    }



    // Implemente outros métodos conforme necessário
}