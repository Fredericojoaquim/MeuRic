@extends('layouts.login')

@section('title', 'Login')
@section('location', 'Login')


@section('content')



<section class="py-0" id="home">
    <div id="bg" class="bg-holder d-none d-sm-block" style="background-image:url({{ url('login-assets/img/illustrations/hero-bg.png') }});background-position:right top;background-size:contain;">
    </div>
    <!--/.bg-holder-->
    <div class="bg-holder" style="background-image:url({{ url('login-assets/img/illustrations/bg.png);background-position:left top;background-size:initial;margin-top:0px;') }}">
    </div>
    <!--/.bg-holder-->

    <div class="container">
      <div class="row align-items-center min-vh-75 min-vh-md-100">
        <div class="col-md-7 col-lg-6 py-5 text-sm-start text-center">
           <h2 class="mt-2 mb-sm-2 display-6 fw-semi-bold lh-sm ">Encontre as principais criações científicas
            <br class="d-block d-lg-none d-xl-block">da instituição
           </h2>
           <p class="mb-5 fs-1">Rápido, fácil e ágil</p>
          <div class="pt-4">
            <div class="card card-span h-100 shadow-lg">
            <div class="card-span-img">
                    <a href="/">
                    <img src="{{url('images/logos/mylogo.png')}}" style="width: 200px;" alt="">
                    </a>
            </div>

           

                <div class="card-body d-flex flex-column flex-center py-6">

                  @if(isset($erro))
                    <div class="row">
                      <div class="alert alert-danger"  id="erro-registar">
                        <p class="text-center">{{$erro}}</p>
                      </div>
                    </div> 
                 @endif

                    <div class="my-4" style="width: 70%;">
                      <!-- Session Status -->
                      <x-auth-session-status class="mb-4" :status="session('status')" />

                      <!-- Validation Errors -->
                      <x-auth-validation-errors class="mb-4" :errors="$errors" />

                      <form method="POST" action="{{ route('login') }}">
                          @csrf

                          <!-- Email Address -->
                          <div>
                              <x-label for="email" :value="__('Email')" />

                              <x-input id="email" class="rounded-end-0 form-control" type="email"
                              placeholder="e-mail" name="email" :value="old('email')" required autofocus />
                          </div>

                          <!-- Password -->
                          <div class="mt-4">
                              <x-label for="password" :value="__('Password')" />

                              <x-input id="password" class="rounded-end-0 form-control"
                                              type="password"
                                              name="password"
                                              placeholder="palavra-passe"
                                              required autocomplete="current-password" />
                          </div>
                          <div class="flex items-center justify-end mt-4">
                              @if (Route::has('password.request'))
                                  <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                      Esqueceu sua palavra-passe?
                                  </a> <br>
                              @endif
                            <div class="mt-2">
                                <x-button class="btn btn-primary rounded-start-0">
                                    Entrar
                                </x-button>
                                <a class="btn btn-default rounded-start-0" style="border: solid 2px gray;" href="{{url('/')}}">Cancelar</a>
                            </div>
                          </div>
                      </form>
                    </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
