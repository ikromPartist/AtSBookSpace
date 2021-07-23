@extends('layouts.master')

@section('styles')
   <link rel="stylesheet" href="css/rating.css">
@endsection

@section('content')
   <main class="rating-page">
      <div class="container">
      
         <ul class="breadcrumbs">
            <li class="breadcrumbs__item">
               <a href="{{route('home_index')}}" class="breadcrumbs__link breadcrumbs__link--home" aria-label="{{__('Главная')}}">
                  <span class="material-icons-outlined breadcrumbs__icon--home">home</span>
               </a>
            </li>
            <li class="breadcrumbs__item">
               <span class="material-icons-outlined breadcrumbs__icon">arrow_forward_ios</span>
               <a class="breadcrumbs__link" tabindex="0">{{__('Рейтинг')}}</a>
            </li>
         </ul>

         <h1 class="page-title">{{__('Рейтинг')}}</h1>

         <div class="rating-page__content-wrapper">

            <aside class="rating-types" data-id="rating-types">
               <div class="ratings__wrapper">
                  <ul class="ratings">
                     <li class="ratings__item">
                        <a class="ratings__link active" data-id="most-active-reader" data-name="rating-link" href="#">{{__('Самый активный читатель')}}</a>
                     </li>
                     <li class="ratings__item">
                        <a class="ratings__link" data-id="most-reading-company" data-name="rating-link" href="#">{{__('Самая читающая компания')}}</a>
                     </li>
                     <li class="ratings__item">
                        <a class="ratings__link" data-id="most-disciplined-reader" data-name="rating-link" href="#">{{__('Самый дисциплинированный читатель')}}</a>
                     </li>
                     <li class="ratings__item">
                        <a class="ratings__link" data-id="most-popular-book" data-name="rating-link" href="#">{{__('Самая популярная книга')}}</a>
                     </li>
                     <li class="ratings__item">
                        <a class="ratings__link" data-id="most-proactive-member" data-name="rating-link" href="#">{{__('Самый проактивный член клуба')}}</a>
                     </li>
                  </ul>
                  <div class="active-link" data-id="active-link">
                     <div class="active-link__top"></div>
                     <div class="active-link__middle">
                        <div class="active-link__inner"></div>
                     </div>
                     <div class="active-link__bottom"></div>
                  </div>
               </div>
            </aside>

            <section class="rating-view" data-id="rating-view">
               @include('rating_data')
            </section>

         </div>
            
      </div>   
   </main> 
@endsection

@section('scripts')
   <script src="js/rating.js"></script>
@endsection