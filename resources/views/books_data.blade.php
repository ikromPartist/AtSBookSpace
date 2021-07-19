   <h2 class="visually-hidden">{{__('Список книг')}}</h2>
   <ul class="book-cards {{session('book_cards') == 'hidden' ? 'hidden' : '' }}" data-id="book-cards-list">
      @foreach ($books as $book)
      <li class="book-cards__item">
         <figure class="books-card">
            <div class="books-card__image-wrapper">
               <img class="books-card__image" src="{{asset('images/books/' . $book->img)}}" alt="{{__('Название книги')}}">
               <div class="books-card__overlay">
                  <a class="books-card__links books-card__links--more" href="{{route('books_index')}}?id={{$book->id}}">{{__('Подробнее')}}</a>
                  <a class="books-card__links books-card__links--order" href="#">{{__('Забронировать')}}</a>
               </div>
               @if (Carbon\Carbon::now()->diffInDays($book->created_at) < 100)
               <img class="books-card__new-flag" src="{{asset('images/books/new.png')}}" alt="{{__('Новый продукт')}}">
               @endif
            </div>
            <h3 class="books-card__title">
               {{$book->title}} 
               <br><strong class="books-card__author">({{$book->author}})</strong>
               <b class="books-card__pages">{{$book->pages}} {{__('стр.')}}</b>
            </h3>
            <div class="books-card__rating-wrapper">
               <div>
                  <span class="material-icons-outlined books-card__rating-icons {{$book->rating >= 1 ? 'filled' : ''}}" data-id="rating-icon">star_border</span>
                  <span class="material-icons-outlined books-card__rating-icons {{$book->rating >= 2 ? 'filled' : ''}}" data-id="rating-icon">star_border</span>
                  <span class="material-icons-outlined books-card__rating-icons {{$book->rating >= 3 ? 'filled' : ''}}" data-id="rating-icon">star_border</span>
                  <span class="material-icons-outlined books-card__rating-icons {{$book->rating >= 4 ? 'filled' : ''}}" data-id="rating-icon">star_border</span>
                  <span class="material-icons-outlined books-card__rating-icons {{$book->rating >= 5 ? 'filled' : ''}}" data-id="rating-icon">star_border</span>
               </div>
               <output class="books-card__comments-quantity">
                  @if ($book->comments == 0)
                     {{__('Нет')}}
                  @else
                     {{$book->comments}}
                  @endif 
                  {{__('отзывов')}}
               </output>
            </div>
            <div class="books-card__status-wrapper">
               @if (!$book->user)
                  <p class="books-card__status books-card__status--available">{{__('Доступна')}}</p>
               @else
                  <p class="books-card__status books-card__status--unavailable">
                     {{__('Занято примерно до')}}: <time datetime="{{$book->available_date}}">{{ \Carbon\Carbon::parse($book->available_date)->format('d/m')}}</time>
                  </p>
               @endif
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
         <a class="books-list__links" href="{{route('books_index')}}?id={{$book->id}}">
            <h3 class="books-list__title">{{$book->title}}</h3>
            <p class="books-list__author">{{$book->author}}</p>
            <p class="books-list__pages">{{$book->pages}} {{__('стр.')}}</p>
            <p class="books-list__rating">{{$book->rating}}</p>
            @if ($book->available)
            <p class="books-list__available">{{__('Доступна')}}</p>
            @else
            <p class="books-list__unavailable">{{__('Занято')}}</p>
            @endif
         </a>
      </li> 
      @endforeach
   </ul>

   {{$books->links()}}