<!DOCTYPE html>
<html lang="en">

<head>
    @include('client.share.css')
</head>

<body class="sticky-menu stick">
    <div class="wrapper">

        @include('client.share.header')

        @yield('noi_dung')

        @include('client.share.footer')
    </div>
    <!-- Overlay Search -->
    @include('client.share.search')

    @include('client.share.order')

    @include('client.share.js')
    @yield('js')
</body>

</html>
