<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\User;
use App\Models\Permissao;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function AllUser()
     {
         $users=DB::table('users')
         ->join('model_has_permissions','model_has_permissions.model_id','=','users.id')
         ->join('permissions','permissions.id','=','model_has_permissions.permission_id')
         ->select('users.name','users.estado as estado','users.id as codigo','users.email','permissions.name as perfil')
         ->get();
 
       return  $users;
 
     }

    public function index()
    {
        $dados=$this->AllUser();
        return view('admin.users.listar',['dados'=>$dados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $p=Permissao::all();
        return view('admin.users.registar',['perfil'=>$p]);
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'estado'=>'ativo',
           
        ])->givePermissionTo($request->perfil);

        return view('admin.users.registar',['sms'=>'Utilizador registado com sucesso']);
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
        $u=DB::table('users')
        ->join('model_has_permissions','model_has_permissions.model_id','=','users.id')
        ->join('permissions','permissions.id','=','model_has_permissions.permission_id')
        ->where('users.id','=',addslashes($id))
        ->select('users.name as nome','users.estado as estado','users.id as codigo','users.email','permissions.name as perfil')
        ->get()->first();

        $p=Permissao::all();

       

        return view('admin.users.alterar',['user'=>$u,'perfil'=>$p]);


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
        $s=[
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'estado'=>'ativo',
    ];

    $id=addslashes($request->id);
    $u=User::findOrFail($id);
    //retirar a antiga permissão do usuário
    $u->revokePermissionTo($u->getPermissionNames()->first());
   // adicionar uma nova permissão ao usuário
    $u->givePermissionTo($request->perfil);
   // $u=$u->syncPermissions([$u->getPermissionNames()->first(), $request->perfil]);
    $u->update($s);
    
    $dados=$this->AllUser();
    return view('admin.users.listar',['dados'=>$dados,'sms'=>'utilizador alterado com sucesso']);


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


    public function bloquear(Request $request)
    {
      
        $s=['estado'=>'bloqueado'];
        $id=addslashes($request->user_id);
        $u=User::findOrFail($id);

        $u->update($s);

        return view('admin.users.listar',['dados'=>$this->AllUser(),'sms'=>'utilizador bloqueado com sucesso']);

    }


    public function desbloquear(Request $request)
    {
       // dd($request->user_id);
        $s=['estado'=>'ativo'];
        $id=addslashes($request->user_id);
        $u=User::findOrFail($id);
        $u->update($s);

        return view('admin.users.listar',['dados'=>$this->AllUser(),'sms'=>'utilizador desbloqueado com sucesso']);
        
    }

    public function perfil()
    {
        return view('Admin.utilizador.perfil');
    }

}
