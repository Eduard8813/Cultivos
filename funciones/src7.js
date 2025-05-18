// Background image animation
   const bgContainer = document.getElementById('background-container');
   const images = bgContainer.querySelectorAll('img');
   let currentIndex = 0;

   setInterval(() => {
     images[currentIndex].classList.remove('active');
     currentIndex = (currentIndex + 1) % images.length;
     images[currentIndex].classList.add('active');
   }, 5000);

   // Set random values for Humedad and Temperatura continuously
   function getRandomInt(min, max) {
     return Math.floor(Math.random() * (max - min + 1)) + min;
   }

   function updateValues() {
     const humedadValue = document.getElementById('humedad-value');
     const temperaturaValue = document.getElementById('temperatura-value');
     humedadValue.textContent = getRandomInt(30, 90);
     temperaturaValue.textContent = getRandomInt(10, 40);
   }

   setInterval(updateValues, 1500);
   updateValues();