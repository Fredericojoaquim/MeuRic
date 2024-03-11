@extends('layouts.guest')

@section('title', 'RIC-Precorrer por Data de Publicação')
@section('location', 'Precorrer por Data de Publicação')
@section('styles')
    <style>
        .label.label-default {
            background-color: #4986fc;
            color: white;
            padding: 2px 6px;
            margin-right: 1px;
            border-radius: 5px;
        }
    </style>
@endsection

@section('content')
    <!-- Texto no topo com a visualização da rota -->
    <section class="hero-wrap hero-wrap-2"
        style="background-image: url('{{ url('template-pagina-inicial/images/biblioteca-agostinho.jpg') }}');background-attachment: fixed; background-position: 50% 50%; height: 300px;">
        <div class="overlay"></div>
        <div class="container" style="height: 300px;">
            <div class="row no-gutters slider-text align-items-end justify-content-center" style="height: 300px;">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Pagina Inicial <i
                                    class="fa fa-chevron-right"></i></a></span> <span>Precorrer por Data de Publicação <i
                                class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-0 bread">Precorrer por Data de Publicação</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Fim texto no topo com a visualização da rota -->

    <!-- Container ou seja corpo da página de pesquisas -->
    <section class="ftco-section bg-light">
        <div class="container">
            <h1>Precorrer por Data de Publicação</h1>

            <!-- Card-Pesquisa --->
            <div class="row justify-content-center pt-2">
                <div class="col-md-12 text-center">
                    <div class="item">
                        <div class="testimony-wrap" style="background-color: whitesmoke; border-left: 6px solid #4986fc;">
                            <!--Titulo-->
                            <div class="row">
                                <!--Filtros-->
                                <div class="col-md-12 pt-4">
                                    <form method="get" action="/browse" style="margin: 0; padding:0;">
                                        <span>Índice:</span>
                                        <a class="label label-default" href="#">0-9</a>
                                        <a class="label label-default" href="#">A</a>
                                        <a class="label label-default" href="#">B</a>
                                        <a class="label label-default" href="#">C</a>
                                        <a class="label label-default" href="#">D</a>
                                        <a class="label label-default" href="#">E</a>
                                        <a class="label label-default" href="#">F</a>
                                        <a class="label label-default" href="#">G</a>
                                        <a class="label label-default" href="#">H</a>
                                        <a class="label label-default" href="#">I</a>
                                        <a class="label label-default" href="#">J</a>
                                        <a class="label label-default" href="#">K</a>
                                        <a class="label label-default" href="#">L</a>
                                        <a class="label label-default" href="#">M</a>
                                        <a class="label label-default" href="#">N</a>
                                        <a class="label label-default" href="#">O</a>
                                        <a class="label label-default" href="#">P</a>
                                        <a class="label label-default" href="#">Q</a>
                                        <a class="label label-default" href="#">R</a>
                                        <a class="label label-default" href="#">S</a>
                                        <a class="label label-default" href="#">T</a>
                                        <a class="label label-default" href="#">U</a>
                                        <a class="label label-default" href="#">V</a>
                                        <a class="label label-default" href="#">W</a>
                                        <a class="label label-default" href="#">Y</a>
                                        <a class="label label-default" href="#">X</a>
                                        <a class="label label-default" href="#">Z</a>
                                        <a class="label label-default ml-4 mt-1 mt-md-0" href="#"
                                            style="background-color: #ebf1ff; color: #4986fc; border: 1px solid #4986fc;"><i
                                                class="fa fa-search"></i></a>

                                        <div class="row mt-4">
                                            <div class="col-12 d-flex flex-row justify-content-center">
                                                <span>Ordenar por:</span>
                                                <div class="form-group">
                                                    <div class="col-sm-4">
                                                        <select class="form-control select"
                                                            style="min-width: 200px; border-radius: 5px; background-color:#e4e4e4;"
                                                            id="gender1">
                                                            <option>Título</option>
                                                            <option>Data de Publicação</option>
                                                            <option>Autor</option>
                                                            <option>Tipo de Acesso</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <span>Em ordem:</span>
                                                <div class="form-group">
                                                    <div class="col-sm-4">
                                                        <select class="form-control select"
                                                            style="min-width: 200px; border-radius: 5px; background-color:#e4e4e4;"
                                                            id="gender1">
                                                            <option>Crescente</option>
                                                            <option>Decrescente</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <span>Resultados por página:</span>
                                                <div class="form-group">
                                                    <div class="col-sm-4">
                                                        <select class="form-control"
                                                            style="min-width: 200px; border-radius: 5px; background-color:#e4e4e4;"
                                                            id="gender1">
                                                            <option>10</option>
                                                            <option>20</option>
                                                            <option>30</option>
                                                            <option>40</option>
                                                            <option>50</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 px-2 pt-4">
                    <div class="card card-primary">
                        <div class="card-header py-1 text-sm" style="font-size: .7em; text-align:center;">
                            Mostrar 1-20 de um total de 70 resultados
                        </div>
                        <div class="card-body p-0">
                            <table align="center" class="table p-0 m-0"
                                summary="Esta tabela contém todos os trabalhos organizados por título">
                                <tbody>
                                    <tr>
                                        <th id="t1" class="oddRowEvenCol">Data</th>
                                        <th id="t2" class="oddRowOddCol"><strong>Título</strong></th>
                                        <th id="t3" class="oddRowEvenCol">Autor(es)</th>
                                        <th id="t4" class="oddRowOddCol">Categoria</th>
                                        <th id="t5" class="oddRowEvenCol">Acesso</th>
                                    </tr>
                                    @if (isset($trabalhos) && $trabalhos->count() > 0)
                                        @foreach ($trabalhos as $trabalho)
                                            <tr>
                                                <td headers="t1" nowrap="nowrap" align="right">
                                                    {{ $trabalho->metadado->created_at->toFormattedDateString() }}
                                                </td>
                                                <td headers="t2">
                                                    <strong>
                                                        <a href="#">
                                                            {{ $trabalho->metadado->titulo }}
                                                        </a>
                                                    </strong>
                                                </td>
                                                <td headers="t3">
                                                    <em>
                                                        @foreach ($trabalho->metadado->autores as $autor)
                                                            <a href="#" class="authority author">
                                                                {{ $autor->apelido }}, {{ $autor->nome }}
                                                            </a>;
                                                        @endforeach
                                                        @if ($trabalho->metadado->autores->count() > 3)
                                                            <span>et al.</span>
                                                        @endif
                                                    </em>
                                                </td>
                                                <td headers="t4">
                                                    <em>
                                                        <a href="#">
                                                            {{ $trabalho->categoria->nome }}
                                                        </a>
                                                    </em>
                                                </td>
                                                <td headers="t5">
                                                    <em>
                                                        <a href="#">
                                                            Acesso
                                                            aberto
                                                        </a>
                                                    </em>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">Nenhuma informação encontrada</td>
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

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
