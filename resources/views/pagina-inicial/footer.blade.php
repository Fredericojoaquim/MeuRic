<footer class="ftco-footer ftco-no-pt">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md pt-5">
                <div class="ftco-footer-widget pt-md-5 mb-4">
                    <h2 class="ftco-heading-2">Sobre nós</h2>
                    <p>Grupo de estudantes finalistas do 5 ano do curso de ciências da computação da universidade
                        agostinho neto</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft">
                        <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md pt-5">
                <div class="ftco-footer-widget pt-md-5 mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Outros</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">Estatísticas</a></li>
                        <li><a href="#" class="py-2 d-block">Ajuda</a></li>
                        <li><a href="#" class="py-2 d-block">FAQS</a></li>
                        <li><a href="#" class="py-2 d-block">Políticas de Privacidade</a></li>
                        <li><a href="#" class="py-2 d-block">Contacte-nos</a></li>
                        <li><a href="#" class="py-2 d-block">Avaliar</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md pt-5">
                <div class="ftco-footer-widget pt-md-5 mb-4">
                    <h2 class="ftco-heading-2">Categorias recentes</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">TCCs</a></li>
                        <li><a href="#" class="py-2 d-block">Artigos científicos</a></li>
                        <li><a href="#" class="py-2 d-block">Teses de doutoramentos</a></li>
                        <li><a href="#" class="py-2 d-block">Periódicos</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md pt-5">
                <div class="ftco-footer-widget pt-md-5 mb-4">
                    <h2 class="ftco-heading-2">Alguma outra questão?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon fa fa-map-marker"></span><span class="text">Rua 11 de novembro,
                                    Luanda/Angola</span></li>
                            <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+244 940
                                        564 544</span></a></li>
                            <li><a href="#"><span class="icon fa fa-paper-plane"></span><span
                                        class="text">contact.ric@uan.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Universidade Agostinho Neto - Faculdade de Ciências / Departamento de Ciências da Computação -
                    Copyright
                    &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
            stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>


<script src="{{ url('template-pagina-inicial/js/jquery.min.js') }}"></script>
<script src="{{ url('template-pagina-inicial/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ url('template-pagina-inicial/js/popper.min.js') }}"></script>
<script src="{{ url('template-pagina-inicial/js/bootstrap.min.js') }}"></script>
<script src="{{ url('template-pagina-inicial/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ url('template-pagina-inicial/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ url('template-pagina-inicial/js/jquery.stellar.min.js') }}"></script>
<script src="{{ url('template-pagina-inicial/js/owl.carousel.min.js') }}"></script>
<script src="{{ url('template-pagina-inicial/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ url('template-pagina-inicial/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ url('template-pagina-inicial/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ url('template-pagina-inicial/js/scrollax.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{ url('template-pagina-inicial/js/google-map.js') }}"></script>
<script src="{{ url('template-pagina-inicial/js/main.js') }}"></script>


<!-- Funcões personalizadas javascript-->
<script>
    function erro_abrir_modal(mensagem) {
        if (mensagem)
            toastr["error"](
                "Opps! Ocorreu algum erro, não foi possível realizar a operação no momento. Detalhes: " + mensagem,
                "Alerta");
        else
            toastr["error"](
                "Opps! Ocorreu algum erro, não foi possível realizar a operação no momento. Tente novamente mais tarde",
                "Alerta");

    }

    function showErrorMessage(xhr, status, error) {
        if (xhr.responseText != "") {

            var jsonResponseText = $.parseJSON(xhr.responseText);
            console.log("Detalhes do erro: " + JSON.stringify(jsonResponseText));
            var jsonResponseStatus = '';
            var message = '';
            $.each(jsonResponseText, function(name, val) {
                if (name == "message") {
                    message = val;
                    // jsonResponseStatus = $.parseJSON(JSON.stringify(val));
                    // $.each(jsonResponseStatus, function(name2, val2) {
                    //     if (name2 == "Message") {
                    //         message = val2;
                    //     }
                    // });
                }
            });

            return message;
        }
    }
</script>

@yield('scripts')
