@extends('layouts.master')

@section('styles')
   <link rel="stylesheet" href="{{asset('css/books.css')}}">
@endsection

@section('content')
   <main class="books-single-page">
      <div class="container">
   
         <ul class="breadcrumbs">
            <li class="breadcrumbs__item">
               <a class="breadcrumbs__link breadcrumbs__link--home" href="{{route('home_index')}}" aria-label="{{__('Главная')}}">
                  <span class="material-icons-outlined breadcrumbs__icon--home">home</span>
               </a>
            </li>
            <li class="breadcrumbs__item">
               <span class="material-icons-outlined breadcrumbs__icon">arrow_forward_ios</span>
               <a class="breadcrumbs__link" href="{{route('books_index')}}">{{__('Книги')}}</a>
            </li>
            @if ($book->category != 'all')
            <li class="breadcrumbs__item">
               <span class="material-icons-outlined breadcrumbs__icon">arrow_forward_ios</span>
               <a class="breadcrumbs__link" href="{{route('books_index')}}?category={{$book->category}}">{{$book->category}}</a>
            </li>
            @endif
            <li class="breadcrumbs__item">
               <span class="material-icons-outlined breadcrumbs__icon">arrow_forward_ios</span>
               <a class="breadcrumbs__link" tabindex="0">{{$book->title}}</a>
            </li>
         </ul>

         <h1 class="page-title">{{$book->title}}</h1>

         <div class="books-info-wrapper">
            
            <section class="book-preview" data-id="book-preview">
               <h2 class="visually-hidden">{{__('Изображения книги')}}</h2>
               <ul class="book-photos">
                  <li class="book-photos__item active">
                     <img class="book-photos__image active" data-name="book-photos-img" data-id="main-img" src="{{asset('img/books/' . $book->img)}}" alt="Главное фото">
                     <img class="book-photos__image big" data-name="book-photos" data-id="main" src="{{asset('img/books/' . $book->img)}}" alt="Главное фото">
                  </li>
                  <li class="book-photos__item">
                     <img class="book-photos__image book-photos__image--front" data-name="book-photos-img" data-id="front-img" src="{{asset('img/books/' . $book->img_front)}}" alt="Фото фронтальной части">
                     <img class="book-photos__image book-photos__image--front" data-name="book-photos" data-id="front" src="{{asset('img/books/' . $book->img_front)}}" alt="Фото фронтальной части">
                  </li>
                  <li class="book-photos__item">
                     <img class="book-photos__image book-photos__image--back" data-name="book-photos-img" data-id="back-img" src="{{asset('img/books/' . $book->img_back)}}" alt="Фото задней части">
                     <img class="book-photos__image book-photos__image--back" data-name="book-photos" data-id="back" src="{{asset('img/books/' . $book->img_back)}}" alt="Фото задней части">
                  </li>
                  <li class="book-photos__item">
                     <img class="book-photos__image book-photos__image--side" data-name="book-photos-img" data-id="side-img" src="{{asset('img/books/' . $book->img_side)}}" alt="Фото боковой части">
                     <img class="book-photos__image book-photos__image--side" data-name="book-photos" data-id="side" src="{{asset('img/books/' . $book->img_side)}}" alt="Фото боковой части">
                  </li>
               </ul>
            </section>
            
            <section class="book-info">
               <h2 class="visually-hidden">{{__("Описание книги")}}</h2>
               <div class="book-info__status-wrapper">
                  @if (!$book->user)
                  <p class="book-info__status book-info__status--available">{{__('Доступна')}}</p>
                  @else
                  <p class="book-info__status book-info__status--unavailable">
                     {{__('Занято примерно до')}}: <time datetime="{{$book->available_date}}">{{ \Carbon\Carbon::parse($book->available_date)->format('d/m')}}</time>
                  </p>
                  @endif
                  <p class="book-info__article">{{__('Артикул')}}: {{$book->code}}</p>
               </div>
               <p class="book-info__description">{{$book->description}}</p>
               <ul class="book-info__list">
                  <li class="book-info__item">
                     <div class="book-info__dt">{{__('Автор')}}</div>
                     <div class="book-info__dd">
                        <span class="material-icons-outlined book-info__arrow-icon">arrow_forward_ios</span>
                        {{$book->author}}
                     </div>
                  </li>
                  <li class="book-info__item">
                     <div class="book-info__dt">{{__('Страницы')}}</div>
                     <div class="book-info__dd">
                        <span class="material-icons-outlined book-info__arrow-icon">arrow_forward_ios</span>
                        {{$book->pages}}
                     </div>
                  </li>
               </ul>
               <div class="book-info__rating-wrapper">
                  <div class="book-info__stars-wrapper">
                     <span class="material-icons-outlined book-info__rating-icons {{$book->rating >= 1 ? 'filled' : ''}}" data-id="rating-icon">star_border</span>
                     <span class="material-icons-outlined book-info__rating-icons {{$book->rating >= 2 ? 'filled' : ''}}" data-id="rating-icon">star_border</span>
                     <span class="material-icons-outlined book-info__rating-icons {{$book->rating >= 3 ? 'filled' : ''}}" data-id="rating-icon">star_border</span>
                     <span class="material-icons-outlined book-info__rating-icons {{$book->rating >= 4 ? 'filled' : ''}}" data-id="rating-icon">star_border</span>
                     <span class="material-icons-outlined book-info__rating-icons {{$book->rating >= 5 ? 'filled' : ''}}" data-id="rating-icon">star_border</span>
                  </div>
                  <button class="book-info__rating-link" type="button" data-id="show-rating-modal">{{__('Оценить')}}</button>
               </div>
               <div class="likes-container" data-id="likes-container">
                  @php $liked = false;
                     foreach ($loggedUser->likes as $like) {
                        if ($like->book_id == $book->id) {
                           $liked = true;
                        } 
                     }
                  @endphp
                  @if ($liked)
                     <button class="likes-button" type="button" data-id="like-button" data-type="liked" aria-label="{{__('Нравится')}}">
                        <span class="material-icons likes-icon">thumb_up</span>
                        <output>{{$book->likes_count}}</output>
                     </button>
                  @else
                     <button class="likes-button" type="button" data-id="like-button" data-type="not-liked" data-book="{{$book->id}}" aria-label="{{__('Нравится')}}">
                        <span class="material-icons-outlined likes-icon">thumb_up</span>   
                        <output>{{$book->likes_count}}</output>
                     </button>
                  @endif

                  @php $disliked = false;
                     foreach ($loggedUser->dislikes as $dislike) {
                        if ($dislike->book_id == $book->id) {
                           $disliked = true;
                        } 
                     }
                  @endphp
                  @if ($disliked)
                     <button class="likes-button" type="button" data-id="dislike-button" data-type="disliked" aria-label="{{__('Не нравится')}}">
                        <span class="material-icons likes-icon">thumb_down</span>
                        <output>{{$book->dislikes_count}}</output>
                     </button>
                  @else
                     <button class="likes-button" type="button" data-id="dislike-button" data-type="not-disliked" data-book="{{$book->id}}" aria-label="{{__('Не нравится')}}">
                        <span class="material-icons-outlined likes-icon">thumb_down</span>   
                        <output>{{$book->dislikes_count}}</output>
                     </button>
                  @endif  
               </div>
               <a class="button book-info__book-link" href="#">{{__('Забронировать')}}</a>
            </section>
            
         </div>{{-- book-info wrapper end --}}
         
         <section class="comment">
            <h2 class="comment__title"><output>{{$book->comments_count}}</output> {{__('Коментарий')}}</h2>
            <form class="comment-form">
               @csrf
               <div class="comment-form__top-wrapper">
                  <img class="comment__user-avatar" src="{{asset('img/users/' . $loggedUser->avatar)}}" alt="Комментарий от {{$loggedUser->name}}">
                  <textarea class="comment__text" data-id="comment-text" spellcheck="false" aria-label="{{__('Оставить комментарий')}}" placeholder="{{__('Оставить комментарий')}}..."></textarea>
               </div>
               <div class="comment__buttons-wrapper" data-id="buttons-wrapper">
                  <button class="button--red" type="reset" data-id="cancel-comment">{{__('Отмена')}}</button>
                  <button class="button" type="submit" data-id="submit-comment" data-book="{{$book->id}}">{{__('Комментировать')}}</button>
               </div>
            </form>
            <ul class="comments">
               @foreach ($comments as $comment)
                  <li class="comments__item">
                     <a class="comments__link" href="#">
                        <img class="comments__avatar" src="{{asset('img/users/' . $comment->user->avatar)}}" alt="Комментарий от {{$comment->user->name}}">
                     </a>
                     <div class="comments__wrapper">
                        <p class="comments__title">{{$comment->user->name}} {{$comment->user->surname}} <time datetime="2021-05-25">{{\Carbon\Carbon::parse($comment->created_at)->isoFormat('DD MMMM YYYY, HH:mm')}}</time></p>
                        <p class="comments__text">{{$comment->comment}}</p>
                     </div>
                  </li>
               @endforeach
            </ul>
         </section>

         {{-- ratings modal --}}
         <div class="modal hidden" data-id="rating-modal">
            <div class="rating__stars-wrapper">
               @php
                  $rating = App\Models\Rating::where('user_id', $loggedUser->id)->where('book_id', $book->id)->first();
                  $rate = 0;
                  if ($rating) {
                     $rate = $rating->rate;
                  }
               @endphp
               <span class="material-icons book-info__rating-icons book-info__rating-icons--white {{$rate >= 5 ? 'grey' : ''}}" data-id="rating-icon-1" data-book="{{$book->id}}">star</span>
               <span class="material-icons book-info__rating-icons book-info__rating-icons--white {{$rate >= 4 ? 'grey' : ''}}" data-id="rating-icon-2" data-book="{{$book->id}}">star</span>
               <span class="material-icons book-info__rating-icons book-info__rating-icons--white {{$rate >= 3 ? 'grey' : ''}}" data-id="rating-icon-3" data-book="{{$book->id}}">star</span>
               <span class="material-icons book-info__rating-icons book-info__rating-icons--white {{$rate >= 2 ? 'grey' : ''}}" data-id="rating-icon-4" data-book="{{$book->id}}">star</span>
               <span class="material-icons book-info__rating-icons book-info__rating-icons--white {{$rate >= 1 ? 'grey' : ''}}" data-id="rating-icon-5" data-book="{{$book->id}}">star</span>
            </div>
            <div class="modal__btn-wrapper">
               <button class="button--red" type="button" data-id="rating__cancel-btn">{{__('Отмена')}}</button>
            </div>
            <button class="modal__close-btn" aria-label="{{__('Закрыть')}}">
               <span class="material-icons modal__close-icon" data-id="rating__close-btn">close</span>
            </button>
         </div>
         {{-- rating success modal --}}
         <div class="modal hidden" data-id="rating-success">
            <div class="modal__msg-wrapper">
               <p class="modal__msg">{{__('Спасибо за отзыв')}}!</p>
            </div>
            <div class="modal__btn-wrapper">
               <button class="button" type="button" data-id="rating__ok-btn">{{__('OK')}}</button>
            </div>
            <button class="modal__close-btn" type="button" aria-label="{{__('Закрыть')}}">
               <span class="material-icons modal__close-icon" data-id="rating__close-btn">close</span>
            </button>
         </div>
   </main>
@endsection

@section('scripts')
   <script src="{{asset('js/books.js')}}"></script>
@endsection