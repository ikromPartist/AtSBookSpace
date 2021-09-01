<h1 class="title p-content__title">Профиль</h1>

<div class="profile__top-wrapper">
   <form class="avatar-form" data-id="avatar-form" action="{{route('avatar.update')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <img class="avatar-form__img" src="{{asset('img/users/' . $loggedUser->avatar)}}" alt="{{$loggedUser->name}}">
      <div class="avatar-form__item">
         <label class="button" for="avatar">Изменить фото профиля</label>
         <input class="avatar-form__input visually-hidden" id="avatar" type="file" name="avatar" accept="image/*">
         <p class="avatar-form__role">
         @if ($loggedUser->role == 'admin')
            Админ
         @else
            Пользователь
         @endif
      </p>
      </div> 
   </form>
   <div class="modal hidden" data-id="avatar-modal">
      <div class="modal__msg-wrapper">
         <p class="modal__msg">Вы уверены что хотите именить фото профиля?</p>
      </div>
      <div class="modal__btn-wrapper">
         <button class="button" type="submit">Изменить</button>
         <button class="button button--red" data-id="avatar__cancel-btn" type="button">Отмена</button>
      </div>
      <button class="modal__close-btn" type="button">
         <span class="material-icons modal__close-icon" data-id="avatar__close-btn">close</span>
      </button>
   </div>{{-- avatar modal end --}}
   <div class="profile-info__wrapper">
      <ul class="profile-info">
         <li class="profile-info__item">
            Сотрудник {{$loggedUser->company->name}}
         </li>
         <li class="profile-info__item">
            <b>{{$userPosition}}/{{$usersCount}}</b>
            @if ($userRating < 30)
               Ваше место по рейтингу ☹️
            @endif
            @if ($userRating > 30 && $userRating < 60)
               Ваше место по рейтингу 😐
            @endif
            @if ($userRating > 60 && $userRating < 80)
               Ваше место по рейтингу 🙂
            @endif
            @if ($userRating > 80)
               Ваше место по рейтингу 💪
            @endif
         </li>
         <li class="profile-info__item">
            <b>{{$loggedUser->taken_books_count}}</b> Книг прочитано
         </li>
         <li class="profile-info__item">
            <b>{{$loggedUser->read_pages}}</b> Страниц прочитано
         </li>
         <li class="profile-info__item">
            <b>{{$loggedUser->likes_count}}</b> Понравившиеся книги
         </li>
         <li class="profile-info__item">
            <b>{{$loggedUser->blacklist_value}}</b> Нарушений
         </li>
         <li class="profile-info__item">
            <b>{{$loggedUser->presentations_count}}</b> Презентованных книг
         </li>
         <li class="profile-info__item">
            <b>{{$loggedUser->participations_count}}</b> Участие в мероприятиях
         </li>
         <li class="profile-info__item">
            <b>{{$loggedUser->renewed_deadlines}}</b> Продленные дедлайны
         </li>
         <li class="profile-info__item">
            <b>{{$loggedUser->booked_books->count()}}</b> Забронированные книги
         </li>
      </ul>
   </div>
</div>
<form class="form" action="{{route('userinfo.update')}}" method="POST">
   @csrf
   <h2 class="form__title">Основная информация</h2>
   @if ($errors->all())
      <ul class="form__error-list" data-id="error_list">
         @foreach ($errors->all() as $error)
         <li class="form__error-item">{{$error}}</li>
         @endforeach
      </ul>
   @endif
   <p class="form__item">
      <label class="form__label" for="surname">Фамилия<span class="material-icons form__icon">badge</span></label>
      <input class="form__input" id="surname" type="text" name="surname" value="{{old('surname') ? old('surname') : $loggedUser->surname}}">
      @error('surname')<p class="error-msg">{{$message}}</p>@enderror
   </p>               
   <p class="form__item">
      <label class="form__label" for="name">Имя<span class="material-icons form__icon">badge</span></label>
      <input class="form__input" id="name" type="text" name="name" value="{{old('name') ? old('name') : $loggedUser->name}}">
      @error('name')<p class="error-msg">{{$message}}</p>@enderror
   </p>
   <p class="form__item">
      <label class="form__label" for="last-name">Отчество<span class="material-icons form__icon">badge</span>  </label>
      <input class="form__input" id="last-name" type="text" name="last_name" value="{{old('last_name') ? old('last_name') : $loggedUser->last_name}}">
      @error('last_name')<p class="error-msg">{{$message}}</p>@enderror
   </p>
   <p class="form__item">
      <label class="form__label" for="login">Логин<span class="material-icons form__icon">login</span></label>
      <input class="form__input" id="login" type="text" name="login" value="{{old('login') ? old('login') : $loggedUser->login}}">
      @error('login')<p class="error-msg">{{$message}}</p>@enderror
   </p>
   <p class="form__item">
      <label class="form__label" for="email">Ваш E-mail<span class="material-icons form__icon">email</span></label>
      <input class="form__input" id="email" type="text" name="email" value="{{old('email') ? old('email') : $loggedUser->email}}"> 
      @error('email')<p class="error-msg">{{$message}}</p>@enderror
   </p>
   <p class="form__item">
      <label class="form__label" for="phone">Телефон<span class="material-icons form__icon">phone</span></label>
      <input class="form__input" id="phone" type="text" name="phone_numbers" value="{{old('phone_numbers') ? old('phone_numbers') : $loggedUser->phone_numbers}}">
      @error('phone_numbers')<p class="error-msg">{{$message}}</p>@enderror
   </p>
   <div class="form__btn-wrapper">
      <button class="button" type="submit">Сохранить изменения</button>
      <button class="button button--red" type="reset">Отмена</button>
   </div>
</form>{{-- edit information end --}}
   
<form class="form" data-id="password-form">
   @csrf
   <h2 class="form__title form__password-title">Изменить пароль</h2>
   <p class="form__item">
      <label class="form__label" for="password">Введите пароль<span class="material-icons form__icon">password</span></label>
      <input class="form__input" id="password" type="password">
      <span class="material-icons form__visibility" data-id="password-icon">visibility</span>
      <p class="error-message" data-id="password-error"></p>
   </p>
   <p class="form__item">
      <label class="form__label" for="new-password">Придумайте пароль<span class="material-icons form__icon">lock</span></label>
      <input class="form__input" id="new-password" type="password">
      <span class="material-icons form__visibility" data-id="new-password-icon">visibility</span>
      <p class="error-message" data-id="new-password-error"></p>
   </p>
   <p class="form__item">
      <label class="form__label" for="confirm-password">Повторите пароль<span class="material-icons form__icon">enhanced_encryption</span></label>
      <input class="form__input" id="confirm-password" type="password">
      <span class="material-icons form__visibility" data-id="confirm-password-icon">visibility</span>
      <p class="error-message" data-id="confirm-password-error"></p>
   </p>
   <div class="form__btn-wrapper">
      <button class="button" type="submit" data-id="password-submit-btn">Сохранить изменения</button>
      <button class="button button--red" type="reset">Отмена</button>
   </div>
</form>{{-- password change end --}}

<section class="modal modal--success hidden" data-id="password-success">
   <div class="modal__container">
      <p class="modal__text">Ваш пароль успешно изменен!</p>
      <div class="modal__btn-wrapper">
         <button class="button" data-id="password__ok-btn" type="button">OK</button>
      </div>
      <button class="modal__close-btn" type="button">
         <span class="material-icons modal__close-icon" data-id="password__close-btn">close</span>
      </button>
   </div>
</section>