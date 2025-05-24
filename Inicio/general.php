<html lang="es">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Rieguito
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&amp;display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="../estilos/styles5.css">
 </head>
 <body>
  <div id="raindrop-bg">
  </div>
  <div id="content-wrapper">
   <header class="w-full bg-pink-600 rounded-tr-3xl rounded-br-3xl flex items-center justify-center relative py-4">
    <h1 class="text-white text-3xl select-none">
     Rieguito
    </h1>
    <img alt="Blue water drop cartoon character with a smile and small eyes, sitting on water ripples" height="60" id="headerDrop" src="../Imagenes/gotita.png" width="60"/>
   </header>
   <main class="flex flex-col md:flex-row w-full max-w-6xl px-4 py-8">
    <div class="image-container" id="mainDropContainer" style="width: 300px; height: auto;">
     <img alt="Blue water drop character with glasses, arms and legs, textured shading" height="400" id="mainDrop" src="../Imagenes/gotita2.png" style="position: relative; left: 10px; top: 60px;" width="300"/>
    </div>
    <section class="relative bg-pink-50 rounded-lg shadow-lg w-full max-w-lg ml-auto" style="border: 4px solid #e91e7a">
     <div class="calendar-container">
      <div class="calendar-ring-container">
       <div class="calendar-ring">
       </div>
       <div class="calendar-ring">
       </div>
       <div class="calendar-ring">
       </div>
       <div class="calendar-ring">
       </div>
       <div class="calendar-ring">
       </div>
       <div class="calendar-ring">
       </div>
      </div>
     </div>
     <form class="calendar-body" id="dataForm" novalidate="" onsubmit="return handleSubmit(event)">
      <div class="input-group" style="left: 10px; right: 10px;">
       <img alt="Pink location pin icon" class="w-6 h-6" height="24" src="../Imagenes/Imagen2.png" width="24"/>
       <input aria-label="Ciudad" class="placeholder-white" id="ciudad" name="ciudad" placeholder="Ciudad" required="" type="text"/>
      </div>
      <div class="input-group" style="left: 10px; right: 10px;">
       <img alt="Pink location pin icon" class="w-6 h-6" height="24" src="../Imagenes/Imagen2.png" width="24"/>
       <input aria-label="Región" class="placeholder-white" id="region" name="region" placeholder="Región" required="" type="text"/>
      </div>
      <div class="input-group" style="left: 10px; right: 10px;">
       <img alt="Pink location pin icon" class="w-6 h-6" height="24" src="../Imagenes/Imagen2.png" width="24"/>
       <input aria-label="Tamaño del área en monitoreo" class="placeholder-white" id="tamano" name="area" placeholder="Tamaño del área en monitoreo" required="" type="text"/>
      </div>
      <button class="bg-pink-600 text-white font-semibold rounded-full px-8 py-2 block mx-auto mt-4 text-lg disabled:opacity-50 disabled:cursor-not-allowed" disabled="" id="submitBtn" type="submit">
       Siguiente
      </button>
     </form>
    </section>
   </main>
  </div>
  <script src="../funciones/src5.js"></script>
 </body>
</html>