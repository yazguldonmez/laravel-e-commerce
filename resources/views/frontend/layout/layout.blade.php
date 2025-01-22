<!DOCTYPE html>
<html lang="en">
@include('frontend.inc.head')

<body>

    <div class="site-wrap">

        @include('frontend.inc.header')

        @yield('content')

        @include('frontend.inc.footer');
    </div>


    @yield('customjs');
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
