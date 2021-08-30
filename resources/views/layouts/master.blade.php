<!DOCTYPE html>
<html lang="ru">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="csrf-token" content="{{csrf_token()}}">
      <title>AtS Book Space</title>
      {{-- Material icons --}}
      <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">
      {{-- Datetime picker --}}
      <link rel="stylesheet" href="{{asset('css/datetimepicker.css')}}"> 
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      {{-- Owl carousel --}}
      <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
      {{-- Styles --}}
      <link rel="stylesheet" href="{{mix('/css/styles.css')}}">
   </head>
   <body>
      
      @include('layouts.header')

      @yield('content')

      @include('layouts.footer')

      <section class="feedback hidden" id="feedback">
         <form class="feedback-form" id="feedback-form">
            @csrf
            <label class="title feedback__title" for="feedback-msg">
               {{__('Написать нам')}}
               <button class="button button--red feedback__button--red" id="feedback-reset" type="reset">{{__('Очистить')}}</button>
            </label>
            <textarea class="feedback__textarea" id="feedback-msg" name="message" placeholder="{{__('Ваш вопрос или сообщение *')}}"></textarea>
            <button class="button feedback__btn" id="feedback-submit" type="submit">{{__('Отправить')}}</button>
         </form>
      </section>
      <div class="modal hidden" id="feedback-success-modal">
         <div class="modal__msg-wrapper">
            <p class="modal__msg">{{__('Ваше сообщение доставлено')}}!</p>
         </div>
         <div class="modal__btn-wrapper">
            <button class="button" id="feedback-success-modal__ok-btn" type="button">{{__('OK')}}</button>
         </div>
         <button class="modal__close-btn" type="button" aria-label="{{__('Закрыть')}}">
            <span class="material-icons modal__close-icon" id="feedback-success-modal__close-btn">close</span>
         </button>
      </div>

      <button class="scroll-top-btn" id="scroll-top-btn" type="button">
         <img src="{{asset('img/scroll-to-top.png')}}">
      </button>
      {{-- JQuery 3.6 --}}
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      {{-- Datetime picker --}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js" integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ==" crossorigin="anonymous"></script>
      <script type="text/javascript" src="{{asset('js/datetimepicker.js')}}"></script>
      {{-- Owl carousel --}}
      <script src="{{asset('js/owl.carousel.min.js')}}"></script>
      {{-- Scripts --}}
      <script src="{{mix('/js/scripts.js')}}"></script>
   </body>
</html>