<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TrabalhoService;
use App\Http\Helper\Helper;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Autor;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    protected $trabalhoservice;

    public function __construct(TrabalhoService $trab)
    {
        $this->trabalhoservice=$trab;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLastFiveAutor()
    {
            $p=DB::table('trabalhoautor')
            ->join('autores','trabalhoautor.autor_id','=','autores.id')
            ->join('trabalhos','trabalhos.id','=','trabalhoautor.trabalho_id')
            
           // ->where('trabalhos.estado','=','aprovado')
            ->orderBy('created_at', 'desc') // Substitua 'created_at' pelo nome da sua coluna de data
            ->select('trabalhoautor.*','autores.nome as nomeautor', 'trabalhos.id as codigotrabalho')
            ->take(5)
            ->get();
            return $p;
        

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
       
        $fivelast=$this->trabalhoservice->getLastFiveRecords();
        
        $autores=$this->getLastFiveAutor();
        
        $tcc=$this->trabalhoservice->countTcc();
        $artigos=$this->trabalhoservice->countArtigoCientifico();
        return view('welcome',['tcc'=>$tcc,'artigos'=>$artigos,'fivelast'=>$fivelast,'autores'=>$autores]);
    }

    public function percorerrPorTitulo()
    {
        
        $trabalhos=$this->trabalhoservice->getAllByTitle();
        return view('pagina-inicial.precorrer-por.assunto',['trabalhos'=>$trabalhos]);
       
    } 

    public function percorerrPorOrientador()
    {
       
        $trabalhos=$this->trabalhoservice->getAllByOrientador();
       
        return view('pagina-inicial.precorrer-por.orientador',['trabalhos'=>$trabalhos]);
       
    } 


    public function getByOrientador($id)
    {
       
        $trabalhos=$this->trabalhoservice->getByOrientador($id);
       
        return view('pagina-inicial.precorrer-por.assunto',['trabalhos'=>$trabalhos]);
       
    } 

    public function percorerrPorColecao()
    {
        $trabalhos=$this->trabalhoservice->getAllByCollection();
        return view('pagina-inicial.precorrer-por.categoria-colecao',['trabalhos'=>$trabalhos]);
       
    }

    public function trabalhoPorColecao($id)
    {
        $trabalhos=$this->trabalhoservice->getAllTitlebyColection($id);
        return view('pagina-inicial.precorrer-por.assunto',['trabalhos'=>$trabalhos]);
       
    }

    public function detalhes($id)
    {
        $h=new Helper ();
        $dados=$this->trabalhoservice->getById($id);
        $autores=$this->allAutor();
       
        $palavras=$h->separarStringPorVirgula($dados->palavra_chave);
      
        
        return view('pagina-inicial.detalhes.index',['dado'=>$dados,'palavras'=> $palavras,'autores'=>$autores]);
    }

    //download
    public function download($file)
    {
        
        $path = public_path("trabalhos/$file");
        //verificar se o arquivo existe
        if (!File::exists($path)) {
            abort(404);
        }

        $headers = [
            'Content-Type' => 'application/octet-stream',
        ];

        return response()->download($path, $file, $headers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function sobre()
    {
        return view('pagina-inicial.sobre.repositorio');
    }

    public function pesquisar(Request $requet)
    {
        $title=$requet->title;
        $trabalhos=$this->trabalhoservice->pesquisar($title);
       
        return view('pagina-inicial.precorrer-por.assunto',['trabalhos'=>$trabalhos]);
    }
}
