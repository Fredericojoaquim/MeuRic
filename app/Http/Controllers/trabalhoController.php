<?php

namespace App\Http\Controllers;
use App\Services\ColecaoService;
use App\Services\CategoriaService;
use App\Services\TrabalhoService;
use App\Services\OrientadorService;
use App\Http\Helper\Helper;
use Illuminate\Support\Facades\DB;
use App\Rules\UniqueOrientador;

use Illuminate\Http\Request;

class trabalhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     protected $servicecolecao;
     protected $servicecategoria;
     protected $trabalhoservice;
     protected $orientadorservice;

    public function __construct(ColecaoService $colservice,CategoriaService $catservice, TrabalhoService $trab,OrientadorService $orientador)
    {
        $this->servicecolecao = $colservice;
        $this->servicecategoria = $catservice;
        $this->trabalhoservice=$trab;
        $this->orientadorservice=$orientador;
    }

    public function allAutor()
    {
            $p=DB::table('trabalhoautor')
            ->join('autores','trabalhoautor.autor_id','=','autores.id')
            ->join('trabalhos','trabalhos.id','=','trabalhoautor.trabalho_id')
            ->orderBy('created_at', 'desc') 
            ->select('trabalhoautor.*','autores.nome as nomeautor', 'trabalhos.id as codigotrabalho')
            ->get();
            return $p;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trabalhos.auto-arquivamento.registar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $h=new Helper ();
        $dados=$this->trabalhoservice->getById($id);
        $autores=$this->allAutor();
        $palavras=$h->separarStringPorVirgula($dados->palavra_chave);
      
        
        return view('trabalhos.auto-arquivamento.detalhes',['dado'=>$dados,'palavras'=> $palavras,'autores'=>$autores]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function autoArquivamentoCreate()
    {
        $orientador=$this->orientadorservice->getAll();
        $colecoes=$this->servicecolecao->getAll();
        $categorias=$this->servicecategoria->getAll();
        return view('trabalhos.auto-arquivamento.registar',['colecoes'=>$colecoes, 'categorias'=>$categorias,'orientador'=>$orientador]);
    }


    public function autoArquivamentoListar()
    {
        $dados=$this->trabalhoservice->getAllAuto();
       
        return view('trabalhos.auto-arquivamento.listar',['trabalhos'=>$dados]);
    }

    public function ListarAuto()
    {
        $dados=$this->trabalhoservice->getAllAuto();
       
        return view('trabalhos.auto-arquivamento.bibliotecario.listar',['trabalhos'=>$dados]);
    }


    public function autoArquivamentoSave(Request $request)     
    {
        //return back()->withInput();
       //dd($request);
      

        $colecoes=$this->servicecolecao->getAll();
        $categorias=$this->servicecategoria->getAll();

        if($this->trabalhoservice->saveAuto($request))
        {
            return view('trabalhos.auto-arquivamento.registar',['colecoes'=>$colecoes, 'categorias'=>$categorias,'sms'=>'Trbalho submetido com sucesso, aguarda pela aprovação do Bibliotecário']);
        }
        return back()->withInput()->with('erro','Erro ao submeter o trabalho, arquivo corrompido ou danificado');
        
        //return view('trabalhos.auto-arquivamento.index',['colecoes'=>$colecoes, 'categorias'=>$categorias]);
    }

    //mediado

    public function mediadoCreate()
    {
        $orientador=$this->orientadorservice->getAll();
        $colecoes=$this->servicecolecao->getAll();
        $categorias=$this->servicecategoria->getAll();
        return view('trabalhos.mediado.registar',['colecoes'=>$colecoes, 'categorias'=>$categorias,'orientador'=>$orientador]);

    }



    public function mediadoSave(Request $request)     
    {
        //return back()->withInput();
       //dd($request);
        $colecoes=$this->servicecolecao->getAll();
        $categorias=$this->servicecategoria->getAll();

        if($this->trabalhoservice->saveMediado($request))
        {
            return view('trabalhos.mediado.registar',['colecoes'=>$colecoes, 'categorias'=>$categorias,'sms'=>'Trbalho submetido com sucesso, aguarda pela aprovação do Bibliotecário']);
        }
        return back()->withInput()->with('erro','Erro ao submeter o trabalho, arquivo corrompido ou danificado');
        
        //return view('trabalhos.auto-arquivamento.index',['colecoes'=>$colecoes, 'categorias'=>$categorias]);
    }


    public function arquivamentoMediadoListar()
    {

        $dados=$this->trabalhoservice->getAllMediado();
       
        return view('trabalhos.mediado.listar',['trabalhos'=>$dados]);

    }

   public function  regeitar(Request $request)
   {

 

        $id=$request->trabalho_id;

   
        $mensagem=$request->mensagem;
        $this->trabalhoservice->regeitar($id,$mensagem);
        $dados=$this->trabalhoservice->getAllAuto();
        return view('trabalhos.auto-arquivamento.bibliotecario.listar',['trabalhos'=>$dados,'sms'=>'trabalho regeitado com suceso']);
   }


   public function  aprovar($id)
   {

        $this->trabalhoservice->aprovar($id);
        $dados=$this->trabalhoservice->getAllAuto();
        return view('trabalhos.auto-arquivamento.bibliotecario.listar',['trabalhos'=>$dados,'sms'=>'trabalho aprovado com suceso']);
   }

   public function trabalho_user_edit($id)
   {
    $h=new Helper();
    
    $trabalho=$this->trabalhoservice->getById($id);
    $colecoes=$this->servicecolecao->getAll();
    $categorias=$this->servicecategoria->getAll();
    $orientador=$this->orientadorservice->getAll();
    $autores=$h->nomesAutoresPorTrabalho($id);
    return view('trabalhos.auto-arquivamento.alterar',['colecoes'=>$colecoes, 'categorias'=>$categorias,'t'=>$trabalho,'orientador'=>$orientador,'autores'=>$autores]);
   }

   public function trabalho_user_update(Request $request)
   {
        $dados=$this->trabalhoservice->getAllAuto();
        $this->trabalhoservice->updateAuto($request);

        return view('trabalhos.auto-arquivamento.listar',['trabalhos'=>$dados,'sms'=>'trabalho alterado com suscesso']);

   }

    
}
