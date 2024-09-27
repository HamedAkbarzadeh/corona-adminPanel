<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title ?? 'Corona Admin' }}</title>
    <!-- plugins:css -->
    @include('layouts.partials.head-tag')
    @yield('head-tag')
    @livewireStyles()
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}



    @stack('style')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
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
    @include('layouts.partials.script')
    @stack('script')
    <section class="toast-wrapper flex-row-reverse">
        @stack('toast')
        @include('layouts.alerts.toast.error')
        @include('layouts.alerts.toast.success')
    </section>
    @include('layouts.alerts.sweetalert.success')
    @include('layouts.alerts.sweetalert.error')

</body>

</html>
