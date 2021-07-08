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
      <link rel="stylesheet" href="{{asset('css/styles.css')}}">
      <link rel="stylesheet" href="{{asset('css/media/styles.css')}}">
   </head>
   <body>
   
      <x-main_header/>

      @yield('content')

      <x-main_footer/>

      <button type="button" class="scroll-top-button">
         <span class="material-icons scroll-top-button__icon">arrow_upward</span>
      </button>

      <script src="{{asset('js/main.js')}}"></script>

      @yield('scripts')
   
   </body>
</html>