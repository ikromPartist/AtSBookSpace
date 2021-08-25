const activitiesEl = document.querySelector('[data-id="activities"]');
const activitySuccessEl = document.querySelector('[data-id="activity-success"]');
const activityFailEl = document.querySelector('[data-id="activity-fail"]');

activitySuccessEl.addEventListener('click', e => {
   if (e.target.dataset.id == 'activity-success__ok-btn' || e.target.dataset.id == 'activity-success__close-btn') {
      activitySuccessEl.classList.add('hidden');
   }
});
activityFailEl.addEventListener('click', e => {
   if (e.target.dataset.id == 'activity-fail__ok-btn' || e.target.dataset.id == 'activity-fail__close-btn') {
      activityFailEl.classList.add('hidden');
   }
});
activitiesEl.addEventListener('click', e => {
   if (e.target.dataset.type == 'participate') {
      e.preventDefault();
      $.ajax({
         url: `/activities/participation?activity=${e.target.dataset.activity}`,
         success: function (response) {
            if (response == 'success') {
               activitySuccessEl.classList.remove('hidden');
               const participantsQuantityEl = activitiesEl.querySelector(`[data-participants-quantity="${e.target.dataset.activity}"]`);
               participantsQuantityEl.textContent = +participantsQuantityEl.textContent + 1;
            } else {
               activityFailEl.classList.remove('hidden');
            }
         }
      });
   }
});