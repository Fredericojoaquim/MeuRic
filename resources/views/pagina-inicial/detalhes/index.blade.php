<link rel="stylesheet" href="{{url('css/estilo.css')}}">
@extends('layouts.guest')

@section('title', 'Detalhes')
@section('location', 'Detalhes')

@section('content')
<style>
    body{
        
        
       
    }
</style>

<!-- Texto no topo com a visualização da rota -->
<section class="hero-wrap hero-wrap-2"
style="background-image: url('{{ url('template-pagina-inicial/images/biblioteca-agostinho.jpg') }}');background-attachment: fixed; background-position: 50% 50%; height: 300px;">
<div class="overlay"></div>
<div class="container" style="height: 300px;">
    <div class="row no-gutters slider-text align-items-end justify-content-center" style="height: 300px;">
        <div class="col-md-9 ftco-animate pb-5 text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Pagina Inicial <i
                            class="fa fa-chevron-right"></i></a></span> <span>Detalhes <i
                        class="fa fa-chevron-right"></i></span></p>
            </span> <span>Assunto <i class="fa fa-chevron-right"></i></span></p>
            <h1 class="mb-0 bread">Detalhes</h1>
        </div>
    </div>
</div>
</section>
<!-- Fim texto no topo com a visualização da rota -->

<div class="container my-margitop ">
    <div class="alert alert-primary" role="alert">
        <p>Universidade Agostinho Neto-Faculdade de Ciências Naturais-Departamento de Ciências da Computação |Serviços de Documentação e Bibliotecas</p>
    </div>
    
    <div class="alert alert-dark" role="alert">
        <p>Utilize este identificador para referenciar este registo: <a href="{{url("trabalho/autoarquivamento/detalhes/$dado->codigo")}}">{{$dado->titulo}}</a></p> 
    </div>
    
    <div class="card">
        <div class="container">
            <table cellpadding="6" class="my-font">
                <tr class=" border-right-0 border-bottom-1 margin-table" >
                    <td><strong>Título:</strong></td>
                    <td>{{$dado->titulo}}</td>
                </tr>
        
                <tr class="margin-table">
                    <td class="border-top-1 border-bottom-1"><strong>Autor(es):</strong></td>
                   
                    @if(isset($autores))
                        @php
                            $id=$dado->codigo;
                            $total=$autores->where('codigotrabalho', $id)->count();
                        @endphp
                    <td class="border-top-1 border-bottom-1" id="meuParagrafo">

                        @if($total>1)
                             @foreach($autores as $a)
                                @if($dado->codigo==$a->codigotrabalho)
                                {{$a->nomeautor}},
                                @endif
                            @endforeach

                        @else

                            @foreach($autores as $a)
                                @if($dado->codigo==$a->codigotrabalho)
                                {{$a->nomeautor}}
                                @endif
                            @endforeach
                            
                        @endif

                       
                    </td>
                            
                       
                        
                    @endif
                    
                </tr>
    
                <tr class="margin-table">
                    <td class="border-top-1 border-bottom-1"><strong>Orientador:</strong></td>
                    <td class="border-top-1 border-bottom-1">{{$dado->orientador}}</td>
                </tr>
    
                <tr>
                    <td><strong>Palvras-Chave:</strong></td>
    
                    <td>
                        @foreach($palavras as $p)
                        {{$p}}<br>
                        @endforeach
                    </td>
                </tr>
    
    
                <tr>
                    <td><strong>Data:</strong> </td>
                    <td>{{$dado->data_criacao}}</td>
                </tr>
    
                <tr>
                    <td><strong>Língua:</strong> </td>
                    <td>{{$dado->lingua}}</td>
                </tr>
        
                <tr>
                    <td><strong>Resumo</strong></td>
                    <td>{{$dado->resumo}}</td>
                </tr>
        
                <tr>
                    <td><strong>Coleção:</strong> </td>
                    <td>{{$dado->colecao}}</td>
                </tr>
        
                <tr>
                    <td> <strong>Categoria:</strong> </td>
                    <td>{{$dado->categoria}}</td>
                </tr>
        
                <tr>
                    <td> <strong>URI:</strong> </td>
                    <td><a href="{{url("trabalho/autoarquivamento/detalhes/$dado->codigo")}}">{{$dado->titulo}}</a></td>
                </tr>
        
                <tr>
                    <td> <strong>Acesso: </strong></td>
                    <td>Aberto</td>
                </tr>
            </table>
        </div>
    
       
    
        <div class="card my-margitop table my-table-color rounded-2">
            <div class="card-header">Ficheiro de registo</div>
            <div class="card-body">
                <table class="table my-table-color">
                    <tbody>
                        <tr>
                            <th>Ficheiro</th>
                            <th>Descrição</th>
                            <th>Tamanho</th>
                            <th>Formato</th>
                            <th>Acções</th>
                        </tr>
                        <tr>
                            <td> <a href="{{url("trabalhos/$dado->caminho")}}"  target="_blank">{{$dado->titulo}}.{{$dado->formato}}</a> </td>
                            <td>{{$dado->titulo}}</td>
                            <td>{{$dado->tamanho}} MB</td>
                            <td>{{$dado->formato}}</td>
                            <td class="d-flex justify-content-center">
                                <a class="btn btn-primary me-2 font-button" target="_blank"  href="{{url("trabalhos/$dado->caminho")}}">Abrir</a>
                                <a href="{{url("Home/download/$dado->caminho")}}" target="_blank" class="btn btn-success me-2 font-button">Baixar</a>
                                
                            </td>
                        
                        </tr>
                    </tbody>
                </table>
            </div>
          </div>
    </div>
    
</div>



<script src="{{asset('vendorS/jquery/jquery-3.3.1.min.js')}}"></script> 
<script>
    // Função para remover a vírgula do último caractere de um parágrafo
    // Função para remover a vírgula do último caractere de um parágrafo
    function removerVirgulaUltimoCaractere(paragrafo) {
            if (paragrafo.length > 0) {
                const ultimoCaractere = paragrafo.charAt(paragrafo.length - 1);
                if (ultimoCaractere === ',') {
                    return paragrafo.slice(0, -1);
                }
            }
            return paragrafo;
        }

        // Função chamada no evento DOMContentLoaded
        document.addEventListener('DOMContentLoaded', function() {
            // Obtém o elemento do parágrafo pelo ID
            const meuParagrafo = document.getElementById('meuParagrafo');

            // Chama a função para remover a vírgula do último caractere
            meuParagrafo.innerText = removerVirgulaUltimoCaractere(meuParagrafo.innerText);
            
        });
</script>
@endsection