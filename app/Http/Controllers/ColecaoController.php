<?php

namespace App\Http\Controllers;
use App\Services\ColecaoService;

use Illuminate\Http\Request;

class ColecaoController extends Controller
{

    protected $service;

    public function __construct(ColecaoService $catservice)
    {
        $this->service = $catservice;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados=$this->service->getAll();
        return  view('admin.colecao.listar',['cat'=>$dados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.colecao.registar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->service->save($request))
        {
            return  view('Admin.colecao.registar',['sms'=>'Coleção registada com suscesso']);
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
        $c=$this->service->getById($id);
        return view('Admin.colecao.alterar',['c'=>$c]);
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
        

        if($this->service->update($request))
        {
            $dados=$this->service->getAll();
            return  view('admin.colecao.listar',['cat'=>$dados,'sms'=>'coleção alterada com sucesso']);
        }
        $dados=$this->service->getAll();

        return  view('admin.colecao.listar',['cat'=>$dados,'erro'=>'erro ao alterar,por favor tente mais tarde']);
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
