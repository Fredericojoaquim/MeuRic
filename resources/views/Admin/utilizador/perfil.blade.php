@extends('templates.template')
@section('title', 'Perfil')
<link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
<link rel="js" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

@section('content')
<style>
    .fixed-box{
        box-sizing: border-box;
    }
    body{
        background-color:#545454;
        font-family: "Poppins", sans-serif;
        font-weight: 300;
    }

    .container{
        height: 100vh;
    }

    .card{
        width: 500px;
        border: none;
        border-radius: 15px;
        padding: 8px;
        background-color: #fff;
        position: relative;
        height: 450px;
    }

    .upper{
        height: 200px;
    }

    .upper img{
        width: 100%;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .user{
        position: relative;
    }

    .profile img{
        height: 100px;
        width: 100px;
        margin-top:2px;
    }

    .profile{
        position: absolute;
        top:-50px;
        left: 38%;
        height: 110px;
        width: 110px;
        border:3px solid #fff;
        border-radius: 50%;
    }

    .edit-icon{
        position: absolute;
        top: 72px;
        left: 60%;
        font-size: 18px;
        color: #fff;
        background-color: #007bff;
        border-radius: 50%;
        padding: 5px;
        cursor: pointer;
    }

    .follow{
        border-radius: 15px;
        padding-left: 20px;
        padding-right: 20px;
        height: 35px;
    }

    .stats span{
        font-size: 29px;
    }
</style>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <h4 class="card-title">Meu Perfil</h4>

        <div class="container d-flex justify-content-center align-items-center">
            <div class="card">
                <div class="upper">
                    <img src="{{asset('template-pagina-inicial/images/biblioteca-agostinho.jpg')}}" class="img-fluid">
                </div>
                <div class="user text-center">
                    <div class="profile">
                        <img src="{{asset('images/faces/face8.jpg')}}" class="rounded-circle" width="80">
                        <a href=""><i class="fas fa-pencil-alt edit-icon" onclick="alterarFotoPerfil()"></i></a>
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <h4 class="mb-0 mt-4">{{Auth::user()->name}}</h4>
                    <span class="d-block mb-2 mt-1">{{Auth::user()->getPermissionNames()->first()}}</span>
                    <button class="btn btn-primary btn-sm follow">Alterar meus dados</button>
                    <div class="d-flex justify-content-between align-items-center mt-2 px-4 mb-10">
                        <div class="stats">
                            <h6 class="mb-0">Trabalhos depositados</h6>
                            <span>8,797</span>
                        </div>
                        <div class="stats">
                            <h6 class="mb-0">Trabalhos Aprovados</h6>
                            <span>142</span>
                        </div>
                        <div class="stats">
                            <h6 class="mb-0">Trabalhos pendentes</h6>
                            <span>129</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (@isset($sms))
            <div class="row grid-margin stretch-card">
                <div class="alert alert-success" role="alert">
                    <p>{{$sms}}</p>
                </div>
            </div>
        @endif
    </div>
</div>

<script src="{{asset('vendorS/jquery/jquery-3.3.1.min.js')}}"></script> 
<script src="{{url('assets/bootstrap/js/bootstrap.bundle.js')}}"></script>
<script>
    function retornaid(id){
        $('#user_id').val(id);
        $('#user_id_').val(id);
    }
   


    function alterarFotoPerfil() {
        // Criar um input do tipo file
        var input = document.createElement('input');
        input.type = 'file';
        input.name='fot_perfil';

        // Definir atributos opcionais, como aceitar apenas imagens
        input.accept = 'image/*';

        // Ocultar o input
        input.style.display = 'none';

        // Adicionar o input ao corpo do documento
        document.body.appendChild(input);

        
    }
</script>

@endsection
