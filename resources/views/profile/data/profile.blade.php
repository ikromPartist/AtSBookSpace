   
   <h1 class="title profile-content__title">
      {{__('Профиль')}}
   </h1>

   <form class="avatar-form" data-id="avatar-form" action="{{route('avatar.update')}}" method="POST" enctype="multipart/form-data">
   
      @csrf

         <img class="avatar-form__img" src="{{asset('img/users/' . $loggedUser->avatar)}}" alt="{{$loggedUser->name}}">

         <p class="avatar-form__item">
            <label class="button avatar-form__label" for="avatar">
               {{__('Изменить фото профиля')}}
            </label>
            <input class="avatar-form__input visually-hidden" id="avatar" type="file" name="avatar" accept="image/*">
         </p>
         <div class="user-rating__wrapper">
            <p class="user-rating__text company">
               {{$loggedUser->company->name}}
            </p>
            <p class="user-rating__text">
               {{__('Место по рейтингу')}}:
               {{$userPosition}}/{{$usersCount}} 
               @if ($userRating < 30)
                  <span>☹️</span>
               @endif
               @if ($userRating > 30 && $userRating < 60)
                  <span>😐</span>
               @endif
               @if ($userRating > 60 && $userRating < 80)
                  <span>🙂</span>
               @endif
               @if ($userRating > 80)
                  <span>💪</span>
               @endif
            </p>
            <p class="user-rating__text">
               {{__('Книг прочитано')}}:
               {{$loggedUser->taken_books_count}}
            </p>
            <p class="user-rating__text">
               {{__('Страниц прочитано')}}:
               {{$loggedUser->read_pages}}
            </p>
            <p class="user-rating__text">
               {{__('Нарушений')}}:
               {{$loggedUser->blacklist_value}}
            </p>
         </div>
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
         </div>{{-- confirm modal end --}}

   </form>{{-- avatar end --}}
   
   <form class="edit-form" action="{{route('userinfo.update')}}" method="POST">
      
      @csrf

         <h2 class="form__title">
            {{__('Основная информация')}}
         </h2>

         <ul class="form__error-msg">

            @foreach ($errors->all() as $error)
               
               <li class="form__error-item">{{ $error }}</li>
            
            @endforeach

         </ul>

         <p class="form__item">
            <label class="form__label" for="surname">
               {{__('Фамилия')}}
               <span class="material-icons-outlined form__icon">
                  badge
               </span>
            </label>
            <input class="form__input" id="surname" type="text" name="surname" value="{{old('surname') ? old('surname') : $loggedUser->surname}}">
         </p>               
         <p class="form__item">
            <label class="form__label" for="name">
               {{__('Имя')}}
               <span class="material-icons-outlined form__icon">
                  badge
               </span>
            </label>
            <input class="form__input" id="name" type="text" name="name" value="{{old('name') ? old('name') : $loggedUser->name}}">
         </p>
         <p class="form__item">
            <label class="form__label" for="last-name">
               {{__('Отчество')}} 
               <span class="material-icons-outlined form__icon">
                  badge
               </span>  
            </label>
            <input class="form__input" id="last-name" type="text" name="last_name" value="{{old('last_name') ? old('last_name') : $loggedUser->last_name}}">
         </p>
         <p class="form__item">
            <label class="form__label" for="role">
               {{__('Роль')}}
               <span class="material-icons form__icon">
                  manage_accounts
               </span>
            </label>
            <input class="form__input" id="role" type="text" name="role" value="{{$loggedUser->role == 'user' ? 'Пользователь' : 'Админ'}}" readonly>
         </p>
         <p class="form__item">
            <label class="form__label" for="login">
               {{__('Логин')}}
               <span class="material-icons-outlined form__icon">
                  login
               </span>
            </label>
            <input class="form__input" id="login" type="text" name="login" value="{{old('login') ? old('login') : $loggedUser->login}}">
         </p>
         <p class="form__item">
            <label class="form__label" for="email">
               {{__('Ваш E-mail')}}
               <span class="material-icons-outlined form__icon">
                  email
               </span>
            </label>
            <input class="form__input" id="email" type="text" name="email" value="{{old('email') ? old('email') : $loggedUser->email}}"> 
         </p>
         <p class="form__item">
            <label class="form__label" for="phone">
               {{__('Телефон')}}
               <span class="material-icons form__icon">
                  phone
               </span>
            </label>
            <input class="form__input" id="phone" type="text" name="phone_numbers" value="{{old('phone_numbers') ? old('phone_numbers') : $loggedUser->phone_numbers}}">
         </p>
         <div class="form__btn-wrapper">
            <button class="button" type="submit">
               {{__('Сохранить')}}
            </button>
            <button class="button button--red" type="reset">
               {{__('Отмена')}}
            </button>
         </div>

   </form>{{-- edit information end --}}
   
   <form class="password-form" data-id="password-form">
      
      @csrf
      
         <h2 class="form__title">
            {{__('Изменить пароль')}}
         </h2>

         <p class="form__item">
            <label class="form__label" for="password">
               {{__('Введите пароль')}}
               <span class="material-icons form__icon">
                  password
               </span>
            </label>
            <input class="form__input" id="password" type="password">
            <span class="material-icons form__eye-icon" data-id="password-icon">visibility</span>
            <p class="error-msg" data-id="password-error"></p>
         </p>
         <p class="form__item">
            <label class="form__label" for="new-password">
               {{__('Придумайте пароль')}}
               <span class="material-icons form__icon">
                  lock
               </span>
            </label>
            <input class="form__input" id="new-password" type="password">
            <span class="material-icons form__eye-icon" data-id="new-password-icon">visibility</span>
            <p class="error-msg" data-id="new-password-error"></p>
         </p>
         <p class="form__item">
            <label class="form__label" for="confirm-password">
               {{__('Повторите пароль')}}
               <span class="material-icons form__icon">
                  enhanced_encryption
               </span>
            </label>
            <input class="form__input" id="confirm-password" type="password">
            <span class="material-icons form__eye-icon" data-id="confirm-password-icon">visibility</span>
            <p class="error-msg" data-id="confirm-password-error"></p>
         </p>

         <div class="form__btn-wrapper">
            <button class="button" type="submit" data-id="password-submit-btn">
               {{__('Сохранить')}}
            </button>
            <button class="button button--red" type="reset">
               {{__('Отмена')}}
            </button>
         </div>

         <div class="modal hidden" data-id="password-success">
            <div class="modal__msg-wrapper">
               <p class="modal__msg">
                  {{__('Ваш пароль успешно изменен')}}!
               </p>
            </div>
            <div class="modal__btn-wrapper">
               <button class="button" data-id="password__ok-btn" type="button">
                  {{__('OK')}}
               </button>
            </div>
            <button class="modal__close-btn" type="button" aria-label="{{__('Закрыть')}}">
               <span class="material-icons modal__close-icon" data-id="password__close-btn">
                  close
               </span>
            </button>
         </div>

   </form>{{-- password change end --}}