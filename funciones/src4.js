// Creación dinámica de gotas de lluvia
const rainContainer = document.getElementById('rainContainer');
const raindropCount = 100;
let raindrops = [];

function createRaindrop() {
    const drop = document.createElement('div');
    drop.classList.add('raindrop');
    drop.style.left = Math.random() * 100 + 'vw';
    drop.style.animationDuration = 0.5 + Math.random() * 0.7 + 's';
    drop.style.animationDelay = Math.random() * 10 + 's';
    drop.style.height = 10 + Math.random() * 10 + 'px';
    drop.style.width = 1 + Math.random() * 2 + 'px';
    rainContainer.appendChild(drop);
    raindrops.push(drop);
}

for (let i = 0; i < raindropCount; i++) {
    createRaindrop();
}

// Ajustes dinámicos en la intensidad de la lluvia
setInterval(() => {
    raindrops.forEach(drop => {
        drop.style.opacity = 0.3 + Math.random() * 0.7;
        drop.style.animationDuration = 0.4 + Math.random() * 0.8 + 's';
    });
}, 10000);

// Animación del tamaño de la imagen de la gota
const gotaImagen = document.getElementById('gotaImagen');
let isLarge = false;
setInterval(() => {
    gotaImagen.style.width = isLarge ? '100px' : '120px';
    gotaImagen.style.height = 'auto';
    isLarge = !isLarge;
}, 1000);

// Lógica del formulario con múltiples pasos
const form = document.getElementById('multiStepForm');
const steps = form.querySelectorAll('.step');
let currentStep = 0;

function validateStep(stepIndex) {
    const step = steps[stepIndex];
    const inputs = step.querySelectorAll('input[required]');
    return [...inputs].every(input => input.value.trim() !== '');
}

function showError(stepIndex, show) {
    const error = document.getElementById(`error-step-${stepIndex + 1}`);
    if (error) error.style.display = show ? 'block' : 'none';
}

function showStep(stepIndex) {
    steps.forEach((step, i) => {
        step.classList.toggle('active', i === stepIndex);
        showError(i, false);
    });
}

function nextStep() {
    if (validateStep(currentStep)) {
        currentStep = Math.min(currentStep + 1, steps.length - 1);
        showStep(currentStep);
    } else {
        showError(currentStep, true);
    }
}

function prevStep() {
    currentStep = Math.max(currentStep - 1, 0);
    showStep(currentStep);
}

// Envío del formulario y redirección tras éxito
form.addEventListener('submit', async (e) => {
    e.preventDefault(); // Evita la recarga de la página
    const formData = new FormData(form);

    try {
        const response = await fetch('../backend/registro.php', {
            method: 'POST',
            body: formData
        });

        const data = await response.json();
        if (data.Respuesta === 'Registro exitoso') {
            alert('Registro exitoso');
            window.location.href = "../inicio/sesion.php";
        } else {
            alert(data.Respuesta);
        }
    } catch (error) {
        console.error('Error en el registro:', error);
    }
});

// Actualización dinámica de fecha
const fechaInput = document.getElementById('fecha');
const fechaDisplay = document.getElementById('fecha-display');

fechaInput?.addEventListener('input', () => {
    if (fechaInput.value) {
        const date = new Date(fechaInput.value);
        fechaDisplay.textContent = isNaN(date) ? '' : date.toLocaleDateString('es-ES', { year: 'numeric', month: 'long', day: 'numeric' });
    } else {
        fechaDisplay.textContent = '';
    }
});
