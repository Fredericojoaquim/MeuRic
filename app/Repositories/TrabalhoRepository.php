<?php

namespace App\Repositories;

use App\Interfaces\Itrabalho;
use App\Models\Trabalho; // Supondo que você tenha um modelo chamado Example
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Metadado;
use App\Models\Autor;
use App\Models\Orientador;
use App\Models\Notificacao;
use App\Models\TrabalhoAutor;
use App\Http\Helper\Helper;
use Illuminate\Support\Facades\Auth;
use App\Rules\UniqueOrientador;

class TrabalhoRepository implements Itrabalho
{

    public function getLastFiveRecords()
    {
        $p=DB::table('trabalhos')

        ->join('metadados','metadados.trabalho_id','=','trabalhos.id')
        ->join('categorias','categorias.id','=','trabalhos.categoria_id')
        ->where('trabalhos.estado','=','aprovado')
        ->orderBy('metadados.titulo','asc')
        ->orderBy('created_at', 'desc') // Substitua 'created_at' pelo nome da sua coluna de data
        ->select('trabalhos.*','trabalhos.id as codigo','metadados.resumo as resumo','metadados.titulo as titulo','categorias.descricao as categoria')
        ->take(5)
        ->get();
        return $p;
    }

    
    public function getAll()
    {


        $p=DB::table('trabalhos')
        ->join('categorias','categorias.id','=','trabalhos.categoria_id')
        ->join('colecoes','colecoes.id','=','trabalhos.colecao_id')
        ->join('metadados','metadados.trabalho_id','=','trabalhos.id')

        ->select('trabalhos.*','trabalhos.id as codigo','categorias.descricao as categoria','colecoes.descricao as colecao', 'metadados.*')
        ->get();
        return $p;
    }

    public function getById($id)
    {
        $p=DB::table('trabalhos')
        ->join('categorias','categorias.id','=','trabalhos.categoria_id')
        ->join('colecoes','colecoes.id','=','trabalhos.colecao_id')
        ->join('metadados','metadados.trabalho_id','=','trabalhos.id')
        ->join('orientadores','orientadores.id','=','metadados.orientador_id')
         ->where('trabalhos.id','=',$id)
        ->select('trabalhos.*','trabalhos.id as codigo','categorias.descricao as categoria','categorias.id as categoria_id','orientadores.nome as orientador','orientadores.id as orientador_id','colecoes.descricao as colecao','colecoes.id as colecao_id', 'metadados.*','metadados.id as metadado_id')
        ->get()->first();

        return  $p;
    }

    

    public function saveAuto(Request $request)
    {
        
        $help=new Helper();
        $t=new Trabalho();
        $n=new Notificacao();
        $t->user_id=Auth::user()->id;//alterar
        $t->categoria_id=$help->clear($request->categoria);
        $t->colecao_id=$help->clear($request->colecao);
        $t->estado="pendente";
        $t->tipo="Auto-arquivamento";

        if($request->file('arquivo')->isValid()){
            //pegar o tamanho do ficheiro e converte-lo em MB
            $filesize = $request->file('arquivo')->getSize();
            $size = number_format($filesize / 1048576,2);
           
            if($request->hasFile('arquivo')!=null){
                $requestarquivo = $request->arquivo;
                $extensao = $requestarquivo->extension();
                $nomearquivo = md5($requestarquivo->getClientOriginalName().strtotime("now")).".".$extensao;
                $request->arquivo->move(public_path('trabalhos'),$nomearquivo);
                $t->caminho = $nomearquivo;
            }else{
                return false;
            }
        }else{
            return false;
        }
        
        //salvando o trabalho
        $t->save();
        //salvando orientador
      /* $orientador=new Orientador();
        $orientador->nome=$help->clear($request->orientador);
        $orientador->save();
        //salvando autor*/
        $autores=$help->separarStringPorVirgula($request->autor);
        foreach($autores as $a)
        {
            $autor=new Autor();
            $autor->nome=$a;
            $autor->save();

             //salvando os dados na tabela trabalho-autor
             $tautor=new TrabalhoAutor();
             $tautor->autor_id= $autor->id;
             $tautor->trabalho_id=$t->id;
             $tautor->save();

        }
        //salvando o metadados
        $m=new Metadado();
        $m->titulo=$help->clear($request->titulo);
     
        $m->orientador_id=$help->clear($request->orientador);
        $m->lingua=$help->clear($request->lingua);
        $m->data_criacao=date('y-m-d');
        $m->local=$help->clear($request->local);
        $m->palavra_chave=$help->clear($request->palavra);
        $m->formato= $extensao;
        $m->resumo=$help->clear($request->resumo);
        $m->fontes=$help->clear($request->fontes);
        $m->tamanho=$size;//rever
        $m->trabalho_id=$t->id;
        $m->save();

        //salvar a notificacao
        $n->trabalho_id=$t->id;
        $n->user_id=Auth::user()->id;
        $n->estado='pendente';
        $n->descricao='Novo trabalho submetido aguardando a sua aprovação';
        $n->tipo='Bibliotecário';
        $n->save();

        return true;



    }


