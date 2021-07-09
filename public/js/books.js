document.addEventListener("DOMContentLoaded", function () {
   function fetch_data(page, sortBy, sortType) {
      $.ajax({
         url: "/pagination/fetch_data?page="+page+"&sortby="+sortBy+"&sorttype="+sortType,

         success:function(response) {
            $('tbody').html('');
            $('tbody').html(response);
         }
      })
   }

   document.querySelector('#table').addEventListener('click', (evt) => {
      if (evt.target.className == 'sorting') {
         var columnName =  evt.target.dataset.columnName;
         var orderType = evt.target.dataset.sortingType;
         var reversOrder = '';
         if (orderType == 'asc') {
            evt.target.dataset.sortingType = 'desc';
            reversOrder = 'desc';
            evt.target.querySelector('span').textContent = 'arrow_drop_down';
         }
         if (orderType == 'desc') {
            evt.target.dataset.sortingType = 'asc';
            reversOrder = 'asc';
            evt.target.querySelector('span').textContent = 'arrow_drop_up';
         }
         document.querySelector('#hidden-column-name').value = columnName;
         document.querySelector('#hidden-sort-type').value = reversOrder;
         const page = document.querySelector('#hidden-page').value;
         fetch_data(page, columnName, reversOrder);
      }
   });

   $(document).on('click', '.pagination a', function(evt){
      evt.preventDefault();
      const page = $(this).attr('href').split("page=")[1];
      $('#hidden-page').val(page);
      const columnName = document.querySelector('#hidden-column-name').value;
      const sortType = document.querySelector('#hidden-sort-type').value;
      fetch_data(page, columnName, sortType);
   });

});