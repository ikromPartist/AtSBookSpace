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
               <a @if($route != 'books.index')href="{{route('books.index')}}"@endif tabindex="0" class="breadcrumbs__link">{{__('Книги')}}</a>
            </li>
         </ul>
         
         <h1 class="page-title">{{__('Все книги')}}</h1>

         <section class="books-navbar">
            <h2 class="visually-hidden">{{__('Вид и сортировка книг')}}</h2>
            <dl class="books-navbar__view">
               <dt class="books-navbar__title">{{__('Вид')}}:</dt>
               <dd class="books-navbar__links " tabindex="0">{{__('Список')}}</dd>
               <dd class="books-navbar__links active" tabindex="0">{{__('Стандарт')}}</dd>
            </dl>
            <dl class="books-navbar__sort">
               <dt class="books-navbar__title">{{__('Сортировка')}}:</dt>
               <dd class="books-navbar__links active" tabindex="0" data-id="sorting" data-order-name="title" data-order-type="asc">{{__('По названию')}}</dd>
               <dd class="books-navbar__links" tabindex="0" data-id="sorting" data-order-name="created_at" data-order-type="asc">{{__('По новшеству')}}</dd>
               <dd class="books-navbar__links" tabindex="0" data-id="sorting" data-order-name="rating" data-order-type="asc">{{__('По рейтингу')}}</dd>
               <dd class="books-navbar__icons">
                  <span class="material-icons-outlined books-navbar__icon books-navbar__icon--up active">arrow_drop_up</span>
                  <span class="material-icons-outlined books-navbar__icon books-navbar__icon--down">arrow_drop_down</span>
               </dd>
            </dl>
         </section>
         
         <section class="books">
            @include('books_data')
         </section>
      
      </div>
   </main>
@endsection

@section('scripts')
   <script src="{{asset('js/books.js')}}"></script>
@endsection