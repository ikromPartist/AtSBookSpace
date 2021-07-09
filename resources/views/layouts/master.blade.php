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
      {{-- main scripts --}}
      <script src="{{asset('js/main.js')}}"></script>
      {{-- page scripts --}}
      @yield('scripts')
   
   </body>
</html>