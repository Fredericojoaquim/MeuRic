<?php

namespace App\Http\Helper;

use App\Interfaces\Icategoria;
use App\Models\Categoria; // Supondo que você tenha um modelo chamado Example
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\TrabalhoAutor;

class Helper 
{

    function separarStringPorVirgula($string) {
        $arraySeparado = explode(',', $string);
        return $arraySeparado;
    }

    public function clear($input){

        $texto=addslashes($input);
        $texto=htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
        return $texto;
    }


    public function buscarAutoresPorNome($nomeAutor)
    {
       
        $utores=[];
        foreach($nomeAutor as $nome)
        {
            $autoresEncontrados = DB::table('autores')
            ->where('nome', '=', trim($nome))
            ->select('autores.id as autor_id')
            ->get();
            //$utores[]=$autoresEncontrados;
            array_push($utores, $autoresEncontrados);
        }

        
        
        return  $utores;
    }


    public function atualizarAutoresTrabalho($trabalhoId,$novosAutores)
    {
        
    // Recupera os IDs dos novos autores 
   // $novosAutores = [1, 2, 3]; // Exemplo de novos IDs de autores

    // Atualiza a tabela intermediária (trabalhoautor)
    DB::table('trabalhoautor')
        ->where('trabalho_id', $trabalhoId)
        ->delete(); // Remove todos os registros existentes para esse trabalho

    // Insere os novos registros para os novos autores
    $dadosInsercao = [];
    foreach ($novosAutores as $autorId) {
        $t=new TrabalhoAutor();
        $t->trabalho_id=intval($trabalhoId);
        $t->autor_id=intval($autorId->first()->autor_id);
        $t->save();
    }

   
    return true;
    }




    public function nomesAutoresPorTrabalho($trabalhoId)
{
    $nomesAutores = DB::table('autores')
        ->join('trabalhoautor', 'autores.id', '=', 'trabalhoautor.autor_id')
        ->where('trabalhoautor.trabalho_id', $trabalhoId)
        ->pluck('autores.nome')
        ->implode(', ');
        return  $nomesAutores;
}


}