    public function updateAuto(Request $request)
    {
        //atualizar trabalho

        $help=new Helper();
        $t=new Trabalho();
      
        $caminho="";
        if($request->file('arquivo')->isValid()){
            //pegar o tamanho do ficheiro e converte-lo em MB
            $filesize = $request->file('arquivo')->getSize();
            $size = number_format($filesize / 1048576,2);
           
            if($request->hasFile('arquivo')!=null){
                $requestarquivo = $request->arquivo;
                $extensao = $requestarquivo->extension();
                $nomearquivo = md5($requestarquivo->getClientOriginalName().strtotime("now")).".".$extensao;
                $request->arquivo->move(public_path('trabalhos'),$nomearquivo);
                $caminho = $nomearquivo;
            }else{
                return false;
            }
        }else{
            return false;
        }

        $s=[
            'categoria_id'=>$help->clear($request->categoria),
            'colecao_id'=>$help->clear($request->colecao),
            'caminho'=>$caminho,
            'estado'=>'pendente'
        ];
        $t=Trabalho::findOrFail(addslashes($request->trabalho_id));
        $t->update($s);

          //metadados
          $s=[
            'titulo'=>$help->clear($request->titulo),
            'orientador_id'=>$help->clear($request->orientador),
            'lingua'=>$help->clear($request->lingua),
            'data_criacao'=>date('y-m-d'),
            'local'=>$help->clear($request->local),
            'palavra_chave'=>$help->clear($request->palavra),
            'formato'=>$extensao,
            'resumo'=>$help->clear($request->resumo),
            'fontes'=>$help->clear($request->fontes),
            'tamanho'=>$size,
            'trabalho_id'=>addslashes($request->trabalho_id),
            ];
            $m=Metadado::findOrFail(addslashes($request->metadado_id));
            $m->update($s);
    

        //alterar autores*/
        $autores=$help->separarStringPorVirgula($request->autor);
        $autores_id=$help->buscarAutoresPorNome($autores);
       // dd($autores_id);
        if(count($autores_id)==0)
        {
            //novos autores
            $autores=$help->separarStringPorVirgula($request->autor);
            foreach($autores as $a)
            {
                $autor=new Autor();
                $autor->nome=$a;
                $autor->save();

                //salvando os dados na tabela trabalho-autor
                $tautor=new TrabalhoAutor();
                $tautor->autor_id= $autor->id;
                $tautor->trabalho_id=$t->id;
                $tautor->save();
            }
            return true;
        }else{

            if(!$help->atualizarAutoresTrabalho(addslashes($request->trabalho_id),$autores_id))
            {
                return 2;
            }
            return true;
        }

      
        return true;
    }



    //update mediado
    public function updatemediado(Request $request)
    {
        //atualizar trabalho

        $help=new Helper();
        $t=new Trabalho();
      
        $caminho="";
        if($request->file('arquivo')->isValid()){
            //pegar o tamanho do ficheiro e converte-lo em MB
            $filesize = $request->file('arquivo')->getSize();
            $size = number_format($filesize / 1048576,2);
           
            if($request->hasFile('arquivo')!=null){
                $requestarquivo = $request->arquivo;
                $extensao = $requestarquivo->extension();
                $nomearquivo = md5($requestarquivo->getClientOriginalName().strtotime("now")).".".$extensao;
                $request->arquivo->move(public_path('trabalhos'),$nomearquivo);
                $caminho = $nomearquivo;
            }else{
                return false;
            }
        }else{
            return false;
        }

        $s=[
            'categoria_id'=>$help->clear($request->categoria),
            'colecao_id'=>$help->clear($request->colecao),
            'caminho'=>$caminho,
            'estado'=>'aprovado'
        ];
        $t=Trabalho::findOrFail(addslashes($request->trabalho_id));
        $t->update($s);

          //metadados
          $s=[
            'titulo'=>$help->clear($request->titulo),
            'orientador_id'=>$help->clear($request->orientador),
            'lingua'=>$help->clear($request->lingua),
            'data_criacao'=>date('y-m-d'),
            'local'=>$help->clear($request->local),
            'palavra_chave'=>$help->clear($request->palavra),
            'formato'=>$extensao,
            'resumo'=>$help->clear($request->resumo),
            'fontes'=>$help->clear($request->fontes),
            'tamanho'=>$size,
            'trabalho_id'=>addslashes($request->trabalho_id),
            ];
            $m=Metadado::findOrFail(addslashes($request->metadado_id));
            $m->update($s);
    

        //alterar autores*/
        $autores=$help->separarStringPorVirgula($request->autor);
        $autores_id=$help->buscarAutoresPorNome($autores);
       // dd($autores_id);
        if(count($autores_id)==0)
        {
            //novos autores
            $autores=$help->separarStringPorVirgula($request->autor);
            foreach($autores as $a)
            {
                $autor=new Autor();
                $autor->nome=$a;
                $autor->save();

                //salvando os dados na tabela trabalho-autor
                $tautor=new TrabalhoAutor();
                $tautor->autor_id= $autor->id;
                $tautor->trabalho_id=$t->id;
                $tautor->save();
            }
            return true;
        }else{

            if(!$help->atualizarAutoresTrabalho(addslashes($request->trabalho_id),$autores_id))
            {
                return 2;
            }
            return true;
        }

      
        return true;
    }


    



