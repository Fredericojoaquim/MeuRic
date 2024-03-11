@extends('layouts.guest')

@section('title', 'RIC-Precorrer por Autor')
@section('location', 'Precorrer por Autor')
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
                                    class="fa fa-chevron-right"></i></a></span> <span>Precorrer por Autor <i
                                class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-0 bread">Precorrer por Autor</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Fim texto no topo com a visualização da rota -->


    <!-- Container ou seja corpo da página de pesquisas -->
    <section class="ftco-section bg-light">
        <div class="container">
            <h1>Precorrer por Autor</h1>

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
                            <ul class="list-group">
                                @if (isset($autores) && $autores->count() > 0)
                                    @foreach ($autores as $autor)
                                        <li class="list-group-item">
                                            <a href="#">
                                                {{ $autor->apelido }}, {{ $autor->nome }}
                                            </a>
                                            <span
                                                class="badge badge-secondary float-right my-auto">{{ $autor->metadados->count() }}</span>
                                        </li>
                                    @endforeach
                                @else
                                    <li class="list-group-item">
                                        <p class="text-center">Nenhuma informação encontrada</p>
                                    </li>
                                @endif
                            </ul>
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
