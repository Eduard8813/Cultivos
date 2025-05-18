<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rieguito - Registro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../estilos/styles4.css">
</head>
<body>
    <!-- Contenedor de lluvia animada -->
    <div class="rain-container" id="rainContainer" aria-hidden="true"></div>
    
    <div class="container">
        <img src="../Imagenes/personita.png" alt="Persona sonriente con vestido amarillo y mochila azul" class="person-image" draggable="false" />
        
        <div class="red-box" role="form" aria-labelledby="form-title">
            <div class="title-container">
                <img src="../Imagenes/gotita.png" alt="Gota de agua azul con cara feliz" width="100" height="100" id="gotaImagen" />
                <h1 id="form-title">Rieguito</h1>
            </div>
            
            <h2>Crear cuenta</h2>
            <form id="multiStepForm" action="../backend/registro.php" method="POST" autocomplete="off" novalidate>
                <!-- Paso 1 -->
                <div class="step active" data-step="1">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" name="nombre" type="text" placeholder="Nombre" required />
                    <label for="apellido">Apellido</label>
                    <input id="apellido" name="apellido" type="text" placeholder="Apellido" required />
                    <button type="button" class="btn-next" onclick="nextStep()">Siguiente</button>
                    <p class="error-message" id="error-step-1" style="display:none;">Completa todos los campos.</p>
                </div>

                <!-- Paso 2 -->
                <div class="step" data-step="2">
                    <label for="fecha">Fecha de nacimiento</label>
                    <input id="fecha" name="fecha" type="date" required />
                    <div id="fecha-display"></div>
                    <label for="zona">Zona</label>
                    <input id="zona" name="zona" type="text" placeholder="Zona" required />
                    <div class="flex justify-between">
                        <button type="button" class="btn-prev" onclick="prevStep()">Atrás</button>
                        <button type="button" class="btn-next" onclick="nextStep()">Siguiente</button>
                    </div>
                    <p class="error-message" id="error-step-2" style="display:none;">Completa todos los campos.</p>
                </div>

                <!-- Paso 3 -->
                <div class="step" data-step="3">
                    <label for="telefono">Teléfono</label>
                    <input id="telefono" name="telefono" type="tel" placeholder="Teléfono" required />
                    <label for="correo">Correo electrónico</label>
                    <input id="correo" name="correo" type="email" placeholder="Correo electrónico" required />
                    <label for="contrasena">Contraseña</label>
                    <input id="contrasena" name="contrasena" type="password" placeholder="Contraseña" required />
                    <div class="flex justify-start">
                        <button type="button" class="btn-prev" onclick="prevStep()">Atrás</button>
                    </div>
                    <button type="submit" class="btn-next mt-4">Enviar</button>
                    <p class="error-message" id="error-step-3" style="display:none;">Completa todos los campos.</p>
                </div>
            </form>
        </div>
    </div>

    <script src="../funciones/src4.js"></script>
</body>
</html>
