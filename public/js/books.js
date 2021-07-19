//! books view start
const booksViewEl = document.querySelector('[data-id="books-navbar__view"]');

if (booksViewEl) {
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
}
//! books view end

//! books ordering start
let request = {
   page: 1,
   orderBy: 'title',
   orderType: 'asc',
};

const booksSort = document.querySelector('[data-id="books-navbar__sort"]');

function fetch_data(page, orderBy, orderType, category) {
   $.ajax({
      url: "/books/fetch_data?page="+page+"&orderby="+orderBy+"&ordertype="+orderType+"&category="+category,

      success:function(response) {
         document.querySelector('.books').innerHTML = response;
         const ratingIconEl = document.querySelectorAll('[data-id="rating-icon"]');
         ratingIconEl.forEach(icon => {
            if (icon.classList.contains('filled')) {
               icon.textContent = 'star';
            }
         });
      }
   })
}

if (booksSort) {
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
         const category = document.querySelector('[data-id="books-category"]').value;
         request.orderBy = orderBy;
         request.orderType = reverseOrder;
         fetch_data(page, orderBy, reverseOrder, category);
      }
   
   });
}

const booksEl = document.querySelector('.books');
if (booksEl) {
   booksEl.addEventListener('click', (evt) => {
      if (evt.target.className == 'page-link') {
         evt.preventDefault();
         const page = evt.target.href.split('page=')[1];
         request.page = page;
         const orderBy = request.orderBy;
         const orderType = request.orderType;
         const category = document.querySelector('[data-id="books-category"]').value;
         fetch_data(page, orderBy, orderType, category);
      }
   
   })
}
//! books ordering end
//! books single page start
const bookPreviewEl = document.querySelector('[data-id="book-preview"]');
if (bookPreviewEl) {
   bookPreviewEl.addEventListener('click', (evt) => {
      // book-photos
      if (evt.target.dataset.name == 'book-photos') {
         const allPhotosEl = bookPreviewEl.querySelectorAll('[data-name="book-photos"]');
         allPhotosEl.forEach(element => {
            if (element.classList.contains('big')) {
               element.classList.remove('big');
               evt.target.classList.add('big');
            }
         });
         const photosEl = bookPreviewEl.querySelectorAll('[data-name="book-photos-img"]');
         photosEl.forEach(element => {
            if (element.classList.contains('active')) {
               element.classList.remove('active');
            }
         });
         if (evt.target.dataset.id == 'main') {
            bookPreviewEl.querySelector('[data-id="main-img"]').classList.add('active');
         } else if (evt.target.dataset.id == 'front') {
            bookPreviewEl.querySelector('[data-id="front-img"]').classList.add('active');
         } else if (evt.target.dataset.id == 'back') {
            bookPreviewEl.querySelector('[data-id="back-img"]').classList.add('active');
         } else if (evt.target.dataset.id == 'side') {
            bookPreviewEl.querySelector('[data-id="side-img"]').classList.add('active');
         }
      }
   })
}

//* cursor
const cursorEl = document.querySelector('#cursor');
document.addEventListener('mousemove', (evt) => {
   const x = evt.clientX;
   const y = evt.clientY;
   cursorEl.style.left = x + 'px';
   cursorEl.style.top = y + 'px';
   if (evt.target.dataset.id == 'like-button') {
      cursorEl.textContent = '😍';
      evt.target.addEventListener('mouseleave', () => {
         cursorEl.textContent = '';
      })
   }
   if (evt.target.dataset.id == 'dislike-button') {
      cursorEl.textContent = '😡';
      evt.target.addEventListener('mouseleave', () => {
         cursorEl.textContent = '';
      })
   }
})
//* comment textarea
const commentInputEl = document.querySelector('[data-id="comment-text"]');
if (commentInputEl) {
   const buttonsEl = document.querySelector('[data-id="buttons-wrapper"]');
   commentInputEl.addEventListener('keydown', (evt) => {
      evt.target.style.height = "1px";
      evt.target.style.height = (5 + evt.target.scrollHeight) + "px";
      if (commentInputEl.value.length > 1) {
         buttonsEl.style.height = '50px';
      } else {
         buttonsEl.style.height = '0px';
      }
   })
   document.querySelector('[data-id="cancel-comment"]').onclick = () => {
      buttonsEl.style.height = '0px';
      commentInputEl.style.height = "45px";
   }
}

//! books single page end 