    public function saveMediado(Request $request)
    {
        $help=new Helper();
        $t=new Trabalho();
        $t->user_id=Auth::user()->id;//alterar
        $t->categoria_id=$help->clear($request->categoria);
        $t->colecao_id=$help->clear($request->colecao);
        $t->estado="aprovado";
        $t->tipo="Arquivamento Mediado";

        if($request->file('arquivo')->isValid()){
            //pegar o tamanho do ficheiro e converte-lo em MB
            $filesize = $request->file('arquivo')->getSize();
            $size = number_format($filesize / 1048576,2);
           
            if($request->hasFile('arquivo')!=null){
                $requestarquivo = $request->arquivo;
                $extensao = $requestarquivo->extension();
                $nomearquivo = md5($requestarquivo->getClientOriginalName().strtotime("now")).".".$extensao;
                $request->arquivo->move(public_path('trabalhos'),$nomearquivo);
                $t->caminho = $nomearquivo;
            }else{
                return false;
            }
        }else{
            return false;
        }
        
        //salvando o trabalho
        $t->save();
        //salvando orientador
        $autores=$help->separarStringPorVirgula($request->autor);
        foreach($autores as $a)
        {
            $autor=new Autor();
            $autor->nome=$a;
            $autor->save();

             //salvando os dados na tabela trabalho-autor
             $tautor=new TrabalhoAutor();
             $tautor->autor_id= $autor->id;
             $tautor->trabalho_id=$t->id;
             $tautor->save();

        }
        //salvando o metadados
        $m=new Metadado();
        $m->titulo=$help->clear($request->titulo);
     
        $m->orientador_id=$help->clear($request->orientador);
        $m->lingua=$help->clear($request->lingua);
        $m->data_criacao=date('y-m-d');
        $m->local=$help->clear($request->local);
        $m->palavra_chave=$help->clear($request->palavra);
        $m->formato= $extensao;
        $m->resumo=$help->clear($request->resumo);
        $m->fontes=$help->clear($request->fontes);
        $m->tamanho=$size;//rever
        $m->trabalho_id=$t->id;
        $m->save();
        return true;
    }


    public function getAllMediado()
    {
        $p=DB::table('trabalhos')
        ->join('categorias','categorias.id','=','trabalhos.categoria_id')
        ->join('colecoes','colecoes.id','=','trabalhos.colecao_id')
        ->join('metadados','metadados.trabalho_id','=','trabalhos.id')
        ->where('trabalhos.tipo','=','Arquivamento Mediado')
        ->select('trabalhos.*','trabalhos.id as codigo','categorias.descricao as categoria','colecoes.descricao as colecao', 'metadados.*')
        ->get();
        return $p;

    }


    public function getAllAuto()
    {
        $p=DB::table('trabalhos')
        ->join('categorias','categorias.id','=','trabalhos.categoria_id')
        ->join('colecoes','colecoes.id','=','trabalhos.colecao_id')
        ->join('metadados','metadados.trabalho_id','=','trabalhos.id')
        ->where('trabalhos.tipo','=','Auto-arquivamento')
        ->where('trabalhos.user_id','=',Auth::user()->id)
        ->select('trabalhos.*','trabalhos.id as codigo','categorias.descricao as categoria','colecoes.descricao as colecao', 'metadados.*')
        ->get();
        return $p;

    }
    // Implemente outros métodos conforme necessário

