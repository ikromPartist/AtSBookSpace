@extends('layouts.master')

@section('styles')
   <link rel="stylesheet" href="{{asset('css/books.css')}}">
   <link rel="stylesheet" href="{{asset('css/presentation.css')}}">
@endsection

@section('content')
   <main class="presentation__page" data-id="presentations">
      <div class="container">
         <ul class="breadcrumbs">
            <li class="breadcrumbs__item">
               <a class="breadcrumbs__link breadcrumbs__link--home" href="{{route('home.index')}}" aria-label="{{__('Главная')}}">
                  <span class="material-icons-outlined breadcrumbs__icon--home">home</span>
               </a>
            </li>
            <li class="breadcrumbs__item">
               <span class="material-icons-outlined breadcrumbs__icon">arrow_forward_ios</span>
               <a class="breadcrumbs__link" tabindex="0">{{__('Презентация книг')}}</a>
            </li>
         </ul>

         <h1 class="page-title">{{__('Презентация книг')}}</h1>

         <section class="presentation">
            <h2 class="title presentation__title">{{$presentations[0]->book->title}}</h2>
            <div class="book-preview" data-id="book-preview">
               <ul class="book-photos">
                  <li class="book-photos__item active">
                     <img class="book-photos__image active" data-name="book-photos-img" data-id="main-img" src="{{asset('img/books/' . $presentations[0]->book->img)}}" alt="Главное фото">
                     <img class="book-photos__image big" data-name="book-photos" data-id="main" src="{{asset('img/books/' . $presentations[0]->book->img)}}" alt="Главное фото">
                  </li>
                  <li class="book-photos__item">
                     <img class="book-photos__image book-photos__image--front" data-name="book-photos-img" data-id="front-img" src="{{asset('img/books/' . $presentations[0]->book->img_front)}}" alt="Фото фронтальной части">
                     <img class="book-photos__image book-photos__image--front" data-name="book-photos" data-id="front" src="{{asset('img/books/' . $presentations[0]->book->img_front)}}" alt="Фото фронтальной части">
                  </li>
                  <li class="book-photos__item">
                     <img class="book-photos__image book-photos__image--back" data-name="book-photos-img" data-id="back-img" src="{{asset('img/books/' . $presentations[0]->book->img_back)}}" alt="Фото задней части">
                     <img class="book-photos__image book-photos__image--back" data-name="book-photos" data-id="back" src="{{asset('img/books/' . $presentations[0]->book->img_back)}}" alt="Фото задней части">
                  </li>
                  <li class="book-photos__item">
                     <img class="book-photos__image book-photos__image--side" data-name="book-photos-img" data-id="side-img" src="{{asset('img/books/' . $presentations[0]->book->img_side)}}" alt="Фото боковой части">
                     <img class="book-photos__image book-photos__image--side" data-name="book-photos" data-id="side" src="{{asset('img/books/' . $presentations[0]->book->img_side)}}" alt="Фото боковой части">
                  </li>
               </ul>
            </div>{{-- book preview end --}}
            <div class="presentation-info">
               <ul class="info">
                  <li class="info__item">
                     <dt class="info__label">{{__('Спикер')}}</dt>
                     <dd class="info__value">
                        <span class="material-icons info__icon">campaign</span>
                        {{$presentations[0]->user->name}} {{$presentations[0]->user->surname}}
                     </dd>
                  </li>
                  <li class="info__item">
                     <dt class="info__label">{{__('Книга')}}</dt>
                     <dd class="info__value">
                        <span class="material-icons info__icon">menu_book</span>
                        {{$presentations[0]->book->title}}
                     </dd>
                  </li>
                  <li class="info__item">
                     <dt class="info__label">{{__('Дата и время презентации')}}</dt>
                     <dd class="info__value">
                        <span class="material-icons info__icon">schedule</span>
                        {{$presentations[0]->date}}
                     </dd>
                  </li>
                  <li class="info__item">
                     <dt class="info__label">{{__('Аудитория')}}</dt>
                     <dd class="info__value">
                        <span class="material-icons info__icon">meeting_room</span>
                        {{$presentations[0]->audience}}
                     </dd>
                  </li>
                  <li class="info__item">
                     <dt class="info__label">{{__('Количество участников')}}</dt>
                     <dd class="info__value">
                        <span class="material-icons info__icon">group</span>
                        {{$presentations[0]->participants_quantity}} / <output data-participants-quantity="{{$presentations[0]->id}}">{{$presentations[0]->participants->count()}}</output>
                        <button class="button presentation__btn" data-type="participate" data-presentation="{{$presentations[0]->id}}" type="button" {{$presentations[0]->participants_quantity == $presentations[0]->participants->count() ? 'disabled' : ''}}>{{__(('Я хочу участвовать'))}}!</button>
                     </dd>
                  </li>
                  <li class="info__item">
                     <dt class="info__label">{{__('Послание Спикера слушателям – отзыв о книге')}}</dt>
                     <dd class="info__value">
                        <span class="material-icons info__icon">description</span>
                        {{$presentations[0]->description}} 
                     </dd>
                  </li>
               </ul>
            </div>{{-- presentation info end --}}
         </section>

         <section class="presentation">
            <h2 class="title presentation__title">{{$presentations[1]->book->title}}</h2>
            <div class="book-preview presentation__even-preview" data-id="book-preview">
               <ul class="book-photos">
                  <li class="book-photos__item active">
                     <img class="book-photos__image active" data-name="book-photos-img" data-id="main-img" src="{{asset('img/books/' . $presentations[1]->book->img)}}" alt="Главное фото">
                     <img class="book-photos__image big" data-name="book-photos" data-id="main" src="{{asset('img/books/' . $presentations[1]->book->img)}}" alt="Главное фото">
                  </li>
                  <li class="book-photos__item">
                     <img class="book-photos__image book-photos__image--front" data-name="book-photos-img" data-id="front-img" src="{{asset('img/books/' . $presentations[1]->book->img_front)}}" alt="Фото фронтальной части">
                     <img class="book-photos__image book-photos__image--front" data-name="book-photos" data-id="front" src="{{asset('img/books/' . $presentations[1]->book->img_front)}}" alt="Фото фронтальной части">
                  </li>
                  <li class="book-photos__item">
                     <img class="book-photos__image book-photos__image--back" data-name="book-photos-img" data-id="back-img" src="{{asset('img/books/' . $presentations[1]->book->img_back)}}" alt="Фото задней части">
                     <img class="book-photos__image book-photos__image--back" data-name="book-photos" data-id="back" src="{{asset('img/books/' . $presentations[1]->book->img_back)}}" alt="Фото задней части">
                  </li>
                  <li class="book-photos__item">
                     <img class="book-photos__image book-photos__image--side" data-name="book-photos-img" data-id="side-img" src="{{asset('img/books/' . $presentations[1]->book->img_side)}}" alt="Фото боковой части">
                     <img class="book-photos__image book-photos__image--side" data-name="book-photos" data-id="side" src="{{asset('img/books/' . $presentations[1]->book->img_side)}}" alt="Фото боковой части">
                  </li>
               </ul>
            </div>{{-- book preview end --}}
            <div class="presentation-info">
               <ul class="info">
                  <li class="info__item">
                     <dt class="info__label">{{__('Спикер')}}</dt>
                     <dd class="info__value">
                        <span class="material-icons info__icon">campaign</span>
                        {{$presentations[1]->user->name}} {{$presentations[1]->user->surname}}
                     </dd>
                  </li>
                  <li class="info__item">
                     <dt class="info__label">{{__('Книга')}}</dt>
                     <dd class="info__value">
                        <span class="material-icons info__icon">menu_book</span>
                        {{$presentations[1]->book->title}}
                     </dd>
                  </li>
                  <li class="info__item">
                     <dt class="info__label">{{__('Дата и время презентации')}}</dt>
                     <dd class="info__value">
                        <span class="material-icons info__icon">schedule</span>
                        {{$presentations[1]->date}}
                     </dd>
                  </li>
                  <li class="info__item">
                     <dt class="info__label">{{__('Аудитория')}}</dt>
                     <dd class="info__value">
                        <span class="material-icons info__icon">meeting_room</span>
                        {{$presentations[1]->audience}}
                     </dd>
                  </li>
                  <li class="info__item">
                     <dt class="info__label">{{__('Количество участников')}}</dt>
                     <dd class="info__value">
                        <span class="material-icons info__icon">group</span>
                        {{$presentations[1]->participants_quantity}} / <output data-participants-quantity="{{$presentations[1]->id}}">{{$presentations[1]->participants->count()}}</output>
                        <button class="button presentation__btn" data-type="participate" data-presentation="{{$presentations[1]->id}}" type="button" {{$presentations[1]->participants_quantity == $presentations[1]->participants->count() ? 'disabled' : ''}}>{{__(('Я хочу участвовать'))}}!</button>
                     </dd>
                  </li>
                  <li class="info__item">
                     <dt class="info__label">{{__('Послание Спикера слушателям – отзыв о книге')}}</dt>
                     <dd class="info__value">
                        <span class="material-icons info__icon">description</span>
                        {{$presentations[1]->description}} 
                     </dd>
                  </li>
               </ul>
            </div>{{-- presentation info end --}}
         </section>

         <section class="presentation">
            <h2 class="title presentation__title">{{$presentations[2]->book->title}}</h2>
            <div class="book-preview" data-id="book-preview">
               <ul class="book-photos">
                  <li class="book-photos__item active">
                     <img class="book-photos__image active" data-name="book-photos-img" data-id="main-img" src="{{asset('img/books/' . $presentations[2]->book->img)}}" alt="Главное фото">
                     <img class="book-photos__image big" data-name="book-photos" data-id="main" src="{{asset('img/books/' . $presentations[2]->book->img)}}" alt="Главное фото">
                  </li>
                  <li class="book-photos__item">
                     <img class="book-photos__image book-photos__image--front" data-name="book-photos-img" data-id="front-img" src="{{asset('img/books/' . $presentations[2]->book->img_front)}}" alt="Фото фронтальной части">
                     <img class="book-photos__image book-photos__image--front" data-name="book-photos" data-id="front" src="{{asset('img/books/' . $presentations[2]->book->img_front)}}" alt="Фото фронтальной части">
                  </li>
                  <li class="book-photos__item">
                     <img class="book-photos__image book-photos__image--back" data-name="book-photos-img" data-id="back-img" src="{{asset('img/books/' . $presentations[2]->book->img_back)}}" alt="Фото задней части">
                     <img class="book-photos__image book-photos__image--back" data-name="book-photos" data-id="back" src="{{asset('img/books/' . $presentations[2]->book->img_back)}}" alt="Фото задней части">
                  </li>
                  <li class="book-photos__item">
                     <img class="book-photos__image book-photos__image--side" data-name="book-photos-img" data-id="side-img" src="{{asset('img/books/' . $presentations[2]->book->img_side)}}" alt="Фото боковой части">
                     <img class="book-photos__image book-photos__image--side" data-name="book-photos" data-id="side" src="{{asset('img/books/' . $presentations[2]->book->img_side)}}" alt="Фото боковой части">
                  </li>
               </ul>
            </div>{{-- book preview end --}}
            <div class="presentation-info">
               <ul class="info">
                  <li class="info__item">
                     <dt class="info__label">{{__('Спикер')}}</dt>
                     <dd class="info__value">
                        <span class="material-icons info__icon">campaign</span>
                        {{$presentations[2]->user->name}} {{$presentations[0]->user->surname}}
                     </dd>
                  </li>
                  <li class="info__item">
                     <dt class="info__label">{{__('Книга')}}</dt>
                     <dd class="info__value">
                        <span class="material-icons info__icon">menu_book</span>
                        {{$presentations[2]->book->title}}
                     </dd>
                  </li>
                  <li class="info__item">
                     <dt class="info__label">{{__('Дата и время презентации')}}</dt>
                     <dd class="info__value">
                        <span class="material-icons info__icon">schedule</span>
                        {{$presentations[2]->date}}
                     </dd>
                  </li>
                  <li class="info__item">
                     <dt class="info__label">{{__('Аудитория')}}</dt>
                     <dd class="info__value">
                        <span class="material-icons info__icon">meeting_room</span>
                        {{$presentations[2]->audience}}
                     </dd>
                  </li>
                  <li class="info__item">
                     <dt class="info__label">{{__('Количество участников')}}</dt>
                     <dd class="info__value">
                        <span class="material-icons info__icon">group</span>
                        {{$presentations[2]->participants_quantity}} / <output data-participants-quantity="{{$presentations[2]->id}}">{{$presentations[2]->participants->count()}}</output>
                        <button class="button presentation__btn" data-type="participate" data-presentation="{{$presentations[2]->id}}" type="button" {{$presentations[2]->participants_quantity == $presentations[2]->participants->count() ? 'disabled' : ''}}>{{__(('Я хочу участвовать'))}}!</button>
                     </dd>
                  </li>
                  <li class="info__item">
                     <dt class="info__label">{{__('Послание Спикера слушателям – отзыв о книге')}}</dt>
                     <dd class="info__value">
                        <span class="material-icons info__icon">description</span>
                        {{$presentations[2]->description}} 
                     </dd>
                  </li>
               </ul>
            </div>{{-- presentation info end --}}
         </section>

      </div>
   </main> 

   <section class="modals">
      <div class="modal hidden" data-id="presentation-success">
         <div class="modal__msg-wrapper">
            <p class="modal__msg">{{__('Вы успешно добавлены в список участников')}}!</p>
         </div>
         <div class="modal__btn-wrapper">
            <button class="button" data-id="presentation-success__ok-btn" type="button">{{__('OK')}}</button>
         </div>
         <button class="modal__close-btn" type="button" aria-label="{{__('Закрыть')}}">
            <span class="material-icons modal__close-icon" data-id="presentation-success__close-btn">close</span>
         </button>
      </div>

      <div class="modal hidden" data-id="presentation-fail">
         <div class="modal__msg-wrapper">
            <p class="modal__msg modal__msg--red">{{__('Вы уже являетесь участником')}}!</p>
         </div>
         <div class="modal__btn-wrapper">
            <button class="button" data-id="presentation-fail__ok-btn" type="button">{{__('OK')}}</button>
         </div>
         <button class="modal__close-btn" type="button" aria-label="{{__('Закрыть')}}">
            <span class="material-icons modal__close-icon" data-id="presentation-fail__close-btn">close</span>
         </button>
      </div>
   </section>
@endsection

@section('scripts')
   <script src="{{asset('js/books.js')}}"></script>
   <script src="{{asset('js/presentation.js')}}"></script>
@endsection