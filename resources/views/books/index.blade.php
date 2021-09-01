@extends('layouts.master')

@section('content')
   <main class="books__page">
      <section class="breadcrumbs">
         <div class="container">
            <ul class="breadcrumbs__list">
               <li class="breadcrumbs__item">
                  <a href="{{route('home.index')}}" class="breadcrumbs__link breadcrumbs__link--home" aria-label="Главная">
                     <span class="material-icons breadcrumbs__icon--home">home</span>
                  </a>
               </li>
               <li class="breadcrumbs__item">
                  <span class="material-icons breadcrumbs__icon">arrow_forward_ios</span>
                  <a @if($category != 'all')href="{{route('books.index')}}"@endif tabindex="0" class="breadcrumbs__link">Книги</a>
               </li>
               @if ($category != 'all')
                  <li class="breadcrumbs__item">
                     <span class="material-icons breadcrumbs__icon">arrow_forward_ios</span>
                     <a class="breadcrumbs__link" tabindex="0">
                        @if ($category == 'available')
                           Доступные книги
                        @else
                           {{$category}}
                        @endif
                     </a>
                  </li>
               @endif
            </ul>{{-- breadcrumbs end --}}
         </div>
      </section>
      <div class="container">
         <h1 class="heading">
            @if ($category == 'available' || $category == 'all')
               @if ($category == 'all')
                  Все книги
               @else 
                  Доступные книги 
               @endif
            @else 
               {{$category}}
            @endif
         </h1>
         <section class="books-navbar">
            <dl class="books-navbar__view" data-id="books-navbar__view">
               <dt class="books-navbar__title">Вид:</dt>
               <dd>
                  <a class="books-navbar__links {{session('books_list') == 'show' ? 'active' : ''}}" data-id="view-list-btn" href="#">Список</a>
               </dd>
               <dd>
                  <a class="books-navbar__links {{session('books_list') == 'show' ? '' : 'active'}}" data-id="view-standart-btn" href="#">Стандарт</a>
               </dd>
            </dl>
            <dl class="books-navbar__sort" data-id="books-navbar__sort">
               <dt class="books-navbar__title">Сортировка:</dt>
               <dd>
                  <a class="books-navbar__links active" data-id="sorting" data-order-name="title" data-order-type="asc" href="#">По названию</a>
               </dd>
               <dd>
                  <a class="books-navbar__links" data-id="sorting" data-order-name="created_at" data-order-type="asc" href="#">По новшеству</a>
               </dd>
               <dd>
                  <a class="books-navbar__links" data-id="sorting" data-order-name="rating" data-order-type="asc" href="#">По рейтингу</a>
               </dd>
               <dd class="books-navbar__icons">
                  <span class="material-icons books-navbar__icon books-navbar__icon--up active" data-id="arrow-up">arrow_drop_up</span>
                  <span class="material-icons books-navbar__icon books-navbar__icon--down" data-id="arrow-down">arrow_drop_down</span>
               </dd>
            </dl>
            <input data-id="books-category" type="hidden" value="{{$category}}">
         </section>{{-- books navbar end --}}
         <section class="books">
            @include('books.data')
         </section>
      </div>{{-- container end --}}
      <section class="about-books">
         <div class="container">
            <h2 class="heading about-books__title">Пара слов о книгах</h2>
            <p class="about-books__text">
               <strong>Книга</strong> — один из видов печатной продукции: непериодическое издание, состоящее из сброшюрованных или отдельных бумажных листов (страниц) или тетрадей, на которых нанесена типографским или рукописным способом текстовая и графическая (иллюстрации) информация, имеющее, как правило, твёрдый переплёт.
            </p>
            <p class="about-books__text">
               Также книгой может называться литературное или научное произведение, предназначенное для печати в виде отдельного сброшюрованного издания.
            </p>
            <p class="about-books__text">
               С развитием информационных технологий всё более широкое распространение получают электронные книги — электронные версии печатных книг, которые можно читать на компьютерах или специальных устройствах.
            </p>
         </div>{{-- container end --}}
      </section>{{-- about books end --}}
   </main>
@endsection