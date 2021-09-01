@extends('layouts.master')

@section('content')
   <main class="rating-page">
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
               <a class="breadcrumbs__link" tabindex="0">Рейтинг</a>
            </li>
            </ul>
         </div>
      </section>
      <div class="container">

         <h1 class="heading">Рейтинг</h1>

         <div class="p-wrapper">
            <aside class="p-sidebar" data-id="rating-types">
               <nav class="p-navigation">
                  <ul class="p-navigation__list">
                     <li class="p-navigation__item">
                        <a class="p-navigation__link active" data-id="most-active-reader" data-type="rating-link" href="#">Самый активный читатель</a>
                     </li>
                     <li class="p-navigation__item">
                        <a class="p-navigation__link" data-id="most-reading-company" data-type="rating-link" href="#">Самая читающая компания</a>
                     </li>
                     <li class="p-navigation__item">
                        <a class="p-navigation__link" data-id="most-disciplined-reader" data-type="rating-link" href="#">Самый дисциплинированный читатель</a>
                     </li>
                     <li class="p-navigation__item">
                        <a class="p-navigation__link" data-id="most-popular-book" data-type="rating-link" href="#">Самая популярная книга</a>
                     </li>
                     <li class="p-navigation__item">
                        <a class="p-navigation__link" data-id="most-proactive-member" data-type="rating-link" href="#">Самый проактивный член клуба</a>
                     </li>
                  </ul>
               </nav>
            </aside>
            <section class="p-content" data-id="p-content">
               @include('pages.rating.data')
            </section>
         </div>{{-- rating page's content wrapper end --}}
      </div>{{-- container end --}} 
   </main> 

@endsection