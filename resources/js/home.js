//! Owl carousel
$(document).ready(function () {
   $(".owl-news").owlCarousel({
      loop: true,
      nav: true,
      autoplay: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      responsive: {
         0: {
            items: 1
         }
      }
   });
   $(".owl-books").owlCarousel({
      loop: true,
      nav: true,
      autoplay: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      responsive: {
         0: {
            items: 1
         },
         600: {
            items: 3
         },
         1000: {
            items: 5
         }
      }
   });
});
//! Modal map 
const showMapEl = document.querySelector('[data-id="show-map"]');
if (showMapEl) {
   const modalMapEl = document.querySelector('[data-id="modal-map"]');
   const closeMapEl = modalMapEl.querySelector('[data-id="close-map"]');
   showMapEl.onclick = (e) => {
      e.preventDefault();
      modalMapEl.classList.remove('hidden');
   }
   closeMapEl.onclick = (e) => {
      e.preventDefault();
      modalMapEl.classList.add('hidden');
   }
}
