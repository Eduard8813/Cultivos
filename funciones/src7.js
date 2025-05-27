// Animación de fondo
const bgContainer = document.getElementById('background-container');
const images = bgContainer.querySelectorAll('img');
let currentIndex = 0;

setInterval(() => {
    images[currentIndex].classList.remove('active');
    currentIndex = (currentIndex + 1) % images.length;
    images[currentIndex].classList.add('active');
}, 5000);

// Función para obtener datos de temperatura y humedad
function obtenerDatos() {
    fetch('../backend/sensores.php', {
        method: 'GET', // Usar GET para obtener datos
        headers: { 'Content-Type': 'application/json' }
    })
    .then(response => response.json())
    .then(data => {
        console.log(data); // Para depuración
        
        if (data.Respuesta) {
           //  alert(data.Respuesta); // Mostrar mensaje de respuesta
            
            // Mostrar todos los datos de temperatura y humedad
            if (data.data && data.data.length > 0) {
                // Supongamos que solo queremos el primer registro para mostrar
                const item = data.data[0];
                document.getElementById('humedad-value').textContent = item.humidity + '%';
                document.getElementById('temperatura-value').textContent = item.temperature + '°C';
            } else {
                document.getElementById('humedad-value').textContent = "No disponible";
                document.getElementById('temperatura-value').textContent = "No disponible";
            }
        }
    })
    .catch(error => console.error('Error al obtener datos:', error));
}

// Llama a la función para obtener datos al cargar la página
document.addEventListener('DOMContentLoaded', () => {
    obtenerDatos(); // Obtener datos inmediatamente al cargar la página
    
    // Actualizar datos cada 5 segundos (5000 ms)
    setInterval(obtenerDatos, 5000);
});
