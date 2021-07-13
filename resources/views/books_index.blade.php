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
         
         <h1 class="page-title">
            @if ($category == 'all')
            {{__('Все книги')}}
            @endif
            @if ($category == 'available') 
            {{__('Доступные книги')}}
            @else 
            {{__($category)}}
            @endif
         </h1>

         <section class="books-navbar">
            <h2 class="visually-hidden">{{__('Вид и сортировка книг')}}</h2>
            <dl class="books-navbar__view" data-id="books-navbar__view">
               <dt class="books-navbar__title">{{__('Вид')}}:</dt>
               <dd>
                  <a class="books-navbar__links {{session('books_list') == 'show' ? 'active' : ''}}" data-id="view-list-btn" href="#">{{__('Список')}}</a>
               </dd>
               <dd>
                  <a class="books-navbar__links {{session('books_list') == 'show' ? '' : 'active'}}" data-id="view-standart-btn" href="#">{{__('Стандарт')}}</a>
               </dd>
            </dl>
            <dl class="books-navbar__sort" data-id="books-navbar__sort">
               <dt class="books-navbar__title">{{__('Сортировка')}}:</dt>
               <dd>
                  <a class="books-navbar__links active" data-id="sorting" data-order-name="title" data-order-type="asc" href="#">{{__('По названию')}}</a>
               </dd>
               <dd>
                  <a class="books-navbar__links" data-id="sorting" data-order-name="created_at" data-order-type="asc" href="#">{{__('По новшеству')}}</a>
               </dd>
               <dd>
                  <a class="books-navbar__links" data-id="sorting" data-order-name="rating" data-order-type="asc" href="#">{{__('По рейтингу')}}</a>
               </dd>
               <dd class="books-navbar__icons">
                  <span class="material-icons-outlined books-navbar__icon books-navbar__icon--up active" data-id="arrow-up">arrow_drop_up</span>
                  <span class="material-icons-outlined books-navbar__icon books-navbar__icon--down" data-id="arrow-down">arrow_drop_down</span>
               </dd>
            </dl>
            <input type="hidden" data-id="books-category" value="{{$category}}">
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