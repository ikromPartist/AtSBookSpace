/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*******************************!*\
  !*** ./resources/js/about.js ***!
  \*******************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!************************************!*\
  !*** ./resources/js/activities.js ***!
  \************************************/
var activitiesEl = document.querySelector('[data-id="activities"]');
var activitySuccessEl = document.querySelector('[data-id="activity-success"]');
var activityFailEl = document.querySelector('[data-id="activity-fail"]');

if (activitiesEl) {
  activitySuccessEl.addEventListener('click', function (e) {
    if (e.target.dataset.id == 'activity-success__ok-btn' || e.target.dataset.id == 'activity-success__close-btn') {
      activitySuccessEl.classList.add('hidden');
    }
  });
  activityFailEl.addEventListener('click', function (e) {
    if (e.target.dataset.id == 'activity-fail__ok-btn' || e.target.dataset.id == 'activity-fail__close-btn') {
      activityFailEl.classList.add('hidden');
    }
  });
  activitiesEl.addEventListener('click', function (e) {
    if (e.target.dataset.type == 'participate') {
      e.preventDefault();
      $.ajax({
        url: "/activities/participation?activity=".concat(e.target.dataset.activity),
        success: function success(response) {
          if (response == 'success') {
            activitySuccessEl.classList.remove('hidden');
            var participantsQuantityEl = activitiesEl.querySelector("[data-participants-quantity=\"".concat(e.target.dataset.activity, "\"]"));
            participantsQuantityEl.textContent = +participantsQuantityEl.textContent + 1;
          } else {
            activityFailEl.classList.remove('hidden');
          }
        }
      });
    }
  });
}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*******************************!*\
  !*** ./resources/js/books.js ***!
  \*******************************/
//! books view start
var booksViewEl = document.querySelector('[data-id="books-navbar__view"]');

if (booksViewEl) {
  booksViewEl.addEventListener('click', function (e) {
    if (e.target.dataset.id == 'view-standart-btn') {
      e.preventDefault();
      booksViewEl.querySelector('[data-id="view-list-btn"]').classList.remove('active');
      e.target.classList.add('active');
      document.querySelector('[data-id="book-cards-list"]').classList.remove('hidden');
      document.querySelector('[data-id="books-list"]').classList.remove('show');
      var view = 'standart';
      $.ajax({
        url: "/books/view_type?show=".concat(view),
        success: function success(response) {
          console.log(response);
        }
      });
    } else if (e.target.dataset.id == 'view-list-btn') {
      e.preventDefault();
      booksViewEl.querySelector('[data-id="view-standart-btn"]').classList.remove('active');
      e.target.classList.add('active');
      document.querySelector('[data-id="book-cards-list"]').classList.add('hidden');
      document.querySelector('[data-id="books-list"]').classList.add('show');
      var _view = 'list';
      $.ajax({
        url: "/books/view_type?show=".concat(_view),
        success: function success(response) {
          console.log(response);
        }
      });
    }
  });
} //! books view end
//! books ordering start


var request = {
  page: 1,
  orderBy: 'title',
  orderType: 'asc'
};
var booksSort = document.querySelector('[data-id="books-navbar__sort"]');

function fetch_data(page, orderBy, orderType, category) {
  $.ajax({
    url: "/books/fetch_data?page=".concat(page, "&orderby=").concat(orderBy, "&ordertype=").concat(orderType, "&category=").concat(category),
    success: function success(response) {
      document.querySelector('.books').innerHTML = response;
      var ratingIconEl = document.querySelectorAll('[data-id="rating-icon"]');
      ratingIconEl.forEach(function (icon) {
        if (icon.classList.contains('filled')) {
          icon.textContent = 'star';
        }
      });
    }
  });
}

if (booksSort) {
  booksSort.addEventListener('click', function (e) {
    var links = booksSort.querySelectorAll('[data-id="sorting"]');
    links.forEach(function (link) {
      link.classList.remove('active');
    });

    if (e.target.dataset.id == 'sorting') {
      e.preventDefault();
      e.target.classList.add('active');
      var orderBy = e.target.dataset.orderName;
      var orderType = e.target.dataset.orderType;
      var reverseOrder = '';

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

      var page = request.page;
      var category = document.querySelector('[data-id="books-category"]').value;
      request.orderBy = orderBy;
      request.orderType = reverseOrder;
      fetch_data(page, orderBy, reverseOrder, category);
    }
  });
}

var booksEl = document.querySelector('.books');

