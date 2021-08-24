@extends('layouts.master')

@section('styles')
   {{-- Datetime picker --}}
   <link rel="stylesheet" href="{{asset('css/datetimepicker.css')}}"> 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
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

            <aside class="p-sidebar" data-id="profile-sidebar">
               <nav class="p-navigation">
                  <ul class="p-navigation__list">
                     <li class="p-navigation__item">
                        <a class="p-navigation__link {{session('profile_link') == 'profile' ? 'active' : ''}}" href="#" data-id="profile" data-type="link">
                           {{__('Профиль')}}
                        </a>
                     </li>
                     <li class="p-navigation__item">
                        <a class="p-navigation__link {{session('profile_link') == 'members' ? 'active' : ''}}" href="#" data-id="members" data-type="link">
                           {{__('Читатели')}} ({{App\Models\User::select('id')->get()->count()}})
                        </a>
                     </li>
                     <li class="p-navigation__item">
                        <a class="p-navigation__link {{session('profile_link') == 'read_books' ? 'active' : ''}}" href="#" data-id="read_books" data-type="link">
                           {{__('Прочитанные книги')}} ({{$loggedUser->taken_books_count}})
                        </a>
                     </li>
                     <li class="p-navigation__item">
                        <a class="p-navigation__link {{session('profile_link') == 'activities' ? 'active' : ''}}" href="#" data-id="activities" data-type="link">
                           {{__('Участие в мероприятиях')}} ({{$loggedUser->actions_count}})
                        </a>
                     </li>
                     <li class="p-navigation__item">
                        <a class="p-navigation__link {{session('profile_link') == 'presentation' ? 'active' : ''}}" href="#" data-id="presentation" data-type="link">
                           {{__('Презентация книг')}}
                        </a>
                     </li>
                     <li class="p-navigation__item">
                        <a class="p-navigation__link {{session('profile_link') == 'booked_books' ? 'active' : ''}}" href="#" data-id="booked_books" data-type="link">
                           {{__('Забронированные книги')}} ({{$loggedUser->booked_books->count()}})
                        </a>
                     </li>
                     <li class="p-navigation__item">
                        <a class="p-navigation__link {{session('profile_link') == 'liked_books' ? 'active' : ''}}" href="#" data-id="liked_books" data-type="link">
                           {{__('Понравившиеся книги')}} ({{$loggedUser->likes->count()}})
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
               @include('profile.data.' . session('profile_link'))
            </section>
         </div>{{-- profile page's content wrapper end --}}
      </div>{{-- container end --}}      
   </main>
@endsection

@section('scripts')
   {{-- Datetime picker --}}
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js" integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ==" crossorigin="anonymous"></script>
   <script type="text/javascript" src="{{asset('js/datetimepicker.js')}}"></script>

   <script src="{{asset('js/profile.js')}}"></script>
@endsection