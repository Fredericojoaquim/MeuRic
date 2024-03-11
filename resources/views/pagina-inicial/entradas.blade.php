<section class="ftco-section services-section pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <div class="item">
                    <div class="testimony-wrap py-4"
                        style="background-color: whitesmoke; border-left: 6px solid #4986fc;">
                        <!--Titulo-->
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="heading mb-3 float-left pl-5">Entradas recentes</h3>
                            </div>

                            <!--Carrosel-->
                            <div class="col-md-12">
                                <div class="carousel-testimony owl-carousel owl-theme">
                                    @if (isset($fivelast))
                                        @if ($fivelast->count() <= 0)
                                            <div class="item">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="mb-4">Nenhum trabalho depositado até ao momento</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @foreach ($fivelast as $f)
                                            <div class="item">
                                                <div class="text px-5">
                                                    <div style="font-weight: bold;">{{ $f->titulo }}
                                                    </div>
                                                    <p class="mb-4  text-justify">
                                                        {{ $f->resumo }}
                                                    </p>
                                                    <div class="d-flex align-items-center pl-4">
                                                        <div class="user-img"
                                                            style="background-image: url('#')) }});">
                                                        </div>
                                                        <div class="d-flex flex-column align-items-start pl-3">
                                                          @if(isset($autores))


                                                              @foreach($autores as $a)

                                                                      @if($f->codigo==$a->trabalho_id)
                                                                        <p class="name">{{$a->nomeautor}}</p>
                                                                      @endif
                                                                
                                                              @endforeach

                                                                    
                                                          @endif
                                                            
                                                            <span
                                                                class="position">{{$f->categoria}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="item">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="mb-4">Nenhum trabalho depositado até ao momento</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    {{-- <div class="item">
                      <div class="text px-5">
                        <div style="font-weight: bold;">Avaliação do impacto da micorrização no desenvolvimento de
                          clones de castanheiro</div>
                        <p class="mb-4">
                          O presente trabalho teve como principal objetivo a avaliação do impacto da micorrização no
                          desenvolvimento de clones castanheiro. Para atingir o objetivo, foi necessário otimizar o
                          crescimento dos fungos in vitro, o que incluiu testes de crescimento em diferentes meios de
                          cultura, a aplicação de um planeamento fatorial completo, diversas análises químicas e ainda o
                          desenvolvimento de técnicas efi...
                        </p>
                        <div class="d-flex align-items-center pl-4">
                          <div class="user-img" style="background-image: url({{ url('template-pagina-inicial/images/person_1.jpg') }});"></div>
                          <div class="d-flex flex-column align-items-start pl-3">
                            <p class="name">André, et al</p>
                            <span class="position">Redes de computadores</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="text px-5">
                        <div style="font-weight: bold;">Avaliação do impacto da micorrização no desenvolvimento de
                          clones de castanheiro</div>
                        <p class="mb-4">
                          O presente trabalho teve como principal objetivo a avaliação do impacto da micorrização no
                          desenvolvimento de clones castanheiro. Para atingir o objetivo, foi necessário otimizar o
                          crescimento dos fungos in vitro, o que incluiu testes de crescimento em diferentes meios de
                          cultura, a aplicação de um planeamento fatorial completo, diversas análises químicas e ainda o
                          desenvolvimento de técnicas efi...
                        </p>
                        <div class="d-flex align-items-center pl-4">
                          <div class="user-img" style="background-image: url({{ url('template-pagina-inicial/images/person_1.jpg') }});"></div>
                          <div class="d-flex flex-column align-items-start pl-3">
                            <p class="name">André, et al</p>
                            <span class="position">Redes de computadores</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="text px-5">
                        <div style="font-weight: bold;">Avaliação do impacto da micorrização no desenvolvimento de
                          clones de castanheiro</div>
                        <p class="mb-4">
                          O presente trabalho teve como principal objetivo a avaliação do impacto da micorrização no
                          desenvolvimento de clones castanheiro. Para atingir o objetivo, foi necessário otimizar o
                          crescimento dos fungos in vitro, o que incluiu testes de crescimento em diferentes meios de
                          cultura, a aplicação de um planeamento fatorial completo, diversas análises químicas e ainda o
                          desenvolvimento de técnicas efi...
                        </p>
                        <div class="d-flex align-items-center pl-4">
                          <div class="user-img" style="background-image: url({{ url('template-pagina-inicial/images/person_1.jpg') }});"></div>
                          <div class="d-flex flex-column align-items-start pl-3">
                            <p class="name">André, et al</p>
                            <span class="position">Redes de computadores</span>
                          </div>
                        </div>
                      </div>
                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
