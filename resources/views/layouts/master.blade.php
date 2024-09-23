<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title ?? "Corona Admin" }}</title>
    <!-- plugins:css -->
    @include('layouts.partials.head-tag')
    @yield('head-tag')
    @livewireStyles()
    @include('layouts.partials.script')
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    @stack('script')
</head>

<body>
    <div class="container-scroller">

        <!-- partial -->
        @include('layouts.sidebar')
        <!-- partial -->

        {{ $slot }}

        <!-- main-panel ends -->

    </div>
    <!-- page-body-wrapper ends -->
    <!-- container-scroller -->
    @livewireScripts()
</body>

</html>