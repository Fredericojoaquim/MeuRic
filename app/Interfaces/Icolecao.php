<?php

namespace App\Interfaces;
use Illuminate\Http\Request;

interface Icolecao
{
    public function getAll();
    public function getById($id);
  
    
    public function save(Request $request);

    public function update(Request $request);

    // Adicione outros métodos conforme necessário
}