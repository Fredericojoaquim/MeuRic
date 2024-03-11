<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoriaService;


class CategoriaController extends Controller
{



    protected $service;

    public function __construct(CategoriaService $catservice)
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
        return  view('admin.categoria.listar',['cat'=>$dados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categoria.registar');
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
            return  view('Admin.categoria.registar',['sms'=>'Categoria registada com suscesso']);
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
        $dados=$this->service->getById($id);
        return view('admin.categoria.alterar',['c'=>$dados]);
        
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
        $dados=$this->service->getAll();

        if($this->service->update($request))
        {
            $dados=$this->service->getAll();
            return  view('Admin.categoria.listar',['sms'=>'Categoria alterada com sucesso','cat'=>$dados]);
        }else{
            return  view('Admin.categoria.listar',['erro'=>'erro ao alterar por favor tente mais tarde','cat'=>$dados]);
        }


        
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
