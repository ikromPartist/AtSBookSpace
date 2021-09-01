@extends('layouts.master')

@section('content')
   <main class="activities__page" data-id="activities">
      <section class="breadcrumbs">
         <div class="container">
            <ul class="breadcrumbs__list">
               <li class="breadcrumbs__item">
                  <a class="breadcrumbs__link breadcrumbs__link--home" href="{{route('home.index')}}">
                     <span class="material-icons breadcrumbs__icon--home">home</span>
                  </a>
               </li>
               <li class="breadcrumbs__item"> 
                  <span class="material-icons breadcrumbs__icon">arrow_forward_ios</span>
                  <a class="breadcrumbs__link" href="{{route('activities.index')}}">Мероприятия клуба</a>
               </li>
               <li class="breadcrumbs__item">
                  <span class="material-icons breadcrumbs__icon">arrow_forward_ios</span>
                  <a class="breadcrumbs__link" tabindex="0">{{$activity->moderator}}</a>
               </li>
            </ul>
         </div>
      </section>
      <div class="container">
         <h1 class="heading">{{$activity->moderator}}</h1>
      </div>
      <section class="activities">
         <div class="container activity__container">
            <div class="activities-info">
               <ul class="info">
                  <li class="info__item">
                     <dt class="info__label">Модератор</dt>
                     <dd class="info__input">
                        <span class="material-icons info__icon">campaign</span>
                        {{$activity->moderator}}
                     </dd>
                  </li>
                  <li class="info__item">
                     <dt class="info__label">Дата и время старта</dt>
                     <dd class="info__input">
                        <span class="material-icons info__icon">schedule</span>
                        {{$activity->start}}
                     </dd>
                  </li>
                  <li class="info__item">
                     <dt class="info__label">Дата и время окончания</dt>
                     <dd class="info__input">
                        <span class="material-icons info__icon">schedule</span>
                        {{$activity->end}}
                     </dd>
                  </li>
                  <li class="info__item">
                     <dt class="info__label">Место проведения</dt>
                     <dd class="info__input">
                        <span class="material-icons info__icon">meeting_room</span>
                        {{$activity->audience}}
                     </dd>
                  </li>
                  <li class="info__item">
                     <dt class="info__label">Краткое описание</dt>
                     <dd class="info__text">
                        <span class="material-icons info__icon">description</span>
                        {{$activity->description}} 
                     </dd>
                  </li>
                  <li class="info__item">
                     <dt class="info__label">Количество участников</dt>
                     <dd class="info__input">
                        <span class="material-icons info__icon">group</span>
                        {{$activity->participants_quantity}} / <output data-participants-quantity="{{$activity->id}}">{{$activity->participants->count()}}</output>
                        <button class="button activity__btn" data-type="participate" data-activity="{{$activity->id}}" type="button" {{$activity->participants_quantity == $activity->participants->count() ? 'disabled' : ''}}>Я хочу участвовать!</button>
                     </dd>
                  </li>
               </ul>
            </div>{{-- activity info end --}}
         </div>
      </section>

      <section class="about-activities">
         <div class="container">
            <h2 class="heading about-activities__title">Пара слов о мероприятиях</h2>
            <p class="about-activities__text">
               <strong>Мероприятия</strong>, организованные в рамках Книжного Клуба «AtS» помогают нашим читателям пройти путь от чувства, 
               что <b>читать – это весело</b> и <b>интересно</b>, до – это полезно и это каждого развивает и интеллектуально и профессионально,
               а значит каждый сможет добиться целей и стать успешным!
            </p>
         </div>
      </section>
   </main> 

   <section class="modal modal--success hidden" data-id="activity-success">
      <div class="modal__container">
         <p class="modal__text">Вы успешно добавлены в список участников!</p>
         <div class="modal__btn-wrapper">
            <button class="button" data-id="activity-success__ok-btn" type="button">OK</button>
         </div>
         <button class="modal__close-btn" type="button">
            <span class="material-icons modal__close-icon" data-id="activity-success__close-btn">close</span>
         </button>
      </div>
   </section>
   <section class="modal modal--fail hidden" data-id="activity-fail">
      <div class="modal__container">
         <p class="modal__text">Вы уже являетесь участником!</p>
         <div class="modal__btn-wrapper">
            <button class="button" data-id="activity-fail__ok-btn" type="button">OK</button>
         </div>
         <button class="modal__close-btn" type="button">
            <span class="material-icons modal__close-icon" data-id="activity-fail__close-btn">close</span>
         </button>
      </div>
   </section>
@endsection