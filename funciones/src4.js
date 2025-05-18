 // Create raindrops dynamically
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

    // Optional: Change rain intensity or style every 10 seconds
    setInterval(() => {
      raindrops.forEach(drop => {
        drop.style.opacity = 0.3 + Math.random() * 0.7;
        drop.style.animationDuration = 0.4 + Math.random() * 0.8 + 's';
      });
    }, 10000);

    // Animate gota image size changing every 10 seconds
    const gotaImagen = document.getElementById('gotaImagen');
    let isLarge = false;
    setInterval(() => {
      if (isLarge) {
        gotaImagen.style.width = '100px';
        gotaImagen.style.height = 'auto';
      } else {
        gotaImagen.style.width = '100px';
        gotaImagen.style.height = 'auto';
      }
      isLarge = !isLarge;
    }, 1000);

    const form = document.getElementById('multiStepForm');
    const steps = form.querySelectorAll('.step');
    let currentStep = 0;

    const fechaInput = document.getElementById('fecha');
    const fechaDisplay = document.getElementById('fecha-display');

    fechaInput?.addEventListener('input', () => {
      if (fechaInput.value) {
        const date = new Date(fechaInput.value);
        if (!isNaN(date)) {
          const options = { year: 'numeric', month: 'long', day: 'numeric' };
          fechaDisplay.textContent = date.toLocaleDateString('es-ES', options);
        } else {
          fechaDisplay.textContent = '';
        }
      } else {
        fechaDisplay.textContent = '';
      }
    });

    function validateStep(stepIndex) {
      const step = steps[stepIndex];
      const inputs = step.querySelectorAll('input[required]');
      let valid = true;
      inputs.forEach(input => {
        if (!input.value.trim()) {
          valid = false;
        }
      });
      return valid;
    }

    function showError(stepIndex, show) {
      const error = document.getElementById(`error-step-${stepIndex + 1}`);
      if (error) {
        error.style.display = show ? 'block' : 'none';
      }
    }

    function showStep(stepIndex) {
      steps.forEach((step, i) => {
        step.classList.toggle('active', i === stepIndex);
        showError(i, false);
      });
    }

    function nextStep() {
      if (validateStep(currentStep)) {
        currentStep++;
        if (currentStep >= steps.length) {
          currentStep = steps.length - 1;
        }
        showStep(currentStep);
      } else {
        showError(currentStep, true);
      }
    }

    function prevStep() {
      currentStep--;
      if (currentStep < 0) currentStep = 0;
      showStep(currentStep);
    }

    form.addEventListener('submit', (e) => {
      e.preventDefault();
      if (validateStep(currentStep)) {
        alert('Formulario enviado correctamente!');
        form.reset();
        fechaDisplay.textContent = '';
        currentStep = 0;
        showStep(currentStep);
      } else {
        showError(currentStep, true);
      }
    });

    // Initialize first step visible
    showStep(currentStep);