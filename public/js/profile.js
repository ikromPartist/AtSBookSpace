//! Avatar change form start
const avatarFormEl = document.querySelector('[data-id="avatar-form"]');
if (avatarFormEl) {
   const avatarInputEl = avatarFormEl.querySelector('#avatar');
   const avatarModalEl = avatarFormEl.querySelector('[data-id="avatar-modal"]');

   avatarInputEl.onchange = () => {
      avatarModalEl.classList.remove('hidden');
   }

   avatarModalEl.addEventListener('click', e => {
      if (e.target.dataset.id == 'avatar__cancel-btn' || e.target.dataset.id == 'avatar__close-btn') {
         avatarInputEl.value = '';
         avatarModalEl.classList.add('hidden');
      }
   });
}
//! Avatar change form end
//! Password form start
const passwordFormEl = document.querySelector('[data-id="password-form"]');
if (passwordFormEl) {
   const passwordEl = passwordFormEl.querySelector('#password');
   const newPasswordEl = passwordFormEl.querySelector('#new-password');
   const confirmPasswordEl = passwordFormEl.querySelector('#confirm-password');
   const passwordSuccessEl = passwordFormEl.querySelector('[data-id="password-success"]');
   passwordFormEl.addEventListener('click', e => {
      if (e.target.dataset.id == 'password-icon') {
         if (e.target.textContent == 'visibility') {
            e.target.textContent = 'visibility_off';
            passwordEl.type = 'text';
         } else {
            e.target.textContent = 'visibility';
            passwordEl.type = 'password';
         }
      }
      else if (e.target.dataset.id == 'new-password-icon') {
         if (e.target.textContent == 'visibility') {
            e.target.textContent = 'visibility_off';
            newPasswordEl.type = 'text';
         } else {
            e.target.textContent = 'visibility';
            newPasswordEl.type = 'password';
         }
      }
      else if (e.target.dataset.id == 'confirm-password-icon') {
         if (e.target.textContent == 'visibility') {
            e.target.textContent = 'visibility_off';
            confirmPasswordEl.type = 'text';
         } else {
            e.target.textContent = 'visibility';
            confirmPasswordEl.type = 'password';
         }
      }
      else if (e.target.dataset.id == 'password-submit-btn') {
         e.preventDefault();

         const password = passwordEl.value;
         const passwordError = passwordFormEl.querySelector('[data-id="password-error"]');
         const newPassword = newPasswordEl.value;
         const newPasswordError = passwordFormEl.querySelector('[data-id="new-password-error"]');
         const confirmPassword = confirmPasswordEl.value;
         const confirmPasswordError = passwordFormEl.querySelector('[data-id="confirm-password-error"]');
         // Validation
         if (password.length < 4) {
            passwordError.textContent = 'Поле пароль должен быть не меньше 4 символов.';
            return;
         } else {
            passwordError.textContent = '';
         }
         if (newPassword.length < 4) {
            newPasswordError.textContent = 'Поле пароль должен быть не меньше 4 символов.';
            return;
         } else {
            newPasswordError.textContent = '';
         }
         if (confirmPassword.length < 4) {
            confirmPasswordError.textContent = 'Поле пароль должен быть не меньше 4 символов.';
            return;
         } else {
            confirmPasswordError.textContent = '';
         }
         //Send ajax request
         $.ajax({
            url: "/profile/update_password?password=" + password + "&newpassword=" + newPassword + "&confirmpassword=" + confirmPassword,

            success: function (response) {
               if (response == 'passwordNotMatched') {
                  passwordError.textContent = 'Неправильный пароль попробуйте ещё.';
               }
               else if (response == 'newPasswordDoesntMatch') {
                  newPasswordError.textContent = 'Пароли не совпадают.';
                  confirmPasswordError.textContent = 'Пароли не совпадают.';
               }
               else if (response == 'success') {
                  passwordSuccessEl.classList.remove('hidden');
               }
            }
         })
      }
      else if (e.target.dataset.id == 'password__ok-btn' || e.target.dataset.id == 'password__close-btn') {
         passwordFormEl.reset();
         passwordSuccessEl.classList.add('hidden');
      }
   });
}
//! Password form end
