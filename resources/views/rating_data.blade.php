
   @if ($mstActRdrs)
      <h2 class="title">{{__('Самый активный Читатель')}}</h2>
      <ul class="list rating-view__list">
         <li class="list__item">
            <p class="rating-view__name">{{__('Имя и фамилия')}}</p>
            <p class="rating-view__company">{{__('Компания')}}</p>
            <p class="rating-view__books">{{__('Книг')}}<small>{{__(' (прочитано)')}}</small></p>
            <p class="rating-view__pages">{{__('Страниц')}}<small>{{__(' (прочитано)')}}</small></p>
         </li>
         @foreach ($mstActRdrs as $reader)
         <li class="list__item">
            <p class="rating-view__name">{{$reader->name}} {{$reader->surname}}</p>
            <p class="rating-view__company">{{$reader->company}}</p>
            <p class="rating-view__books">{{$reader->read_books}}</p>
            <p class="rating-view__pages">{{$reader->read_pages}}</small></p>
         </li>
         @endforeach
      </ul>           
      {{$mstActRdrs->links()}}  
   @endif
       