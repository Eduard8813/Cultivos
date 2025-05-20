document.addEventListener('DOMContentLoaded', () => {
    const loginBtn = document.getElementById('login-btn');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');

    // Validación de entrada
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

    // Animación de gotas
    const dropsContainer = document.getElementById('drops-container');
    const animations = ['drop-fall-1', 'drop-fall-2', 'drop-fall-3'];
    let currentAnimationIndex = 0;

    function generateDrops() {
        for (let i = 1; i <= 20; i++) {
            const drop = document.createElement('div');
            drop.className = 'drop';
            drop.style.left = `${Math.random() * 100}%`;
            drop.style.animationDuration = `${1 + Math.random()}s`;
            dropsContainer.appendChild(drop);
        }
    }

    function cycleAnimations() {
        const drops = document.querySelectorAll('#drops-container .drop');
        drops.forEach(drop => {
            drop.style.animationName = animations[currentAnimationIndex];
            drop.style.animationPlayState = 'running';
        });
        currentAnimationIndex = (currentAnimationIndex + 1) % animations.length;
    }

    generateDrops();
    cycleAnimations();
    setInterval(cycleAnimations, 10000);

    // Función para validar el formulario y hacer la petición al backend
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
        .then(response => response.json())
        .then(data => {
            console.log("Servidor:", data);

            if (data.Respuesta === 'Login successful') {
                window.location.href = 'general.php';
            } else {
                alert('Email o contraseña incorrecta');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Hubo un error con el servidor. Inténtalo de nuevo más tarde.');
        });

        return true;
    }

    loginBtn.addEventListener('click', validar);
});
