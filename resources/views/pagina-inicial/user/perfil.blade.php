@extends('layouts.guest')

@section('title', 'RIC-Perfil')
@section('location', 'Perfil')

@section('content')
<!-- Texto no topo com a visualização da rota -->
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{url('template-pagina-inicial/images/biblioteca-agostinho.jpg')}}');background-attachment: fixed; background-position: 50% 50%; height: 300px;">
    <div class="overlay"></div>
    <div class="container" style="height: 300px;">
        <div class="row no-gutters slider-text align-items-end justify-content-center" style="height: 300px;">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Pagina Inicial <i class="fa fa-chevron-right"></i></a></span> <span>Perfil <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread">Perfil</h1>
            </div>
        </div>
    </div>
</section>
<!-- Fim texto no topo com a visualização da rota -->


<!-- Container ou seja corpo da página de pesquisas -->
<section class="ftco-section bg-light">
    <div class="container">
        <h1>Perfil</h1>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {

    });
</script>
@endsection
