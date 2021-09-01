<h1 class="title p-content__title">Участие в мероприятиях</h1>
@if (count($activities) != 0)
   <div class="list__wrapper">
      <div class="list__head">
         <b class="width-30">Модератор</b>
         <b class="width-30">Аудитория</b>
         <b class="width-20 txt-center">Участники</b>
         <b class="width-20 txt-center">Дата окончания</b>
      </div>
      <ul class="list">
         @foreach ($activities as $activity)
            <li class="list__item">
               <span class="width-30">{{$rank++}}. {{$activity->moderator}}</span>
               <span class="width-30">{{$activity->audience}}</span>
               <span class="width-20 txt-center">{{$activity->participants->count()}}</span>
               <span class="width-20 txt-center">{{$activity->end}}</span>
               <a class="list__link" href="{{route('activities.single', $activity->id)}}"></a>
            </li>
         @endforeach
      </ul>
      {{$activities->links()}}
   </div>
@else
   <p class="no-content">
      <span class="material-icons no-content__icon">sentiment_very_dissatisfied</span>
      Вы пока не участвовали в мероприятиях
   </p>
@endif