if (booksEl) {
  booksEl.addEventListener('click', function (e) {
    if (e.target.className == 'page-link') {
      e.preventDefault();
      var page = e.target.href.split('page=')[1];
      request.page = page;
      var orderBy = request.orderBy;
      var orderType = request.orderType;
      var category = document.querySelector('[data-id="books-category"]').value;
      fetch_data(page, orderBy, orderType, category);
    }
  });
} //! books ordering end
//! books single page start


var bookPreviewEls = document.querySelectorAll('[data-id="book-preview"]');

if (bookPreviewEls) {
  bookPreviewEls.forEach(function (bookPreviewEl) {
    bookPreviewEl.addEventListener('click', function (e) {
      // book-photos
      if (e.target.dataset.name == 'book-photos') {
        var allPhotosEl = bookPreviewEl.querySelectorAll('[data-name="book-photos"]');
        allPhotosEl.forEach(function (element) {
          if (element.classList.contains('big')) {
            element.classList.remove('big');
            e.target.classList.add('big');
          }
        });
        var photosEl = bookPreviewEl.querySelectorAll('[data-name="book-photos-img"]');
        photosEl.forEach(function (element) {
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
    });
  });
} //* comment textarea


var commentInputEl = document.querySelector('[data-id="comment-text"]'); // textarea

if (commentInputEl) {
  var buttonsEl = document.querySelector('[data-id="buttons-wrapper"]');
  commentInputEl.addEventListener('keydown', function (e) {
    e.target.style.height = "1px";
    e.target.style.height = 2 + e.target.scrollHeight + "px";

    if (commentInputEl.value.length > 1) {
      buttonsEl.style.height = '50px';
    } else {
      buttonsEl.style.height = '0px';
      e.target.style.height = "45px";
    }
  }); // reset button 

  document.querySelector('[data-id="cancel-comment"]').onclick = function () {
    buttonsEl.style.height = '0px';
    commentInputEl.style.height = "45px";
  }; // submit button


  var submitCommentEl = document.querySelector('[data-id="submit-comment"]');

  submitCommentEl.onclick = function (e) {
    e.preventDefault();
    var comment = commentInputEl.value;
    var book = e.target.dataset.book;
    $.ajax({
      url: "/books/comments?comment=" + comment + "&book=" + book,
      success: function success(response) {
        console.log(response);
        location.reload();
      }
    });
  };
} //* books likes & dislikes systems start 


var likesContainerEl = document.querySelector('[data-id="likes-container"]');

if (likesContainerEl) {
  likesContainerEl.addEventListener('click', function (e) {
    if (e.target.dataset.type == 'not-liked') {
      var like = 'not-liked';
      var book = e.target.dataset.book;
      $.ajax({
        url: "/books/likes?like=" + like + "&book=" + book,
        success: function success(response) {
          console.log(response);
          location.reload();
        }
      });
    } else if (e.target.dataset.type == 'not-disliked') {
      var _like = 'not-disliked';
      var _book = e.target.dataset.book;
      $.ajax({
        url: "/books/likes?like=" + _like + "&book=" + _book,
        success: function success(response) {
          console.log(response);
          location.reload();
        }
      });
    }
  });
} //* rating modals start


var showRatingModalEl = document.querySelector('[data-id="show-rating-modal"]');
var ratingModalEl = document.querySelector('[data-id="rating-modal"]');
var closeRatingModalEl = document.querySelector('[data-id="rating__cancel-btn"]');
var ratingSuccessModalEl = document.querySelector('[data-id="rating-success"]');

if (ratingModalEl) {
  showRatingModalEl.onclick = function (e) {
    e.preventDefault();
    ratingModalEl.classList.remove('hidden');
  };

  ratingSuccessModalEl.addEventListener('click', function (e) {
    if (e.target.dataset.id == 'rating__ok-btn' || e.target.dataset.id == 'rating__close-btn') {
      location.reload();
    }
  });
  ratingModalEl.addEventListener('click', function (e) {
    if (e.target.dataset.id == 'rating__cancel-btn' || e.target.dataset.id == 'rating__close-btn') {
      ratingModalEl.classList.add('hidden');
    } else if (e.target.dataset.id == 'rating-icon-1') {
      var rate = 5;
      var book = e.target.dataset.book;
      $.ajax({
        url: "/books/ratings?rate=" + rate + "&book=" + book,
        success: function success(response) {
          if (response == 'rate saved') {
            ratingModalEl.classList.add('hidden');
            ratingSuccessModalEl.classList.remove('hidden');
          }
        }
      });
    } else if (e.target.dataset.id == 'rating-icon-2') {
      var _rate = 4;
      var _book2 = e.target.dataset.book;
      $.ajax({
        url: "/books/ratings?rate=" + _rate + "&book=" + _book2,
        success: function success(response) {
          if (response == 'rate saved') {
            ratingModalEl.classList.add('hidden');
            ratingSuccessModalEl.classList.remove('hidden');
          }
        }
      });
    } else if (e.target.dataset.id == 'rating-icon-3') {
      var _rate2 = 3;
      var _book3 = e.target.dataset.book;
      $.ajax({
        url: "/books/ratings?rate=" + _rate2 + "&book=" + _book3,
        success: function success(response) {
          if (response == 'rate saved') {
            ratingModalEl.classList.add('hidden');
            ratingSuccessModalEl.classList.remove('hidden');
          }
        }
      });
    } else if (e.target.dataset.id == 'rating-icon-4') {
      var _rate3 = 2;
      var _book4 = e.target.dataset.book;
      $.ajax({
        url: "/books/ratings?rate=" + _rate3 + "&book=" + _book4,
        success: function success(response) {
          if (response == 'rate saved') {
            ratingModalEl.classList.add('hidden');
            ratingSuccessModalEl.classList.remove('hidden');
          }
        }
      });
    } else if (e.target.dataset.id == 'rating-icon-5') {
      var _rate4 = 1;
      var _book5 = e.target.dataset.book;
      $.ajax({
        url: "/books/ratings?rate=" + _rate4 + "&book=" + _book5,
        success: function success(response) {
          if (response == 'rate saved') {
            ratingModalEl.classList.add('hidden');
            ratingSuccessModalEl.classList.remove('hidden');
          }
        }
      });
    }
  });
} //* rating modals end
//! books single page end
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!**********************************!*\
  !*** ./resources/js/feedback.js ***!
  \**********************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!******************************!*\
  !*** ./resources/js/home.js ***!
  \******************************/
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
        items: 4
      }
    }
  });
}); //! Modal map 

