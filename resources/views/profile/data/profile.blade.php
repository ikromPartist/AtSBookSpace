<h1 class="title p-content__title">{{__('Профиль')}}</h1>

<div class="profile__top-wrapper">
   <form class="avatar-form" data-id="avatar-form" action="{{route('avatar.update')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <img class="avatar-form__img" src="{{asset('img/users/' . $loggedUser->avatar)}}" alt="{{$loggedUser->name}}">
      <div class="avatar-form__item">
         <label class="button avatar-form__label" for="avatar">{{__('Изменить фото профиля')}}</label>
         <input class="avatar-form__input visually-hidden" id="avatar" type="file" name="avatar" accept="image/*">
         <p class="avatar-form__role">
         @if ($loggedUser->role == 'admin')
            {{__('Админ')}}
         @else
            {{__('Пользователь')}}
         @endif
      </p>
      </div>
   </form>
   <div class="modal hidden" data-id="avatar-modal">
      <div class="modal__msg-wrapper">
         <p class="modal__msg">
            {{__('Вы уверены что хотите именить фото профиля')}}?
         </p>
      </div>
      <div class="modal__btn-wrapper">
         <button class="button" type="submit">
            {{__('Изменить')}}
         </button>
         <button class="button button--red" data-id="avatar__cancel-btn" type="button">
            {{__('Отмена')}}
         </button>
      </div>
      <button class="modal__close-btn" aria-label="{{__('Закрыть')}}" type="button">
         <span class="material-icons modal__close-icon" data-id="avatar__close-btn">
            close
         </span>
      </button>
   </div>{{-- avatar modal end --}}
   <div class="profile-info__wrapper">
      <ul class="profile-info">
         <li class="profile-info__item">
            {{__('Сотрудник')}} {{$loggedUser->company->name}}
         </li>
         <li class="profile-info__item">
            <b>{{$userPosition}}/{{$usersCount}}</b>
            @if ($userRating < 30)
               {{__('Ваше место по рейтингу')}} ☹️
            @endif
            @if ($userRating > 30 && $userRating < 60)
               {{__('Ваше место по рейтингу')}} 😐
            @endif
            @if ($userRating > 60 && $userRating < 80)
               {{__('Ваше место по рейтингу')}} 🙂
            @endif
            @if ($userRating > 80)
               {{__('Ваше место по рейтингу')}} 💪
            @endif
         </li>
         <li class="profile-info__item">
            <b>{{$loggedUser->taken_books_count}}</b>
            {{__('Книг прочитано')}}
         </li>
         <li class="profile-info__item">
            <b>{{$loggedUser->read_pages}}</b>
            {{__('Страниц прочитано')}}
         </li>
         <li class="profile-info__item">
            <b>{{$loggedUser->likes_count}}</b>
            {{__('Понравившиеся книги')}}
         </li>
         <li class="profile-info__item">
            <b>{{$loggedUser->blacklist_value}}</b>
            {{__('Нарушений')}}
         </li>
         <li class="profile-info__item">
            <b>{{$loggedUser->presentations_count}}</b>
            {{__('Презентованных книг')}}
         </li>
         <li class="profile-info__item">
            <b>{{$loggedUser->participations_count}}</b>
            {{__('Участие в мероприятиях')}}
         </li>
         <li class="profile-info__item">
            <b>{{$loggedUser->renewed_deadlines}}</b>
            {{__('Продленные дедлайны')}}
         </li>
         <li class="profile-info__item">
            <b>1</b>
            {{__('Забронированные книги')}}
         </li>
      </ul>
   </div>
</div>
   
