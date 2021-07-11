//! books ordering start
let request = {
   page: 1,
   orderBy: 'title',
   orderType: 'asc',
};
const booksSort = document.querySelector('.books-navbar__sort');

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
      evt.target.classList.add('active');
      const orderBy =  evt.target.dataset.orderName;
      const orderType = evt.target.dataset.orderType;
      let reverseOrder = '';
      if (orderType == 'asc') {
         evt.target.dataset.orderType = 'desc';
         reverseOrder = 'desc';
         booksSort.querySelector('.books-navbar__icon--up').classList.remove('active');
         booksSort.querySelector('.books-navbar__icon--down').classList.add('active');
      }
      if (orderType == 'desc') {
         evt.target.dataset.orderType = 'asc';
         reverseOrder = 'asc';
         booksSort.querySelector('.books-navbar__icon--down').classList.remove('active');
         booksSort.querySelector('.books-navbar__icon--up').classList.add('active');
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

