@extends('templates.template')
@section('title', 'Utilizadores')



@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Utilizadores</h4>
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
         
                <th>Nome </th>
                <th>Email </th>
                <th>Perfil </th>
                <th>Estado </th>
                <th> Acções </th>
               
              </tr>
            </thead>
            <tbody>
                @foreach($dados as $d)
              <tr>
                    <td class="py-1">{{$d->codigo}} </td>
              
                    <td> {{$d->name}}  </td>
                    <td> {{$d->email}}  </td>
                    <td> {{$d->perfil}}  </td>
                    <td> {{$d->estado}}  </td>
                    <td> 
                      <a href="{{url("user/aterar/$d->codigo")}}"  class="btn btn-primary me-2 font-button">Alterar</a>
                      @if($d->estado=="ativo")
                      <button class="btn btn-warning me-2 font-button" data-toggle="modal" onclick="retornaid({{$d->codigo}})"  data-target="#mymodal">bloquear</button>
                     
                      @else
                      <button class="btn btn-dark me-2 font-button" data-toggle="modal" onclick="retornaid({{$d->codigo}})"  data-target="#mymoda-desbloquear">desloquear</button>
                      @endif
                      
                    </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>



  <!-- Modal -->
 <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
          
          <div class="modal-body">
              <form action="{{url('user/bloquear')}}" method="POST">
                  @csrf
                  {{ method_field('PUT') }}
                  

              <p class="text-center">Tem certeza que deseja bloquear este utilizador? </p>

              <div class="text-right">
                  <input id="user_id" name="user_id"  type="hidden">
                  <button type="submit" class="btn btn-primary me-2 font-button" id="btn-registar">Confirmar</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancelar</button>
                 
              </div>


              </form>
             
          </div>
         
      </div>
  </div>
</div>
<!-- EndModal -->


  <!-- Modal -->
  <div class="modal fade" id="mymoda-desbloquear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            
            <div class="modal-body">
                <form action="{{url('user/desbloquear')}}" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    
  
                <p class="text-center">Tem certeza que deseja desbloquear este utilizador? </p>
  
                <div class="text-right">
                    <input id="user_id_" name="user_id"  type="hidden">
                    <button type="submit" class="btn btn-primary me-2 font-button" id="btn-registar">Confirmar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancelar</button>
                   
                </div>
  
  
                </form>
               
            </div>
           
        </div>
    </div>
  </div>
  <!-- EndModal -->
 
        
  <script src="{{asset('vendorS/jquery/jquery-3.3.1.min.js')}}"></script> 
  <script>
   
    var minhaTabela = document.getElementById('datatable');
    var dataTable = new DataTable(minhaTabela);

  </script>

@endsection