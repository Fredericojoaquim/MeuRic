@extends('templates.template')
@section('title', 'Categoria')


@section('content')


<div class="col-md-12 grid-margin stretch-card">
 
 
    <div class="card">
     
      <div class="card-body">
        <h4 class="card-title">Alterar Coleção</h4>

        @if (@isset($sms))

            <div class="row grid-margin stretch-card">
              <div class="alert alert-success" role="alert">
                <p>{{$sms}}</p>
             </div>
            </div>
        @endif

        <div class="row">
          <div class="alert alert-danger" hidden id="erro-registar">
        </div>
       
        <form class="forms-sample" method="POST" action="{{url('colecao/alterar')}}" id="form-registar">
            @csrf
            {{ method_field('PUT') }}
          @if(isset($c))

          <div class="form-group">
            <label for="exampleInputEmail1">Descrição</label>
            <input type="text" id="descricao" name="descricao" value="{{$c->descricao}}" class="form-control" placeholder="Descrição">
            <input type="hidden" name="id" id="id" value="{{$c->id}}">
        </div>
          <button type="submit" class="btn btn-primary me-2 font-button" id="btn-registar">Alterar</button>
            
          @endif
          
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
            var descricao=document.getElementById("descricao");
            var erro= document.getElementById("erro-registar");

            if(descricao.value == ''){
                
                erro.innerHTML="Por favor preencha o campo Descrição";
                erro.removeAttribute('hidden');
                escricao.focus();
                return false;
            }else{
                erro.setAttribute('hidden', true);
                formregistar.submit();
            }
    });
  });

  </script>
  @endsection