const sendButton = document.getElementById('sendButton');
const emailInput = document.getElementById('email');
const errorMessage = document.getElementById('error-message');
const successMessage = document.getElementById('success-message');

sendButton.addEventListener('click', async () => {
  errorMessage.style.display = 'none';
  successMessage.style.display = 'none';

  const emailValue = emailInput.value.trim();

  if (!emailValue.includes('@') || !emailValue.includes('.')) {
    errorMessage.textContent = 'Ingrese un correo válido.';
    errorMessage.style.display = 'block';
    return;
  }

  try {
    const response = await fetch('../backend/password.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: new URLSearchParams({ email: emailValue })
    });

    const responseText = await response.text();
    console.log("Respuesta del servidor:", responseText); // Depuración

    try {
        const data = JSON.parse(responseText); // Intento convertir a JSON
        if (data.success) {
            successMessage.textContent = data.message;
            successMessage.style.display = 'block';

            // Redirigir a otra página después de 2 segundos
            setTimeout(() => {
                window.location.href = "../Inicio/sesion.php"; 
            });
        } else {
            errorMessage.textContent = data.message;
            errorMessage.style.display = 'block';
        }
    } catch (jsonError) {
        console.error("Error al convertir JSON:", jsonError);
        errorMessage.textContent = '❌ Respuesta inválida del servidor.';
        errorMessage.style.display = 'block';
    }
  } catch (error) {
    console.error("Error en la comunicación:", error);
    errorMessage.textContent = '❌ Error al comunicarse con el servidor.';
    errorMessage.style.display = 'block';
  }
});
