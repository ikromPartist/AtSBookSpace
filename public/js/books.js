//! books view start
const booksViewEl = document.querySelector('[data-id="books-navbar__view"]');

booksViewEl.addEventListener('click', (evt) => {
   if (evt.target.dataset.id == 'view-standart-btn') {
      evt.preventDefault();
      booksViewEl.querySelector('[data-id="view-list-btn"]').classList.remove('active');
      evt.target.classList.add('active');
      document.querySelector('[data-id="book-cards-list"]').classList.remove('hidden');
      document.querySelector('[data-id="books-list"]').classList.remove('show');

      const view = 'standart';
      $.ajax({
         url: "/books/view?show=" + view,

         success: function (response) {
            console.log(response);
         }
      })
   } else if (evt.target.dataset.id == 'view-list-btn') {
      evt.preventDefault();
      booksViewEl.querySelector('[data-id="view-standart-btn"]').classList.remove('active');
      evt.target.classList.add('active');
      document.querySelector('[data-id="book-cards-list"]').classList.add('hidden');
      document.querySelector('[data-id="books-list"]').classList.add('show');

      const view = 'list';
      $.ajax({
         url: "/books/view?show=" + view,

         success: function (response) {
            console.log(response);
         }
      })
   }
});

//! books view end

//! books ordering start
let request = {
   page: 1,
   orderBy: 'title',
   orderType: 'asc',
};

const booksSort = document.querySelector('[data-id="books-navbar__sort"]');

function fetch_data(page, orderBy, orderType) {
   $.ajax({
      url: "/books/fetch_data?page="+page+"&orderby="+orderBy+"&ordertype="+orderType,

      success:function(response) {
         document.querySelector('.books').innerHTML = response;
      }
   })
}

booksSort.addEventListener('click', (evt) => {
   const links = booksSort.querySelectorAll('[data-id="sorting"]');
   links.forEach(link => {
      link.classList.remove('active');
   });
   if (evt.target.dataset.id == 'sorting') {
      evt.preventDefault();
      evt.target.classList.add('active');
      const orderBy =  evt.target.dataset.orderName;
      const orderType = evt.target.dataset.orderType;
      let reverseOrder = '';
      if (orderType == 'asc') {
         evt.target.dataset.orderType = 'desc';
         reverseOrder = 'desc';
         booksSort.querySelector('[data-id="arrow-up"]').classList.remove('active');
         booksSort.querySelector('[data-id="arrow-down"]').classList.add('active');
      } else if (orderType == 'desc') {
         evt.preventDefault();
         evt.target.dataset.orderType = 'asc';
         reverseOrder = 'asc';
         booksSort.querySelector('[data-id="arrow-down"]').classList.remove('active');
         booksSort.querySelector('[data-id="arrow-up"]').classList.add('active');
      }
      const page = request.page;
      request.orderBy = orderBy;
      request.orderType = reverseOrder;
      fetch_data(page, orderBy, reverseOrder);
   }

});

document.querySelector('.books').addEventListener('click', (evt) => {
   if (evt.target.className == 'page-link') {
      evt.preventDefault();
      const page = evt.target.href.split('page=')[1];
      request.page = page;
      const orderBy = request.orderBy;
      const orderType = request.orderType;
      fetch_data(page, orderBy, orderType);
   }

})
//! books ordering end

