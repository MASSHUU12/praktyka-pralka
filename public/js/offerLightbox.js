let slideIndex = 1;
showSlideLightbox(slideIndex);

function openLightbox() {
  document.getElementById('lightbox').style.display = 'block';
};

function closeLightbox() {
  document.getElementById('lightbox').style.display = 'none';
};

function changeSlideLightbox(n) {
  showSlideLightbox(slideIndex += n);
};

function toSlideLightbox(n) {
  showSlideLightbox(slideIndex = n);
};

function showSlideLightbox(n) {
  const slides = document.getElementsByClassName('lightbox-slide');
  let modalPreviews = document.getElementsByClassName('lightbox-modal-preview');

  if (n > slides.length) {
    slideIndex = 1;	
  };
  
  if (n < 1) {
    slideIndex = slides.length;
  };

  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  };
  
  for (let i = 0; i < modalPreviews.length; i++) {
    modalPreviews[i].className = modalPreviews[i].className.replace('active', '');
  };
  
  slides[slideIndex - 1].style.display = 'block';
  modalPreviews[slideIndex - 1].className += 'active';
};

$(document).on(
  'keydown',
  function(event) {
    if(event.key == "Escape") {
      closeLightbox();
    }
  });