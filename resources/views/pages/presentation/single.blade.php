@extends('layouts.master')

@section('content')
   <main class="presentation-single">
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
                  <a class="breadcrumbs__link" href="{{route('presentation.index')}}">Презентация книг</a>
               </li>
               <li class="breadcrumbs__item">
                  <span class="material-icons breadcrumbs__icon">arrow_forward_ios</span>
                  <a class="breadcrumbs__link" tabindex="0">{{$presentation->book->title}}</a>
               </li>
            </ul>
         </div>
      </section>
      <div class="container">
         <h1 class="heading">{{$presentation->book->title}}</h1>
         <section class="presentation">
            <div class="book-preview" data-id="book-preview">
               <ul class="book-photos">
                  <li class="book-photos__item active"> 
                     <img class="book-photos__image active" data-name="book-photos-img" data-id="main-img" src="{{asset('img/books/' . $presentation->book->img)}}" alt="Главное фото">
                     <img class="book-photos__image big" data-name="book-photos" data-id="main" src="{{asset('img/books/' . $presentation->book->img)}}" alt="Главное фото">
                  </li>
                  <li class="book-photos__item">
                     <img class="book-photos__image book-photos__image--front" data-name="book-photos-img" data-id="front-img" src="{{asset('img/books/' . $presentation->book->img_front)}}" alt="Фото фронтальной части">
                     <img class="book-photos__image book-photos__image--front" data-name="book-photos" data-id="front" src="{{asset('img/books/' . $presentation->book->img_front)}}" alt="Фото фронтальной части">
                  </li>
                  <li class="book-photos__item">
                     <img class="book-photos__image book-photos__image--back" data-name="book-photos-img" data-id="back-img" src="{{asset('img/books/' . $presentation->book->img_back)}}" alt="Фото задней части">
                     <img class="book-photos__image book-photos__image--back" data-name="book-photos" data-id="back" src="{{asset('img/books/' . $presentation->book->img_back)}}" alt="Фото задней части">
                  </li>
                  <li class="book-photos__item">
                     <img class="book-photos__image book-photos__image--side" data-name="book-photos-img" data-id="side-img" src="{{asset('img/books/' . $presentation->book->img_side)}}" alt="Фото боковой части">
                     <img class="book-photos__image book-photos__image--side" data-name="book-photos" data-id="side" src="{{asset('img/books/' . $presentation->book->img_side)}}" alt="Фото боковой части">
                  </li>
               </ul>
            </div>{{-- book preview end --}}
            <div class="presentation-info">
               <ul class="info">
                  <li class="info__item">
                     <dt class="info__label">Спикер</dt>
                     <dd class="info__input">
                        <span class="material-icons info__icon">campaign</span>
                        {{$presentation->user->name}} {{$presentation->user->surname}}
                        <a class="button presentation__btn" href="{{route('profile.single', $presentation->user->id)}}" type="button">Посмотреть профиль</a>
                     </dd>
                  </li>
                  <li class="info__item">
                     <dt class="info__label">{{__('Книга')}}</dt>
                     <dd class="info__input">
                        <span class="material-icons info__icon">menu_book</span>
                        {{$presentation->book->title}}
                        <a class="button presentation__btn" href="{{route('books.single', $presentation->book->id)}}" type="button">Посмотреть</a>
                     </dd>
                  </li>
                  <li class="info__item">
                     <dt class="info__label">Дата и время презентации</dt>
                     <dd class="info__input">
                        <span class="material-icons info__icon">schedule</span>
                        {{$presentation->date}}
                     </dd>
                  </li>
                  <li class="info__item">
                     <dt class="info__label">Аудитория</dt>
                     <dd class="info__input">
                        <span class="material-icons info__icon">meeting_room</span>
                        {{$presentation->audience}}
                     </dd>
                  </li>
                  <li class="info__item">
                     <dt class="info__label">Количество участников</dt>
                     <dd class="info__input">
                        <span class="material-icons info__icon">group</span>
                        {{$presentation->participants_quantity}} / <output data-participants-quantity="{{$presentation->id}}">{{$presentation->participants->count()}}</output>
                     </dd>
                  </li>
                  <li class="info__item">
                     <dt class="info__label">Послание Спикера слушателям – отзыв о книге</dt>
                     <dd class="info__text">
                        <span class="material-icons info__icon">text_fields</span>
                        {{$presentation->description}} 
                     </dd>
                  </li>
                  <li class="info__item">
                     <dt class="info__label">Подтверждение</dt>
                     <dd class="info__input">
                        @if (!$presentation->accepted && !$presentation->denied)
                        <span class="material-icons info__icon">checklist</span>
                        {{__('Не подтверждено')}}
                        @endif
                        @if ($presentation->accepted)
                        <span class="material-icons info__icon">edit_note</span>
                        {{__('Подтверждено')}}
                        @endif
                        @if ($presentation->denied)
                        <span class="material-icons info__icon">close</span>
                        {{__('Отклонено')}}
                        @endif
                     </dd>
                  </li>
               </ul>
            </div>{{-- presentation info end --}}
         </section>
      </div>
   </main> 
@endsection