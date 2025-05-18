 // Background image animation
   const bgContainer = document.getElementById('background-container');
   const images = bgContainer.querySelectorAll('img');
   let currentIndex = 0;

   setInterval(() => {
     images[currentIndex].classList.remove('active');
     currentIndex = (currentIndex + 1) % images.length;
     images[currentIndex].classList.add('active');
   }, 5000);