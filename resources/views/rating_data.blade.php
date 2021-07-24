
   @if ($mstActRdrs != null)
      <h2 class="title">{{__('Самый активный читатель')}}</h2>
      <ul class="list rating-view__list">
         <li class="list__item rating-view__item">
            <p class="active-reader__name">{{__('Имя и фамилия')}}</p>
            <p class="active-reader__company">{{__('Компания')}}</p>
            <p class="active-reader__books">{{__('Книг')}}<small>{{__(' (прочитано)')}}</small></p>
            <p class="active-reader__pages">{{__('Страниц')}}<small>{{__(' (прочитано)')}}</small></p>
         </li>
         @foreach ($mstActRdrs as $reader)
         <li class="list__item rating-view__item">
            <p class="active-reader__name">{{$reader->name}} {{$reader->surname}}</p>
            <p class="active-reader__company">{{$reader->company->name}}</p>
            <p class="active-reader__books">{{$reader->taken_books_count}}</p>
            <p class="active-reader__pages">{{$reader->read_pages}}</p>
         </li>
         @endforeach
      </ul>           
      {{$mstActRdrs->links()}}  
   @endif

   @if ($mstRdngCmpny != null)
      <h2 class="title">{{__('Самая читающая компания')}}</h2>
      <ul class="list rating-view__list">
         <li class="list__item rating-view__item">
            <p class="company__name">{{__('Название компании')}}</p>
            <p class="company__employees">{{__('Сотрудники')}}</p>
            <p class="company__read-books">{{__('Книг')}}<small>{{__(' (прочитано)')}}</small></p>
            <p class="company__read-pages">{{__('Страниц')}}<small>{{__(' (прочитано)')}}</small></p>
         </li>
         @foreach ($mstRdngCmpny as $company)
         <li class="list__item rating-view__item">
            <p class="company__name">{{$company->name}}</p>
            <p class="company__employees">{{$company->employees_count}}</p>
            <p class="company__read-books">{{$company->read_books}}</p>
            <p class="company__read-pages">{{$company->read_pages}}</p>
         </li>
         @endforeach
      </ul>           
      {{$mstRdngCmpny->links()}}  
   @endif