    public function getAllByTitle()
    {
        $p=DB::table('trabalhos')
        ->join('categorias','categorias.id','=','trabalhos.categoria_id')
        ->join('colecoes','colecoes.id','=','trabalhos.colecao_id')
        ->join('metadados','metadados.trabalho_id','=','trabalhos.id')
        ->where('trabalhos.estado','=','aprovado')
        ->orderBy('metadados.titulo','asc')
        ->select('trabalhos.*','trabalhos.id as codigo','categorias.descricao as categoria','colecoes.descricao as colecao', 'metadados.*')
        ->paginate(10);
        
        return $p;
    }

    //
    public function getAllTitlebyColection($id_colection)
    {
        $p=DB::table('trabalhos')
        ->join('categorias','categorias.id','=','trabalhos.categoria_id')
        ->join('colecoes','colecoes.id','=','trabalhos.colecao_id')
        ->join('metadados','metadados.trabalho_id','=','trabalhos.id')
       ->where('colecoes.id','=',$id_colection)
        ->where('trabalhos.estado','=','aprovado')
        ->orderBy('metadados.titulo','asc')
        ->select('trabalhos.*','trabalhos.id as codigo','categorias.descricao as categoria','colecoes.descricao as colecao', 'metadados.*')
        ->paginate(10);
        
        return $p;
    }

    public function getAllByOrientador()
    {
        $p=DB::table('trabalhos')
        ->join('categorias','categorias.id','=','trabalhos.categoria_id')
        ->join('colecoes','colecoes.id','=','trabalhos.colecao_id')
        ->join('metadados','metadados.trabalho_id','=','trabalhos.id')
        ->join('orientadores','orientadores.id','=','metadados.orientador_id')
        ->orderBy('orientadores.nome','asc')
        ->where('trabalhos.estado','=','aprovado')
        ->select('trabalhos.*','trabalhos.id as codigo','categorias.descricao as categoria','orientadores.nome as orientador','colecoes.descricao as colecao', 'metadados.*')
        ->get();

        return $p;

    }
    public function getAllByCollection()
    {
        /*$p=DB::table('trabalhos')
        ->join('categorias','categorias.id','=','trabalhos.categoria_id')
        ->join('colecoes','colecoes.id','=','trabalhos.colecao_id')
        ->join('metadados','metadados.trabalho_id','=','trabalhos.id')
       // ->where('trabalhos.estado','=','aprovado')
        ->orderBy('colecoes.descricao','asc')
        ->select('trabalhos.*','trabalhos.id as codigo','categorias.descricao as categoria','colecoes.descricao as colecao', 'metadados.*')
        ->get();
        return $p;*/



        $colecoesEQuantidadeTrabalhos = DB::table('trabalhos')
        ->join('colecoes', 'trabalhos.colecao_id', '=', 'colecoes.id')
         ->where('trabalhos.estado','=','aprovado')
        ->select('colecoes.descricao as colecao', DB::raw('COUNT(trabalhos.id) as qtdtrabalhos'),'colecoes.id as codigo')
        ->groupBy('colecoes.id', 'colecoes.descricao')
        ->paginate(10);

        return $colecoesEQuantidadeTrabalhos;


    }
    public function getAllByCategory()
    {
        $p=DB::table('trabalhos')
        ->join('categorias','categorias.id','=','trabalhos.categoria_id')
        ->join('colecoes','colecoes.id','=','trabalhos.colecao_id')
        ->join('metadados','metadados.trabalho_id','=','trabalhos.id')
        ->where('trabalhos.estado','=','aprovado')
        ->orderBy('categorias.descricao','asc')
        ->select('trabalhos.*','trabalhos.id as codigo','categorias.descricao as categoria','colecoes.descricao as colecao', 'metadados.*')
        ->get();
        return $p;

    }