var showMapEl = document.querySelector('[data-id="show-map"]');
var modalMapEl = document.querySelector('[data-id="modal-map"]');
var closeMapEl = modalMapEl.querySelector('[data-id="close-map"]');

showMapEl.onclick = function (e) {
  e.preventDefault();
  modalMapEl.classList.remove('hidden');
};

closeMapEl.onclick = function (e) {
  e.preventDefault();
  modalMapEl.classList.add('hidden');
};
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
//! Ajax request setup 
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
}); //! Scroll window to top (button event)

var scrollTopBtnEl = document.querySelector('#scroll-top-btn'); // Show button when window is scrolled down

window.addEventListener('scroll', function () {
  if (window.pageYOffset > 200) {
    scrollTopBtnEl.classList.add('active');
  } else {
    scrollTopBtnEl.classList.remove('active');
    scrollTopBtnEl.classList.remove('click');
  }
}); // Scroll to top when button is clicked

scrollTopBtnEl.addEventListener('click', function () {
  scrollTopBtnEl.classList.add('click');
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
}); //! Catalog dropdown

var catalogBtnEl = document.querySelector('#catalog-btn');
var catalogListEl = document.querySelector('#catalog-list');
var catalogIconEl = catalogBtnEl.querySelector('#catalog-icon');

catalogBtnEl.onclick = function (e) {
  e.preventDefault();
  catalogListEl.classList.toggle('hidden');

  if (catalogIconEl.textContent == 'arrow_drop_down') {
    catalogIconEl.textContent = 'arrow_drop_up';
  } else {
    catalogIconEl.textContent = 'arrow_drop_down';
  }
}; //! Search form events


var searchFormEl = document.querySelector('#search');
var showHideSearchEl = document.querySelector('#show-hide-search-btn');
showHideSearchEl.addEventListener('click', function (e) {
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
}); //! Countdown time  

var timesLeftEl = document.querySelector('[data-id="times-left"]');

