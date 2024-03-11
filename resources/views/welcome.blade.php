@extends('layouts.guest')

@section('title', 'RIC-Página Inicial')
@section('location', 'Página Inicial')

@section('content')
    <!-- Texto inicial no topo junto com a barra de pesquisa -->
    <section class="hero-wrap hero-wrap-2"
        style="background-image: url('{{ url('template-pagina-inicial/images/biblioteca-agostinho.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h1 class="bread">Repositório Institucional da Computação</h1>
                    <p class="py-4">Obtenha como resultado todos os trabalhos
                        científicos
                        produzidos
                        pelo departamento da
                        computação.</p>
                    {{ csrf_field() }}
                    <form method="GET" action="{{url('Home/pesquisar')}}" id="home_search_form_2"
                        class="home_search_form d-flex flex-lg-row flex-column align-items-center justify-content-center">
                        <div class="d-flex flex-row align-items-center justify-content-center">
                            <input type="search" class="home_search_input" placeholder="Pesquise aqui" id="pesquisar"
                                name="title" required="required">
                            <button type="submit" class="home_search_button">pesquisar</button>
                        </div>
                    </form>
                    <div id="pesquisar_list" style="position: absolute; left:10%; width: 80%"></div>
                </div>
            </div>
        </div>
    </section>
    <!--Fim Texto inicial no topo junto com a barra de pesquisa -->

    <!--Sobre o repositório institucional da computação -->
    <section class="ftco-section services-section">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-6 heading-section pr-md-5 ftco-animate d-flex align-items-center">
                    <div class="w-100 mb-4 mb-md-0">
                        <span class="subheading">Seja bem vindo ao RIC</span>
                        <h2 class="mb-4">Repositório Intitucional para a Computação</h2>
                        <p>O repositório institucional da computação - repositoório pertencente a Universidade Dr. António
                            Agostinho
                            Neto, mas específicamente a Faculdade de Ciências Naturais - Departamento de Ciências da
                            Computação.</p>
                        <p>Contitui a coleção de documentos que formam a produção intelectual, acadêmica e científica desta
                            comunidade universitária. Tem como objectivos reunir, organizar, divulgar e preservar a produção
                            ciêntífica do Departamento de Ciências da Computação da Universidade Agostinho Neto.</p>
                        <div class="d-flex video-image align-items-center mt-md-4">
                            <a href="{{ url("Home/sobre") }}" class="btn btn-primary py-2 px-3">Saiba mais</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-tools"></span>
                                </div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Teses e Dissertações</h3>
                                    <p>Mais de
                                        <span class="badge bg-secondary text-sm">30</span> teses de dissertações produzidas
                                        ao ano
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services">
                                <div class="icon icon-2 d-flex align-items-center justify-content-center"><span
                                        class="flaticon-instructor"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Artigos Científicos</h3>
                                    <p>A universidade contém os melhores artigos científicos da geração</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services">
                                <div class="icon icon-3 d-flex align-items-center justify-content-center"><span
                                        class="flaticon-quiz"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Teses de Doutoramento</h3>
                                    <p>Formando em média
                                        <span class="badge bg-secondary text-sm">21</span> novos quadros todo ano
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services">
                                <div class="icon icon-4 d-flex align-items-center justify-content-center"><span
                                        class="flaticon-browser"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Trabalhos de Conclusão de Curso</h3>
                                    <p>Mais de
                                        <span class="badge bg-secondary text-sm">60</span> licenciados em 2023
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Fim do sobre o repositório institucional da computação-->

    <!--Trabalhos que entraram recentement-->
    @include('pagina-inicial.entradas')
    <!-- Fim trabalhos que entraram recentemente -->

    <!-- Resumo do total de trabalhos da instituição -->
    <section class="ftco-section ftco-counter img" id="section-counter"
        style="background-image: url({{ url('template-pagina-inicial/images/uan_frente_reitoria.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 d-flex align-items-center">
                        <div class="icon"><span class="flaticon-online"></span></div>
                        <div class="text">
                            <strong class="number" data-number="0">0</strong>
                            <span>Teses e dissertações</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 d-flex align-items-center">
                        <div class="icon"><span class="flaticon-graduated"></span></div>
                        <div class="text">
                            @if(isset($tcc))
                            <strong class="number" data-number="{{$tcc}}">{{$tcc}}</strong>
                            @endif
                            <span>Trabalhos de Fim do Cursos</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 d-flex align-items-center">
                        <div class="icon"><span class="flaticon-instructor"></span></div>
                        <div class="text">
                            <strong class="number" data-number="0">0</strong>
                            <span>Periódicos</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 d-flex align-items-center">
                        <div class="icon"><span class="flaticon-tools"></span></div>
                        <div class="text">
                            @if(isset($artigos))
                            <strong class="number" data-number="{{$artigos}}">{{$artigos}}</strong>
                            @endif
                            
                            <span>Artigos científicos</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Fim Resumo do total de trabalhos da instituição -->

@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            $('input[type="search"]').on('search', function() {
                var query = $('#pesquisar').val();
                if (query == '') {
                    $('#pesquisar_list').fadeOut();
                    $('#pesquisar_list').empty();
                }
            });

            $('#pesquisar').keyup(function() {
                var query = $(this).val();
                // alert(query);
                if (query != '') {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: '{{ url("#") }}',
                        method: "POST",
                        data: {
                            query: query,
                            _token: _token
                        },
                        success: function(data) {
                            $('#pesquisar_list').fadeIn();
                            $('#pesquisar_list').html(data);
                        },
                        error: function(response) {
                            console.log(response);
                        }
                    });
                } else {
                    $('#pesquisar_list').fadeOut();
                    $('#pesquisar_list').empty();
                }
            });

            $(document).on('click', '#pesquisar_list li', function() {
                $('#pesquisar').val($(this).text());
                $('#pesquisar_list').fadeOut();
                $('#home_search_form_2').submit();
            });
        });
    </script>
@endsection
