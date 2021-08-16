@if ($mstActRdrs != null)
   <h2 class="title p-content__title">{{__('Самый активный читатель')}}</h2>
   <div class="list__wrapper">
      <div class="list__head">
         <b class="width-30">{{__('Имя и фамилия')}}</b>
         <b class="width-30">{{__('Компания')}}</b>
         <b class="width-20 txt-center">{{__('Страниц')}}<small>{{__(' (прочитано)')}}</small></b>
         <b class="width-20 txt-center">{{__('Книг')}}<small>{{__(' (прочитано)')}}</small></b>
      </div>
      <ul class="list">
         @foreach ($mstActRdrs as $reader)
            <li class="list__item">
               <span class="width-30">{{$rank++}}. {{$reader->name}} {{$reader->surname}}</span>
               <span class="width-30">{{$reader->company->name}}</span>
               <span class="width-20 txt-center">{{$reader->read_pages}}</span>
               <span class="width-20 txt-center">{{$reader->taken_books_count}}</span>
               <a class="list__link" href="{{route('profile.single', $reader->id)}}"></a>
            </li>
         @endforeach
      </ul>
      {{$mstActRdrs->links()}} 
   </div>
@endif

@if ($mstRdngCmpnys != null)
   <h2 class="title p-content__title">{{__('Самая читающая компания')}}</h2>
   <div class="list__wrapper">
      <div class="list__head">
         <b class="width-40">{{__('Название компании')}}</b>
         <b class="width-20 txt-center">{{__('Страниц')}}<small>{{__(' (прочитано)')}}</small></b>
         <b class="width-20 txt-center">{{__('Книг')}}<small>{{__(' (прочитано)')}}</small></b>
         <b class="width-20 txt-center">{{__('Сотрудники')}}<small>{{__(' (читающие)')}}</small></b>
      </div>
      <ul class="list">
         @foreach ($mstRdngCmpnys as $company)
            <li class="list__item">
               <span class="width-40">{{$rank++}}. {{$company->name}}</span>
               <span class="width-20 txt-center">{{$company->read_pages}}</span>
               <span class="width-20 txt-center">{{$company->read_books}}</span>
               <span class="width-20 txt-center">{{$company->employees_count}}</span>
            </li>
         @endforeach
      </ul>
      {{$mstRdngCmpnys->links()}} 
   </div>
@endif

@if ($mstDscplndRdrs != null)
   <h2 class="title p-content__title">{{__('Самый дисциплинированный читатель')}}</h2>
   <div class="list__wrapper">
      <div class="list__head">
         <b class="width-30">{{__('Имя и фамилия')}}</b>
         <b class="width-30">{{__('Компания')}}</b>
         <b class="width-20 txt-center">{{__('К-во нарушений')}}</b>
         <b class="width-20 txt-center">{{__('Дедлайны')}}<small>{{__(' (продленные)')}}</small></b>
      </div>
      <ul class="list">
         @foreach ($mstDscplndRdrs as $reader)
            <li class="list__item">
               <span class="width-30">{{$rank++}}. {{$reader->name}} {{$reader->surname}}</span>
               <span class="width-30">{{$reader->company->name}}</span>
               <span class="width-20 txt-center">{{$reader->blacklist_value}}</span>
               <span class="width-20 txt-center">{{$reader->renewed_deadlines}}</span>
               <a class="list__link" href="{{route('profile.single', $reader->id)}}"></a>
            </li>
         @endforeach
      </ul>
      {{$mstDscplndRdrs->links()}} 
   </div>
@endif

@if ($mstPplrBooks != null)
   <h2 class="title p-content__title">{{__('Самая популярная книга')}}</h2>
   <div class="list__wrapper">
      <div class="list__head">
         <b class="width-30">{{__('Название книги')}}</b>
         <b class="width-30">{{__('Автор')}}</b>
         <b class="width-20 txt-center">{{__('К-во лайков')}}</b>
         <b class="width-20 txt-center">{{__('К-во отзывов')}}</b>
      </div>
      <ul class="list">
         @foreach ($mstPplrBooks as $book)
            <li class="list__item">
               <span class="width-30">{{$rank++}}. {{$book->title}}</span>
               <span class="width-30">{{$book->author}}</span>
               <span class="width-20 txt-center">{{$book->likes_count}}</span>
               <span class="width-20 txt-center">{{$book->comments_count}}</span>
               <a class="list__link" href="{{route('books.single', $book->id)}}"></a>
            </li>
         @endforeach
      </ul>
      {{$mstPplrBooks->links()}} 
   </div>
@endif

@if ($mstPrctvMmbrs != null)
   <h2 class="title p-content__title">{{__('Самый проактивный член клуба')}}</h2>
   <div class="list__wrapper">
      <div class="list__head">
         <b class="width-30">{{__('Имя и фамилия')}}</b>
         <b class="width-30">{{__('Компания')}}</b>
         <b class="width-20 txt-center">{{__('К-во презентаций')}}</b>
         <b class="width-20 txt-center">{{__('Активность')}}</b>
      </div>
      <ul class="list">
         @foreach ($mstPrctvMmbrs as $member)
            <li class="list__item">
               <span class="width-30">{{$rank++}}. {{$member->name}} {{$member->surname}}</span>
               <span class="width-30">{{$member->company->name}}</span>
               <span class="width-20 txt-center">{{$member->presentations_count}}</span>
               <span class="width-20 txt-center">{{$member->participations_count}}</span>
               <a class="list__link" href="{{route('profile.single', $member->id)}}"></a>
            </li>
         @endforeach
      </ul>
      {{$mstPrctvMmbrs->links()}} 
   </div>
@endif