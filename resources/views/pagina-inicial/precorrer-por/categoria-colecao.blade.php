@extends('layouts.guest')

@section('title', 'RIC-Precorrer por Assunto')
@section('location', 'Precorrer por Coleção')

@section('content')

<style>
    .centralizar {
    display: flex!important;
    justify-content: center!important;
    align-items: center!important;
    
    }
</style>
    <!-- Texto no topo com a visualização da rota -->
    <section class="hero-wrap hero-wrap-2"
        style="background-image: url('{{ url('template-pagina-inicial/images/biblioteca-agostinho.jpg') }}');background-attachment: fixed; background-position: 50% 50%; height: 300px;">
        <div class="overlay"></div>
        <div class="container" style="height: 300px;">
            <div class="row no-gutters slider-text align-items-end justify-content-center" style="height: 300px;">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Pagina Inicial <i
                                    class="fa fa-chevron-right"></i></a></span> <span>Precorrer por <i
                                class="fa fa-chevron-right"></i></span></p>
                    </span> <span>Coleções <i class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-0 bread">Percorrer Coleções</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Fim texto no topo com a visualização da rota -->

    <!-- Container ou seja corpo da página de pesquisas -->
    <section class="ftco-section bg-light">
        <div class="container">
            <h1>Percorrer Coleções</h1>

            <!-- Card-Pesquisa --->
            <div class="row justify-content-center pt-2">
                

                <div class="col-12 px-2 pt-4">
                    <div class="card card-primary">
                        <div class="card-header py-1 text-sm" style="font-size: .7em; text-align:center;">
                            Resultados encontrados...
                        </div>
                        <div class="card-body p-0">
                            <table align="center" class="table p-0 m-0"
                                summary="Esta tabela contém todos os trabalhos organizados por título">
                                <tbody>
                                    <tr>
                                  
                                     
                                        <th id="t3" class="oddRowEvenCol">Coleção</th>
                                        <th id="t4" class="oddRowOddCol">Qtd de trabalhos</th>
                                        <th id="t5" class="oddRowEvenCol">Acesso</th>
                                    </tr>

                                    @if(isset($trabalhos) && $trabalhos->total()>0)
                                        @foreach($trabalhos as $t)
                                            <tr>
                                                <td headers="t1" nowrap="nowrap"  class="text-left">
                                                <a href="{{url("Home/percorerr-colecao/$t->codigo")}}">{{$t->colecao}}</a>
                                                </td>
                                               
                                                <td headers="t3" class="text-left">
                                                    ({{$t->qtdtrabalhos}})
                                                </td>
                                                
                                                <td headers="t5" class="text-left">
                                                    Acesso aberto 
                                                </td>
                                            </tr>
                                            
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">Nenhuma resultado encontrada</td>
                                        </tr>
                                        
                                    @endif
                                 
                                        
                                     
                                        
                              
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        
    </section>

    <div class="container">
        <div class="row">
            <div class="centralizar">
                 <!-- Links de Paginação -->
                 {{ $trabalhos->links() }}
            </div>
        </div>
    </div>

    

    

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
