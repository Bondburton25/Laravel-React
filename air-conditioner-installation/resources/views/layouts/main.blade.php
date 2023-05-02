<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
    @include('layouts.stylesheets')
    @stack('styles')
    @yield('styles')
</head>
<body id="page-top">
    <div id="wrapper">
        @include('layouts.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('layouts.topbar')
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <!-- / Main Content -->
            @include('layouts.footer')
        </div>
        <!-- End of Content Wrapper -->
    </div>
@include('layouts.javascript')
</body>
</html>
