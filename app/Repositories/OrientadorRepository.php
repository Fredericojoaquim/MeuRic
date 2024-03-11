<?php

namespace App\Repositories;

use App\Interfaces\Iorientador;
use App\Models\Orientador; 
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Helper\Helper;

class OrientadorRepository implements Iorientador
{
    public function getAll()
    {
        return Orientador::all();
    }

    public function getById($id)
    {
        return Orientador::find($id);
    }

    public function save(Request $request)
    {
        $h=new Helper();
        $o=new Orientador();
        $o->nome=$h->clear($request->nome);
        $o->save();
        return true;
    }

    public function update(Request $request)
    {
        $s=['nome'=> addslashes($request->nome)];
        $o=Orientador::findOrFail(addslashes($request->id));
        return $o->update($s);
        
    }



    // Implemente outros métodos conforme necessário
}