<h1 class="title p-content__title">{{__('Презентация книг')}}</h1>
<form class="form" data-id="presentation_form" method="POST" enctype="multipart/form-data">
   @csrf
   <div class="form__item">
      <label class="form__label">{{__('Название книги')}}<span class="material-icons-outlined form__icon">title</span></label>
      <div class="select2_single_container">
         <select class="form__select" data-type="field" name="book">
            <option>Не выбрано</option>
            <?php $oldDep = old('book'); ?>
            @foreach($books as $book)
            <option value="{{$book->id }}" {{$oldDep == $book->id ? 'selected' : ''}}>{{$book->title}} ({{$book->code}})</option>   
            @endforeach
         </select>
         <span class="error-msg">{{__('Это поле обязательно для заполнения')}}</span>
      </div>
   </div>               
   <p class="form__item">
      <label class="form__label" for="author">{{__('Автор')}}<span class="material-icons-outlined form__icon">badge</span></label>
      <input class="form__input" id="author" data-type="field" type="text" name="author" value="{{old('author')}}" placeholder="{{__('Михаил Булгаков')}}">
      <span class="error-msg">{{__('Это поле обязательно для заполнения')}}</span>
   </p>
   <div class="form__item">
      <label class="form__label">{{__('Дата и время презентации')}}<span class="material-icons form__icon">schedule</span></label>
      <div id="picker"></div>
      <input class="form__input" id="result" data-type="field" type="text" name="datetime" value="{{old('datetime')}}" placeholder="{{date('Y-m-d H:m')}}">
      <span class="error-msg">{{__('Это поле обязательно для заполнения')}}</span>
   </div>
   <p class="form__item">
      <label class="form__label" for="audience">{{__('Предпочитаемая аудитория')}}<span class="material-icons-outlined form__icon">apartment</span></label>
      <input class="form__input" id="audience" data-type="field" type="text" name="audience" value="{{old('audience')}}" placeholder="{{'AtS Book Space'}}">
      <span class="error-msg">{{__('Это поле обязательно для заполнения')}}</span>
   </p> 
   <p class="form__item">
      <label class="form__label" for="participants">{{__('Желаемое количество участников')}}<span class="material-icons-outlined form__icon">people</span></label>
      <input class="form__input" id="participants" data-type="field" type="number" name="participants" value="{{old('participants')}}" placeholder="{{'40'}}">
      <span class="error-msg">{{__('Это поле обязательно для заполнения')}}</span>
   </p>
   <p class="form__item"> 
      <label class="form__label" for="description">{{__('Послание спикера слушателям - отзыв о книге')}}<span class="material-icons-outlined form__icon">message</span></label>
      <textarea class="form__textarea" id="description" data-type="field" type="text" name="description" value="{{old('description')}}" placeholder="{{'Сообщение'}}"></textarea>
      <span class="error-msg">{{__('Это поле обязательно для заполнения')}}</span>
   </p>
   <div class="form__item">
      <label class="form__label form__label--file" for="presentation">
         {{__('Прикрепить презентацию')}} 
         <span class="material-icons-outlined form__icon">insert_drive_file</span>
      </label>
      <input class="form__input form__input--file" id="presentation" data-type="field" type="file" name="presentation">
      <span class="error-msg">{{__('Это поле обязательно для заполнения')}}</span>
      <input class="form__input form__file-view" data-id="presentation" placeholder="Выберите файл">
   </div>
   <div class="form__btn-wrapper">
      <button class="button" data-id="submit_btn" type="submit">{{__('Отправить')}}</button>
      <button class="button button--red" type="reset">{{__('Отмена')}}</button>
   </div>
</form>{{-- presentation end --}}

<div class="modal hidden" data-id="presentation__success-modal">
   <div class="modal__msg-wrapper">
      <p class="modal__msg">
         {{__('Ваш запрос на проведение презентации успешно отправлен')}}.
      </p>
   </div>
   <div class="modal__btn-wrapper">
      <button class="button" data-id="presentation-success__ok-btn" type="button">{{__('OK')}}</button>
   </div>
   <button class="modal__close-btn" type="button" aria-label="{{__('Закрыть')}}">
      <span class="material-icons modal__close-icon" data-id="presentation-success__close-btn">close</span>
   </button>
</div>{{-- presentation success modal end --}}

<div class="modal hidden" data-id="presentation__fail-modal">
   <div class="modal__msg-wrapper">
      <p class="modal__msg modal__msg--red">
         {{'Что-то пошло не так, попробуйте позже'}}.
      </p>
   </div>
   <div class="modal__btn-wrapper">
      <button class="button" data-id="presentation-fail__ok-btn" type="button">{{__('OK')}}</button>
   </div>
   <button class="modal__close-btn" type="button" aria-label="{{__('Закрыть')}}">
      <span class="material-icons modal__close-icon" data-id="presentation-fail__close-btn">close</span>
   </button>
</div>{{-- presentation fail modal end --}}