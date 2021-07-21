const scrollTopBtn = document.querySelector('.scroll-top-button');
window.addEventListener('scroll', () => {
   if (window.pageYOffset > 200) {
      scrollTopBtn.classList.add('active');
   } else {
      scrollTopBtn.classList.remove('active');
      scrollTopBtn.classList.remove('click');
   }
})
scrollTopBtn.addEventListener('click', () => {
   scrollTopBtn.classList.add('click');
   window.scrollTo({ top: 0, behavior: 'smooth' });
})
//! header start
//* catalog 
const catalogBtn = document.querySelector('.catalog__button');
const catalogList = document.querySelector('.catalog__list');
const catalogIcon = catalogBtn.querySelector('.catalog__dropdown-icon');
catalogBtn.onclick = (evt) => {
   evt.preventDefault();
  
   catalogList.classList.toggle('hidden');
   
   if (catalogIcon.textContent == 'arrow_drop_down') {
      catalogIcon.textContent = 'arrow_drop_up';
   } else {
      catalogIcon.textContent = 'arrow_drop_down';
   }
}
//* search
const searchForm = document.querySelector('.search');
const searchBtn = searchForm.querySelector('.search__button');
const searchInput = searchForm.querySelector('.search__input');
searchBtn.addEventListener('click', (evt) => {
   searchForm.classList.remove('hidden');
   if (searchBtn.type == 'button') {
      evt.preventDefault();
      searchBtn.type = 'submit';
      searchInput.focus();
   } 
})
//* countdown time
const timesLeftEl = document.querySelector('[data-id="times-left"]');
if (timesLeftEl) {
   countdown();
}
function countdown() {
   const year = document.querySelector('[data-id="year"]').value;
   const month = (+document.querySelector('[data-id="month"]').value - 1);
   const day = document.querySelector('[data-id="day"]').value;
   const daysEl = timesLeftEl.querySelector('[data-id="days"]');
   const hoursEl = timesLeftEl.querySelector('[data-id="hours"]');
   const minutesEl = timesLeftEl.querySelector('[data-id="minutes"]');
   const secondsEl = timesLeftEl.querySelector('[data-id="seconds"]');

   const now = new Date();
   const eventDate = new Date(year, month, day);

   const currentTime = now.getTime();
   const eventTime = eventDate.getTime();

   const remTime = eventTime - currentTime;

   if (remTime < 0) {
      timesLeftEl.classList.toggle('award');
      daysEl.textContent = '00';
      hoursEl.textContent = '00';
      minutesEl.textContent = '00'
      secondsEl.textContent = '00';
      setTimeout(countdown, 200);
   } else {
      let sec = Math.floor(remTime / 1000);
      let min = Math.floor(sec / 60);
      let hour = Math.floor(min / 60);
      let day = Math.floor(hour / 24);
   
      hour %= 24;
      min %= 60;
      sec %= 60;
   
      hour = (hour < 10) ? "0" + hour : hour;
      min = (min < 10) ? "0" + min : min;
      sec = (sec < 10) ? "0" + sec : sec;
   
      daysEl.textContent = day;
      hoursEl.textContent = hour;
      minutesEl.textContent = min;
      secondsEl.textContent = sec;

      setTimeout(countdown, 1000);
   }

}
//! header end
//! global scripts start
const ratingIconEls = document.querySelectorAll('[data-id="rating-icon"]');
if (ratingIconEls) {
   ratingIconEls.forEach(icon => {
      if (icon.classList.contains('filled')) {
         icon.textContent = 'star';
      }
   });
}
//! global scripts end