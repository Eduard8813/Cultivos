<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Rieguito</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../estilos/styles7.css">
</head>
<body class="bg-white relative overflow-x-hidden min-h-screen flex flex-col">
    <!-- Contenedor de imágenes de fondo animadas -->
    <div aria-hidden="true" id="background-container">
        <img class="active" src="https://storage.googleapis.com/a1aa/image/4b0aabc4-09e1-437a-868f-e137c02e9ba3.jpg" alt="Cultivo con cielo azul"/>
        <img src="https://storage.googleapis.com/a1aa/image/7aff2cae-91a8-484e-9f02-38dfeff395f4.jpg" alt="Cultivo con sol y cosecha"/>
        <img src="https://storage.googleapis.com/a1aa/image/5cd9316c-99a5-4890-6bbb-b49943fcea92.jpg" alt="Cultivo con cielo y nubes"/>
    </div>

    <!-- Sección superior con gotita y título -->
    <div class="bg-pink-400 w-full flex items-center justify-center space-x-4" style="height: 180px; z-index: 20;">
        <img class="w-20 h-24 object-contain" src="../Imagenes/gotita.png" alt="Gotita sonriente" style="filter: drop-shadow(0 0 0.2rem #00000033);"/>
        <h1 class="text-white text-4xl font-bold" style="font-family: 'Fredoka One', cursive;">Rieguito</h1>
    </div>

    <!-- Separador entre secciones -->
    <div class="separator"></div>

    <!-- Sección de campo -->
    <div class="curved-white max-w-7xl mx-auto flex flex-col items-center px-10 relative z-20">
        <div class="campos-container">
            <div class="campos-title">CAMPO DE PIÑA</div>
            <div class="campos-buttons">
                <button class="btn-pina" type="button">
                    <img src="../Imagenes/lluvia.png" height="100" alt="Humedad"/>
                    <div class="text-container">
                        <span class="label">Humedad</span>
                        <span class="percent"><span class="number" id="humedad-value">0</span></span>
                    </div>
                </button>
                <button class="btn-otros" type="button">
                    <img src="../Imagenes/temperatura.png" height="100" alt="Temperatura"/>
                    <div class="text-container">
                        <span class="label">Temperatura</span>
                        <span class="percent"><span class="number" id="temperatura-value">0</span></span>
                    </div>
                </button>
                <div aria-hidden="true" class="earth-container">
                    <img src="../Imagenes/mundo-cultivo.png" height="220" alt="Mundo sonriente"/>
                </div>
            </div>
        </div>
    </div>

    <!-- Botón de navegación -->
    <div class="flex justify-end px-10 mt-10 max-w-7xl mx-auto flex-grow">
        <a class="bg-sky-300 rounded-full w-12 h-12 flex items-center justify-center" href="grafica.php">
            <svg class="h-6 w-6 text-black" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </a>
    </div>

    <!-- Importación del script JavaScript -->
    <script src="../funciones/src7.js"></script>
</body>
</html>