function countdown() {
  var year = document.querySelector('[data-id="year"]').value;
  var month = +document.querySelector('[data-id="month"]').value - 1;
  var day = document.querySelector('[data-id="day"]').value;
  var daysEl = timesLeftEl.querySelector('[data-id="days"]');
  var hoursEl = timesLeftEl.querySelector('[data-id="hours"]');
  var minutesEl = timesLeftEl.querySelector('[data-id="minutes"]');
  var secondsEl = timesLeftEl.querySelector('[data-id="seconds"]');
  var now = new Date();
  var eventDate = new Date(year, month, day);
  var currentTime = now.getTime();
  var eventTime = eventDate.getTime();
  var remTime = eventTime - currentTime;

  if (remTime < 0) {
    timesLeftEl.classList.toggle('award');
    daysEl.textContent = '00';
    hoursEl.textContent = '00';
    minutesEl.textContent = '00';
    secondsEl.textContent = '00';
    setTimeout(countdown, 200);
  } else {
    var sec = Math.floor(remTime / 1000);
    var min = Math.floor(sec / 60);
    var hour = Math.floor(min / 60);

    var _day = Math.floor(hour / 24);

    hour %= 24;
    min %= 60;
    sec %= 60;
    hour = hour < 10 ? "0" + hour : hour;
    min = min < 10 ? "0" + min : min;
    sec = sec < 10 ? "0" + sec : sec;
    daysEl.textContent = _day;
    hoursEl.textContent = hour;
    minutesEl.textContent = min;
    secondsEl.textContent = sec;
    setTimeout(countdown, 1000);
  }
}

if (timesLeftEl) {
  countdown();
  var confirmModalEl = document.querySelector('[data-id="confirm-modal"]');

  var _successModalEl = document.querySelector('[data-id="success-modal"]');

  var _failModalEl = document.querySelector('[data-id="fail-modal"]');

  timesLeftEl.addEventListener('click', function (e) {
    e.preventDefault();
    confirmModalEl.classList.remove('hidden');
  });
  confirmModalEl.addEventListener('click', function (e) {
    if (e.target.dataset.id == 'confirm-modal__confirm-btn') {
      var book = document.querySelector('[data-id="book"]').value;
      confirmModalEl.classList.add('hidden');
      $.ajax({
        url: "/books/extend_deadline?book=" + book,
        success: function success(response) {
          if (response == true) {
            _failModalEl.classList.remove('hidden');
          } else {
            _successModalEl.classList.remove('hidden');
          }
        }
      });
    } else if (e.target.dataset.id == 'confirm-modal__cancel-btn' || e.target.dataset.id == 'confirm-modal__close-btn') {
      confirmModalEl.classList.add('hidden');
    }
  });

  _successModalEl.addEventListener('click', function (e) {
    if (e.target.dataset.id == 'success-modal__ok-btn' || e.target.dataset.id == 'success-modal__close-btn') {
      location.reload();
    }
  });

  _failModalEl.addEventListener('click', function (e) {
    if (e.target.dataset.id == 'fail-modal__ok-btn' || e.target.dataset.id == 'fail-modal__close-btn') {
      _failModalEl.classList.add('hidden');
    }
  });
} //! Feedback 


var feedbackLinkEls = document.querySelectorAll('[data-link="feedback_link"]');
var feedbackEl = document.querySelector('#feedback');
var feedbackMsgEl = feedbackEl.querySelector('#feedback-msg');
var feedbackSubmitEl = feedbackEl.querySelector('#feedback-submit');
var feedbackSuccessModalEl = document.querySelector('#feedback-success-modal');

if (feedbackLinkEls) {
  feedbackLinkEls.forEach(function (link) {
    link.onclick = function (e) {
      e.preventDefault();
      feedbackEl.classList.remove('hidden');

      if (feedbackMsgEl.value.length < 3) {
        feedbackSubmitEl.setAttribute('disabled', 'disabled');
      }
    };
  });
}

feedbackEl.addEventListener('click', function (e) {
  if (e.target.id == 'feedback') {
    feedbackEl.classList.add('hidden');
  } else if (e.target.id == 'feedback-reset') {
    feedbackSubmitEl.setAttribute('disabled', 'disabled');
  } else if (e.target.id == 'feedback-submit') {
    e.preventDefault();
    var message = feedbackMsgEl.value;
    $.ajax({
      type: 'POST',
      url: '/feedback/send',
      data: {
        message: message
      },
      success: function success(response) {
        if (response == 'success') {
          feedbackEl.classList.add('hidden');
          feedbackMsgEl.value = '';
          feedbackSuccessModalEl.classList.remove('hidden');
        }
      }
    });
  }
});

feedbackMsgEl.onkeydown = function (e) {
  if (feedbackMsgEl.value.length > 3) {
    feedbackSubmitEl.removeAttribute('disabled');
  } else {
    feedbackSubmitEl.setAttribute('disabled', 'disabled');
  }
};

