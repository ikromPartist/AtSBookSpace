//! Navigation start
let request = {
   page: 1,
   type: 'profile',
};

function fetch_data(page, type) {
   $.ajax({
      url: "/profile/fetch_data?page=" + page + "&type=" + type,

      success: function (response) {
         profileContentEl.innerHTML = response;
         window.scroll(0, 310);
      }
   })
}

const sidebarEl = document.querySelector('[data-id="profile-sidebar"]');
const profileContentEl = document.querySelector('[data-id="profile-content"]');
if (sidebarEl) {
   const linkEls = sidebarEl.querySelectorAll('[data-type="link"]');
   sidebarEl.addEventListener('click', e => {
      if (e.target.dataset.id == 'profile') {
         e.preventDefault();
         // Remove active
         linkEls.forEach(linkEl => {
            if (linkEl.classList.contains('active')) {
               linkEl.classList.remove('active');
               return;
            }
         });
         // Add active
         e.target.classList.add('active');
         // Send ajax
         const type = e.target.dataset.id;
         request.type = type;
         const page = request.page;
         fetch_data(page, type);
      }
      else if (e.target.dataset.id == 'members') {
         e.preventDefault();
         // Remove active
         linkEls.forEach(linkEl => {
            if (linkEl.classList.contains('active')) {
               linkEl.classList.remove('active');
               return;
            }
         });
         // Add active
         e.target.classList.add('active');
         // Send ajax
         const type = e.target.dataset.id;
         request.type = type;
         const page = request.page;
         fetch_data(page, type);
      }
      else if (e.target.dataset.id == 'read_books') {
         e.preventDefault();
         // Remove active
         linkEls.forEach(linkEl => {
            if (linkEl.classList.contains('active')) {
               linkEl.classList.remove('active');
               return;
            }
         });
         // Add active
         e.target.classList.add('active');
         // Send ajax
         const type = e.target.dataset.id;
         request.type = type;
         const page = request.page;
         fetch_data(page, type);
      }
      else if (e.target.dataset.id == 'activities') {
         e.preventDefault();
         // Remove active
         linkEls.forEach(linkEl => {
            if (linkEl.classList.contains('active')) {
               linkEl.classList.remove('active');
               return;
            }
         });
         // Add active
         e.target.classList.add('active');
         // Send ajax
         const type = e.target.dataset.id;
         request.type = type;
         const page = request.page;
         fetch_data(page, type);
      }
      else if (e.target.dataset.id == 'presentation') {
         e.preventDefault();
         // Remove active
         linkEls.forEach(linkEl => {
            if (linkEl.classList.contains('active')) {
               linkEl.classList.remove('active');
               return;
            }
         });
         // Add active
         e.target.classList.add('active');
         // Send ajax
         const type = e.target.dataset.id;
         request.type = type;
         const page = request.page;
         fetch_data(page, type);
      }
      else if (e.target.dataset.id == 'booked_books') {
         e.preventDefault();
         // Remove active
         linkEls.forEach(linkEl => {
            if (linkEl.classList.contains('active')) {
               linkEl.classList.remove('active');
               return;
            }
         });
         // Add active
         e.target.classList.add('active');
         // Send ajax
         const type = e.target.dataset.id;
         request.type = type;
         const page = request.page;
         fetch_data(page, type);
      }
      else if (e.target.dataset.id == 'liked_books') {
         e.preventDefault();
         // Remove active
         linkEls.forEach(linkEl => {
            if (linkEl.classList.contains('active')) {
               linkEl.classList.remove('active');
               return;
            }
         });
         // Add active
         e.target.classList.add('active');
         // Send ajax
         const type = e.target.dataset.id;
         request.type = type;
         const page = request.page;
         fetch_data(page, type);
      }
      else if (e.target.dataset.id == 'settings') {
         e.preventDefault();
         // Remove active
         linkEls.forEach(linkEl => {
            if (linkEl.classList.contains('active')) {
               linkEl.classList.remove('active');
               return;
            }
         });
         // Add active
         e.target.classList.add('active');
         // Send ajax
         const type = e.target.dataset.id;
         request.type = type;
         const page = request.page;
         fetch_data(page, type);
      }
   });
   profileContentEl.addEventListener('click', e => {
      if (e.target.className == 'page-link') {
         e.preventDefault();
         const page = e.target.href.split('page=')[1];
         request.page = page;
         const type = request.type;
         fetch_data(page, type);
      }
   });
}
//! Navigation end
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
