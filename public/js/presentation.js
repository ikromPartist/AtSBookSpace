const presentationsEl = document.querySelector('[data-id="presentations"]');
const presentationSuccessEl = document.querySelector('[data-id="presentation-success"]');
const presentaionFailEl = document.querySelector('[data-id="presentation-fail"]');

presentationSuccessEl.addEventListener('click', e => {
   if (e.target.dataset.id == 'presentation-success__ok-btn' || e.target.dataset.id == 'presentation-success__close-btn') {
      presentationSuccessEl.classList.add('hidden');
   }
});
presentaionFailEl.addEventListener('click', e => {
   if (e.target.dataset.id == 'presentation-fail__ok-btn' || e.target.dataset.id == 'presentation-fail__close-btn') {
      presentaionFailEl.classList.add('hidden');
   }
});
presentationsEl.addEventListener('click', e => {
   if (e.target.dataset.type == 'participate') {
      e.preventDefault();
      $.ajax({
         url: `/presentation/participation?presentation=${e.target.dataset.presentation}`,
         success:function(response) {
            if (response == 'success') {
               presentationSuccessEl.classList.remove('hidden');
               const participantsQuantityEl = presentationsEl.querySelector(`[data-participants-quantity="${e.target.dataset.presentation}"]`);
               participantsQuantityEl.textContent = +participantsQuantityEl.textContent + 1;
            } else {
               presentaionFailEl.classList.remove('hidden');
            }
         }
      });
   }
}); 
