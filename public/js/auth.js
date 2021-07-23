'use strict'
// visibility button start
const passwordInputEl = document.querySelector('#login-password');
const visibilityBtnEl = document.querySelector('.visibility-button');
const visibilityIconEl = visibilityBtnEl.querySelector('.visibility-button__icon');
visibilityBtnEl.onclick = (e) => {
   e.preventDefault();
   if (visibilityIconEl.textContent === 'visibility') {
      visibilityIconEl.textContent = 'visibility_off';
      passwordInputEl.setAttribute('type', 'text');
   } else {
      visibilityIconEl.textContent = 'visibility';
      passwordInputEl.setAttribute('type', 'password');
   }
}
// visibility button end
