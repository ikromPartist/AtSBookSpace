//! books view start
const booksViewEl = document.querySelector('[data-id="books-navbar__view"]');

if (booksViewEl) {
   booksViewEl.addEventListener('click', (e) => {
      if (e.target.dataset.id == 'view-standart-btn') {
         e.preventDefault();
         booksViewEl.querySelector('[data-id="view-list-btn"]').classList.remove('active');
         e.target.classList.add('active');
         document.querySelector('[data-id="book-cards-list"]').classList.remove('hidden');
         document.querySelector('[data-id="books-list"]').classList.remove('show');
   
         const view = 'standart';
         $.ajax({
            url: "/books/view_type?show=" + view,
   
            success: function (response) {
               console.log(response);
            }
         })
      } else if (e.target.dataset.id == 'view-list-btn') {
         e.preventDefault();
         booksViewEl.querySelector('[data-id="view-standart-btn"]').classList.remove('active');
         e.target.classList.add('active');
         document.querySelector('[data-id="book-cards-list"]').classList.add('hidden');
         document.querySelector('[data-id="books-list"]').classList.add('show');
   
         const view = 'list';
         $.ajax({
            url: "/books/view_type?show=" + view,
   
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
   booksSort.addEventListener('click', (e) => {
      const links = booksSort.querySelectorAll('[data-id="sorting"]');
      links.forEach(link => {
         link.classList.remove('active');
      });
      if (e.target.dataset.id == 'sorting') {
         e.preventDefault();
         e.target.classList.add('active');
         const orderBy =  e.target.dataset.orderName;
         const orderType = e.target.dataset.orderType;
         let reverseOrder = '';
         if (orderType == 'asc') {
            e.target.dataset.orderType = 'desc';
            reverseOrder = 'desc';
            booksSort.querySelector('[data-id="arrow-up"]').classList.remove('active');
            booksSort.querySelector('[data-id="arrow-down"]').classList.add('active');
         } else if (orderType == 'desc') {
            e.preventDefault();
            e.target.dataset.orderType = 'asc';
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
   booksEl.addEventListener('click', (e) => {
      if (e.target.className == 'page-link') {
         e.preventDefault();
         const page = e.target.href.split('page=')[1];
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
   bookPreviewEl.addEventListener('click', (e) => {
      // book-photos
      if (e.target.dataset.name == 'book-photos') {
         const allPhotosEl = bookPreviewEl.querySelectorAll('[data-name="book-photos"]');
         allPhotosEl.forEach(element => {
            if (element.classList.contains('big')) {
               element.classList.remove('big');
               e.target.classList.add('big');
            }
         });
         const photosEl = bookPreviewEl.querySelectorAll('[data-name="book-photos-img"]');
         photosEl.forEach(element => {
            if (element.classList.contains('active')) {
               element.classList.remove('active');
            }
         });
         if (e.target.dataset.id == 'main') {
            bookPreviewEl.querySelector('[data-id="main-img"]').classList.add('active');
         } else if (e.target.dataset.id == 'front') {
            bookPreviewEl.querySelector('[data-id="front-img"]').classList.add('active');
         } else if (e.target.dataset.id == 'back') {
            bookPreviewEl.querySelector('[data-id="back-img"]').classList.add('active');
         } else if (e.target.dataset.id == 'side') {
            bookPreviewEl.querySelector('[data-id="side-img"]').classList.add('active');
         }
      }
   })
}

//* cursor
const cursorEl = document.querySelector('#cursor');
document.addEventListener('mousemove', (e) => {
   const x = e.clientX;
   const y = e.clientY;
   cursorEl.style.left = x + 'px';
   cursorEl.style.top = y + 'px';
   if (e.target.dataset.id == 'like-button') {
      cursorEl.textContent = '😍';
      e.target.addEventListener('mouseleave', () => {
         cursorEl.textContent = '';
      })
   }
   if (e.target.dataset.id == 'dislike-button') {
      cursorEl.textContent = '😡';
      e.target.addEventListener('mouseleave', () => {
         cursorEl.textContent = '';
      })
   }
})
//* comment textarea
const commentInputEl = document.querySelector('[data-id="comment-text"]');
// textarea
if (commentInputEl) {
   const buttonsEl = document.querySelector('[data-id="buttons-wrapper"]');
   commentInputEl.addEventListener('keydown', (e) => {
      e.target.style.height = "1px";
      e.target.style.height = (2 + e.target.scrollHeight) + "px";
      if (commentInputEl.value.length > 1) {
         buttonsEl.style.height = '50px';
      } else {
         buttonsEl.style.height = '0px';
         e.target.style.height = "45px";
      }
   })
// reset button 
   document.querySelector('[data-id="cancel-comment"]').onclick = () => {
      buttonsEl.style.height = '0px';
      commentInputEl.style.height = "45px";
   }
// submit button
   const submitCommentEl = document.querySelector('[data-id="submit-comment"]');

   submitCommentEl.onclick = (e) => {
      e.preventDefault();
      const comment = commentInputEl.value;
      const book = e.target.dataset.book;
      $.ajax({
         url: "/books/comments?comment=" + comment + "&book=" + book,

         success: function (response) {
            console.log(response);
            location.reload();
         }
      })
   }
}
//* books likes & dislikes systems start 
const likesContainerEl = document.querySelector('[data-id="likes-container"]');
if (likesContainerEl) {
   likesContainerEl.addEventListener('click', (e) => {
      if (e.target.dataset.type == 'not-liked') {
         const like = 'not-liked';
         const book = e.target.dataset.book;
         $.ajax({
            url: "/books/likes?like=" + like + "&book=" + book,
   
            success: function (response) {
               console.log(response);
               location.reload();
            }
         })
      } else if (e.target.dataset.type == 'not-disliked') {
         const like = 'not-disliked';
         const book = e.target.dataset.book;
         $.ajax({
            url: "/books/likes?like=" + like + "&book=" + book,
   
            success: function (response) {
               console.log(response);
               location.reload();
            }
         })
      }
   });
}
//* rating modals start
const showRatingModalEl = document.querySelector('[data-id="show-rating-modal"]');
const ratingModalEl = document.querySelector('[data-id="rating-modal"]');
const closeRatingModalEl = document.querySelector('[data-id="rating__cancel-btn"]');
const ratingSuccessModalEl = document.querySelector('[data-id="rating-success"]');
if (ratingModalEl) {
   showRatingModalEl.onclick = (e) => {
      e.preventDefault();
      ratingModalEl.classList.remove('hidden');
   }
   ratingSuccessModalEl.addEventListener('click', e => {
      if (e.target.dataset.id == 'rating__ok-btn' || e.target.dataset.id == 'rating__close-btn') {
         location.reload();
      }
   });
   ratingModalEl.addEventListener('click', e => {
      if (e.target.dataset.id == 'rating__cancel-btn' || e.target.dataset.id == 'rating__close-btn') {
         ratingModalEl.classList.add('hidden');
      } else if (e.target.dataset.id == 'rating-icon-1') {
         const rate = 5;
         const book = e.target.dataset.book;
         $.ajax({
            url: "/books/ratings?rate=" + rate + "&book=" + book,
            success: function (response) {
               if (response == 'rate saved') {
                  ratingModalEl.classList.add('hidden');
                  ratingSuccessModalEl.classList.remove('hidden');
               }
            }
         })
      } else if (e.target.dataset.id == 'rating-icon-2') {
         const rate = 4;
         const book = e.target.dataset.book;
         $.ajax({
            url: "/books/ratings?rate=" + rate + "&book=" + book,
            success: function (response) {
               if (response == 'rate saved') {
                  ratingModalEl.classList.add('hidden');
                  ratingSuccessModalEl.classList.remove('hidden');
               }
            }
         })
      } else if (e.target.dataset.id == 'rating-icon-3') {
         const rate = 3;
         const book = e.target.dataset.book;
         $.ajax({
            url: "/books/ratings?rate=" + rate + "&book=" + book,
            success: function (response) {
               if (response == 'rate saved') {
                  ratingModalEl.classList.add('hidden');
                  ratingSuccessModalEl.classList.remove('hidden');
               }
            }
         })
      } else if (e.target.dataset.id == 'rating-icon-4') {
         const rate = 2;
         const book = e.target.dataset.book;
         $.ajax({
            url: "/books/ratings?rate=" + rate + "&book=" + book,
            success: function (response) {
               if (response == 'rate saved') {
                  ratingModalEl.classList.add('hidden');
                  ratingSuccessModalEl.classList.remove('hidden');
               }
            }
         })
      } else if (e.target.dataset.id == 'rating-icon-5') {
         const rate = 1;
         const book = e.target.dataset.book;
         $.ajax({
            url: "/books/ratings?rate=" + rate + "&book=" + book,
            success: function (response) {
               if (response == 'rate saved') {
                  ratingModalEl.classList.add('hidden');
                  ratingSuccessModalEl.classList.remove('hidden');
               }
            }
         })
      }
   });
}
//* rating modals end
//! books single page end 
