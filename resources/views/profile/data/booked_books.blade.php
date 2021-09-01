<h1 class="title p-content__title">Забронированные книги</h1>
@if (count($bookedBooks) != 0)
   <ul class="booked-books">
      @foreach ($bookedBooks as $book)
      <li class="booked-books__item">
         <figure class="books-card">
            <div class="books-card__image-wrapper">
               <img class="books-card__image" src="{{asset('img/books/' . $book->book->img)}}" alt="Название книги">
               <div class="books-card__overlay">
                  <a class="books-card__links books-card__links--more" href="{{route('books.single', $book->book->id)}}">Подробнее</a>
               </div>
               @if (Carbon\Carbon::now()->diffInDays($book->book->created_at) < 100)
               <img class="books-card__new-flag" src="{{asset('img/books/new.png')}}" alt="Новый продукт">
               @endif
            </div>
            <h3 class="books-card__title">
               {{$book->book->title}}<br>
               <strong class="books-card__author">({{$book->book->author}})</strong>
               <b class="books-card__pages">{{$book->book->pages}} стр.</b>
            </h3>
            <div class="books-card__rating-wrapper">
               <div>
                  <span class="material-icons books-card__rating-icons">{{$book->book->rating >= 1 ? 'star' : 'star_outline'}}</span>
                  <span class="material-icons books-card__rating-icons">{{$book->book->rating >= 2 ? 'star' : 'star_outline'}}</span>
                  <span class="material-icons books-card__rating-icons">{{$book->book->rating >= 3 ? 'star' : 'star_outline'}}</span>
                  <span class="material-icons books-card__rating-icons">{{$book->book->rating >= 4 ? 'star' : 'star_outline'}}</span>
                  <span class="material-icons books-card__rating-icons">{{$book->book->rating >= 5 ? 'star' : 'star_outline'}}</span>
               </div>
               <output class="books-card__comments-quantity">
                  @if (!$book->book->comments)
                     Нет
                  @else
                     {{$book->book->comments->count()}}
                  @endif
                     отзывов
               </output>
            </div>{{-- rating wrapper end --}}
            <div class="books-card__status-wrapper" data-book-status="{{$book->book->id}}">
               @if (!$book->user && $book->queues_count == 0)
               <p class="book-info__status book-info__status--available">Доступна</p>
               @else
               <p class="books-card__status books-card__status--unavailable">
                  Занято примерно до: 
                  @php
                     $date = null;
                     if ($book->book->return_date) {
                        $returnDate = \Carbon\Carbon::parse($book->book->return_date);
                        $date = $returnDate->addDays((30 * $book->book->queues_count));
                     } else {
                        $date = \Carbon\Carbon::now()->addDays((30 * $book->queues_count));
                     }
                  @endphp
                  <time datetime="{{$date}}">{{$date->format('d/m')}}</time>
               </p>
               @endif
            </div>{{-- status wrapeer end --}}
         </figure>
      </li>
      @endforeach
   </ul>
@else
   <p class="no-content">
      <span class="material-icons no-content__icon">sentiment_very_dissatisfied</span>
      У Вас на данный момент нет забронированных книг
   </p>
@endif