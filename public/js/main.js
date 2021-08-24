//! Ajax request setup start
$.ajaxSetup({
   headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});
//! Ajax request setup end
//! Scroll top btn start
const scrollTopBtnEl = document.querySelector('[data-id="scroll-top-btn"]');
window.addEventListener('scroll', () => {
   if (window.pageYOffset > 200) {
      scrollTopBtnEl.classList.add('active');
   } else {
      scrollTopBtnEl.classList.remove('active');
      scrollTopBtnEl.classList.remove('click');
   }
})
scrollTopBtnEl.addEventListener('click', () => {
   scrollTopBtnEl.classList.add('click');
   window.scrollTo({ top: 0, behavior: 'smooth' });
})
//! Scroll top btn end
//! Header start
//* Catalog start
const catalogBtnEl = document.querySelector('.catalog__button');
const catalogListEl = document.querySelector('.catalog__list');
const catalogIconEl = catalogBtnEl.querySelector('.catalog__dropdown-icon');
catalogBtnEl.onclick = (e) => {
   e.preventDefault();
  
   catalogListEl.classList.toggle('hidden');
   
   if (catalogIconEl.textContent == 'arrow_drop_down') {
      catalogIconEl.textContent = 'arrow_drop_up';
   } else {
      catalogIconEl.textContent = 'arrow_drop_down';
   }
}
//* Catalog end
//* Search start
const searchFormEl = document.querySelector('.search');
const searchBtnEl = searchFormEl.querySelector('.search__button');
const searchInputEl = searchFormEl.querySelector('.search__input');
searchBtnEl.addEventListener('click', (e) => {
   searchFormEl.classList.remove('hidden');
   if (searchBtnEl.type == 'button') {
      e.preventDefault();
      searchBtnEl.type = 'submit';
      searchInputEl.focus();
   } 
})
//* Search end
//* Countdown time start 
const timesLeftEl = document.querySelector('[data-id="times-left"]');
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
if (timesLeftEl) {
   
   countdown();
   
   const confirmModalEl = document.querySelector('[data-id="confirm-modal"]')
   const successModalEl = document.querySelector('[data-id="success-modal"]');
   const failModalEl = document.querySelector('[data-id="fail-modal"]');

   timesLeftEl.addEventListener('click', (e) => {
      e.preventDefault();
      confirmModalEl.classList.remove('hidden');
   });

   confirmModalEl.addEventListener('click', e => {
      if (e.target.dataset.id == 'confirm-modal__confirm-btn') {
         const book = document.querySelector('[data-id="book"]').value;
         confirmModalEl.classList.add('hidden');
         $.ajax({
            url: "/books/extend_deadline?book=" + book,

            success: function (response) {
               if (response == true) {
                  failModalEl.classList.remove('hidden');
               } else {
                  successModalEl.classList.remove('hidden');
               }
            }
         })
      } 
      else if (e.target.dataset.id == 'confirm-modal__cancel-btn' || e.target.dataset.id == 'confirm-modal__close-btn') {
         confirmModalEl.classList.add('hidden');
      } 
   });

   successModalEl.addEventListener('click', (e) => {
      if (e.target.dataset.id == 'success-modal__ok-btn' || e.target.dataset.id == 'success-modal__close-btn') {
         location.reload();
      }
   });

   failModalEl.addEventListener('click', (e) => {
      if (e.target.dataset.id == 'fail-modal__ok-btn' || e.target.dataset.id == 'fail-modal__close-btn') {
         failModalEl.classList.add('hidden');
      }
   });

}
//* Countdown time end 
//! Header end
//! Global scripts start
//* Booking start
const bookingLinkEls = document.querySelectorAll('[data-type="booking"]');
const successModalEl = document.querySelector('[data-id="booking-success"]');
const failModalEl = document.querySelector('[data-id="booking-fail"]');
if (bookingLinkEls) {
   document.querySelector('body').addEventListener('click', e => {
      if (e.target.dataset.type == 'booking') {
         e.preventDefault();
         const book = e.target.dataset.book;
         $.ajax({
            url: "/books/booking?book=" + book,
      
            success: function (response) {
               if (response == 'failed') {
                  failModalEl.classList.remove('hidden');
               } else {
                  document.querySelector(`[data-book-status="${book}"]`).innerHTML = `
                     <p class="books-card__status books-card__status--unavailable">
                        Занято примерно до: ${response}
                     </p>
                  `;
                  successModalEl.classList.remove('hidden');
               }
            }
         })
      } else if (e.target.dataset.id == 'booking-success__ok-btn' || e.target.dataset.id == 'booking-success__close-btn') {
         successModalEl.classList.add('hidden');   
      } else if (e.target.dataset.id == 'booking-fail__ok-btn' || e.target.dataset.id == 'booking-fail__close-btn') {
         failModalEl.classList.add('hidden');
      }
   });
   bookingLinkEls.forEach(link => {
      link.addEventListener('mouseover', e => {
         e.target.textContent = `Ваше количество в очереди: ${e.target.dataset.queue}`;
      });
      link.addEventListener('mouseleave', e => {
         e.target.textContent = 'Забронировать';
      });
   });
}
//* Booking end
//! Global scripts end


