<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Daily Expense</title>
    <meta charset="utf-8">
    <meta name="description" content="Daily Expense">
    <meta name="keywords" content="Daily Expense">
    <meta name="author" content="DPK">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('bootstrap-4.3.1-dist/css/bootstrap.min.css')}}">
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('bootstrap-4.3.1-dist/js/bootstrap.min.js')}}"></script>
  </head>
  <body>
    <div class="container-fluid">
      @include('navbar')
      @yield('main')
    <div>
  </body>
</html>
