@extends('layouts.guest')

@section('title', 'RIC-Pesquisar')
@section('location', 'Pesquisar')

@section('content')
    <!-- Texto no topo com a visualização da rota -->
    <section class="hero-wrap hero-wrap-2"
        style="background-image: url('{{ url('template-pagina-inicial/images/biblioteca-agostinho.jpg') }}');background-attachment: fixed; background-position: 50% 50%; height: 300px;">
        <div class="overlay"></div>
        <div class="container" style="height: 300px;">
            <div class="row no-gutters slider-text align-items-end justify-content-center" style="height: 300px;">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Pagina Inicial <i
                                    class="fa fa-chevron-right"></i></a></span> <span>Pesquisar <i
                                class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-0 bread">Pesquisar</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Fim texto no topo com a visualização da rota -->


    <!-- Container ou seja corpo da página de pesquisas -->
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="sidebar-box bg-white ftco-animate">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon fa fa-search"></span>
                                <input type="text" name="pesquisar" id="pesquisar" class="form-control"
                                    placeholder="pesquisar..." value="{{ isset($palavra) ? $palavra : '' }}">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 sidebar">
                    <div class="sidebar-box bg-white p-4 ftco-animate">
                        <h3 class="heading-sidebar">Critério de pesquisa</h3>
                        <label for="option-critereo-1"><input type="checkbox" name="pesquisar_por[]"
                                value="comunidades-colecoes" checked>
                            Comunidades e Coleções</label><br>
                        <label for="option-critereo-2"><input type="checkbox" name="pesquisar_por[]"
                                value="data-lancamento"> Por
                            data de submissão</label><br>
                        <label for="option-critereo-3"><input type="checkbox" name="pesquisar_por[]" value="autores"> Por
                            Autores</label><br>
                        <label for="option-critereo-4"><input type="checkbox" name="pesquisar_por[]" value="titulos"> Por
                            Títulos</label><br>
                        <label for="option-critereo-5"><input type="checkbox" name="pesquisar_por[]" value="assuntos"> Por
                            Assunto</label><br>
                    </div>

                    <div class="sidebar-box bg-white p-4 ftco-animate">
                        <h3 class="heading-sidebar">Categoria</h3>
                        @isset($categorias)
                            @foreach ($categorias as $categoria)
                                <label for="option-categoria-type-1">
                                    <input type="checkbox" name="categorias[]" value="{{ $categoria->id }}">
                                    {{ $categoria->nome }} (00)
                                </label><br>
                            @endforeach
                        @endisset
                    </div>

                    <div class="sidebar-box bg-white p-4 ftco-animate">
                        <h3 class="heading-sidebar">Autores</h3>
                        @isset($autores)
                            @foreach ($autores as $autor)
                                <label for="option-autor-1">
                                    <input type="checkbox" name="autores[]" value="{{ $autor->id }}"> {{ $autor->nome }}
                                    {{ $autor->apelido }} (00)
                                </label><br>
                            @endforeach
                        @endisset
                    </div>

                    <div class="sidebar-box bg-white p-4 ftco-animate">
                        <h3 class="heading-sidebar">Data de Lançamento</h3>
                        <label for="option-data-1"><input type="checkbox" name="data_lancamento[]" value="2020;2023"
                                checked> 2020-2023</label><br>
                        <label for="option-data-2"><input type="checkbox" name="data_lancamento[]" value="2015;2019">
                            2015-2019</label><br>
                        <label for="option-data-3"><input type="checkbox" name="data_lancamento[]" value="2010;2014">
                            2010-2014</label><br>
                        <label for="option-data-4"><input type="checkbox" name="data_lancamento[]" value="2007;2009">
                            2007-2009</label><br>
                        <label for="option-data-5"><input type="checkbox" name="data_lancamento[]" value=""> Ver
                            mais</label><br>
                    </div>

                    <div class="sidebar-box bg-white p-4 ftco-animate">
                        <h3 class="heading-sidebar">Estatísticas</h3>
                        <form action="#" class="browse-form">
                            <label for="option-estatistica-1"><input type="checkbox" id="option-data-1" name="vehicle"
                                    value="" checked> Visualizar estatísticas</label><br>
                        </form>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-12">
                            @if (isset($resultados) && count($resultados) > 0)
                                @foreach ($resultados as $trabalho)
                                    <span style="text-decoration: none; color:grey;">
                                        <div class="card mx-2 mb-3">
                                            <div class="card-body">
                                                <div class="row pb-2">
                                                    <div class="col-2">
                                                        @if ($trabalho->getFirstMediaUrl('thumb'))
                                                            <img src="{{ $trabalho->getFirstMediaUrl('thumb') }}"
                                                                alt="thumbnail" style="width: 100px;">
                                                        @else
                                                            <img src="{{ url('thumbsFake/fake.jpg') }}" alt="thumbnail"
                                                                style="width: 100px;">
                                                        @endif

                                                    </div>
                                                    <div class="col-8">
                                                        <a class="py-0"
                                                            href="{{ route('home.pesquisar.detalhes', $trabalho->id) }}">{{ $trabalho->metadado->titulo }}</a>
                                                        <div class="my-0" style="font-size: 0.8em; color: #006621;">
                                                            <b>Autores:</b>
                                                            @foreach ($trabalho->metadado->autores as $autor)
                                                                <span>{{ $autor->apelido }}, {{ $autor->nome }}; </span>
                                                            @endforeach
                                                        </div>
                                                        <div class="divResumo description text-sm my-0 py-0"
                                                            style="font-size: 0.8em;">
                                                            {{ $trabalho->metadado->resumo }}
                                                        </div>
                                                        <div style=" margin-top: -5px; opacity:.7;">
                                                            <span class="text-sm my-0"
                                                                style="font-size: 0.6em;"><b>Publicado:</b>
                                                                {{ $trabalho->created_at }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                @endforeach
                            @else
                                <p>Não Encontrou</p>
                            @endif
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col">
                            <div class="block-27">
                                <ul>
                                    <li><a href="#">&lt;</a></li>
                                    <li class="active"><span>1</span></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">&gt;</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Fim container ou seja corpo da página -->

@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            var myDiv = $('.divResumo');
            if (myDiv.text().length > 250)
                myDiv.text(myDiv.text().substring(0, 250) + "...");
            console.log(myDiv.text());
        });
    </script>
@endsection