feedbackSuccessModalEl.addEventListener('click', function (e) {
  if (e.target.id == 'feedback-success-modal__ok-btn' || e.target.id == 'feedback-success-modal__close-btn') {
    feedbackSuccessModalEl.classList.add('hidden');
  }
}); //! Booking books

var bookingLinkEls = document.querySelectorAll('[data-type="booking"]');
var successModalEl = document.querySelector('[data-id="booking-success"]');
var failModalEl = document.querySelector('[data-id="booking-fail"]');

if (bookingLinkEls) {
  document.querySelector('body').addEventListener('click', function (e) {
    if (e.target.dataset.type == 'booking') {
      e.preventDefault();
      var book = e.target.dataset.book;
      $.ajax({
        url: "/books/booking?book=" + book,
        success: function success(response) {
          if (response == 'failed') {
            failModalEl.classList.remove('hidden');
          } else {
            document.querySelector("[data-book-status=\"".concat(book, "\"]")).innerHTML = "\n                     <p class=\"books-card__status books-card__status--unavailable\">\n                        \u0417\u0430\u043D\u044F\u0442\u043E \u043F\u0440\u0438\u043C\u0435\u0440\u043D\u043E \u0434\u043E: ".concat(response, "\n                     </p>\n                  ");
            successModalEl.classList.remove('hidden');
          }
        }
      });
    } else if (e.target.dataset.id == 'booking-success__ok-btn' || e.target.dataset.id == 'booking-success__close-btn') {
      successModalEl.classList.add('hidden');
    } else if (e.target.dataset.id == 'booking-fail__ok-btn' || e.target.dataset.id == 'booking-fail__close-btn') {
      failModalEl.classList.add('hidden');
    }
  });
  bookingLinkEls.forEach(function (link) {
    link.addEventListener('mouseover', function (e) {
      e.target.textContent = "\u0412\u0430\u0448\u0435 \u043A\u043E\u043B\u0438\u0447\u0435\u0441\u0442\u0432\u043E \u0432 \u043E\u0447\u0435\u0440\u0435\u0434\u0438: ".concat(e.target.dataset.queue);
    });
    link.addEventListener('mouseleave', function (e) {
      e.target.textContent = 'Забронировать';
    });
  });
}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!***************************************!*\
  !*** ./resources/js/notifications.js ***!
  \***************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!**************************************!*\
  !*** ./resources/js/presentation.js ***!
  \**************************************/
var presentationsEl = document.querySelector('[data-id="presentations"]');
var presentationSuccessEl = document.querySelector('[data-id="presentation-success"]');
var presentaionFailEl = document.querySelector('[data-id="presentation-fail"]');

if (presentationsEl) {
  presentationSuccessEl.addEventListener('click', function (e) {
    if (e.target.dataset.id == 'presentation-success__ok-btn' || e.target.dataset.id == 'presentation-success__close-btn') {
      presentationSuccessEl.classList.add('hidden');
    }
  });
  presentaionFailEl.addEventListener('click', function (e) {
    if (e.target.dataset.id == 'presentation-fail__ok-btn' || e.target.dataset.id == 'presentation-fail__close-btn') {
      presentaionFailEl.classList.add('hidden');
    }
  });
  presentationsEl.addEventListener('click', function (e) {
    if (e.target.dataset.type == 'participate') {
      e.preventDefault();
      $.ajax({
        url: "/presentation/participation?presentation=".concat(e.target.dataset.presentation),
        success: function success(response) {
          if (response == 'success') {
            presentationSuccessEl.classList.remove('hidden');
            var participantsQuantityEl = presentationsEl.querySelector("[data-participants-quantity=\"".concat(e.target.dataset.presentation, "\"]"));
            participantsQuantityEl.textContent = +participantsQuantityEl.textContent + 1;
          } else {
            presentaionFailEl.classList.remove('hidden');
          }
        }
      });
    }
  });
}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*********************************!*\
  !*** ./resources/js/profile.js ***!
  \*********************************/
//! Navigation start
var sidebarEl = document.querySelector('[data-id="profile-sidebar"]');
var profileContentEl = document.querySelector('[data-id="profile-content"]');
var request = {
  page: 1,
  type: 'profile'
};
$('#picker').dateTimePicker({
  dateFormat: "YYYY-MM-DD HH:mm",
  locale: 'ru',
  showTime: true,
  selectData: "now",
  positionShift: {
    top: 20,
    left: 0
  },
  title: "Select Date and Time",
  buttonTitle: "Select"
});
var fileInputEl = document.querySelector('#presentation');
var fileViewEl = document.querySelector('[data-id="presentation"]');

