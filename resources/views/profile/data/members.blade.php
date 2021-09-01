<h2 class="title p-content__title">Читатели</h2>
<div class="list__wrapper">
   <div class="list__head">
      <b class="width-30">Имя и фамилия</b>
      <b class="width-30">Компания</b>
      <b class="width-20 txt-center">Страниц<small> (прочитано)</small></b>
      <b class="width-20 txt-center">Книг<small> (прочитано)</small></b>
   </div>
   <ul class="list">
      @foreach ($members as $reader)
         <li class="list__item">
            <span class="width-30">{{$rank++}}. {{$reader->name}} {{$reader->surname}}</span>
            <span class="width-30">{{$reader->company->name}}</span>
            <span class="width-20 txt-center">{{$reader->read_pages}}</span>
            <span class="width-20 txt-center">{{$reader->taken_books_count}}</span>
            <a class="list__link" href="{{route('profile.single', $reader->id)}}"></a>
         </li>
      @endforeach
   </ul>
   {{$members->links()}} 
</div>

   
   
   
