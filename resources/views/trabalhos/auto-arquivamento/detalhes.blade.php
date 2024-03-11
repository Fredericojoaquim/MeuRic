@extends('templates.template')
<link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
@section('title', 'Detalhes')




@section('content')

<style>
    .my-magin{ margin-left: 22px; }
</style>

<div class="alert alert-primary" role="alert">
    <p>Universidade Agostinho Neto-Faculdade de Ciências Naturais-Departamento de Ciências da Computação |Serviços de Documentação e Bibliotecas</p>
</div>

<div class="alert alert-dark" role="alert">
    <p>Utilize este identificador para referenciar este registo: <a href="{{url("trabalho/autoarquivamento/detalhes/$dado->codigo")}}">{{$dado->titulo}}</a></p> 
</div>

<div class="row justify-content-end">
    <div>
     <div class="float-right">

        @if($dado->estado=='pendente')
            <a href="{{url("trabalho/auto-arquivamento/aprovar/$dado->codigo")}}" class="btn  me-2 font-button" style="background-color: green">Aprovar</a>
            <button  class="btn me-2 font-button" style="background-color:red" data-toggle="modal" onclick="retornaid({{$dado->codigo}})"  data-target="#mymodal">Regeitar</button>
         
            
        @else
            <button disabled class="btn  me-2 font-button" style="background-color: green">Aprovar</button>
            <button disabled class="btn me-2 font-button" style="background-color:red">Regeitar</button>
        @endif
      

            
         
       
     </div>
    </div>
     
 </div>

<div class="card">
    <div class="my-magin">
        <table cellpadding="6">
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
                    @endif

                       
                    </td>
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




<!-- Modal -->
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            
            <div class="modal-body">
                <form action="{{url('trabalho/auto-arquivamento/regeitar')}}" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Mensagem</label>
                    <textarea name="mensagem" id="" cols="30" rows="10" class="form-control"  placeholder="Mensagem"></textarea>
                </div>
  
                <div class="text-right">
                    <input id="trabalho_id" name="trabalho_id"  type="hidden">
                    <button type="submit" class="btn btn-primary me-2 font-button" id="btn-registar">Confirmar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancelar</button>  
                </div>
  
  
                </form>
               
            </div>
           
        </div>
    </div>
  </div>
  <!-- EndModal -->



<script src="{{asset('vendorS/jquery/jquery-3.3.1.min.js')}}"></script> 
<script src="{{url('assets/bootstrap/js/bootstrap.bundle.js')}}"></script>
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


        function retornaid(id){
               
               $('#trabalho_id').val(id);
              
        }
</script>

@endsection