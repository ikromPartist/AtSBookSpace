//! Ajax request setup 
$.ajaxSetup({
   headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});
//! Scroll window to top (button event)
const scrollTopBtnEl = document.querySelector('#scroll-top-btn');
// Show button when window is scrolled down
window.addEventListener('scroll', () => {
   if (window.pageYOffset > 200) {
      scrollTopBtnEl.classList.add('active');
   } else {
      scrollTopBtnEl.classList.remove('active');
      scrollTopBtnEl.classList.remove('click');
   }
})
// Scroll to top when button is clicked
scrollTopBtnEl.addEventListener('click', () => {
   scrollTopBtnEl.classList.add('click');
   window.scrollTo({ top: 0, behavior: 'smooth' });
})
//! Catalog dropdown
const catalogBtnEl = document.querySelector('#catalog-btn');
const catalogListEl = document.querySelector('#catalog-list');
const catalogIconEl = catalogBtnEl.querySelector('#catalog-icon');
catalogBtnEl.onclick = e => {
   e.preventDefault();
   catalogListEl.classList.toggle('hidden');
   if (catalogIconEl.textContent == 'arrow_drop_down') {
      catalogIconEl.textContent = 'arrow_drop_up';
   } else {
      catalogIconEl.textContent = 'arrow_drop_down';
   }
}
//! Search form events
const searchFormEl = document.querySelector('#search');
const showHideSearchEl = document.querySelector('#show-hide-search-btn');
showHideSearchEl.addEventListener('click', e => {
   e.preventDefault();
   if (e.target.id == 'show-hide-icon') {
      searchFormEl.classList.toggle('hidden');
      showHideSearchEl.classList.toggle('close');
      if (e.target.textContent == 'search') {
         e.target.textContent = 'close';
      } else {
         e.target.textContent = 'search';
      }
   }
});
//! Countdown time  
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
      } else if (e.target.dataset.id == 'confirm-modal__cancel-btn' || e.target.dataset.id == 'confirm-modal__close-btn') {
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
//! Feedback 
const feedbackLinkEls = document.querySelectorAll('[data-link="feedback_link"]');
const feedbackEl = document.querySelector('#feedback');
const feedbackMsgEl = feedbackEl.querySelector('#feedback-msg');
const feedbackSubmitEl = feedbackEl.querySelector('#feedback-submit');
const feedbackSuccessModalEl = document.querySelector('#feedback-success-modal');
if (feedbackLinkEls) {
   feedbackLinkEls.forEach(link => {
      link.onclick = e => {
         e.preventDefault();
         feedbackEl.classList.remove('hidden');
         if (feedbackMsgEl.value.length < 3) {
            feedbackSubmitEl.setAttribute('disabled', 'disabled');
         }
      }
   });
}
feedbackEl.addEventListener('click', e => {
   if (e.target.id == 'feedback') {
      feedbackEl.classList.add('hidden');
   } else if (e.target.id == 'feedback-reset') {
      feedbackSubmitEl.setAttribute('disabled', 'disabled');
   } else if (e.target.id == 'feedback-submit') {
      e.preventDefault();
      const message = feedbackMsgEl.value;
      $.ajax({
         type: 'POST',
         url: '/feedback/send',
         data: { message: message },

         success: function (response) {
            if (response == 'success') {
               feedbackEl.classList.add('hidden');
               feedbackMsgEl.value = '';
               feedbackSuccessModalEl.classList.remove('hidden');
            }
         }
      });
   }
});
feedbackMsgEl.onkeydown = (e) => {
   if (feedbackMsgEl.value.length > 3) {
      feedbackSubmitEl.removeAttribute('disabled');
   } else {
      feedbackSubmitEl.setAttribute('disabled', 'disabled');
   }
}
feedbackSuccessModalEl.addEventListener('click', e => {
   if (e.target.id == 'feedback-success-modal__ok-btn' || e.target.id == 'feedback-success-modal__close-btn') {
      feedbackSuccessModalEl.classList.add('hidden');
   }
});
//! Booking books
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


