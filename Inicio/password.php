<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Recuperar contraseña - Rieguito</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../estilos/styles3.css">
</head>
<body>
  <div class="bubbles-container">
    <div class="bubble bubble1"></div>
    <div class="bubble bubble2"></div>
    <div class="bubble bubble3"></div>
    <div class="bubble bubble4"></div>
    <div class="bubble bubble5"></div>
    <div class="bubble bubble6"></div>
  </div>

  <main class="container">
    <div class="title-container">
      <img src="../Imagenes/gotita.png" alt="Gota de agua azul con cara feliz" width="56" height="64">
      <h1>Rieguito</h1>
    </div>
    <h2>Recuperar contraseña</h2>
    
    <form id="recoverForm" autocomplete="off" novalidate>
      <label for="email">Ingrese su correo electrónico</label>
      <input id="email" name="email" type="email" placeholder="correo@ejemplo.com" required>
      <button id="sendButton" type="button">Enviar enlace</button>
      <p class="error-message" id="error-message" style="display: none;"></p>
      <p class="success-message" id="success-message" style="display: none;"></p>
    </form>
  </main>

  <script src="../funciones/src3.js"></script>
</body>
</html>
