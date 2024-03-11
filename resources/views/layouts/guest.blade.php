@include('pagina-inicial.header')

<div class="font-sans text-gray-900 antialiased">
    <!--Menu do topo-->
    @include('pagina-inicial.menu')
    <!-- END nav -->
    {{-- content page --}}
    @yield('content')
</div>

<!--Menu do footer-->
@include('pagina-inicial.footer')
<!-- END footer -->
</body>

</html>
