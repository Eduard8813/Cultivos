const form = document.getElementById('recoverForm');
    const emailInput = form.email;
    const errorMessage = document.getElementById('error-message');
    const successMessage = document.getElementById('success-message');

    function validateEmail(email) {
      // Simple email regex validation
      const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return re.test(email);
    }

    form.addEventListener('submit', (e) => {
      e.preventDefault();
      errorMessage.style.display = 'none';
      successMessage.style.display = 'none';

      const emailValue = emailInput.value.trim();
      if (emailValue === '') {
        errorMessage.textContent = 'El campo correo electrónico es obligatorio.';
        errorMessage.style.display = 'block';
        return;
      }

      if (!validateEmail(emailValue)) {
        errorMessage.textContent = 'Por favor, ingrese un correo válido.';
        errorMessage.style.display = 'block';
        return;
      }

      // Simulate sending recovery email
      successMessage.style.display = 'block';
      form.reset();
    });