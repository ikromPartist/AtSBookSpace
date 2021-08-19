<h1 class="title p-content__title">{{__('Участие в мероприятиях')}}</h1>
<div class="list__wrapper">
   <div class="list__head">
      <b class="width-30">{{__('Модератор')}}</b>
      <b class="width-30">{{__('Аудитория')}}</b>
      <b class="width-20 txt-center">{{__('Участники')}}</b>
      <b class="width-20 txt-center">{{__('Дата окончания')}}</b>
   </div>
   <ul class="list">
      @php 
         $rank = 1; 
      @endphp
      @foreach ($activities as $activity)
         <li class="list__item">
            <span class="width-30">{{$rank++}}. {{$activity->moderator}}</span>
            <span class="width-30">{{$activity->audience}}</span>
            <span class="width-20 txt-center">{{$activity->participants_count}}</span>
            <span class="width-20 txt-center">{{$activity->end}}</span>
            <a class="list__link" href="{{route('activities.single', $activity->id)}}"></a>
         </li>
      @endforeach
   </ul>
</div>