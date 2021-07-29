//! Owl carousel start
$(document).ready(function () {
   $(".owl-carousel").owlCarousel({
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
            items: 4
         }
      }
   });
});
//! Owl carousel end
//! Modal map start
const showMapEl = document.querySelector('[data-id="show-map"]');
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
//! Modal map end
