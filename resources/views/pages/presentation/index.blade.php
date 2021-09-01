@extends('layouts.master')

@section('content')
   <main class="presentation-page" data-id="presentations">
      <section class="breadcrumbs">
         <div class="container">
            <ul class="breadcrumbs__list">
               <li class="breadcrumbs__item">
               <a class="breadcrumbs__link breadcrumbs__link--home" href="{{route('home.index')}}" aria-label="Главная">
                  <span class="material-icons breadcrumbs__icon--home">home</span>
               </a>
            </li>
            <li class="breadcrumbs__item">
               <span class="material-icons breadcrumbs__icon">arrow_forward_ios</span>
               <a class="breadcrumbs__link" tabindex="0">Презентация книг</a>
            </li>
            </ul>
         </div>
      </section>
      <div class="container">
         <h1 class="heading">Презентация книг</h1>
         @if ($presentations->count() == 0)
            <p class="no-content">
               <span class="material-icons no-content__icon">sentiment_very_dissatisfied</span>
               К сожалению, на ближайшее время презентаций не запланировано.
            </p>  
         @else
            @foreach ($presentations as $key => $presentation)
            <section class="presentation">
               <h2 class="title presentation__title">{{$presentation->book->title}}</h2>
               <div class="book-preview {{($key % 2) != 0 ? 'presentation__even-preview' : ''}}" data-id="book-preview">
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
                        <dt class="info__label">Книга</dt>
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
                           <button class="button presentation__btn" data-type="participate" data-presentation="{{$presentation->id}}" type="button" {{$presentation->participants_quantity == $presentation->participants->count() ? 'disabled' : ''}}>Я хочу участвовать!</button>
                        </dd>
                     </li>
                     <li class="info__item">
                        <dt class="info__label">Послание Спикера слушателям – отзыв о книге</dt>
                        <dd class="info__text">
                           <span class="material-icons info__icon">description</span>
                           {{$presentation->description}} 
                        </dd>
                     </li>
                  </ul>
               </div>{{-- presentation info end --}}
            </section>
            @endforeach
         @endif
      </div>
   </main> 

   <section class="modal modal--success hidden" data-id="presentation-success">
      <div class="modal__container">
         <p class="modal__text">Вы успешно добавлены в список участников!</p>
         <div class="modal__btn-wrapper">
            <button class="button" data-id="presentation-success__ok-btn" type="button">OK</button>
         </div>
         <button class="modal__close-btn" type="button">
            <span class="material-icons modal__close-icon" data-id="presentation-success__close-btn">close</span>
         </button>
      </div>
   </section>
   <section class="modal modal--fail hidden" data-id="presentation-fail">
      <div class="modal__container">
         <p class="modal__text">Вы уже являетесь участником!</p>
         <div class="modal__btn-wrapper">
            <button class="button" data-id="presentation-fail__ok-btn" type="button">OK</button>
         </div>
         <button class="modal__close-btn" type="button">
            <span class="material-icons modal__close-icon" data-id="presentation-fail__close-btn">close</span>
         </button>
      </div>
   </section>
@endsection