if (fileInputEl) {
  fileInputEl.onchange = function () {
    fileViewEl.value = fileInputEl.value;
  };

  presentation();
}

function fetch_data(page, type) {
  $.ajax({
    url: "/profile/fetch_data?page=" + page + "&type=" + type,
    success: function success(response) {
      profileContentEl.innerHTML = response;
      window.scroll(0, 270);

      if (type == 'presentation') {
        $('#picker').dateTimePicker({
          dateFormat: "YYYY-MM-DD HH:mm",
          locale: 'ru',
          showTime: true,
          selectData: "now",
          positionShift: {
            top: 20,
            left: 0
          },
          title: "Select Date and Time",
          buttonTitle: "Select"
        });

        var _fileInputEl = profileContentEl.querySelector('#presentation');

        var _fileViewEl = profileContentEl.querySelector('[data-id="presentation"]');

        _fileInputEl.onchange = function () {
          _fileViewEl.value = _fileInputEl.value;
        };

        presentation();
      }
    }
  });
}

function presentation() {
  var presentationFormEl = profileContentEl.querySelector('[data-id="presentation_form"]');
  presentationFormEl.addEventListener('click', function (e) {
    if (e.target.dataset.id == 'submit_btn') {
      e.preventDefault(); // Form validation

      var fieldEls = presentationFormEl.querySelectorAll('[data-type="field"]');
      var valid = true;
      fieldEls.forEach(function (field) {
        if (field.value == '' || field.value == 'Не выбрано') {
          field.classList.add('invalid');
          valid = false;
        } else {
          field.classList.remove('invalid');
        }
      });

      if (!valid) {
        window.scroll(0, 450);
        return;
      }

      $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        url: '/presentation/store',
        data: new FormData(presentationFormEl),
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function success(response) {
          if (response == 'success') {
            var successModalEl = profileContentEl.querySelector('[data-id="presentation__success-modal"]');
            successModalEl.classList.remove('hidden');
            successModalEl.addEventListener('click', function (e) {
              if (e.target.dataset.id == 'presentation-success__ok-btn' || e.target.dataset.id == 'presentation-success__close-btn') {
                successModalEl.classList.add('hidden');
                presentationFormEl.reset();
              }
            });
          } else {
            var failModalEl = profileContentEl.querySelector('[data-id="presentation__fail-modal"]');
            failModalEl.classList.remove('hidden');
            failModalEl.addEventListener('click', function (e) {
              if (e.target.dataset.id == 'presentation-fail__ok-btn' || e.target.dataset.id == 'presentation-fail__close-btn') {
                failModalEl.classList.add('hidden');
              }
            });
          }
        }
      });
    }
  });
}

