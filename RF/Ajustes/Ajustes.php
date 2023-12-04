<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Página de Ajustes</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
</head>
<body>
  <header>
    <h1>Configuración</h1>
    <a href="../../Dashboard/index.php">INICIO</a>
            <div class="dark-mode">
                <span class="material-icons-sharp active">
                    light_mode
                </span>
                <span class="material-icons-sharp">
                    dark_mode
                </span>
            </div>
  </header>
  
  <main>
    <!-- Sección 1: Preferencias de Cuenta -->
    <section>
        <h2>Preferencias de Cuenta</h2>
        <label for="username">Nombre de usuario:</label>
        <input type="text" id="username" name="username" placeholder="Ingrese su nombre de usuario">

        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" placeholder="Ingrese su correo electrónico">

        <label for="password">Cambiar Contraseña:</label>
        <input type="password" id="password" name="password" placeholder="Contraseña actual">
        <input type="password" id="newPassword" name="newPassword" placeholder="Nueva contraseña">
        <input type="password" id="confirmNewPassword" name="confirmNewPassword" placeholder="Confirmar nueva contraseña">

        <button onclick="guardarCambiosCuenta()">Guardar cambios</button>
    </section>

    <!-- Sección 2: Configuración de Privacidad -->
    <section>
        <h2>Configuración de Privacidad</h2>
        <label>
            Nivel de Privacidad:
            <select id="privacyLevel" name="privacyLevel">
                <option value="publico">Público</option>
                <option value="amigos">Amigos</option>
                <option value="privado">Privado</option>
            </select>
        </label>

        <label>
            Mostrar información en perfil:
            <input type="checkbox" id="infoPerfil" name="infoPerfil">
            Información de contacto
        </label>

        <button onclick="guardarCambiosPrivacidad()">Guardar cambios</button>
    </section>

    <!-- Sección 3: Preferencias de Idioma -->
    <section>
        <h2>Preferencias de Idioma</h2>
        <label>
            Seleccione su idioma preferido:
            <select id="language" name="language">
                <option value="es">Español</option>
                <option value="en">Inglés</option>
                <option value="fr">Francés</option>
                <!-- Agrega más opciones de idioma según sea necesario -->
            </select>
        </label>

        <button onclick="guardarCambiosIdioma()">Guardar cambios</button>
    </section>

    <!-- Sección 4: Tema o Modo Oscuro/Claro -->
    <section>
        <h2>Tema</h2>
        <label>
            Seleccionar tema:
            <select id="theme" name="theme">
                <option value="claro">Tema Claro</option>
                <option value="oscuro">Tema Oscuro</option>
            </select>
        </label>

        <button onclick="guardarCambiosTema()">Guardar cambios</button>
    </section>

    <!-- Sección 5: Configuración de Notificaciones -->
    <section>
        <h2>Configuración de Notificaciones</h2>
        <label>
            Habilitar notificaciones por correo electrónico:
            <input type="checkbox" id="emailNotifications" name="emailNotifications">
        </label>
        <button onclick="guardarCambiosNotificaciones()">Guardar cambios</button>
    </section>

    <!-- Sección 8: Configuración de Seguridad -->
    <section>
        <h2>Configuración de Seguridad</h2>
        <label>
            Autenticación de dos factores:
            <input type="checkbox" id="twoFactorAuth" name="twoFactorAuth">
        </label>

        <label>
            Configuración de inicio de sesión:
            <input type="checkbox" id="loginSettings" name="loginSettings">
        </label>

        <button onclick="guardarCambiosSeguridad()">Guardar cambios</button>
    </section>

    <!-- Otras secciones con más opciones -->

</main>

  <footer>
    <p>© 2023 Mesa De Ayuda</p>
  </footer>
    <script src="../../Dashboard/index.js"></script>
</body>
</html>