<form class="form" action="{{route('userinfo.update')}}" method="POST">
   @csrf
   <h2 class="form__title">{{__('Основная информация')}}</h2>
   @if ($errors->all())
      <ul class="form__error-list" data-id="error_list">
         @foreach ($errors->all() as $error)
            <li class="form__error-item">{{ $error }}</li>
         @endforeach
      </ul>
   @endif
   <p class="form__item">
      <label class="form__label" for="surname">{{__('Фамилия')}}<span class="material-icons-outlined form__icon">badge</span></label>
      <input class="form__input" id="surname" type="text" name="surname" value="{{old('surname') ? old('surname') : $loggedUser->surname}}">
      @error('surname')<p class="error-msg">{{$message}}</p>@enderror
   </p>               
   <p class="form__item">
      <label class="form__label" for="name">{{__('Имя')}}<span class="material-icons-outlined form__icon">badge</span></label>
      <input class="form__input" id="name" type="text" name="name" value="{{old('name') ? old('name') : $loggedUser->name}}">
      @error('name')<p class="error-msg">{{$message}}</p>@enderror
   </p>
   <p class="form__item">
      <label class="form__label" for="last-name">{{__('Отчество')}} <span class="material-icons-outlined form__icon">badge</span>  </label>
      <input class="form__input" id="last-name" type="text" name="last_name" value="{{old('last_name') ? old('last_name') : $loggedUser->last_name}}">
      @error('last_name')<p class="error-msg">{{$message}}</p>@enderror
   </p>
   <p class="form__item">
      <label class="form__label" for="login">{{__('Логин')}}<span class="material-icons-outlined form__icon">login</span></label>
      <input class="form__input" id="login" type="text" name="login" value="{{old('login') ? old('login') : $loggedUser->login}}">
      @error('login')<p class="error-msg">{{$message}}</p>@enderror
   </p>
   <p class="form__item">
      <label class="form__label" for="email">{{__('Ваш E-mail')}}<span class="material-icons-outlined form__icon">email</span></label>
      <input class="form__input" id="email" type="text" name="email" value="{{old('email') ? old('email') : $loggedUser->email}}"> 
      @error('email')<p class="error-msg">{{$message}}</p>@enderror
   </p>
   <p class="form__item">
      <label class="form__label" for="phone">{{__('Телефон')}}<span class="material-icons form__icon">phone</span></label>
      <input class="form__input" id="phone" type="text" name="phone_numbers" value="{{old('phone_numbers') ? old('phone_numbers') : $loggedUser->phone_numbers}}">
      @error('phone_numbers')<p class="error-msg">{{$message}}</p>@enderror
   </p>
   <div class="form__btn-wrapper">
      <button class="button" type="submit">{{__('Сохранить изменения')}}</button>
      <button class="button button--red" type="reset">{{__('Отмена')}}</button>
   </div>
</form>{{-- edit information end --}}
   
<form class="form" data-id="password-form">
   @csrf
   <h2 class="form__title form__password-title">{{__('Изменить пароль')}}</h2>
   <p class="form__item">
      <label class="form__label" for="password">{{__('Введите пароль')}}<span class="material-icons form__icon">password</span></label>
      <input class="form__input" id="password" type="password">
      <span class="material-icons form__visibility" data-id="password-icon">visibility</span>
      <p class="error-msg" data-id="password-error"></p>
   </p>
   <p class="form__item">
      <label class="form__label" for="new-password">{{__('Придумайте пароль')}}<span class="material-icons form__icon">lock</span></label>
      <input class="form__input" id="new-password" type="password">
      <span class="material-icons form__visibility" data-id="new-password-icon">visibility</span>
      <p class="error-msg" data-id="new-password-error"></p>
   </p>
   <p class="form__item">
      <label class="form__label" for="confirm-password">{{__('Повторите пароль')}}<span class="material-icons form__icon">enhanced_encryption</span></label>
      <input class="form__input" id="confirm-password" type="password">
      <span class="material-icons form__visibility" data-id="confirm-password-icon">visibility</span>
      <p class="error-msg" data-id="confirm-password-error"></p>
   </p>
   <div class="form__btn-wrapper">
      <button class="button" type="submit" data-id="password-submit-btn">
         {{__('Сохранить изменения')}}
      </button>
      <button class="button button--red" type="reset">
         {{__('Отмена')}}
      </button>
   </div>
</form>{{-- password change end --}}

<div class="modal hidden" data-id="password-success">
   <div class="modal__msg-wrapper">
      <p class="modal__msg">
         {{__('Ваш пароль успешно изменен')}}!
      </p>
   </div>
   <div class="modal__btn-wrapper">
      <button class="button" data-id="password__ok-btn" type="button">{{__('OK')}}</button>
   </div>
   <button class="modal__close-btn" type="button" aria-label="{{__('Закрыть')}}">
      <span class="material-icons modal__close-icon" data-id="password__close-btn">close</span>
   </button>
</div>{{-- password modal end --}}