    //estatisticas
    public function countTcc()
    {
        $p=DB::table('trabalhos')
        ->join('categorias','categorias.id','=','trabalhos.categoria_id')
        ->join('colecoes','colecoes.id','=','trabalhos.colecao_id')
        ->join('metadados','metadados.trabalho_id','=','trabalhos.id')
        ->where('categorias.id','=',1)
        ->where('trabalhos.estado','=','aprovado')
        ->orderBy('categorias.descricao','asc')
        ->select('trabalhos.*','trabalhos.id as codigo','categorias.descricao as categoria','colecoes.descricao as colecao', 'metadados.*')
        ->count();

        return $p;

    }
    public function countArtigoCientifico()
    {

        $p=DB::table('trabalhos')
        ->join('categorias','categorias.id','=','trabalhos.categoria_id')
        ->join('colecoes','colecoes.id','=','trabalhos.colecao_id')
        ->join('metadados','metadados.trabalho_id','=','trabalhos.id')
        ->where('categorias.id','=',2)
        ->where('trabalhos.estado','=','aprovado')
        ->orderBy('categorias.descricao','asc')
        ->select('trabalhos.*','trabalhos.id as codigo','categorias.descricao as categoria','colecoes.descricao as colecao', 'metadados.*')
        ->count();
        
        return $p;

    }

    public function allAproved()
    {
        $p=DB::table('trabalhos')
        ->where('trabalhos.estado','=','aprovado')
        ->count();
        return $p;
    }

    public function allAutoCount()
    {
        $p=DB::table('trabalhos')
        ->where('trabalhos.tipo','=','Auto-arquivamento')
        ->count();
        return $p;
    }

    public function allMediadoCount()
    {
        $p=DB::table('trabalhos')
        ->where('trabalhos.tipo','=','Arquivamento Mediado')
        ->count();
        return $p;
    }

    public function allRejeted()
    {
        $p=DB::table('trabalhos')
        ->where('trabalhos.estado','=','regeitado')
        ->count();
        return $p;
    }

    public function allpendent()
    {
        $p=DB::table('trabalhos')
        ->where('trabalhos.estado','=','pendente')
        ->count();
        return $p;
    }


    public function allwork()
    {
        $p=DB::table('trabalhos')
        ->count();
        return $p;
    }

    /**--------------------------------------*/


    public function aprovar($id)
    {
        $help=new Helper();
        
        $s=['estado'=>'aprovado'];
        $id=addslashes($id);
        $u=Trabalho::findOrFail($id);
        $u->update($s);

        //salvar a notificacao
        $n=new Notificacao();
        $n->trabalho_id=$id;
        $n->user_id=Auth::user()->id;
        $n->estado='pendente';
        $n->descricao='o seu trabalho foi aprovado pelo bibliotecário';
        $n->tipo='usuario';
        $n->save();
        return true;

    }
    public function regeitar($id,$mensagem)
    {
        $help=new Helper();

        $s=['estado'=>'regeitado'];
        $id=addslashes($id);
        $u=Trabalho::findOrFail($id);
        $u->update($s);
        
        //salvar a notificacao
        $n=new Notificacao();
        $n->trabalho_id=$id;
        $n->user_id=Auth::user()->id;
        $n->estado='pendente';
        $n->descricao='o seu trabalho foi aprovado pelo bibliotecário';
        $n->tipo='usuario';
        $n->mensagem=$help->clear($mensagem);
        $n->save();
        return true;
    }
   
    public function pesquisar($title)
    {
        $help=new Helper();
        $texto=$help->clear($title);
        $p=DB::table('trabalhos')
        ->join('categorias','categorias.id','=','trabalhos.categoria_id')
        ->join('colecoes','colecoes.id','=','trabalhos.colecao_id')
        ->join('metadados','metadados.trabalho_id','=','trabalhos.id')
        ->where('metadados.titulo', 'like', "%$texto%")
        ->where('trabalhos.estado','=','aprovado')
        ->orderBy('metadados.titulo','asc')
        ->select('trabalhos.*','trabalhos.id as codigo','categorias.descricao as categoria','colecoes.descricao as colecao', 'metadados.*')
        ->paginate(10);
       
        return $p;
    }

    /*function obterAutoresETrabalhos()
        {
            $autoresETrabalhos = DB::table('trabalhoautor')
                ->join('autores', 'trabalhoautor.autor_id', '=', 'autores.id')
                ->join('trabalhos', 'trabalhoautor.trabalho_id', '=', 'trabalhos.id')
                ->select('autores.nome as nome_autor', 'trabalhos.titulo as titulo_trabalho')
                ->get();

            return $autoresETrabalhos;
        }*/

      /*  function contarTrabalhosPorAutor()
    {
        $autoresEQuantidadeTrabalhos = DB::table('trabalhoautor')
            ->join('autores', 'trabalhoautor.autor_id', '=', 'autores.id')
            ->select('autores.nome as nome_autor', DB::raw('COUNT(trabalhoautor.trabalho_id) as quantidade_trabalhos'))
            ->groupBy('autores.id', 'autores.nome')
            ->get();

        return $autoresEQuantidadeTrabalhos;
    }*/


}