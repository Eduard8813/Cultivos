  const emailInput = document.getElementById('email');
   const passwordInput = document.getElementById('password');
   const submitBtn = document.getElementById('submitBtn');

   function validateInputs() {
    const emailFilled = emailInput.value.trim() !== '';
    const passwordFilled = passwordInput.value.trim() !== '';
    if (emailFilled && passwordFilled) {
     submitBtn.disabled = false;
     submitBtn.classList.remove('cursor-not-allowed', 'opacity-50');
     submitBtn.classList.add('hover:bg-pink-800');
    } else {
     submitBtn.disabled = true;
     submitBtn.classList.add('cursor-not-allowed', 'opacity-50');
     submitBtn.classList.remove('hover:bg-pink-800');
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