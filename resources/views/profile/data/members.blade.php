<h1 class="title profile-content__title">{{__('Читатели')}}</h1>

   <ul class="members">

      @foreach ($members as $member)
         
         <li class="members__item">
            <img class="members__avatar" src="{{'img/users/' . $member->avatar}}" alt="{{$member->name}}">
            <div>
               <p class="members__name">
                  {{$member->surname}}
                  {{$member->name}}
                  {{$member->last_name}}
               </p>
               <p class="members__company">
                  {{__('Сотрудник компании')}}
                  {{$member->company->name}}
               </p>
               <p class="members__login">
                  {{$member->login}}
               </p>
            </div>
            <div class="members__link-wrapper">
               <span class="material-icons-outlined">
                  visibility
               </span>
               <p class="members__more-link">
                  {{__('Посмотреть')}}
               </p>
            </div>
         </li>

      @endforeach

   </ul>

   {{$members->links()}}
   
   
   
