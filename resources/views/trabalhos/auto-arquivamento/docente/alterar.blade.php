@extends('templates.template')
@section('title', 'Auto-arquivamento')


@section('content')


<style>
  textarea {
            width: 100%;
            height: 150px!important; /* Altura inicial da textarea */
            padding: 10px;
            box-sizing: border-box;
            font-size: 16px;
            resize: vertical; /* Permite a redimensionamento vertical */
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Estilos adicionais para destacar a textarea quando estiver focada */
        textarea:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
        }
</style>

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
       
        <div class="card-body">
            @if (@isset($sms))

            <div class="row">
             <div class="alert alert-success" role="alert">
                 <p class="text-center">{{$sms}}</p>
             </div>
            </div>
     
             @endif

             @if (session('erro'))

             <div class="row">
                <div class="alert alert-danger">
                  <p class="text-center">{{ session('erro') }}</p>

              </div>
             </div>
      
              @endif

              <div class="row">
                <div class="alert alert-danger"  id="erro-registar" hidden>
                  <p class="text-center">{{ session('erro') }}</p>
                </div>
              </div>

            <h4 class="card-title text-center text-primary"> <strong>Auto-Arquivamento-Alterar</strong> </h4>
                @if(isset($t))

                <form id="regForm" class="forms-sample without-margin" action="{{url('trabalho/autoarquivamento/docente-update')}}" method="POST" enctype="multipart/form-data" >
                    @csrf 
                    {{ method_field('PUT') }}
                    <!-- One "tab" for each step in the form: -->
                    <div class="tab">
                        <h5>Passo 1: </h5>  <hr>
                  
                      <div class="form-group">
                        <label>Coleção</label>
                        <select class="js-example-basic-single w-100 form-control" name="colecao">
                        <option value="{{$t->colecao_id}}">{{$t->colecao}}</option>
                        @foreach($colecoes as $col)
                        <option value="{{$col->id}}">{{$col->descricao}}</option>
                        @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <input type="hidden" name="trabalho_id" value="{{$t->codigo}}">
                        <input type="hidden" name="metadado_id" value="{{$t->metadado_id}}">
                        <label>Categoria</label>
                        <select class="js-example-basic-single w-100 form-control myinput" name="categoria">
                          <option value="{{$t->categoria_id}}">{{$t->categoria}}</option> 
                          @foreach($categorias as $cat)
                            
                            <option value="{{$cat->id}}">{{$cat->descricao}}</option>
                            @endforeach
                          
                        </select>
                      </div>

                      <div class="form-group">
                            <label>Orientador</label> 
                            <select class="js-example-basic-single w-100 form-control" name="orientador">
                              @if(isset($orientador))
                              <option value="{{$t->orientador_id}}">{{$t->orientador}}</option>
                                    @foreach($orientador as $o)
                                    
                                    <option value="{{$o->id}}">{{$o->nome}}</option>
                                    @endforeach
                              @endif
                              
                            </select>
                      </div>


                      <div class="form-group">
                        <label>Autor(es)</label>
                       <p><input class="form-control myinput" placeholder="Autor1, Autor2, Autor 3 ....." name="autor" value="{{$autores}}"></p>
                      </div>
                        
                </div>
                    
                    <div class="tab">
                            <h5>Passo 2: </h5>  <hr>
                            <div class="form-group">
                              <label>Título</label>
                              <p><input placeholder="Título" value="{{$t->titulo}}"  class="form-control" name="titulo"></p>
                            </div>

                            <div class="form-group">
                              <label>Língua</label>
                              <p><input placeholder="Língua" value="{{ $t->lingua }}" class="form-control" name="lingua"></p>
                            </div>

                            <div class="form-group">
                              <label>Local</label>
                              <p><input placeholder="Local" value="{{$t->local}}" class="form-control" name="local"></p>
                            </div>

                    </div>
                        
                        <div class="tab">
                            <h5>Passo 3: </h5>  <hr>
                        
                      
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Palavra chave</label>
                            <textarea  class="form-control" name="palavra" placeholder="palavras chaves" id="exampleFormControlTextarea1" rows="4">{{ $t->palavra_chave }}</textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Resumo</label>
                          <p><textarea  class="form-control" name="resumo" placeholder="Resumo do seu trabalho" id="exampleFormControlTextarea1" rows="4">{{ $t->resumo}}</textarea></p>
                      </div>

                      <div class="form-group">
                        <label for="fontes">Fontes</label>
                        
                        <p><textarea  class="form-control" name="fontes" placeholder="referencias do seu trabalho" id="fontes" rows="4">{{ $t->fontes }}</textarea></p>
                      </div>
                </div>
                    
                    <div class="tab">
                        <h5>Passo 4: </h5>  <hr>

                        <div class="form-group">
                            <label>File upload</label>
                            <input type="file"  name="arquivo" class="file-upload-default">
                            <div class="input-group col-xs-12">
                              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                              <span class="input-group-append" >
                                <button class="file-upload-browse btn btn-primary font-button" type="button">Upload</button>
                              </span>
                            </div>
                          </div>
                    </div>
                    
                    <div style="overflow:auto;">
                    <div style="float:right;">
                        <button type="button" id="prevBtn" class="btn btn-secondary" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" class="btn btn-primary font-button" onclick="nextPrev(1)">Next</button>
                    </div>
                    </div>
                    
                    <!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    </div>
                    
                    </form>
                    
                @endif
                </div>
            </div>
        </div>

             
<script src="{{asset('js/submissao_script.js')}}"></script>
<script src="{{url('../../js/file-upload.js')}}"></script>
<script src="{{url('../../js/typeahead.js')}}"></script>
<script src="{{url('../../js/select2.js')}}"></script>
<script src="{{url('../../vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
<script src="{{{url('../../vendors/select2/select2.min.js')}}}"></script>
<script src="{{url('../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script>

</script>
    @endsection
