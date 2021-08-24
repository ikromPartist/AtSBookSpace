@extends('layouts.master')

@section('styles')
   <link rel="stylesheet" href="css/rating.css">
@endsection

@section('content')
   <main class="rating__page">

      <div class="container">
      
         <ul class="breadcrumbs">
            <li class="breadcrumbs__item">
               <a class="breadcrumbs__link breadcrumbs__link--home" href="{{route('home.index')}}" aria-label="{{__('Главная')}}">
                  <span class="material-icons-outlined breadcrumbs__icon--home">home</span>
               </a>
            </li>
            <li class="breadcrumbs__item">
               <span class="material-icons-outlined breadcrumbs__icon">arrow_forward_ios</span>
               <a class="breadcrumbs__link" tabindex="0">
                  {{__('Рейтинг')}}
               </a>
            </li>
         </ul>

         <h1 class="page-title">
            {{__('Рейтинг')}}
         </h1>

         <div class="p-wrapper">

            <aside class="p-sidebar" data-id="rating-types">
               <nav class="p-navigation">
                  <ul class="p-navigation__list">
                     <li class="p-navigation__item">
                        <a class="p-navigation__link active" data-id="most-active-reader" data-type="rating-link" href="#">
                           {{__('Самый активный читатель')}}
                        </a>
                     </li>
                     <li class="p-navigation__item">
                        <a class="p-navigation__link" data-id="most-reading-company" data-type="rating-link" href="#">
                           {{__('Самая читающая компания')}}
                        </a>
                     </li>
                     <li class="p-navigation__item">
                        <a class="p-navigation__link" data-id="most-disciplined-reader" data-type="rating-link" href="#">
                           {{__('Самый дисциплинированный читатель')}}
                        </a>
                     </li>
                     <li class="p-navigation__item">
                        <a class="p-navigation__link" data-id="most-popular-book" data-type="rating-link" href="#">
                           {{__('Самая популярная книга')}}
                        </a>
                     </li>
                     <li class="p-navigation__item">
                        <a class="p-navigation__link" data-id="most-proactive-member" data-type="rating-link" href="#">
                           {{__('Самый проактивный член клуба')}}
                        </a>
                     </li>
                  </ul>
               </nav>
            </aside>
            <section class="p-content" data-id="p-content">
               @include('rating.data')
            </section>
         </div>{{-- rating page's content wrapper end --}}
            
      </div>{{-- container end --}} 

   </main> 

@endsection

@section('scripts')

   <script src="js/rating.js"></script>

@endsection