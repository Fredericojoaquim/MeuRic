@extends('layouts.guest')

@section('title', 'RIC-Detalhes Simples')
@section('location', 'Detalhes Simples')

@section('content')
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
                    <h1 class="mb-0 bread">Detalhes</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Fim texto no topo com a visualização da rota -->


    <!-- Container ou seja corpo da página de pesquisas -->
    <section class="ftco-section bg-light">
        <div class="container">
            <h1>Detalhes</h1>
            <div class="container">
                <div class="row" style="background-color: rgb(230, 230, 230); padding: 8px 5px; border-radius:5px;">
                    <div class="col-12" style="color: gray;">
                        <div class="d-flex justify-content-between">
                            <div class="well well-sm">Utilize este identificador para referenciar este registo:
                                <code>https://hdl.handle.net/1822/611</code>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SDUM - scopus -->
                <table border="0" align="center">
                    <tbody>
                        <tr valign="middle">
                            <td>
                                <div id="citecounts-scopus"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <!-- SDUM - scopus -->
                <table class="table itemDisplayTable">
                    <tbody>
                        <tr>
                            <td class="metadataFieldLabel dc_title"><b>Título</b>:&nbsp;</td>
                            <td class="metadataFieldValue dc_title">{{ $trabalho->metadado->titulo }}</td>
                        </tr>
                        <tr>
                            <td class="metadataFieldLabel dc_contributor_author"><b>Autor(es)</b>:&nbsp;</td>
                            <td class="metadataFieldValue dc_contributor_author">
                                @foreach ($trabalho->metadado->autores as $autor)
                                    <a class="authority author" href="#">{{ $autor->apelido }},
                                        {{ $autor->nome }}; </a>
                                @endforeach
                                <a class="orcid-link" target="_new" href="#"></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="metadataFieldLabel dc_subject"><b>Palavras-chave</b>:&nbsp;</td>
                            <td class="metadataFieldValue dc_subject">
                                <a class="subject" href="#">
                                    {{ $trabalho->metadado->palavras_chave }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="metadataFieldLabel dc_date_issued"><b>Data</b>
                                {{ $trabalho->created_at }}
                            </td>
                            <td class="metadataFieldValue dc_date_issued">2024</td>
                        </tr>
                        <tr>
                            <td class="metadataFieldLabel dc_identifier_citation"><b>Citação</b>:&nbsp;</td>
                            <td class="metadataFieldValue dc_identifier_citation">
                                {{ $trabalho->referencia }}
                            </td>
                        </tr>
                        <tr>
                            <td class="metadataFieldLabel dc_description_abstract"><b>Resumo(s)</b>:&nbsp;</td>
                            <td class="metadataFieldValue dc_description_abstract">
                                {{ $trabalho->metadado->resumo }}</td>
                        </tr>
                        <tr>
                            <td class="metadataFieldLabel dc_type"><b>Categoria</b>:&nbsp;</td>
                            <td class="metadataFieldValue dc_type"><a class="type" href="#">
                                    {{ $trabalho->categoria->nome }}
                                </a></td>
                        </tr>
                        <tr>
                            <td class="metadataFieldLabel dc_identifier_uri"><b>URI</b>:&nbsp;</td>
                            <td class="metadataFieldValue dc_identifier_uri"><a
                                    href="#">https://hdl.handle.net/1822/611</a></td>
                        </tr>
                        <tr>
                            <td class="metadataFieldLabel dc_rights"><b>Acesso</b>:&nbsp;</td>
                            <td class="metadataFieldValue dc_rights"><a class="rights" href="#">Acesso aberto</a></td>
                        </tr>
                        <tr>
                            <td class="metadataFieldLabel"><b>Aparece nas coleções:</b></td>
                            <td class="metadataFieldValue"><a href="#">
                                    {{ $trabalho->colecao->nome }}</a><br></td>
                        </tr>
                    </tbody>
                </table><br>
                <div class="panel panel-info">
                    <div class="panel-heading">Ficheiros deste registo:</div>
                    <table class="table panel-body table-stripped">
                        <tbody>
                            <tr>
                                <th id="t1" class="standard">Ficheiro</th>
                                <th id="t2" class="standard">Tamanho</th>
                                <th id="t3" class="standard">Formato</th>
                                <th>&nbsp;</th>
                            </tr>
                            @if ($trabalho->getFirstMedia('trabalhos'))
                                <tr>
                                    <td headers="t1" class="standard break-all"><a target="_blank"
                                            href="#">{{ $trabalho->getFirstMedia('trabalhos')->name }}.{{ $trabalho->getFirstMedia('trabalhos')->extension }}
                                    </td>
                                    <td>.{{ $trabalho->getFirstMedia('trabalhos')->extension }}</td>
                                    <td> <span id="size"
                                            data-size="{{ $trabalho->getFirstMedia('trabalhos')->size }}">0 Bytes</span>
                                    </td>
                                    <td class="standard" align="center"><a class="btn btn-primary" target="_blank"
                                            href="{{ $trabalho->getFirstMediaUrl('trabalhos') }}">Ver/Abrir</a>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="4">
                                        <p id="show_trabalho" class="text-center d-block" style="text-align: right;">Nenhum
                                            trabalho carregado</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="container row">
                    <a class="btn btn-primary" href="{{ route('home.pesquisar.detalhes.completo', $trabalho->id) }}">
                        <span class="fa fa-list-ul"></span> Ver registo completo
                    </a>
                    <a class="btn btn-success mx-2" href="#" target="new_window_correction">
                        <span class="fa fa-edit"></span> Sugerir correção</a>
                    <!--STATS ADDON  -->
                    <a class="statisticsLink  btn btn-info" href="#">
                        <span class="fa fa-bar-chart"></span> Estatísticas</a>
                    <!--END STATS ADDON  -->
                </div>
            </div>
        </div>
        </div>

    @endsection

    @section('scripts')
        <script>
            function formatBytes(bytes) {
                if (bytes < 1024) {
                    return bytes + ' bytes';
                } else if (bytes < 1024 * 1024) {
                    return (bytes / 1024).toFixed(2) + ' KB';
                } else if (bytes < 1024 * 1024 * 1024) {
                    return (bytes / (1024 * 1024)).toFixed(2) + ' MB';
                } else {
                    return (bytes / (1024 * 1024 * 1024)).toFixed(2) + ' GB';
                }
            }

            $(document).ready(function() {
                const tamanho = $('#size').data('size');
                console.log(tamanho);
                $('#size').text(formatBytes(tamanho));
            });
        </script>
    @endsection
