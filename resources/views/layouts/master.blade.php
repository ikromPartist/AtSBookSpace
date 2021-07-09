<!DOCTYPE html>
<html lang="ru">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>AtS Book Space</title>
      {{-- material icons --}}
      <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
      {{-- main styles --}}
      <link rel="stylesheet" href="{{asset('css/main.css')}}">
      {{-- page styles --}}
      @yield('styles')
   </head>
   <body>
   
      @include('layouts.header')

      @yield('content')

      @include('layouts.footer')

      <x-scroll_button/>
      {{-- JQuery 3.6 --}}
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      {{-- main scripts --}}
      <script src="{{asset('js/main.js')}}"></script>
      {{-- page scripts --}}
      @yield('scripts')
   
   </body>
</html>