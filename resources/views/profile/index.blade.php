@extends('layouts.master')

@section('styles')

   <link rel="stylesheet" href="{{asset('css/profile.css')}}">

@endsection

@section('content')
    
   <main class="profile__page">
      
      <section class="user-profile">

         <div class="user-profile__wrapper">

            <div class="container user-profile__container">
               <img class="user-profile__avatar" src="{{asset('img/users/' . $loggedUser->avatar)}}" alt="{{$loggedUser->name}}">
               <div>
                  <h2 class="user-profile__name">
                     {{$loggedUser->surname}}
                     {{$loggedUser->name}}
                     {{$loggedUser->last_name}}
                  </h2>
                  <p class="user-profile__company">
                     {{__('Сотрудник компании')}}
                     {{$loggedUser->company->name}}
                  </p>
                  <p class="user-profile__login">
                     {{$loggedUser->login}}
                  </p>
               </div>
            </div>{{-- container end --}}

         </div>
            
      </section>{{-- profile header end --}}
            
      <div class="container profile-content__container">

         <aside class="profile-sidebar" data-id="profile-sidebar">

            <p class="user-phone">
               <span class="material-icons user-phone__icon">
                  call
               </span>
               {{$loggedUser->phone_numbers}}   
            </p> 
            <p class="user-email">
               <span class="material-icons user-email__icon">
                  email
               </span>
               {{$loggedUser->email}}
            </p>
            <ul class="profile-navigation">
               <li class="profile-navigation__item">
                  <a class="profile-navigation__link active" data-id="profile" data-type="link" href="#">
                     {{__('Профиль')}}
                  </a>
                  <div class="profile-navigation__bg"></div>
               </li>
               <li class="profile-navigation__item">
                  <a class="profile-navigation__link" data-id="members" data-type="link" href="#">
                     {{__('Читатели')}}
                     ({{$membersCount}})
                  </a>
                  <div class="profile-navigation__bg"></div>
               </li>
               <li class="profile-navigation__item">
                  <a class="profile-navigation__link" data-id="read_books" data-type="link" href="#">
                     {{__('Прочитанные книги')}} 
                     ({{$loggedUser->taken_books_count}})
                  </a>
                  <div class="profile-navigation__bg"></div>
               </li>
               <li class="profile-navigation__item">
                  <a class="profile-navigation__link" data-id="activities" data-type="link" href="#">
                     {{__('Участие в мероприятиях')}}
                  </a>
                  <div class="profile-navigation__bg"></div>
               </li>
               <li class="profile-navigation__item">
                  <a class="profile-navigation__link" data-id="presentation" data-type="link" href="#">
                     {{__('Презентация книг')}}
                  </a>
                  <div class="profile-navigation__bg"></div>
               </li>
               <li class="profile-navigation__item">
                  <a class="profile-navigation__link" data-id="booked_books" data-type="link" href="#">
                     {{__('Забронированные книги')}}
                  </a>
                  <div class="profile-navigation__bg"></div>
               </li>
               <li class="profile-navigation__item">
                  <a class="profile-navigation__link" data-id="liked_books" data-type="link" href="#">
                     {{__('Понравившиеся книги')}}
                  </a>
                  <div class="profile-navigation__bg"></div>
               </li>
               <li class="profile-navigation__item">
                  <a class="profile-navigation__link" data-id="settings" data-type="link" href="#">
                     {{__('Настройки')}}
                  </a>
                  <div class="profile-navigation__bg"></div>
               </li>
               <li class="profile-navigation__item">
                  <a class="profile-navigation__link" href="{{route('auth.logout')}}">
                     {{__('Выйти')}}
                  </a>
                  <div class="profile-navigation__bg"></div>
               </li>
            </ul>

         </aside>{{-- sidebar end --}}

         <section class="profile-content" data-id="profile-content">

            @include('profile.data.profile')

         </section>

      </div>{{-- container end --}}

   </main>

@endsection

@section('scripts')
    
   <script src="{{asset('js/profile.js')}}"></script>

@endsection