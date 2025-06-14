<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Rieguito
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&amp;display=swap" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="../estilos/styles6.css">
 </head>
 <body class="bg-white relative overflow-x-hidden min-h-screen flex flex-col">
  <!-- Animated fullscreen background container -->
  <div aria-hidden="true" id="background-container">
   <img alt="Cultivo field with green plants and blue sky" class="active" src="https://storage.googleapis.com/a1aa/image/4b0aabc4-09e1-437a-868f-e137c02e9ba3.jpg"/>
   <img alt="Cultivo field with rows of crops and sunrise" src="https://storage.googleapis.com/a1aa/image/7aff2cae-91a8-484e-9f02-38dfeff395f4.jpg"/>
   <img alt="Cultivo field with green plants and blue sky with clouds" src="https://storage.googleapis.com/a1aa/image/5cd9316c-99a5-4890-6bbb-b49943fcea92.jpg"/>
  </div>
  <!-- Top pink background with water drop and title centered horizontally with image on left -->
  <div class="bg-pink-400 w-full relative flex flex-row items-center justify-center space-x-4" style="height: 180px; z-index: 20;">
   <img alt="Cute blue water drop with smiling face and pink cheeks" class="w-20 h-24 object-contain" height="100" src="../Imagenes/gotita.png" style="filter: drop-shadow(0 0 0.2rem #00000033);" width="80"/>
   <h1 class="text-white text-4xl font-bold" style="font-family: 'Fredoka One', cursive;">
    Rieguito
   </h1>
  </div>
  <!-- Professional separator between pink and white -->
  <div class="separator"></div>
  <!-- Campos section with piña, otros and earth -->
  <div class="curved-white max-w-7xl mx-auto flex flex-col items-center px-10 relative z-20">
   <div class="campos-container">
    <div class="campos-title">
     CAMPOS
    </div>
    <div class="campos-buttons">
    <button id="btnPina" class="btn-pina" type="button" onclick="enviarPiña()">
      <img alt="Illustration of a cute pineapple with green leaves and orange body" src="../Imagenes/piña1.png" width="64" height="64"/>
      <span>Piña</span>
     </button>
     <button class="btn-otros" type="button" tabindex="0">
      <img alt="Illustration of a stylized blue leaf inside a pink circle with rays" src="../Imagenes/otro.png" width="64" height="64"/>
      <span>Otros</span>
     </button>
     <div class="earth-container" aria-hidden="true">
      <img alt="Cute earth with smiling face and pink clouds" src="../Imagenes/mundo-habla.png" width="230" height="220"/>
     </div>
    </div>
   </div>
  </div>
  <!-- Arrow button bottom right linking to another page -->
  <div class="flex justify-end px-10 mt-10 max-w-7xl mx-auto flex-grow">
   <a href="../Inicio/lectura.php" aria-label="Next page" class="bg-sky-300 rounded-full w-12 h-12 flex items-center justify-center inline-block">
    <svg class="h-6 w-6 text-black" fill="none" stroke="currentColor" stroke-width="3" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
     <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"></path>
    </svg>
   </a>
  </div>
  <script src="../funciones/src6.js"></script>
 </body>
</html>