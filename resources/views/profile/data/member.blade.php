   <h1 class="title profile-content__title">
      {{$user->surname}}
      {{$user->name}}
      {{$user->last_name}}
   </h1>

   <div class="member__card">
      
      <img class="member__avatar" src="{{asset('img/users/' . $user->avatar)}}" alt="{{$user->name}}">
      
      <ul class="member__info">
         <li class="member__item">
            {{__('Сотрудник компании')}}
            {{$user->company->name}}
         </li>
         <li class="member__item">
            {{$user->login}}
         </li>
         <li class="member__item">
            {{$user->phone_numbers}}
         </li>
         <li class="member__item">
            {{$user->email}}
         </li>
      </ul>

      <p class="member__role">
         @if ($user->role == 'user')
            {{__('Пользователь')}}
         @else
            {{__('Админ')}}
         @endif
      </p>

      <p class="member__description">
         {{$user->description}}
      </p>

      <ul class="achievement">
         <li class="achievement__item">
            <output class="achievement__quantity">
               {{$user->taken_books_count}}
            </output>
            {{__('Прочитанных книг')}}
         </li>
         <li class="achievement__item">
            <output class="achievement__quantity">
               {{$user->presentation_count}}
            </output>
            {{__('Презентованных книг')}}
         </li>
      </ul>

   </div>


   