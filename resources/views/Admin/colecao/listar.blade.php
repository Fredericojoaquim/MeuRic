@extends('templates.template')
@section('title', 'Categoria')




@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Coleções</h4>

        @if (@isset($sms))

        <div class="row grid-margin stretch-card">
          <div class="alert alert-success" role="alert">
            <p>{{$sms}}</p>
         </div>
        </div>

    @endif

    @if (@isset($erro))

        <div class="row grid-margin stretch-card">
          <div class="alert alert-success" role="alert">
            <p>{{$erro}}</p>
         </div>
        </div>
        
    @endif
    
       
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>  #</th>
         
                <th>Descrição </th>

                <th> Acções </th>
               
              </tr>
            </thead>
            <tbody>
                @foreach($cat as $c)
              <tr>
                    <td class="py-1">{{$c->id}} </td>
              
                    <td> {{$c->descricao}}  </td>
                    <td> 
                      <a href="{{url("colecao/edit/$c->id")}}"  class="btn btn-primary me-2 font-button">Alterar</a>
                    </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


@endsection