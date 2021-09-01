<ul class="book-cards {{session('book_cards') == 'hidden' ? 'hidden' : '' }}" data-id="book-cards-list">
   @foreach ($books as $book)
   <li class="book-cards__item">
      <figure class="books-card">
         <img class="books-card__image" src="{{asset('img/books/' . $book->img)}}" alt="{{$book->title}}">
         <div class="books-card__overlay">
            <a class="books-card__links books-card__links--more" href="{{route('books.single', $book->id)}}">Подробнее</a>
            <a class="books-card__links books-card__links--order" data-type="booking" data-book="{{$book->id}}" data-queue="{{$book->queues_count + 1}}" href="#">Забронировать</a>
         </div>
         @if (Carbon\Carbon::now()->diffInDays($book->created_at) < 100)
         <img class="books-card__new-flag" src="{{asset('img/books/new.png')}}" alt="Новый продукт">
         @endif
         <h3 class="books-card__title">
            {{$book->title}}
            <strong class="books-card__author">({{$book->author}})</strong>
            <b class="books-card__pages">{{$book->pages}} стр.</b>
         </h3>
         <div class="books-card__rating-wrapper">
            <div>
               <span class="material-icons books-card__rating-icons">{{$book->rating >= 1 ? 'star' : 'star_outline'}}</span>
               <span class="material-icons books-card__rating-icons">{{$book->rating >= 2 ? 'star' : 'star_outline'}}</span>
               <span class="material-icons books-card__rating-icons">{{$book->rating >= 3 ? 'star' : 'star_outline'}}</span>
               <span class="material-icons books-card__rating-icons">{{$book->rating >= 4 ? 'star' : 'star_outline'}}</span>
               <span class="material-icons books-card__rating-icons">{{$book->rating >= 5 ? 'star' : 'star_outline'}}</span>
            </div>
            <output class="books-card__comments-quantity">
               @if (!$book->comments)
                  Нет
               @else
                  {{$book->comments_count}}
               @endif
                  отзывов
            </output>
         </div>{{-- rating wrapper end --}}
         <div data-book-status="{{$book->id}}">
            @if (!$book->user && $book->queues_count == 0)
            <p class="books-card__status books-card__status--available">Доступна</p>
            @else
            <p class="books-card__status books-card__status--unavailable">
               Занято примерно до: 
               @php
                  $date = null;
                  if ($book->return_date) {
                     $returnDate = \Carbon\Carbon::parse($book->return_date);
                     $date = $returnDate->addDays((30 * $book->queues_count));
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
</ul>{{-- book cards end --}}
<div class="list__wrapper books-list {{session('books_list') == 'show' ? 'show' : ''}}" data-id="books-list">
   <div class="list__head">
      <b class="width-30">Название</b>
      <b class="width-20">Автор</b>
      <b class="width-20 txt-center">Страниц</b>
      <b class="width-10 txt-center">Рейтинг</b>
      <b class="width-20 txt-center">Статус</b>
   </div>
   <ul class="list">
      @foreach ($books as $book)
         <li class="list__item">
            <span class="width-30">{{$rank++}}. {{$book->title}}</span>
            <span class="width-20">{{$book->author}}</span>
            <span class="width-20 txt-center">{{$book->pages}}</span>
            <span class="width-10 txt-center">{{$book->rating}}</span>
            @if (!$book->user_id)
            <span class="width-20 txt-center green">Доступно</span>
            @else
            <span class="width-20 txt-center red">Занято</span>
            @endif
            <a class="list__link" href="{{route('books.single', $book->id)}}"></a>
         </li>
      @endforeach
   </ul>
</div>
{{$books->links()}} 

<section class="modal modal--success hidden" data-id="booking-success">
   <div class="modal__container">
      <p class="modal__text">Книга добавлено в список забронированнных книг.</p>
      <div class="modal__btn-wrapper">
         <button class="button" data-id="booking-success__ok-btn" type="button">OK</button>
      </div>
      <button class="modal__close-btn" type="button">
         <span class="material-icons modal__close-icon" data-id="booking-success__close-btn">close</span>
      </button>
   </div>
</section>
<section class="modal modal--fail hidden" data-id="booking-fail">
   <div class="modal__container">
      <p class="modal__text">Операция невозможнa. У Вас максимальное количество забронированных книг</p>
      <div class="modal__btn-wrapper">
         <button class="button" data-id="booking-fail__ok-btn" type="button">OK</button>
      </div>
      <button class="modal__close-btn" type="button">
         <span class="material-icons modal__close-icon" data-id="booking-fail__close-btn">close</span>
      </button>
   </div>
</section>