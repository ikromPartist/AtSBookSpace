@extends('layouts.master')

@section('content')
   <main class="profile__page">
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
                  <a class="breadcrumbs__link" tabindex="0">Управление профилем</a>
               </li>
            </ul>
         </div>
      </section>
      <div class="container">
         <h1 class="heading">Управление профилем</h1>
         <div class="p-wrapper">
            <aside class="p-sidebar" data-id="profile-sidebar">
               <nav class="p-navigation">
                  <ul class="p-navigation__list">
                     <li class="p-navigation__item">
                        <a class="p-navigation__link {{session('profile_link') == 'profile' ? 'active' : ''}}" href="#" data-id="profile" data-type="link">Профиль</a>
                     </li>
                     <li class="p-navigation__item">
                        <a class="p-navigation__link {{session('profile_link') == 'members' ? 'active' : ''}}" href="#" data-id="members" data-type="link">Читатели ({{App\Models\User::select('id')->get()->count()}})</a>
                     </li>
                     <li class="p-navigation__item">
                        <a class="p-navigation__link {{session('profile_link') == 'read_books' ? 'active' : ''}}" href="#" data-id="read_books" data-type="link">Прочитанные книги ({{$loggedUser->taken_books_count}})</a>
                     </li>
                     <li class="p-navigation__item">
                        <a class="p-navigation__link {{session('profile_link') == 'activities' ? 'active' : ''}}" href="#" data-id="activities" data-type="link">Участие в мероприятиях ({{$loggedUser->actions_count}})</a>
                     </li>
                     <li class="p-navigation__item">
                        <a class="p-navigation__link {{session('profile_link') == 'presentation' ? 'active' : ''}}" href="#" data-id="presentation" data-type="link">Презентация книг</a>
                     </li>
                     <li class="p-navigation__item">
                        <a class="p-navigation__link {{session('profile_link') == 'booked_books' ? 'active' : ''}}" href="#" data-id="booked_books" data-type="link">Забронированные книги ({{$loggedUser->booked_books->count()}})</a>
                     </li>
                     <li class="p-navigation__item">
                        <a class="p-navigation__link {{session('profile_link') == 'liked_books' ? 'active' : ''}}" href="#" data-id="liked_books" data-type="link">Понравившиеся книги ({{$loggedUser->likes->count()}})</a>
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