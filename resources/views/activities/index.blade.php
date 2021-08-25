@extends('layouts.master')

@section('styles')
   <link rel="stylesheet" href="{{asset('css/activities.css')}}">
@endsection

@section('content')
   <main class="activities__page" data-id="activities">
      <div class="container">
         <ul class="breadcrumbs">
            <li class="breadcrumbs__item">
               <a class="breadcrumbs__link breadcrumbs__link--home" href="{{route('home.index')}}" aria-label="{{__('Главная')}}">
                  <span class="material-icons-outlined breadcrumbs__icon--home">home</span>
               </a>
            </li>
            <li class="breadcrumbs__item">
               <span class="material-icons-outlined breadcrumbs__icon">arrow_forward_ios</span>
               <a class="breadcrumbs__link" tabindex="0">{{__('Мероприятия клуба')}}</a>
            </li>
         </ul>
         <h1 class="page-title">{{__('Ближайшие мероприятия книжного клуба')}}</h1>
      </div>

      @if ($activities->count() == 0)
         <p class="no-content">
            <span class="material-icons no-content__icon">sentiment_very_dissatisfied</span>
            {{{__('К сожалению, на ближайшее время мероприятий не запланировано')}}}.
         </p>  
      @else
         @foreach ($activities as $key => $activity)
         <section class="activity">
            <div class="container activity__container">
               <div class="activity-info">
                  <ul class="info">
                     <li class="info__item">
                        <dt class="info__label">{{__('Модератор')}}</dt>
                        <dd class="info__value">
                           <span class="material-icons info__icon">campaign</span>
                           {{$activity->moderator}}
                        </dd>
                     </li>
                     <li class="info__item">
                        <dt class="info__label">{{__('Дата и время старта')}}</dt>
                        <dd class="info__value">
                           <span class="material-icons info__icon">schedule</span>
                           {{$activity->start}}
                        </dd>
                     </li>
                     <li class="info__item">
                        <dt class="info__label">{{__('Дата и время окончания')}}</dt>
                        <dd class="info__value">
                           <span class="material-icons info__icon">schedule</span>
                           {{$activity->end}}
                        </dd>
                     </li>
                     <li class="info__item">
                        <dt class="info__label">{{__('Место проведения')}}</dt>
                        <dd class="info__value">
                           <span class="material-icons info__icon">meeting_room</span>
                           {{$activity->audience}}
                        </dd>
                     </li>
                     <li class="info__item">
                        <dt class="info__label">{{__('Краткое описание')}}</dt>
                        <dd class="info__value">
                           <span class="material-icons info__icon">description</span>
                           {{$activity->description}} 
                        </dd>
                     </li>
                     <li class="info__item">
                        <dt class="info__label">{{__('Количество участников')}}</dt>
                        <dd class="info__value">
                           <span class="material-icons info__icon">group</span>
                           {{$activity->participants_quantity}} / <output data-participants-quantity="{{$activity->id}}">{{$activity->participants->count()}}</output>
                           <button class="button activity__btn" data-type="participate" data-activity="{{$activity->id}}" type="button" {{$activity->participants_quantity == $activity->participants->count() ? 'disabled' : ''}}>{{__(('Я хочу участвовать'))}}!</button>
                        </dd>
                     </li>
                  </ul>
               </div>{{-- activity info end --}}
            </div>
            <h2 class="title activity__title"></h2>
         </section>
         @endforeach
      @endif

      <section class="about-activities">
         <div class="container">
            <h2 class="page-title about-activities__title">{{__('Пара слов о мероприятиях')}}</h2>
            <p class="about-activities__text">
               <strong>Мероприятия</strong>, организованные в рамках Книжного Клуба «AtS» помогают нашим читателям пройти путь от чувства, 
               что <b>читать – это весело</b> и <b>интересно</b>, до – это полезно и это каждого развивает и интеллектуально и профессионально,
               а значит каждый сможет добиться целей и стать успешным!
            </p>
         </div>
      </section>
   </main> 

   <section class="modals">
      <div class="modal hidden" data-id="activity-success">
         <div class="modal__msg-wrapper">
            <p class="modal__msg">{{__('Вы успешно добавлены в список участников')}}!</p>
         </div>
         <div class="modal__btn-wrapper">
            <button class="button" data-id="activity-success__ok-btn" type="button">{{__('OK')}}</button>
         </div>
         <button class="modal__close-btn" type="button" aria-label="{{__('Закрыть')}}">
            <span class="material-icons modal__close-icon" data-id="activity-success__close-btn">close</span>
         </button>
      </div>

      <div class="modal hidden" data-id="activity-fail">
         <div class="modal__msg-wrapper">
            <p class="modal__msg modal__msg--red">{{__('Вы уже являетесь участником')}}!</p>
         </div>
         <div class="modal__btn-wrapper">
            <button class="button" data-id="activity-fail__ok-btn" type="button">{{__('OK')}}</button>
         </div>
         <button class="modal__close-btn" type="button" aria-label="{{__('Закрыть')}}">
            <span class="material-icons modal__close-icon" data-id="activity-fail__close-btn">close</span>
         </button>
      </div>
   </section>
@endsection

@section('scripts')
   <script src="{{asset('js/activities.js')}}"></script>
@endsection