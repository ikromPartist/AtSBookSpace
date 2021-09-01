@extends('layouts.master')

@section('content')
   <main class="rules__page">
      <section class="breadcrumbs">
         <div class="container">
            <ul class="breadcrumbs__list">
               <li class="breadcrumbs__item">
                  <a class="breadcrumbs__link breadcrumbs__link--home" href="{{route('home.index')}}">
                     <span class="material-icons breadcrumbs__icon--home">home</span>
                  </a>
               </li>
               <li class="breadcrumbs__item">
                  <span class="material-icons breadcrumbs__icon">arrow_forward_ios</span>
                  <a class="breadcrumbs__link" tabindex="0">Правила пользования библиотекой</a>
               </li>
            </ul>
         </div>
      </section>
      <div class="container">
         <h1 class="heading">Правила пользования библиотекой</h1>
         <p class="no-content">
            <span class="material-icons no-content__icon">sentiment_very_dissatisfied</span>
            В процессе разработки...
         </p> 
      </div>
   </main> 
@endsection