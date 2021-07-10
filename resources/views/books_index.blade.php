@extends('layouts.master')

@section('styles')
   <link rel="stylesheet" href="{{asset('css/books.css')}}">
@endsection

@section('content')
   <main class="books-page">
      <div class="container">

         <ul class="breadcrumbs">
            <li class="breadcrumbs__item">
               <a href="{{route('home_index')}}" class="breadcrumbs__link breadcrumbs__link--home" aria-label="{{__('Главная')}}">
                  <span class="material-icons-outlined breadcrumbs__icon--home">home</span>
               </a>
            </li>
            <li class="breadcrumbs__item">
               <span class="material-icons-outlined breadcrumbs__icon">arrow_forward_ios</span>
               <a @if($route != 'books.index')href="{{route('books.index')}}"@endif class="breadcrumbs__link">{{__('Книги')}}</a>
            </li>
         </ul>
         
         <h1 class="page-title">{{__('Все книги')}}</h1>

         <div class="books-navbar">
            <dl class="books-navbar__view">
               <dt class="books-navbar__title">{{__('Вид')}}:</dt>
               <dd class="books-navbar__links" tabindex="0">{{__('Список')}}</dd>
               <dd class="books-navbar__links active" tabindex="0">{{__('Стандарт')}}</dd>
            </dl>
            <dl class="books-navbar__sort">
               <dt class="books-navbar__title">{{__('Сортировка')}}:</dt>
               <dd class="books-navbar__links active" tabindex="0">{{__('По названию')}}</dd>
               <dd class="books-navbar__links" tabindex="0">{{__('По новшеству')}}</dd>
               <dd class="books-navbar__links" tabindex="0">{{__('По рейтингу')}}</dd>
               <dd class="books-navbar__icons">
                  <span class="material-icons-outlined books-navbar__icon books-navbar__icon--up">arrow_drop_up</span>
                  <span class="material-icons-outlined books-navbar__icon books-navbar__icon--down">arrow_drop_down</span>
               </dd>
            </dl>
         </div>

         <figure class="books-card">
            <div class="books-card__image-wrapper">
               <img class="books-card__image" src="{{asset('images/books/book1.jpg')}}" alt="booktitle">
               <div class="books-card__overlay">
                  <a class="books-card__links books-card__links--more" href="#">{{__('Подробнее')}}</a>
                  <a class="books-card__links books-card__links--order" href="#">{{__('Забронировать')}}</a>
               </div>
            </div>
            <h3 class="books-card__title">Выйди из зоны комфорта (Б.Трейси)</h3>
            <div class="books-card__rating-wrapper">
               <div>
                  <span class="material-icons-outlined books-card__rating-icons">star_border</span>
                  <span class="material-icons-outlined books-card__rating-icons">star_border</span>
                  <span class="material-icons-outlined books-card__rating-icons">star_border</span>
                  <span class="material-icons-outlined books-card__rating-icons">star_border</span>
                  <span class="material-icons-outlined books-card__rating-icons">star_border</span>
               </div>
               <output class="books-card__comments-quantity">{{__('Нет отзывов')}}</output>
            </div>
            <div class="books-card__status-wrapper">
               {{-- <p class="books-card__status-text">{{__('Доступна')}}</p> --}}
               <p class="books-card__status">{{__('Занято примерно до')}}: <time datetime="2021-09-27">27/09</time></p>
            </div>
         </figure>

         {{-- <table id="table">

            <thead>
               <tr>
                  <th class="sorting" data-order-type="asc" data-order-name="id">ID 
                     <span class="material-icons-outlined">arrow_drop_up</span>
                  </th>
                  <th class="sorting" data-order-type="asc" data-order-name="title">Title 
                     <span class="material-icons-outlined">arrow_drop_up</span>
                  </th>
                  <th class="sorting" data-order-type="asc" data-order-name="author">Author 
                     <span class="material-icons-outlined">arrow_drop_up</span>
                  </th>
               </tr>
            </thead>
            
            <tbody>
               @include('books_data')
            </tbody>

         </table> --}}
      
      </div>
   </main>
@endsection

@section('scripts')
   <script src="{{asset('js/books.js')}}"></script>
@endsection