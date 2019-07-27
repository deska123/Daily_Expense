<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Daily Expense">
    <meta name="keywords" content="Daily Expense">
    <meta name="author" content="DPK">

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap-4.3.1-dist/js/bootstrap.min.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('bootstrap-4.3.1-dist/css/bootstrap.min.css') }}" rel="stylesheet">
  </head>
  <body>
    <div class="container-fluid">
      @include('navbar')
      @yield('content')
    <div>
  </body>
</html>
