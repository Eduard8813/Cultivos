const welcomeText = document.getElementById("welcomeText");
const circleTop = document.getElementById("circleTop");
const circleBottom = document.getElementById("circleBottom");
const gotita = document.getElementById("gotita");
const personita = document.getElementById("personita");
const speechBubble = document.getElementById("speechBubble");
const bgContainer = document.querySelector(".background-container");
const dropsCount = 50;
const animations = ["floatUp", "floatUpLeft", "floatUpRight", "floatUpZigzag"];
let drops = [];

// Create drops
function createDrops() {
  for (let i = 0; i < dropsCount; i++) {
    const drop = document.createElement("div");
    drop.classList.add("drop");
    bgContainer.appendChild(drop);
    drops.push(drop);
  }
}

// Assign drops random floating animations and positions
function assignDropsFloating() {
  drops.forEach((drop) => {
    drop.style.opacity = 0.3 + Math.random() * 0.3;
    drop.style.width = 10 + Math.random() * 8 + "px";
    drop.style.height = 16 + Math.random() * 12 + "px";
    drop.style.borderRadius = `${40 + Math.random() * 20}% ${40 + Math.random() * 20}% ${40 + Math.random() * 20}% ${40 + Math.random() * 20}% / ${50 + Math.random() * 20}% ${50 + Math.random() * 20}% ${30 + Math.random() * 20}% ${30 + Math.random() * 20}%`;
    drop.style.left = Math.random() * 100 + "vw";
    drop.style.top = Math.random() * 100 + "vh";
    const anim = animations[Math.floor(Math.random() * animations.length)];
    const duration = 2 + Math.random() * 3;
    const delay = Math.random() * 3;
    drop.style.animationName = anim;
    drop.style.animationDuration = duration + "s";
    drop.style.animationDelay = delay + "s";
    drop.style.transition = "none";
  });
}

// Sequence text and images visibility
function showWelcome() {
  welcomeText.classList.add("visible");
  circleTop.classList.add("visible");
  circleBottom.classList.add("visible");
  gotita.classList.add("visible");
  personita.classList.remove("visible");
  speechBubble.classList.remove("visible");
}

function showPersonita() {
  personita.classList.add("visible");
}

function showSpeechBubble() {
  speechBubble.classList.add("visible");
}

// Cycle drop animations every 10 seconds
function cycleAnimations() {
  assignDropsFloating();
}

createDrops();
showWelcome();
assignDropsFloating();

setTimeout(() => {
  showPersonita();
}, 3000);

setTimeout(() => {
  showSpeechBubble();
}, 6000);

setInterval(() => {
  cycleAnimations();
}, 10000);

// Redirect to next page after 10 seconds
setTimeout(() => {
  window.location.href = "sesion.html";
}, 10000);

