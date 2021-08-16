@extends('layouts.master')

@section('styles')
   <link rel="stylesheet" href="{{asset('css/profile.css')}}">
@endsection

@section('content')
   <main class="profile__page">
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
                  {{__($user->surname)}} {{__($user->name)}} {{__($user->last_name)}}
               </a>
            </li>
         </ul>
         <h1 class="page-title">{{__($user->surname)}} {{__($user->name)}} {{__($user->last_name)}}</h1>

         <section class="member">
            
         </section>

      </div>
   </main>
@endsection

@section('scripts')
   <script src="{{asset('js/profile.js')}}"></script>
@endsection