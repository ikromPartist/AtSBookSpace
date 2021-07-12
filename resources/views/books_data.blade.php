   <h2 class="visually-hidden">{{__('Список книг')}}</h2>
   <ul class="book-cards {{session('book_cards') == 'hidden' ? 'hidden' : '' }}" data-id="book-cards-list">
      @foreach ($books as $book)
      <li class="book-cards__item">
         <figure class="books-card">
            <div class="books-card__image-wrapper">
               <img class="books-card__image" src="{{asset('images/books/book1.jpg')}}" alt="booktitle">
               <div class="books-card__overlay">
                  <a class="books-card__links books-card__links--more" href="#">{{__('Подробнее')}}</a>
                  <a class="books-card__links books-card__links--order" href="#">{{__('Забронировать')}}</a>
               </div>
            </div>
            <h3 class="books-card__title">
               {{$book->title}} 
               <br><strong class="books-card__author">({{$book->author}})</strong>
               <p class="books-card__pages">{{$book->pages}} {{__('стр.')}}</p>
            </h3>
            <div class="books-card__rating-wrapper">
               <div>
                  <span class="material-icons-outlined books-card__rating-icons">star_border</span>
                  <span class="material-icons-outlined books-card__rating-icons">star_border</span>
                  <span class="material-icons-outlined books-card__rating-icons">star_border</span>
                  <span class="material-icons-outlined books-card__rating-icons">star_border</span>
                  <span class="material-icons-outlined books-card__rating-icons">star_border</span>
               </div>
               <output class="books-card__comments-quantity">{{__('Нет отзывов')}}</output>
            </div>
            <div class="books-card__status-wrapper">
               {{-- <p class="books-card__status books-card__status--available">{{__('Доступна')}}</p> --}}
               <p class="books-card__status books-card__status--unavailable">{{__('Занято примерно до')}}: <time datetime="2021-09-27">27/09</time></p>
            </div>
         </figure>
      </li>
      @endforeach
   </ul>

   <ul class="books-list {{session('books_list') == 'show' ? 'show' : ''}}" data-id="books-list">
      <li class="books-list__item">
         <h3 class="books-list__title">{{__('Название')}}</h3>
         <p class="books-list__author">{{__('Автор')}}</p>
         <p class="books-list__pages">{{__('Страницы')}}</p>
         <p class="books-list__rating">{{__('Рейтинг')}}</p>
         <p class="books-list__availablity">{{__('Доступность')}}</p>
      </li> 
      @foreach ($books as $book)
      <li class="books-list__item">
         <h3 class="books-list__title">{{$book->title}}</h3>
         <p class="books-list__author">{{$book->author}}</p>
         <p class="books-list__pages">{{$book->pages}} {{__('стр.')}}</p>
         <p class="books-list__rating">{{$book->rating}}</p>
         @if ($book->available)
         <p class="books-list__available">{{__('Доступна')}}</p>
         @else
         <p class="books-list__unavailable">{{__('Занято')}}</p>
         @endif
      </li> 
      @endforeach
   </ul>

   {{$books->links()}}