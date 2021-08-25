<!DOCTYPE html>
<html lang="ru">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>AtS Book Space</title>
      {{-- material icons --}}
      <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
      {{-- Datetime picker --}}
      <link rel="stylesheet" href="{{asset('css/datetimepicker.css')}}"> 
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
      
      <div class="cursor-wrapper">
         <div id="cursor"></div>
      </div>
      {{-- JQuery 3.6 --}}
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      {{-- Datetime picker --}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js" integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ==" crossorigin="anonymous"></script>
      <script type="text/javascript" src="{{asset('js/datetimepicker.js')}}"></script>
      {{-- main scripts --}}
      <script src="{{asset('js/main.js')}}"></script>
      {{-- page scripts --}}
      @yield('scripts')
   </body>
</html>