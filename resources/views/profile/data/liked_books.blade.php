<h1 class="title p-content__title">{{__('Понравившиеся книги')}}</h1>
@if ($loggedUser->likes->count() != 0)
   <div class="list__wrapper">
      <div class="list__head">
         <b class="width-30">{{__('Название книги')}}</b>
         <b class="width-30">{{__('Автор')}}</b>
         <b class="width-20 txt-center">{{__('К-во страниц')}}</b>
         <b class="width-20 txt-center">{{__('Рейтинг')}}</b>
      </div>
      <ul class="list">
         @php
            $rank = 1;
         @endphp
         @foreach ($loggedUser->likes as $like)
            <li class="list__item">
               <span class="width-30">{{$rank++}}. {{$like->book->title}}</span>
               <span class="width-30">{{$like->book->author}}</span>
               <span class="width-20 txt-center">{{$like->book->pages}}</span>
               <span class="width-20 txt-center">{{$like->book->rating}}</span>
               <a class="list__link" href="{{route('books.single', $like->book->id)}}"></a>
            </li>
         @endforeach
      </ul>
   </div>
@else
   <p class="no-content">
      <span class="material-icons no-content__icon">sentiment_very_dissatisfied</span>
      {{{__('Список пуст')}}}
   </p>    
@endif