<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar sesión</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../estilos/styles2.css">
</head>
<body class="bg-pink-400 min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
    <!-- Contenedor de animaciones -->
    <div id="drops-container">
        <!-- Generar gotas con estilos dinámicos -->
        <script>
            const dropsContainer = document.getElementById('drops-container');
            for (let i = 1; i <= 20; i++) {
                const drop = document.createElement('div');
                drop.className = 'drop';
                drop.style.left = `${Math.random() * 100}%`;
                drop.style.animationDuration = `${1 + Math.random()}s`;
                dropsContainer.appendChild(drop);
            }
        </script>
    </div>

    <main class="text-white text-center z-20 w-full max-w-xl">
        <div class="flex justify-center items-center space-x-2 mb-6">
            <img alt="Dibujo de gota de agua con carita feliz" class="w-20 h-20" src="../Imagenes/gotita.png">
            <h1 class="text-4xl font-bold">Iniciar sesión</h1>
        </div>

        <section class="form-container mx-auto">
            <label for="email" class="text-xl font-semibold block text-left">Correo Electrónico</label>
            <input id="email" class="w-full rounded-md py-2 px-4 mb-6 text-black text-lg" type="email" placeholder="Tu correo" required>

            <label for="password" class="text-xl font-semibold block text-left">Contraseña</label>
            <input id="password" class="w-full rounded-md py-2 px-4 mb-6 text-black text-lg" type="password" placeholder="Tu contraseña" required>

            <div class="flex justify-between items-center">
                <button id="login-btn" class="btn bg-pink-600 text-white py-2 px-4 rounded hover:bg-pink-800 transition" onclick="validar()">Iniciar sesión</button>
                <a href="password.php" class="text-lg font-semibold hover:underline">Olvidaste tu contraseña</a>
            </div>

            <div class="flex justify-between items-center mt-6">
                <p class="text-lg font-semibold">¿No tienes cuenta?</p>
                <a href="registro.php" class="text-lg font-semibold hover:underline">Registrarte con Rieguito</a>
            </div>
        </section>
    </main>

    <script src="../funciones/src2.js"></script>
</body>
</html>