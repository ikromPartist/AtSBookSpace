const scrollTopBtn = document.querySelector('.scroll-top-button');
window.addEventListener('scroll', () => {
   if (window.pageYOffset > 100) {
      scrollTopBtn.classList.add('active');
   } else {
      scrollTopBtn.classList.remove('active');
      scrollTopBtn.classList.remove('click');
   }
})
scrollTopBtn.addEventListener('click', () => {
   scrollTopBtn.classList.add('click');
   window.scrollTo({ top: 0, behavior: 'smooth' });
})
//! header start
// catalog 
const catalogBtn = document.querySelector('.catalog__button');
const catalogList = document.querySelector('.catalog__list');
const catalogIcon = catalogBtn.querySelector('.catalog__dropdown-icon');
catalogBtn.onclick = (evt) => {
   evt.preventDefault();
  
   catalogList.classList.toggle('hidden');
   
   if (catalogIcon.textContent == 'arrow_drop_down') {
      catalogIcon.textContent = 'arrow_drop_up';
   } else {
      catalogIcon.textContent = 'arrow_drop_down';
   }
}
// search
const searchForm = document.querySelector('.search');
const searchBtn = searchForm.querySelector('.search__button');
const searchInput = searchForm.querySelector('.search__input');
searchBtn.addEventListener('click', (evt) => {
   searchForm.classList.remove('hidden');
   if (searchBtn.type == 'button') {
      evt.preventDefault();
      searchBtn.type = 'submit';
      searchInput.focus();
   } 
})
//! header end
