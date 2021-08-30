@extends('layouts.master')

@section('content')

   <main class="rules__page">
      <div class="container">
         <ul class="breadcrumbs">
            <li class="breadcrumbs__item">
               <a class="breadcrumbs__link breadcrumbs__link--home" href="{{route('home.index')}}" aria-label="{{__('Главная')}}">
                  <span class="material-icons-outlined breadcrumbs__icon--home">home</span>
               </a>
            </li>
            <li class="breadcrumbs__item">
               <span class="material-icons-outlined breadcrumbs__icon">arrow_forward_ios</span>
               <a class="breadcrumbs__link" tabindex="0">{{__('Правила пользования библиотекой')}}</a>
            </li>
         </ul>
         <h1 class="page-title">{{__('Правила пользования библиотекой')}}</h1>
         <p class="no-content">
            <span class="material-icons no-content__icon">sentiment_very_dissatisfied</span>
            {{__('В процессе разработки')}}...
         </p> 
      </div>

   </main> 

@endsection