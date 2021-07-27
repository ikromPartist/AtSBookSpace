
   @if ($mstActRdrs != null)
      <h2 class="title">{{__('Самый активный читатель')}}</h2>
      <ul class="list rating-view__list">
         <li class="list__item rating-view__item">
            <p class="active-reader__name">{{__('Имя и фамилия')}}</p>
            <p class="active-reader__company">{{__('Компания')}}</p>
            <p class="active-reader__pages">{{__('Страниц')}}<small>{{__(' (прочитано)')}}</small></p>
            <p class="active-reader__books">{{__('Книг')}}<small>{{__(' (прочитано)')}}</small></p>
         </li>
         @foreach ($mstActRdrs as $reader)
         <li class="list__item rating-view__item {{$reader->id == $loggedUser->id ? 'rating-view__item--user' : ''}}">
            <p class="active-reader__name">{{$rank++}}. {{$reader->name}} {{$reader->surname}}</p>
            <p class="active-reader__company">{{$reader->company->name}}</p>
            <p class="active-reader__pages">{{$reader->read_pages}}</p>
            <p class="active-reader__books">{{$reader->taken_books_count}}</p>
         </li>
         @endforeach
      </ul>           
      {{$mstActRdrs->links()}}  
   @endif

   @if ($mstRdngCmpnys != null)
      <h2 class="title">{{__('Самая читающая компания')}}</h2>
      <ul class="list rating-view__list">
         <li class="list__item rating-view__item">
            <p class="company__name">{{__('Название компании')}}</p>
            <p class="company__read-pages">{{__('Страниц')}}<small>{{__(' (прочитано)')}}</small></p>
            <p class="company__read-books">{{__('Книг')}}<small>{{__(' (прочитано)')}}</small></p>
            <p class="company__employees">{{__('Сотрудники')}}<small>{{__(' (читающие)')}}</small></p>
         </li>
         @foreach ($mstRdngCmpnys as $company)
         <li class="list__item rating-view__item {{$company->name == $loggedUser->company->name ? 'rating-view__item--user' : ''}}">
            <p class="company__name">{{$rank++}}. {{$company->name}}</p>
            <p class="company__read-pages">{{$company->read_pages}}</p>
            <p class="company__read-books">{{$company->read_books}}</p>
            <p class="company__employees">{{$company->employees_count}}</p>
         </li>
         @endforeach
      </ul>           
      {{$mstRdngCmpnys->links()}}  
   @endif

   @if ($mstDscplndRdrs != null)
      <h2 class="title">{{__('Самый дисциплинированный читатель')}}</h2>
      <ul class="list rating-view__list">
         <li class="list__item rating-view__item">
            <p class="disciplined-reader__name">{{__('Имя и фамилия')}}</p>
            <p class="disciplined-reader__company">{{__('Компания')}}</p>
            <p class="disciplined-reader__blacklist-value">{{__('К-во нарушений')}}</p>
            <p class="disciplined-reader__renewed-deadlines">{{__('Дедлайны')}}<small>{{__(' (продленные)')}}</small></p>
         </li>
         @foreach ($mstDscplndRdrs as $reader)
         <li class="list__item rating-view__item {{$reader->id == $loggedUser->id ? 'rating-view__item--user' : ''}}">
            <p class="disciplined-reader__name">{{$rank++}}. {{$reader->name}} {{$reader->surname}}</p>
            <p class="disciplined-reader__company">{{$reader->company->name}}</p>
            <p class="disciplined-reader__blacklist-value">{{$reader->blacklist_value}}</p>
            <p class="disciplined-reader__renewed-deadlines">{{$reader->renewed_deadlines}}</p>
         </li>
         @endforeach
      </ul>         
      {{$mstDscplndRdrs->links()}}  
   @endif

   @if ($mstPplrBooks != null)
      <h2 class="title">{{__('Самая популярная книга')}}</h2>
      <ul class="list rating-view__list">
         <li class="list__item rating-view__item">
            <p class="disciplined-reader__name">{{__('Название книги')}}</p>
            <p class="disciplined-reader__company">{{__('Автор')}}</p>
            <p class="disciplined-reader__blacklist-value">{{__('К-во лайков')}}</p>
            <p class="disciplined-reader__renewed-deadlines">{{__('К-во отзывов')}}</p>
         </li>
         @foreach ($mstPplrBooks as $book)
         <li class="list__item rating-view__item {{$book->id == $loggedUser->book->id ? 'rating-view__item--user' : ''}}">
            <p class="popular-book__title">{{$rank++}}. {{$book->title}}</p>
            <p class="popular-book__author">{{$book->author}}</p>
            <p class="popular-book__likes">{{$book->likes_count}}</p>
            <p class="popular-book__comments">{{$book->comments_count}}</p>
         </li>
         @endforeach
      </ul>         
      {{$mstPplrBooks->links()}} 
   @endif

   @if ($mstPrctvMmbrs != null)
      <h2 class="title">{{__('Самый проактивный член клуба')}}</h2>
      <ul class="list rating-view__list">
         <li class="list__item rating-view__item">
            <p class="disciplined-reader__name">{{__('Название книги')}}</p>
            <p class="disciplined-reader__company">{{__('Автор')}}</p>
            <p class="disciplined-reader__blacklist-value">{{__('К-во лайков')}}</p>
            <p class="disciplined-reader__renewed-deadlines">{{__('К-во отзывов')}}</p>
         </li>
         @foreach ($mstPrctvMmbrs as $member)
         <li class="list__item rating-view__item">
            <p class="disciplined-reader__name">{{$rank++}}</p>
            <p class="disciplined-reader__company"></p>
            <p class="disciplined-reader__blacklist-value"></p>
            <p class="disciplined-reader__renewed-deadlines"></p>
         </li>
         @endforeach
      </ul>         
      {{$mstPrctvMmbrs->links()}} 
   @endif