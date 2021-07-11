   <h2 class="visually-hidden">{{__('Список книг')}}</h2>
   <ul class="book-cards">
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
            <h3 class="books-card__title">{{$book->title}} <br> <span class="books-card__author">({{$book->author}})</span></h3>
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

   {{$books->links()}}