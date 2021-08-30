@extends('layouts.master')

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
               <a class="breadcrumbs__link" tabindex="0">{{__('Уведомления')}}</a>
            </li>
         </ul>
         
         <h1 class="page-title">{{__('Уведомления')}}</h1>
         
         <section class="notifications">
            <div class="list__wrapper">
               <div class="list__head">
                  <b class="width-60">{{__('Заголовок')}}</b>
                  <b class="width-20 txt-center">{{__('Дата')}}</b>
                  <b class="width-20 txt-center">{{__('Статус')}}</b>
               </div>
               <ul class="list">
                  @foreach ($notifications as $notification)
                     @switch($notification->type)
                        @case('presentation')
                           <li class="list__item">
                              <span class="width-60">{{$rank++}}. {{__('Презентация ждет подтверждения')}}</span>
                              <span class="width-20 txt-center">{{$notification->created_at}}</span>
                              <span class="width-20 txt-center">@if($notification->new){{__('НОВЫЙ')}}@else{{__('ПРОСМОТРЕНО')}}@endif</span>
                              <a class="list__link" href="{{route('notifications.single', $notification->id)}}"></a>
                           </li>  
                           @break
                        @case('presentation_accepted')
                           <li class="list__item">
                              <span class="width-60">{{$rank++}}. {{__('Ваша презентация подтверждена')}}</span>
                              <span class="width-20 txt-center">{{$notification->created_at}}</span>
                              <span class="width-20 txt-center">@if($notification->new){{__('НОВЫЙ')}}@else{{__('ПРОСМОТРЕНО')}}@endif</span>
                              <a class="list__link" href="{{route('notifications.single', $notification->id)}}"></a>
                           </li>
                           @break
                        @case('presentation_denied')
                           <li class="list__item">
                              <span class="width-60">{{$rank++}}. {{__('Ваша презентация отклонена')}}</span>
                              <span class="width-20 txt-center">{{$notification->created_at}}</span>
                              <span class="width-20 txt-center">@if($notification->new){{__('НОВЫЙ')}}@else{{__('ПРОСМОТРЕНО')}}@endif</span>
                              <a class="list__link" href="{{route('notifications.single', $notification->id)}}"></a>
                           </li>
                           @break
                        @case('feedback')
                           @php
                              $feedback = App\Models\Feedback::find($notification->type_id);                   
                           @endphp
                           <li class="list__item">
                              <span class="width-60">{{$rank++}}. {{__('Сообщение от пользователя')}} {{$feedback->user->name}} {{$feedback->user->surname}}</span>
                              <span class="width-20 txt-center">{{$notification->created_at}}</span>
                              <span class="width-20 txt-center">@if($notification->new){{__('НОВЫЙ')}}@else{{__('ПРОСМОТРЕНО')}}@endif</span>
                              <a class="list__link" href="{{route('notifications.single', $notification->id)}}"></a>
                           </li>
                           @break
                        @case('feedback_answered')
                           @php
                              $feedback = App\Models\Feedback::find($notification->type_id);                   
                           @endphp
                           <li class="list__item">
                              <span class="width-60">{{$rank++}}. {{__('Пришел ответ на Ваше сообщение')}}</span>
                              <span class="width-20 txt-center">{{$notification->created_at}}</span>
                              <span class="width-20 txt-center">@if($notification->new){{__('НОВЫЙ')}}@else{{__('ПРОСМОТРЕНО')}}@endif</span>
                              <a class="list__link" href="{{route('notifications.single', $notification->id)}}"></a>
                           </li>
                           @break
                        @default
                     @endswitch
                  @endforeach
                  @if ($notifications->count() == 0)
                  <p class="no-content">
                     <span class="material-icons no-content__icon">sentiment_very_dissatisfied</span>
                     {{{__('Пока что у Вас нет уведомлений')}}}.
                  </p>  
                  @endif
               </ul>
               {{$notifications->links()}} 
            </div>
         </section>
      </div>
   </main>
@endsection