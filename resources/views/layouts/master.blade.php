<!DOCTYPE html>
<html lang="ru">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>AtS Book Space</title>
      {{-- material icons --}}
      <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">
      {{-- main styles --}}
      <link rel="stylesheet" href="{{asset('css/main.css')}}">
      <link rel="stylesheet" href="{{asset('css/media/main.css')}}">
      {{-- page styles --}}
      @yield('styles')
   </head>
   <body>
   
      {{-- header component --}}
      <x-main_header/>
      {{-- sidebar component --}}
      <x-main_sidebar/>
      {{-- pages content --}}
      @yield('content')
      {{-- footer component --}}
      <x-main_footer/>
      {{-- main scripts --}}
      <script src="{{asset('js/main.js')}}"></script>
      {{-- page scripts --}}
      @yield('scripts')
   
   </body>
</html>