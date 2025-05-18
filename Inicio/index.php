<html lang="es">
 <head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <title>Rieguito Welcome - Animated Drops Background with Sequential Text and Animations</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&amp;display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../estilos/styles1.css" /> 
 </head>
 <body>
  <div aria-label="Rieguito welcome page with animated drops background and sequential text and animations" id="app">
   <div aria-hidden="true" class="background-container"></div>
   <div class="content-container">
    <div aria-label="Bienvenido a Rieguito" class="welcome-text" id="welcomeText">
     Bienvenido a
     <br />
     Rieguito
    </div>
    <div class="circle-top" id="circleTop"></div>
    <div class="circle-bottom" id="circleBottom"></div>
    <img alt="Imagen de una gotita" class="gotita" draggable="false" id="gotita" src="../Imagenes/gotita.png" />
    <img alt="Imagen de una persona sonriente con vestido amarillo y tablet" class="personita" draggable="false" id="personita" src="../Imagenes/personita.png" tabindex="0" />
    <div aria-label="Mensaje de Lola" class="speech-bubble" id="speechBubble">
     Hola, soy Lola.
     <br />
     Déjame tomar tus datos,
     <br />
     por favor
    </div>
   </div>
  </div>
  <script src="../funciones/src1.js"></script>
 </body>
</html>