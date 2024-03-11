@extends('layouts.guest')

@section('title', 'RIC-Copyrights')
@section('location', 'Copyrights')

@section('content')
    <!-- Texto no topo com a visualização da rota -->
    <section class="hero-wrap hero-wrap-2"
        style="background-image: url('{{ url('template-pagina-inicial/images/biblioteca-agostinho.jpg') }}');background-attachment: fixed; background-position: 50% 50%; height: 300px;">
        <div class="overlay"></div>
        <div class="container" style="height: 300px;">
            <div class="row no-gutters slider-text align-items-end justify-content-center" style="height: 300px;">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Pagina Inicial <i
                                    class="fa fa-chevron-right"></i></a></span> <span>Copyrights <i
                                class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-0 bread">Copyrights</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Fim texto no topo com a visualização da rota -->


    <!-- Container ou seja corpo da página de pesquisas -->
    <section class="ftco-section bg-light">
        <div class="container">
            <h1>Guia sobre Políticas de Copyright e Auto-Arquivo</h1>

            <p align="justify">Todos os direitos de autor/copyright pertencem ao(s) autor(es), a menos que este(s) os
                tenha(m)
                transmitido/cedido a terceiros de modo formal e explícito (como geralmente acontece na publicação em
                revistas
                científicas internacionais). As condições em que o(s) autor(es) cedem os seus direitos a terceiros
                (geralmente
                aos editores) são variáveis. Em muitos casos elas continuam a permitir o auto-arquivo de uma cópia do
                trabalho
                em repositórios. </p>
            <p align="justify">A publicação de um trabalho (nas atas de uma conferência, numa revista, etc.) sem essa


                explicita&nbsp;transferência de direitos não afeta a integridade dos direitos do(s) autor(es), nomeadamente
                o
                direito de auto-arquivar(em) o seu trabalho em repositórios, ou de o difundirem por outros meios.</p>

            <p align="justify">As listagens que são facultadas classificam as políticas de copyright e auto arquivo de
                editoras
                e das suas publicações através de <a href="#" target="_blank">códigos de cores</a>,
                apresentando um sumário genérico das condições e contendo ligações para os websites das editoras. </p>
            <p align="justify">Se não encontrar a editora ou a revista que procura pode solicitar informação sobre a sua
                política e sugerir o seu acrescento à base de dados enviando-nos uma <span><a href="#"
                        target="_blank">mensagem</a><i class="fa fa-mail-to"></i>.</span> Para obter informação sobre a
                política
                de copyright e auto-arquivo de alguma
                revista científica, por favor identifique-a de forma tão completa quanto possível, indicando o título
                completo,
                a editora (comercial), se disponível.<br>
                <br>
                Pode também <a href="#" target="_blank"> solicitar autorização à editora</a> para auto-arquivar
                o seu documento, se não conhecer a sua política, não se recordar do teor da declaração que assinou e/ou se o
                documento que quer depositar já tenha sido publicado há muito tempo.
            </p>
            <p align="justify">Pode ainda consultar <a href="#" target="_blank">estatísticas </a> actualizadas acerca
                das
                políticas das editoras, sugerir eventuais <a href="#" target="_blank">correções </a> ou <a
                    href="#" target="_blank">recomendar a inclusão
                    de outras revistas/editoras</a>. </p>
            <p align="justify">Este serviço é essencialmente para uso da comunidade académica e todas as informações são
                fornecidas nessa perspetiva. Todos os dados deverão estar corretos, mas não devem ser assumidos como
                juridicamente válidos. </p>
            <hr>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
