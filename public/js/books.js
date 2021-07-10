//! books ordering start
let request = {
   page: 1,
   orderBy: 'title',
   orderType: 'asc',
};

function fetch_data(page, orderBy, orderType) {
   $.ajax({
      url: "/books/fetch_data?page="+page+"&orderby="+orderBy+"&ordertype="+orderType,

      success:function(response) {
         $('tbody').html(response);
      }
   })
}

document.querySelector('main').addEventListener('click', (evt) => {
   if (evt.target.className == 'sorting') {
      const orderBy =  evt.target.dataset.orderName;
      const orderType = evt.target.dataset.orderType;
      let reverseOrder = '';
      if (orderType == 'asc') {
         evt.target.dataset.orderType = 'desc';
         reverseOrder = 'desc';
         evt.target.querySelector('span').textContent = 'arrow_drop_down';
      }
      if (orderType == 'desc') {
         evt.target.dataset.orderType = 'asc';
         reverseOrder = 'asc';
         evt.target.querySelector('span').textContent = 'arrow_drop_up';
      }
      const page = request.page;
      request.orderBy = orderBy;
      request.orderType = reverseOrder;
      fetch_data(page, orderBy, reverseOrder);
   }
   if (evt.target.className == 'page-link') {
      evt.preventDefault();

      const page = evt.target.href.split('page=')[1];
      request.page = page;
      const orderBy = request.orderBy;
      const orderType = request.orderType;
      fetch_data(page, orderBy, orderType);
   }
});
//! books ordering end

