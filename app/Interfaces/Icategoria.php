<?php

namespace App\Interfaces;
use Illuminate\Http\Request;

interface Icategoria
{
    public function getAll();
    public function getById($id);
    public function update(Request $requet);
  
    
    public function save(Request $request);

    // Adicione outros métodos conforme necessário
}