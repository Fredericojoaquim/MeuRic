<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OrientadorService;
use App\Rules\UniqueOrientador;

class OrientadorController extends Controller
{

    protected $service;

    public function __construct(OrientadorService $orientador)
    {
        $this->service = $orientador;
        $this->middleware('CheckSessionExpiration');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados=$this->service->getAll();

        
        return  view('admin.orientador.listar',['orientadores'=>$dados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.orientador.registar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', new UniqueOrientador],
            // outras regras de validação...
        ]);

        if($this->service->save($request))
        {
            return  view('Admin.orientador.registar',['sms'=>'Orientador registado com suscesso']);
        }
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
        $o=$this->service->getById($id);
        return view('Admin.orientador.alterar',['o'=>$o]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $request->validate([
            'nome' => ['required', 'string', new UniqueOrientador],
            // outras regras de validação...
        ]);

       if( $this->service->update($request))
       {
        $dados=$this->service->getAll();
        return  view('admin.orientador.listar',['orientadores'=>$dados,'sms'=>'Orientador alterado com sucesso']);

       }

       $dados=$this->service->getAll();
        return  view('admin.orientador.listar',['orientadores'=>$dados,'erro'=>'erro ao alterar, por favor tente mais tarde']);   
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
}
