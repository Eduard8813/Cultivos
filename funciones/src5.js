 // Form validation and submit
const form = document.getElementById("dataForm");
const submitBtn = document.getElementById("submitBtn");
const inputs = form.querySelectorAll("input[required]");

function checkInputs() {
 let allFilled = true;
 inputs.forEach((input) => {
  if (!input.value.trim()) {
   allFilled = false;
  }
 });
 submitBtn.disabled = !allFilled;
}

inputs.forEach((input) => {
 input.addEventListener("input", checkInputs);
});

// Initial check in case of autofill
checkInputs();

function handleSubmit(event) {
 event.preventDefault();
 const ciudad = document.getElementById("ciudad").value.trim();
 const region = document.getElementById("region").value.trim();
 const tamano = document.getElementById("tamano").value.trim();

 if (ciudad && region && tamano) {
  // Redirigir a otra página con los datos en query params
  const params = new URLSearchParams({ ciudad, region, tamano });
  window.location.href = "seleccion.html"
 } else {
  alert("Por favor, completa todos los campos.");
 }
}

// Raindrop animation logic with changing patterns every 5 seconds (faster)
const raindropBg = document.getElementById("raindrop-bg");

// Different raindrop animation sets with bigger sizes and more opacity
const raindropSets = [
 [
  { className: "shape1 fall-fast", size: 40, left: 10, top: -80, delay: 0 },
  { className: "shape2 fall-medium", size: 50, left: 30, top: -80, delay: 150 },
  { className: "shape3 fall-slow", size: 36, left: 50, top: -80, delay: 300 },
  { className: "shape1 fall-fast", size: 44, left: 70, top: -80, delay: 450 },
  { className: "shape2 fall-medium", size: 40, left: 85, top: -80, delay: 600 },
 ],
 [
  { className: "shape3 fall-fast", size: 36, left: 20, top: -80, delay: 0 },
  { className: "shape1 fall-medium", size: 50, left: 40, top: -80, delay: 150 },
  { className: "shape2 fall-slow", size: 45, left: 60, top: -80, delay: 300 },
  { className: "shape3 fall-fast", size: 38, left: 80, top: -80, delay: 450 },
  { className: "shape1 fall-medium", size: 42, left: 100, top: -80, delay: 600 },
 ],
];

function createRaindrop(raindrop) {
 const drop = document.createElement("div");
 drop.className = `raindrop ${raindrop.className}`;
 drop.style.width = `${raindrop.size}px`;
 drop.style.height = `${raindrop.size}px`;
 drop.style.left = `${raindrop.left}vw`;
 drop.style.top = `${raindrop.top}px`;
 drop.style.animationDelay = `${raindrop.delay}ms`;
 raindropBg.appendChild(drop);

 drop.addEventListener("animationend", () => {
  drop.remove();
 });
}

function startRaindropAnimation() {
 let currentSet = 0;
 setInterval(() => {
  raindropSets[currentSet].forEach(createRaindrop);
  currentSet = (currentSet + 1) % raindropSets.length;
 }, 1000);
}

startRaindropAnimation();