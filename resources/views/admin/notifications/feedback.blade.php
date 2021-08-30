@extends('layouts.master')

@section('styles')
   <link rel="stylesheet" href="{{asset('css/notifications.css')}}">
@endsection

@section('content')
   <main class="home__page">
      <div class="container">
         <ul class="breadcrumbs">
            <li class="breadcrumbs__item">
               <a class="breadcrumbs__link breadcrumbs__link--home" href="{{route('home.index')}}" aria-label="{{__('Главная')}}">
                  <span class="material-icons-outlined breadcrumbs__icon--home">home</span>
               </a>
            </li>
            <li class="breadcrumbs__item">
               <span class="material-icons-outlined breadcrumbs__icon">arrow_forward_ios</span>
               <a class="breadcrumbs__link" href="{{route('notifications.index')}}">{{__('Уведомления')}}</a>
            </li>
            <li class="breadcrumbs__item">
               <span class="material-icons-outlined breadcrumbs__icon">arrow_forward_ios</span>
               <a class="breadcrumbs__link feedback__link" tabindex="0">{{$feedback->message}}</a>
            </li>
         </ul>
         
         <h1 class="page-title feedback__title">{{$feedback->message}}</h1>
         
         <section class="notifications">
            
         </section>
      </div>
   </main>
@endsection

@section('scripts')
   <script src="{{asset('js/notifications.js')}}"></script>
@endsection
