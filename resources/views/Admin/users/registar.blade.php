@extends('templates.template')
@section('title', 'Utilizador')


@section('content')


<div class="col-md-12 grid-margin stretch-card">
 
 
    <div class="card">
     
      <div class="card-body">
        <h4 class="card-title">Registar Utilizador</h4>

        @if (@isset($sms))

            <div class="row grid-margin stretch-card">
              <div class="alert alert-success" role="alert">
                <p>{{$sms}}</p>
             </div>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
          <div class="alert alert-danger" hidden id="erro-registar">
        </div>
       
        <form class="forms-sample" method="POST" action="{{url('user/salvar')}}" id="form-registar">
            @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Nome</label>
            <input type="text" id="nome" name="name" class="form-control" placeholder="Nome">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Nome">
          </div>

          <div class="form-group">
            <label>Perfil</label>
            <select class="js-example-basic-single w-100 form-control" name="perfil" id="perfil">
            <option value="">Selecione</option>
           @if(isset($perfil))
              
              @foreach($perfil as $p)
              <option value="{{$p->name}}">{{$p->name}}</option>
              @endforeach
            
           @endif
            </select>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Senha</label>
            <input type="password" id="senha" name="password" class="form-control" >
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Confirmar Senha</label>
            <input type="password" id="confsenha" name="password_confirmation" class="form-control" >
          </div>


          <button type="submit" class="btn btn-primary me-2 font-button" id="btn-registar">Registar</button>
          
        </form>
      </div>
    </div>
  </div>
  <script src="{{asset('vendors/jquery/jquery-3.3.1.min.js')}}"></script>
  <script>
    $(document).ready(function(){
    btn_registar=document.getElementById("btn-registar");
    btn_registar.addEventListener('click', (event)=>{

            event.preventDefault();
            var formregistar=document.getElementById("form-registar");
            var nome=document.getElementById("nome");
            var email=document.getElementById("email");
            var perfil=document.getElementById("perfil");
            var senha=document.getElementById("senha");
            var confsenha=document.getElementById("confsenha");
            var erro= document.getElementById("erro-registar");

            if(nome.value == ''){
                
                erro.innerHTML="Por favor preencha o campo Senha";
                erro.removeAttribute('hidden');
                nome.focus();
                return false;
            }else{
                erro.setAttribute('hidden', true);
                //formregistar.submit();
            }

            if(email.value == ''){
                
                erro.innerHTML="Por favor preencha o campo email";
                erro.removeAttribute('hidden');
                email.focus();
                return false;
            }else{
                erro.setAttribute('hidden', true);
                //formregistar.submit();
            }

            if(perfil.value == ''){
                
                erro.innerHTML="Por favor selecione um perfil";
                erro.removeAttribute('hidden');
                perfil.focus();
                return false;
            }else{
                erro.setAttribute('hidden', true);
                
            }

            if(senha.value == ''){
                
                erro.innerHTML="Por favor preencha o campo Senha";
                erro.removeAttribute('hidden');
                senha.focus();
                return false;
            }else{
                erro.setAttribute('hidden', true);
                //
            }

            if(confsenha.value == ''){
                
                erro.innerHTML="Por favor preencha o campo email";
                erro.removeAttribute('hidden');
                confsenha.focus();
                return false;
            }else{
                erro.setAttribute('hidden', true);
                formregistar.submit();
            }
    });
  });

  </script>
  @endsection