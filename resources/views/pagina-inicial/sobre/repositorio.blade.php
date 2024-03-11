@extends('layouts.guest')

@section('title', 'RIC-Sobre o Repositório')
@section('location', 'Sobre o Repositório')

@section('content')
    <!-- Texto no topo com a visualização da rota -->
    <section class="hero-wrap hero-wrap-2"
        style="background-image: url('{{ url('template-pagina-inicial/images/biblioteca-agostinho.jpg') }}');background-attachment: fixed; background-position: 50% 50%; height: 300px;">
        <div class="overlay"></div>
        <div class="container" style="height: 300px;">
            <div class="row no-gutters slider-text align-items-end justify-content-center" style="height: 300px;">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Pagina Inicial <i
                                    class="fa fa-chevron-right"></i></a></span> <span>Sobre o Repositório <i
                                class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-0 bread">Sobre o Repositório</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Fim texto no topo com a visualização da rota -->


    <!-- Container ou seja corpo da página de pesquisas -->
    <section class="ftco-section bg-light">
        <div class="container">
            <a name="top"></a>

            <div class="container">
                <div class="row d-flex">
                    <div
                        class="col-md-12 heading-section pr-md-5 ftco-animate d-flex align-items-center fadeInUp ftco-animated">
                        <div class="w-100 mb-4 mb-md-0">
                            <span class="subheading">Sobre o Repositório</span>
                            <h2 class="mb-4">Repositório Intitucional da Computação</h2>
                            <p class="tex-justify">O Repositório Institucional da Computação é o repositório da Universidade Agostinho Neto,
                                desenvolvido na Faculdade de Ciências Naturais no departamento
                                de Ciências da Computação, com o objetivo de armazenar, preservar, divulgar e dar acesso à
                                produção
                                intelectual da Universidade em específico
                                do departamento de Ciências da Computação, em formato digital.<br><br>

                                Pretende reunir num único sítio o conjunto das publicações científicas do departamento (com
                                prespectiva de
                                evoluir para a escala universidade),
                                contribuindo para o acréscimo do impacto da investigação desenvolvida no departamento,
                                incrementando a sua
                                visibilidade e dos que
                                nela trabalham, bem como garantir a preservação da memória intelectual da Universidade em
                                geral.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!--NEW-->

            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><strong><a name="generic"></a>Mais informações</strong><br>
                            <br>


                            <a name="1"></a>
                            <div id="ParentDaIdeiaAConcretizacao"
                                onclick="javascript:hideshow('ChildDaIdeiaAConcretizacao')" style="cursor:help">
                                <span class="text-primary"><strong>+ Da ideia à concretização</strong></span><br>
                            </div>
                            <div id="ChildDaIdeiaAConcretizacao" style="display: none;">
                                <p align="justify"> Nenhuma Informação adicional
                                </p>
                            </div>

                            <a name="2"></a>
                            <div id="ParentOrganizacaoEFuncionamento"
                                onclick="javascript:hideshow('ChildOrganizacaoEFuncionamento')" style="cursor:help">
                                <span class="text-primary"><strong>+ Organização e funcionamento</strong></span><br>
                            </div>
                            <div id="ChildOrganizacaoEFuncionamento" style="display: none;">

                                <p align="justify">O Repositório Institucional da Computação está organizado em torno de <a
                                        href="#" target="_blank"><strong>coleções</strong></a> que correspondem às
                                    áreas temáticas de cada trabalho
                                    (Redes, Inteligência Artificial e Desenvolvimento Web).
                                    Cada coleção pode reunir os seus documentos em diferentes categorias e nela pode haver
                                    um número ilimitado de documentos. </p>
                                <p align="justify">Com esta organização, o Repositório permite aos estudantes uma grande
                                    flexibilidade ao pesquisar cada trabalho do seu interesse.
                                </p>
                                <p align="justify">Cada <a href="#" target="_blank">coleção</a> possui uma página
                                    própria com informação, últimos depósitos nessa coleção
                                    os autores que nela depositaram, bem como uma listagem das categorias dentro
                                    de cada coleção.</p>

                            </div>

                            <div id="ParentOQuePodeEncontrar" onclick="javascript:hideshow('ChildOQuePodeEncontrar')"
                                style="cursor:help">
                                <span class="text-primary"><strong>+ O que pode encontrar no
                                        Repositorio Institucional da Computação?</strong></span><br>
                            </div>
                            <div id="ChildOQuePodeEncontrar" style="display: none;">

                                <p align="justify">No Repositório pode encontrar diversos tipos de documentos, em formato
                                    digital, resultantes das atividades de ensino e investigação desenvolvidas no
                                    Departamento.</p>
                                <p align="justify">Os artigos de revistas científicas, as comunicações a congressos e
                                    conferências, os trabalhos de conclusão de curso, as teses de doutoramento e as
                                    dissertações mestrado constituem a maioria
                                    dos documentos depositados no Repositório. Neste momento o Repositório reúne
                                    documentos apenas do departamento da computação, mas com prespectiva de reunir de todas
                                    as áreas científicas existentes na Universidade do Agostinho Neto.</p>
                                <p align="justify">Recordamos que o Repositório está a crescer, com novos
                                    documentos depositados regularmente.
                                </p>
                            </div>

                            <a name="3"></a>
                            <div id="ParentComoAderirAoRepositorio"
                                onclick="javascript:hideshow('ChildComoAderirAoRepositorio')" style="cursor:help">
                                <span class="text-primary"><strong>+ Como pode aderir ao Repositório?</strong></span><br>
                            </div>
                            <div id="ChildComoAderirAoRepositorio" style="display: none;">

                                <p align="justify">Se dirige a biblioteca do campus universitário, teremos todo o gosto em
                                    poder ajudá-lo. </p>
                                <p align="justify">Se é membro de uma Unidade Orgânica que ainda não se constitui como
                                    comunidade no Repositório, lamentamos informar que seus trabalhos até ao momento ainda
                                    não podem ser depositados
                                    no repositório, com a aprovação e implementação deste trabalho, poderá sofrer a expansão
                                    do mesmo permitindo assim
                                    que trabalhos científicos de outras unidades orgánias possam ser depositadas. </p>
                                <p align="justify">Em outros casos, contacte-nos para iniciar seu processo de submissão ou
                                    registo: </p>
                                <p align="justify"><b>Correio eletrónico</b>: <a
                                        href="mailto:andremirandacardoso02@gmail.com">repositorio.ric@uan.ao</a></p>
                                <p align="justify"><b>Telefone</b>: 940564544</p>

                                <p></p>
                            </div>

                            <a name="4"></a>
                            <div id="ParentComoDepositarNoRepositorio"
                                onclick="javascript:hideshow('ChildComoDepositarNoRepositorio')" style="cursor:help">
                                <span class="text-primary"><strong>+ Como pode depositar no
                                        Repositório?</strong></span><br>
                            </div>
                            <div id="ChildComoDepositarNoRepositorio" style="display: none;">

                                <p align="justify">O depósito de documentos deve ser realizado através do bibliotecário da
                                    instituição ou por intermédio de algum docente do departamento. </p>
                                <p align="justify">Excecionalmente, para os autores que estejam enquadrados em unidades que
                                    não se constituíram em comunidades no Repositório, poderão ser depositados documentos
                                    por intermédio da biblioteca da instituição se assim for aprovado.
                                </p>
                                <p>Para o efeito de atribuição de permissões de depósito deve <a
                                        href="mailto:andremirandacardoso02@gmail.com">contactar-nos</a> previamente.</p>
                                <p>Para informações mais detalhadas sobre o processo de depósito de publicações consulte o
                                    <a href="#">Guia de
                                        Auto-Arquivo do Repositório</a>.
                                </p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr noshade="">
            <!--//END NEW-->
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        function hideshow(parentDiv) {
            if ($('#' + parentDiv).is(':visible')) {
                $('#' + parentDiv).hide(250);
                // $('#'+parentDiv).empty();
            } else {
                $('#' + parentDiv).show(250);
            }
        }

        $(document).ready(function() {

        });
    </script>
@endsection
