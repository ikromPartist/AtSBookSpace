<h1 class="title p-content__title">{{__('Забронированные книги')}}</h1>
@if (count($bookedBooks) != 0)
   @foreach ($bookedBooks as $book)
      hello world
   @endforeach
@else
   <p class="no-content">
      <span class="material-icons no-content__icon">sentiment_very_dissatisfied</span>
      {{{__('У Вас на данный момент нет забронированных книг')}}}
   </p>
@endif