@extends('templates.template')
@section('title', 'Trabalhos')




@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
       
      <div class="card-body">
        <h4 class="card-title text-center text-primary my-size-text"> <strong>Auto-Arquivamento</strong> </h4>
        @if (@isset($sms))

            <div class="row grid-margin stretch-card">
              <div class="alert alert-success" role="alert">
                <p>{{$sms}}</p>
            </div>
            </div>
        @endif

        <div class="table-responsive">
          <table class="table table-striped" id="datatable">
            <thead>
              <tr>
                <th>  #</th>
         
                <th>Tituto</th>
                <th>Coleção</th>
                <th>Categoria</th>
                <th>Data Criação</th>
                <th>Estado</th>
                <th> Acções </th>
               
              </tr>
            </thead>
            <tbody>
                @foreach($trabalhos as $c)
              <tr>
                    <td class="py-1">{{$c->codigo}} </td>
                    <td> {{$c->titulo}}  </td>
                    <td> {{$c->colecao}}  </td>
                    <td> {{$c->categoria}}  </td>
                    <td> {{$c->data_criacao}}  </td>
                    @if($c->estado=='pendente')
                    <td style="color:rgba(206, 190, 8, 0.993)"> {{$c->estado}}  </td>
                    @endif

                    @if($c->estado=='aprovado')
                    <td style="color:green"> {{$c->estado}}  </td>
                    @endif

                    @if($c->estado=='regeitado')
                    <td style="color:red"> {{$c->estado}}  </td>
                    @endif
                    
                    <td class="d-flex justify-content-center"> 
                      <a href="#"  class="btn btn-primary me-2 font-button">Alterar</a>
                      <a href="{{url("trabalho/autoarquivamento/detalhes/$c->codigo")}}"  class="btn btn-info me-2 font-button">Detalhes</a>
                    </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="{{asset('vendorS/jquery/jquery-3.3.1.min.js')}}"></script> 
  <script>
    $(document).ready(function(){
            //codigo para inicializar a data table
              var table=$('#datatable').DataTable(); 
    });

  </script>


@endsection