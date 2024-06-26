@extends('templates.template')
@section('title', 'Trabalhos')




@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
       
      <div class="card-body">
        <h4 class="card-title text-center text-primary my-size-text"> <strong>Meus trabalhos</strong> </h4>
        @if (@isset($sms))

            <div class="row grid-margin stretch-card">
              <div class="alert alert-success" role="alert">
                <p>{{$sms}}</p>
            </div>
            </div>
         @endif

         @if(isset($erro))

         <div class="row">
          <div class="alert alert-danger" id="erro-registar">
            <p class="text-center">{{ $erro}}</p>

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
                    <td> {{$c->estado}}  </td>
                    <td class="d-flex justify-content-center">
                      @if($c->estado!='aprovado')
                      <a href="{{url("trabalho/autoarquivamento/user-edit/$c->codigo")}}"  class="btn btn-primary me-2 font-button">Alterar</a>
                      @else
                      <button class="btn btn-primary me-2 font-button" disabled>Alterar</button>
                      @endif 
                     
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


              $('#datatable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json"
        }
    });

    // Verifique se a DataTable já foi inicializada antes de recriá-la
    if ($.fn.DataTable.isDataTable('#datatable')) {
        // Destrua a DataTable existente antes de recriá-la
        $('#datatable').DataTable().destroy();
    }

    $('#datatable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json"
        }
    });
    var table=$('#datatable').DataTable();
   // Adicione classes do Bootstrap aos botões de paginação após a DataTable ser inicializada
   $('#datatable_paginate .paginate_button').addClass('btn btn-outline-primary');

// Personalize os ícones dos botões de paginação
$('#datatable_previous').html('<i class="fas fa-chevron-left"></i> Anterior');
$('#datatable_next').html('Próximo <i class="fas fa-chevron-right"></i>');

              
    });

   

   


    
   


    

  </script>


@endsection