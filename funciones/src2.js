   const loginbtn = document.getElementById('login-btn');
   const emailInput = document.getElementById('email');
   const passwordInput = document.getElementById('password');


   function validateInputs() {
    const emailFilled = emailInput.value.trim() !== '';
    const passwordFilled = passwordInput.value.trim() !== '';
    if (emailFilled && passwordFilled) {
     loginbtn.classList.remove('cursor-not-allowed', 'opacity-50');
     loginbtn.classList.add('hover:bg-pink-800');
    } else {
     loginbtn.classList.add('cursor-not-allowed', 'opacity-50');
     loginbtn.classList.remove('hover:bg-pink-800');
    }
   }

   emailInput.addEventListener('input', validateInputs);
   passwordInput.addEventListener('input', validateInputs);

   // Animation code from before
   const drops = document.querySelectorAll('#drops-container .drop');
   const animations = ['drop-fall-1', 'drop-fall-2', 'drop-fall-3'];
   let currentAnimationIndex = 0;

   function setAnimation(animationName) {
    drops.forEach((drop) => {
     drop.style.animationName = animationName;
     drop.style.animationPlayState = 'running';
     drop.classList.add('active');
    });
   }

   function clearAnimation() {
    drops.forEach((drop) => {
     drop.style.animationPlayState = 'paused';
     drop.classList.remove('active');
    });
   }

   function cycleAnimations() {
    clearAnimation();
    setAnimation(animations[currentAnimationIndex]);
    currentAnimationIndex = (currentAnimationIndex + 1) % animations.length;
   }

   // Start first animation immediately
   cycleAnimations();

   // Change animation every 10 seconds
   setInterval(() => {
    cycleAnimations();
   }, 10000);

   // Función para validar campos vacíos en el formulario de inicio de sesión
function validar() {
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');

    if (emailInput.value.trim() === '' || passwordInput.value.trim() === '') {
        alert('Por favor, ingresa ambos campos');
        return false;
    } else {
        const formData = new FormData();
        formData.append('email', emailInput.value);
        formData.append('contraseña', passwordInput.value);
        formData.append("login", true)

        fetch('../backend/login.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                console.log(data)

                if (data.Respuesta === 'Login successful') {
                   alert('Usuario registrado correctamente');
                    window.location.href ='general.php';
                } else {
                    alert('Usuario o contraseña incorrecta');
                }
            })
            .catch(error => console.error(error));
        return true;
    }
}