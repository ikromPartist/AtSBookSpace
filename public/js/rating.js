const ratingTypesEl = document.querySelector('[data-id="rating-types"]');
const activeLinkEl = ratingTypesEl.querySelector('[data-id="active-link"]');
const ratingLinkEls = ratingTypesEl.querySelectorAll('[data-name="rating-link"]')
const ratingViewEl = document.querySelector('[data-id="rating-view"]');
let request = {
   type: 'most_active_reader'
};

ratingTypesEl.addEventListener('click', (e) => {
//! the most active reader
   if (e.target.dataset.id == 'most-active-reader') {
      e.preventDefault();
      ratingLinkEls.forEach(el => {
         el.classList.remove('active');
      });
      e.target.classList.add('active');
      activeLinkEl.style.transform = 'translate(0px, 0px)'
      const type = 'most_active_reader';
      request.type = type;
      const page = 1;
      fetch_data(page, type);
   } 
//! the most reading company
   else if (e.target.dataset.id == 'most-reading-company') {
      e.preventDefault(); 
      ratingLinkEls.forEach(el => {
         el.classList.remove('active');
      });
      e.target.classList.add('active');
      activeLinkEl.style.transform = 'translate(0px, 43px)'
      const type = 'most_reading_company';
      request.type = type;
      const page = 1;
      fetch_data(page, type);
   }
//! the most disciplined reader
   else if (e.target.dataset.id == 'most-disciplined-reader') {
      e.preventDefault();
      ratingLinkEls.forEach(el => {
         el.classList.remove('active');
      });
      e.target.classList.add('active');
      activeLinkEl.style.transform = 'translate(0px, 86px)';
      const type = 'most_disciplined_reader';
      request.type = type;
      const page = 1;
      fetch_data(page, type);
   } 
//! the most popular book
   else if (e.target.dataset.id == 'most-popular-book') {
      e.preventDefault();
      ratingLinkEls.forEach(el => {
         el.classList.remove('active');
      });
      e.target.classList.add('active');
      activeLinkEl.style.transform = 'translate(0px, 129px)'
      const type = 'most_popular_book';
      request.type = type;
      const page = 1;
      fetch_data(page, type);
   } 
//! the most proactive member
   else if (e.target.dataset.id == 'most-proactive-member') {
      e.preventDefault();
      ratingLinkEls.forEach(el => {
         el.classList.remove('active');
      });
      e.target.classList.add('active');
      activeLinkEl.style.transform = 'translate(0px, 172px)'
      const type = 'most_proactive_member';
      request.type = type;
      const page = 1;
      fetch_data(page, type);
   }
});

ratingViewEl.addEventListener('click', (e) => {
   if (e.target.className == 'page-link') {
      e.preventDefault();
      const page = e.target.href.split('page=')[1];
      const type = request.type;
      fetch_data(page, type);
   }

})

//! ajax functions start
function fetch_data(page, type) {
   $.ajax({
      url: "/rating/fetch_data?page=" + page + "&type=" + type,

      success: function (response) {
         const ratingViewEl = document.querySelector('[data-id="rating-view"]');
         ratingViewEl.innerHTML = response;
      }
   })
}
//! ajax functions end
