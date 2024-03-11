@extends('templates.template')
@section('title', 'Orientador')




@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Oreintadores</h4>

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
         
                <th>Nome </th>

                <th> Acções </th>
               
              </tr>
            </thead>
            <tbody>
                @foreach($orientadores as $c)
              <tr>
                    <td class="py-1">{{$c->id}} </td>
              
                    <td> {{$c->nome}}  </td>
                    <td> 
                      <a href="{{url("orientador/edit/$c->id")}}"  class="btn btn-primary me-2 font-button">Alterar</a>
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