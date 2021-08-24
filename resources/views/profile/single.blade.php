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
               <a class="breadcrumbs__link" href="{{route('profile.index')}}">
                  {{__('Читатели')}}
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
            <div class="member__left">
               <img class="avatar-form__img member__img" src="{{asset('img/users/' . $user->avatar)}}" alt="{{$user->name}}">
               <p class="avatar-form__role">
                  @if ($user->role == 'admin')
                     {{__('Админ')}}
                  @else
                     {{__('Пользователь')}}
                  @endif
               </p>
            </div>
            <div class="member__right">
               <ul class="profile-info">
                  <li class="profile-info__item">
                     {{__('Сотрудник')}} {{$user->company->name}}
                  </li>
                  <li class="profile-info__item">
                     <b>{{$userPosition}}/{{$usersCount}}</b>
                     @if ($userRating < 30)
                        {{__('Ваше место по рейтингу')}} ☹️
                     @endif
                     @if ($userRating > 30 && $userRating < 60)
                        {{__('Ваше место по рейтингу')}} 😐
                     @endif
                     @if ($userRating > 60 && $userRating < 80)
                        {{__('Ваше место по рейтингу')}} 🙂
                     @endif
                     @if ($userRating > 80)
                        {{__('Ваше место по рейтингу')}} 💪
                     @endif
                  </li>
                  <li class="profile-info__item">
                     <b>{{$user->taken_books->count()}}</b> {{__('Книг прочитано')}}
                  </li>
                  <li class="profile-info__item">
                     <b>{{$user->read_pages}}</b> {{__('Страниц прочитано')}}
                  </li>
                  <li class="profile-info__item">
                     <b>{{$user->likes->count()}}</b> {{__('Понравившиеся книги')}}
                  </li>
                  <li class="profile-info__item">
                     <b>{{$user->blacklist_value}}</b> {{__('Нарушений')}}
                  </li>
                  <li class="profile-info__item">
                     <b>{{$user->presentations->count()}}</b> {{__('Презентованных книг')}}
                  </li>
                  <li class="profile-info__item">
                     <b>{{$user->participations->count()}}</b> {{__('Участие в мероприятиях')}}
                  </li>
                  <li class="profile-info__item">
                     <b>{{$user->renewed_deadlines}}</b> {{__('Продленные дедлайны')}}
                  </li>
                  <li class="profile-info__item">
                     <b>{{$user->booked_books->count()}}</b> {{__('Забронированные книги')}}
                  </li>
               </ul>
               <h2 class="form__title member__form-title">{{__('Основная информация')}}</h2>
               <ul class="member-info">
                  <li class="member-info__item">
                     <dt class="member-info__label">{{__('Фамилия')}}</dt>
                     <dd class="member-info__value">
                        <span class="material-icons-outlined member-info__icon">badge</span>
                        {{$user->surname}}
                     </dd>
                  </li>
                  <li class="member-info__item">
                     <dt class="member-info__label">{{__('Имя')}}</dt>
                     <dd class="member-info__value">
                        <span class="material-icons-outlined member-info__icon">badge</span>
                        {{$user->name}}
                     </dd>
                  </li>
                  <li class="member-info__item">
                     <dt class="member-info__label">{{__('Отчество')}}</dt>
                     <dd class="member-info__value">
                        <span class="material-icons-outlined member-info__icon">badge</span>
                        {{$user->last_name}}
                     </dd>
                  </li>
                  <li class="member-info__item">
                     <dt class="member-info__label">{{__('Логин')}}</dt>
                     <dd class="member-info__value">
                        <span class="material-icons-outlined member-info__icon">login</span>
                        {{$user->login}}
                     </dd>
                  </li>
                  <li class="member-info__item">
                     <dt class="member-info__label">{{__('E-mail')}}</dt>
                     <dd class="member-info__value">
                        <span class="material-icons-outlined member-info__icon">email</span>
                        {{$user->email}}
                     </dd>
                  </li>
                  <li class="member-info__item">
                     <dt class="member-info__label">{{__('Телефон')}}</dt>
                     <dd class="member-info__value">
                        <span class="material-icons member-info__icon">phone</span>
                        {{$user->phone_numbers}}
                     </dd>
                  </li>
               </ul>      
            </div>{{-- member right end --}}
         </section>

      </div>
   </main>
@endsection

@section('scripts')
   <script src="{{asset('js/profile.js')}}"></script>
@endsection