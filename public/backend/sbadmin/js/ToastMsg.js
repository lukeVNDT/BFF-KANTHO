function toast ({
    title = '',
    message = '',
    type = 'info',
    duration = 3000
}) {
  const main = document.getElementById('toast');
  const icons = {
    success: 'bx bxs-check-circle bx-tada',
    info: 'fas fa-info-circle',
    warning: 'fas fa-info-circle',
    error: 'bx bxs-error bx-tada'
  }
  const icon = icons[type];
  const delay = (duration /1000).toFixed(2);
  if(main){
    const toast = document.createElement('div');

    //auto remove toast 
    const autoRemoveId = setTimeout(function(){
      main.removeChild(toast);
    }, duration + 1000);

    //remove toast when user click
    toast.onclick = function(e){
      if (e.target.closest('.toast__close')) {
        main.removeChild(toast);
        clearTimeout(autoRemoveId);
      }
    }
    toast.classList.add('toastMsg',`toast--${type}`);
    toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;
    toast.innerHTML = `
    <div class='card__toast'>
      <div class="toast__icon">
    <i class="${icon}"></i>
  </div>
  </div>
  <div class="toast__body">
    <h3 class="toast__title">${title}</h3>
    <p class="toast__msg">${message}</p>
  </div>
  <div class="toast__close">
    <i class="fas fa-times"></i>
  </div>`;
    main.appendChild(toast);
  }
 };

 function alert({
    title = '',
    message = '',
    type = 'info'
 }) {
  const main  = document.getElementById('CustomAlert');
  const icons = {
    success: 'fas fa-check-circle',
    info: 'fas fa-info-circle',
    warning: 'fas fa-info-circle',
    error: 'fas fa-exclamation-triangle'
  }
  const icon = icons[type];
  if(main)
  {
    const alert = document.createElement('div');
    alert.classList.add('popup');
    const maincontent = document.createElement('div');
    maincontent.classList.add('popup-container');
    maincontent.innerHTML = `
     <a class="close">&times;</a>
    <div class="popup--icon">
      <i class="${icon}"></i>
    </div>
    <h3>${title}</h3>
    <p>${message}</p>`;
    alert.appendChild(maincontent);
    main.appendChild(alert);
  }
 }