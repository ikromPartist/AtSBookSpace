<h2 class="title p-content__title">{{__('Самая популярная книга')}}</h2>
@if (count($readBooks) != 0)
   <div class="list__wrapper">
      <div class="list__head">
         <b class="width-30">{{__('Название книги')}}</b>
         <b class="width-30">{{__('Автор')}}</b>
         <b class="width-20 txt-center">{{__('К-во страниц')}}</b>
         <b class="width-20 txt-center">{{__('Рейтинг')}}</b>
      </div>
      <ul class="list">
         @foreach ($readBooks as $readBook)
            <li class="list__item">
               <span class="width-30">{{$rank++}}. {{$readBook->book->title}}</span>
               <span class="width-30">{{$readBook->book->author}}</span>
               <span class="width-20 txt-center">{{$readBook->book->pages}}</span>
               <span class="width-20 txt-center">{{$readBook->book->rating}}</span>
               <a class="list__link" href="{{route('books.single', $readBook->book->id)}}"></a>
            </li>
         @endforeach
      </ul>
      {{$readBooks->links()}} 
   </div>
@else
   <p class="no-content">
      <span class="material-icons no-content__icon">sentiment_very_dissatisfied</span>
      {{{__('У Вас на данный момент нет забронированных книг')}}}
   </p>    
@endif