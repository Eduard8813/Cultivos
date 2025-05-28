document.addEventListener('DOMContentLoaded', () => {
    const loginBtn = document.getElementById('login-btn');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');

    if (!loginBtn || !emailInput || !passwordInput) {
        console.error("Error: No se encontraron elementos en el DOM.");
        return;
    }

    function validateInputs() {
        const emailFilled = emailInput.value.trim() !== '';
        const passwordFilled = passwordInput.value.trim() !== '';

        if (emailFilled && passwordFilled) {
            loginBtn.classList.remove('cursor-not-allowed', 'opacity-50');
            loginBtn.classList.add('hover:bg-pink-800');
        } else {
            loginBtn.classList.add('cursor-not-allowed', 'opacity-50');
            loginBtn.classList.remove('hover:bg-pink-800');
        }
    }

    emailInput.addEventListener('input', validateInputs);
    passwordInput.addEventListener('input', validateInputs);

    function validar() {
        if (emailInput.value.trim() === '' || passwordInput.value.trim() === '') {
            alert('Por favor, ingresa ambos campos');
            return false;
        }

        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value)) {
            alert('Por favor, ingresa un correo electrónico válido.');
            return false;
        }

        const formData = new FormData();
        formData.append('email', emailInput.value);
        formData.append('password', passwordInput.value);
        formData.append("login", true);

       fetch('../backend/login.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())  // Usa .text() en lugar de .json() para ver el contenido real
        .then(data => {
            console.log("Respuesta del servidor:", data); // Ver qué realmente devuelve el servidor
            try {
                const jsonData = JSON.parse(data); // Convertir manualmente a JSON
                if (jsonData.redirect) {
                    window.location.href = jsonData.redirect;
                } else {
                    alert("Error: " + jsonData.error);
                }
            } catch (error) {
                console.error("Error al analizar JSON:", error);
                alert("Respuesta del servidor no válida.");
            }
        })
        .catch(error => {
            console.error("Error en la petición:", error);
            alert("Hubo un error con el servidor.");
        });

        return true;
    }

    loginBtn.addEventListener('click', validar);
});
