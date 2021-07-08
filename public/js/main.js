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
   window.scrollTo({ top: 0, behavior: "smooth" });
})
// ! main-header start
const searchForm = document.querySelector('.main-search');
const searchInput = searchForm.querySelector('#main-search__input');
searchInput.onfocus = (evt) => {
   evt.preventDefault();
   searchForm.classList.add('onfocus');
   searchInput.classList.add('onfocus');
}
searchInput.onblur = (evt) => {
   evt.preventDefault();
   searchForm.classList.remove('onfocus');
   searchInput.classList.remove('onfocus');
}
// ! main-header end