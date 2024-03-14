<!DOCTYPE html>
<html lang="en">

<head>
    <title>Web Absensi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('layouts.styles')
    @include('layouts.scripts')

    <!--
      # Optional Resources
      Feel free to delete these if you don't need them in your project
    -->
</head>

<body>
    <div class="adminx-container">
        @include('layouts.navbar')

        <!-- expand-hover push -->
        <!-- Sidebar -->
        @include('layouts.sidebar')
        @yield('content')
    </div>

</body>

</html>