if (sidebarEl) {
  var linkEls = sidebarEl.querySelectorAll('[data-type="link"]');
  sidebarEl.addEventListener('click', function (e) {
    if (e.target.dataset.id == 'profile') {
      e.preventDefault(); // Remove active

      linkEls.forEach(function (linkEl) {
        if (linkEl.classList.contains('active')) {
          linkEl.classList.remove('active');
          return;
        }
      }); // Add active

      e.target.classList.add('active'); // Send ajax

      var type = e.target.dataset.id;
      request.type = type;
      var page = 1;
      fetch_data(page, type);
    } else if (e.target.dataset.id == 'members') {
      e.preventDefault(); // Remove active

      linkEls.forEach(function (linkEl) {
        if (linkEl.classList.contains('active')) {
          linkEl.classList.remove('active');
          return;
        }
      }); // Add active

      e.target.classList.add('active'); // Send ajax

      var _type = e.target.dataset.id;
      request.type = _type;
      var _page = 1;
      fetch_data(_page, _type);
    } else if (e.target.dataset.id == 'read_books') {
      e.preventDefault(); // Remove active

      linkEls.forEach(function (linkEl) {
        if (linkEl.classList.contains('active')) {
          linkEl.classList.remove('active');
          return;
        }
      }); // Add active

      e.target.classList.add('active'); // Send ajax

      var _type2 = e.target.dataset.id;
      request.type = _type2;
      var _page2 = 1;
      fetch_data(_page2, _type2);
    } else if (e.target.dataset.id == 'activities') {
      e.preventDefault(); // Remove active

      linkEls.forEach(function (linkEl) {
        if (linkEl.classList.contains('active')) {
          linkEl.classList.remove('active');
          return;
        }
      }); // Add active

      e.target.classList.add('active'); // Send ajax

      var _type3 = e.target.dataset.id;
      request.type = _type3;
      var _page3 = 1;
      fetch_data(_page3, _type3);
    } else if (e.target.dataset.id == 'presentation') {
      e.preventDefault(); // Remove active

      linkEls.forEach(function (linkEl) {
        if (linkEl.classList.contains('active')) {
          linkEl.classList.remove('active');
          return;
        }
      }); // Add active

      e.target.classList.add('active'); // Send ajax

      var _type4 = e.target.dataset.id;
      request.type = _type4;
      var _page4 = 1;
      fetch_data(_page4, _type4);
    } else if (e.target.dataset.id == 'booked_books') {
      e.preventDefault(); // Remove active

      linkEls.forEach(function (linkEl) {
        if (linkEl.classList.contains('active')) {
          linkEl.classList.remove('active');
          return;
        }
      }); // Add active

      e.target.classList.add('active'); // Send ajax

      var _type5 = e.target.dataset.id;
      request.type = _type5;
      var _page5 = 1;
      fetch_data(_page5, _type5);
    } else if (e.target.dataset.id == 'liked_books') {
      e.preventDefault(); // Remove active

      linkEls.forEach(function (linkEl) {
        if (linkEl.classList.contains('active')) {
          linkEl.classList.remove('active');
          return;
        }
      }); // Add active

      e.target.classList.add('active'); // Send ajax

      var _type6 = e.target.dataset.id;
      request.type = _type6;
      var _page6 = 1;
      fetch_data(_page6, _type6);
    }
  });
  profileContentEl.addEventListener('click', function (e) {
    if (e.target.className == 'page-link') {
      e.preventDefault();
      var page = e.target.href.split('page=')[1];
      request.page = page;
      var type = request.type;
      fetch_data(page, type);
    }
  });
} //! Navigation end
//! Avatar change form start


var avatarFormEl = document.querySelector('[data-id="avatar-form"]');

if (avatarFormEl) {
  var avatarInputEl = avatarFormEl.querySelector('#avatar');
  var avatarModalEl = document.querySelector('[data-id="avatar-modal"]');

  avatarInputEl.onchange = function () {
    avatarModalEl.classList.remove('hidden');
  };

  avatarModalEl.addEventListener('click', function (e) {
    if (e.target.dataset.id == 'avatar__cancel-btn' || e.target.dataset.id == 'avatar__close-btn') {
      avatarInputEl.value = '';
      avatarModalEl.classList.add('hidden');
    }
  });
} //! Avatar change form end
//! Edit form start


var errorListEl = document.querySelector('[data-id="error_list"]');

if (errorListEl) {
  errorListEl.onclick = function () {
    errorListEl.classList.add('visually-hidden');
  };
} //! Edit form start
//! Password form start


var passwordFormEl = document.querySelector('[data-id="password-form"]');

