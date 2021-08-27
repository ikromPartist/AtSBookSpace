const ratingTypesEl = document.querySelector('[data-id="rating-types"]');
const ratingLinkEls = ratingTypesEl.querySelectorAll('[data-type="rating-link"]')
const ratingViewEl = document.querySelector('[data-id="p-content"]');
let request = {
   type: 'most_active_reader'
};

function fetch_data(page, type) {
   $.ajax({
      url: "/rating/fetch_data?page=" + page + "&type=" + type,

      success: function (response) {
         const ratingViewEl = document.querySelector('[data-id="p-content"]');
         ratingViewEl.innerHTML = response;
      }
   })
}

ratingTypesEl.addEventListener('click', (e) => {
   if (e.target.dataset.id == 'most-active-reader') {
      e.preventDefault();

      ratingLinkEls.forEach(el => {
         el.classList.remove('active');
      });

      e.target.classList.add('active');
      
      const type = 'most_active_reader';
      const page = 1;
      request.type = type;

      fetch_data(page, type);
   } 
   else if (e.target.dataset.id == 'most-reading-company') {
      e.preventDefault(); 

      ratingLinkEls.forEach(el => {
         el.classList.remove('active');
      });

      e.target.classList.add('active');
      
      const type = 'most_reading_company';
      const page = 1;
      request.type = type;

      fetch_data(page, type);
   }
   else if (e.target.dataset.id == 'most-disciplined-reader') {
      e.preventDefault();

      ratingLinkEls.forEach(el => {
         el.classList.remove('active');
      });

      e.target.classList.add('active');

      const type = 'most_disciplined_reader';
      const page = 1;
      request.type = type;

      fetch_data(page, type);
   } 
   else if (e.target.dataset.id == 'most-popular-book') {
      e.preventDefault();
      
      ratingLinkEls.forEach(el => {
         el.classList.remove('active');
      });

      e.target.classList.add('active');

      const type = 'most_popular_book';
      const page = 1;
      request.type = type;

      fetch_data(page, type);
   } 
   else if (e.target.dataset.id == 'most-proactive-member') {
      e.preventDefault();

      ratingLinkEls.forEach(el => {
         el.classList.remove('active');
      });

      e.target.classList.add('active');

      const type = 'most_proactive_member';
      const page = 1;
      request.type = type;

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
