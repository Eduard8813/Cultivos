<html lang="es">
 <head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <title>Recuperar contraseña - Rieguito</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="../estilos/styles3.css">
 </head>
 <body>
  <div class="bubbles-container" aria-hidden="true" id="bubblesContainer">
   <div class="bubble bubble1"></div>
   <div class="bubble bubble2"></div>
   <div class="bubble bubble3"></div>
   <div class="bubble bubble4"></div>
   <div class="bubble bubble5"></div>
   <div class="bubble bubble6"></div>
  </div>
  <main class="container" role="main" aria-labelledby="form-title">
   <div class="title-container">
    <img
      alt="Gota de agua azul con cara feliz y ondas debajo"
      src="../Imagenes/gotita.png"
      width="56"
      height="64"
      draggable="false"
    />
    <h1 id="form-title">Rieguito</h1>
   </div>
   <h2>Recuperar contraseña</h2>
   <form id="recoverForm" autocomplete="off" novalidate>
    <label for="email">Ingrese su correo electrónico</label>
    <input id="email" name="email" type="email" placeholder="correo@ejemplo.com" required />
    <button type="submit">Enviar enlace</button>
    <p class="error-message" id="error-message">Por favor, ingrese un correo válido.</p>
    <p class="success-message" id="success-message">¡Enlace de recuperación enviado!</p>
   </form>
  </main>
  <script src="../funciones/src3.js"></script>
 </body>
</html>