if (passwordFormEl) {
  var passwordEl = passwordFormEl.querySelector('#password');
  var newPasswordEl = passwordFormEl.querySelector('#new-password');
  var confirmPasswordEl = passwordFormEl.querySelector('#confirm-password');
  var passwordSuccessEl = passwordFormEl.querySelector('[data-id="password-success"]');
  passwordFormEl.addEventListener('click', function (e) {
    if (e.target.dataset.id == 'password-icon') {
      if (e.target.textContent == 'visibility') {
        e.target.textContent = 'visibility_off';
        passwordEl.type = 'text';
      } else {
        e.target.textContent = 'visibility';
        passwordEl.type = 'password';
      }
    } else if (e.target.dataset.id == 'new-password-icon') {
      if (e.target.textContent == 'visibility') {
        e.target.textContent = 'visibility_off';
        newPasswordEl.type = 'text';
      } else {
        e.target.textContent = 'visibility';
        newPasswordEl.type = 'password';
      }
    } else if (e.target.dataset.id == 'confirm-password-icon') {
      if (e.target.textContent == 'visibility') {
        e.target.textContent = 'visibility_off';
        confirmPasswordEl.type = 'text';
      } else {
        e.target.textContent = 'visibility';
        confirmPasswordEl.type = 'password';
      }
    } else if (e.target.dataset.id == 'password-submit-btn') {
      e.preventDefault();
      var password = passwordEl.value;
      var passwordError = passwordFormEl.querySelector('[data-id="password-error"]');
      var newPassword = newPasswordEl.value;
      var newPasswordError = passwordFormEl.querySelector('[data-id="new-password-error"]');
      var confirmPassword = confirmPasswordEl.value;
      var confirmPasswordError = passwordFormEl.querySelector('[data-id="confirm-password-error"]'); // Validation

      if (password.length < 4) {
        passwordError.textContent = 'Поле пароль должен быть не меньше 4 символов.';
        return;
      } else {
        passwordError.textContent = '';
      }

      if (newPassword.length < 4) {
        newPasswordError.textContent = 'Поле пароль должен быть не меньше 4 символов.';
        return;
      } else {
        newPasswordError.textContent = '';
      }

      if (confirmPassword.length < 4) {
        confirmPasswordError.textContent = 'Поле пароль должен быть не меньше 4 символов.';
        return;
      } else {
        confirmPasswordError.textContent = '';
      } //Send ajax request


      $.ajax({
        url: "/profile/update_password?password=" + password + "&newpassword=" + newPassword + "&confirmpassword=" + confirmPassword,
        success: function success(response) {
          if (response == 'passwordNotMatched') {
            passwordError.textContent = 'Неправильный пароль попробуйте ещё.';
          } else if (response == 'newPasswordDoesntMatch') {
            newPasswordError.textContent = 'Пароли не совпадают.';
            confirmPasswordError.textContent = 'Пароли не совпадают.';
          } else if (response == 'success') {
            passwordSuccessEl.classList.remove('hidden');
          }
        }
      });
    } else if (e.target.dataset.id == 'password__ok-btn' || e.target.dataset.id == 'password__close-btn') {
      passwordFormEl.reset();
      passwordSuccessEl.classList.add('hidden');
    }
  });
} //! Password form end
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!********************************!*\
  !*** ./resources/js/rating.js ***!
  \********************************/
var ratingTypesEl = document.querySelector('[data-id="rating-types"]');

if (ratingTypesEl) {
  var fetch_data = function fetch_data(page, type) {
    $.ajax({
      url: "/rating/fetch_data?page=" + page + "&type=" + type,
      success: function success(response) {
        var ratingViewEl = document.querySelector('[data-id="p-content"]');
        ratingViewEl.innerHTML = response;
      }
    });
  };

  var ratingLinkEls = ratingTypesEl.querySelectorAll('[data-type="rating-link"]');
  var ratingViewEl = document.querySelector('[data-id="p-content"]');
  var request = {
    type: 'most_active_reader'
  };
  ratingTypesEl.addEventListener('click', function (e) {
    if (e.target.dataset.id == 'most-active-reader') {
      e.preventDefault();
      ratingLinkEls.forEach(function (el) {
        el.classList.remove('active');
      });
      e.target.classList.add('active');
      var type = 'most_active_reader';
      var page = 1;
      request.type = type;
      fetch_data(page, type);
    } else if (e.target.dataset.id == 'most-reading-company') {
      e.preventDefault();
      ratingLinkEls.forEach(function (el) {
        el.classList.remove('active');
      });
      e.target.classList.add('active');
      var _type = 'most_reading_company';
      var _page = 1;
      request.type = _type;
      fetch_data(_page, _type);
    } else if (e.target.dataset.id == 'most-disciplined-reader') {
      e.preventDefault();
      ratingLinkEls.forEach(function (el) {
        el.classList.remove('active');
      });
      e.target.classList.add('active');
      var _type2 = 'most_disciplined_reader';
      var _page2 = 1;
      request.type = _type2;
      fetch_data(_page2, _type2);
    } else if (e.target.dataset.id == 'most-popular-book') {
      e.preventDefault();
      ratingLinkEls.forEach(function (el) {
        el.classList.remove('active');
      });
      e.target.classList.add('active');
      var _type3 = 'most_popular_book';
      var _page3 = 1;
      request.type = _type3;
      fetch_data(_page3, _type3);
    } else if (e.target.dataset.id == 'most-proactive-member') {
      e.preventDefault();
      ratingLinkEls.forEach(function (el) {
        el.classList.remove('active');
      });
      e.target.classList.add('active');
      var _type4 = 'most_proactive_member';
      var _page4 = 1;
      request.type = _type4;
      fetch_data(_page4, _type4);
    }
  });
  ratingViewEl.addEventListener('click', function (e) {
    if (e.target.className == 'page-link') {
      e.preventDefault();
      var page = e.target.href.split('page=')[1];
      var type = request.type;
      fetch_data(page, type);
    }
  });
}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*******************************!*\
  !*** ./resources/js/rules.js ***!
  \*******************************/

})();

/******/ })()
;