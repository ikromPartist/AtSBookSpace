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
                  {{__('Управление профилем')}}
               </a>
            </li>
         </ul>

         <h1 class="page-title">{{__('Управление профилем')}}</h1>

         <div class="p-wrapper">

            <aside class="p-sidebar" data-id="rating-types">
               <nav class="p-navigation">
                  <ul class="p-navigation__list">
                     <li class="p-navigation__item">
                        <a class="p-navigation__link active" href="#" data-id="profile" data-type="link">
                           {{__('Профиль')}}
                        </a>
                     </li>
                     <li class="p-navigation__item">
                        <a class="p-navigation__link" href="#" data-id="members" data-type="link">
                           {{__('Читатели')}} ({{$membersCount}})
                        </a>
                     </li>
                     <li class="p-navigation__item">
                        <a class="p-navigation__link" href="#" data-id="read_books" data-type="link">
                           {{__('Прочитанные книги')}} ({{$loggedUser->taken_books_count}})
                        </a>
                     </li>
                     <li class="p-navigation__item">
                        <a class="p-navigation__link" href="#" data-id="activities" data-type="link">
                           {{__('Участие в мероприятиях')}}
                        </a>
                     </li>
                     <li class="p-navigation__item">
                        <a class="p-navigation__link" href="#" data-id="presentation" data-type="link">
                           {{__('Презентация книг')}}
                        </a>
                     </li>
                     <li class="p-navigation__item">
                        <a class="p-navigation__link" href="#" data-id="booked_books" data-type="link">
                           {{__('Забронированные книги')}}
                        </a>
                     </li>
                     <li class="p-navigation__item">
                        <a class="p-navigation__link" href="#" data-id="liked_books" data-type="link">
                           {{__('Понравившиеся книги')}}
                        </a>
                     </li>
                     <li class="p-navigation__item">
                        <a class="p-navigation__link" href="#" data-id="settings" data-type="link">
                           {{__('Настройки')}}
                        </a>
                     </li>
                     <li class="p-navigation__item">
                        <a class="p-navigation__link" href="{{route('auth.logout')}}">
                           {{__('Выйти')}}
                        </a>
                     </li>
                  </ul>
               </nav>
            </aside>
            <section class="p-content" data-id="profile-content">
               @include('profile.data.profile')
            </section>
         </div>{{-- profile page's content wrapper end --}}
      </div>{{-- container end --}}      
   </main>
@endsection

@section('scripts')
   <script src="{{asset('js/profile.js')}}"></script>
@endsection