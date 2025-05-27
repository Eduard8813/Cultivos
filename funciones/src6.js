 // Background image animation
   const bgContainer = document.getElementById('background-container');
   const images = bgContainer.querySelectorAll('img');
   let currentIndex = 0;

   setInterval(() => {
     images[currentIndex].classList.remove('active');
     currentIndex = (currentIndex + 1) % images.length;
     images[currentIndex].classList.add('active');
   }, 5000);
    console.log("src6.js cargado correctamente");

  function enviarPiña() {
    console.log("Enviando datos...");

    fetch('../backend/Seleccion.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({ cultivo: "Piña" }) // Cambié 'fruta' a 'cultivo' para que coincida con la DB
    })
    .then(response => response.json())
    .then(data => {
        console.log("Respuesta del servidor:", data);
        alert(data.Respuesta);
    })
    .catch(error => console.error('Error:', error));
}


