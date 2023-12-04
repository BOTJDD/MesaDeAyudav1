<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Historial de Tickets</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Historial de Tickets</h1>
  </header>
  
  <main>
    <section>
      <h2>Filtros</h2>
      <form id="filterForm">
        <label for="sortBy">Ordenar por:</label>
        <select id="sortBy" name="sortBy">
          <option value="fechaReciente">Fecha (Reciente primero)</option>
          <option value="fechaAntigua">Fecha (Antigua primero)</option>
          <option value="nombre">Nombre</option>
          <option value="apellidoMaterno">Apellido Materno</option>
          <option value="gradoGrupo">Grado y Grupo</option>
        </select>

        <!-- Opciones adicionales para filtrar por estado -->
        <label for="filterStatus">Filtrar por Estado:</label>
        <select id="filterStatus" name="filterStatus">
          <option value="todos">Todos</option>
          <option value="pendiente">Pendiente</option>
          <option value="resuelto">Resuelto</option>
          <option value="enProceso">En Proceso</option>
        </select>

        <button type="submit">Aplicar Filtro</button>
      </form>
    </section>

    <section>
      <h2>Historial de Tickets</h2>
      <!-- Lista de tickets con filtros aplicados -->
      <ul id="ticketList">
        <li>
          <strong>Asunto:</strong> Problema con la inscripción de materias
          <br>
          <strong>Estado:</strong> Pendiente
          <br>
          <strong>Fecha:</strong> 12 de noviembre, 2023
          <br>
          <strong>Nombre:</strong> María López
          <br>
          <strong>Apellido Materno:</strong> García
          <br>
          <strong>Grado y Grupo:</strong> 5to Semestre, Grupo A
          <br>
          <!-- Agregar más detalles si es necesario -->
          <strong>Descripción:</strong> El estudiante reporta problemas al intentar inscribirse en ciertas materias.
          <br>
          <strong>Comentarios:</strong> El equipo de soporte está trabajando en la solución del problema.
        </li>
        <li>
          <!-- Detalles de otro ticket -->
        </li>
        <!-- Puedes mostrar más tickets con información -->
      </ul>
      <ul id="ticketList">
        <li>
          <strong>Asunto:</strong> Problema con la inscripción de materias
          <br>
          <strong>Estado:</strong> Pendiente
          <br>
          <strong>Fecha:</strong> 12 de noviembre, 2023
          <br>
          <strong>Nombre:</strong> María López
          <br>
          <strong>Apellido Materno:</strong> García
          <br>
          <strong>Grado y Grupo:</strong> 5to Semestre, Grupo A
          <br>
          <!-- Detalles adicionales -->
          <strong>Descripción:</strong> El estudiante reporta problemas al intentar inscribirse en ciertas materias.
          <br>
          <strong>Comentarios:</strong> El equipo de soporte está trabajando en la solución del problema.
        </li>
        <!-- Repetir este bloque para cada ticket -->
        <!-- Ejemplo de otro ticket -->
        <li>
          <strong>Asunto:</strong> Problema con el acceso a la plataforma virtual
          <br>
          <strong>Estado:</strong> Resuelto
          <br>
          <strong>Fecha:</strong> 20 de octubre, 2023
          <br>
          <strong>Nombre:</strong> Carlos Martínez
          <br>
          <strong>Apellido Materno:</strong> Pérez
          <br>
          <strong>Grado y Grupo:</strong> 4to Semestre, Grupo B
          <br>
          <!-- Detalles adicionales -->
          <strong>Descripción:</strong> El estudiante no puede acceder a la plataforma virtual para ver sus clases.
          <br>
          <strong>Comentarios:</strong> Se resolvió el problema actualizando la contraseña de acceso.
        </li>
        <!-- Repetir este bloque para cada ticket -->
        <!-- Agrega más tickets similares -->
      </ul>
      <ul id="ticketList">
        <li>
          <strong>Asunto:</strong> Problema con la inscripción de materias
          <br>
          <strong>Estado:</strong> Pendiente
          <br>
          <strong>Fecha:</strong> 12 de noviembre, 2023
          <br>
          <strong>Nombre:</strong> María López
          <br>
          <strong>Apellido Materno:</strong> García
          <br>
          <strong>Grado y Grupo:</strong> 5to Semestre, Grupo A
          <br>
          <!-- Detalles adicionales -->
          <strong>Descripción:</strong> El estudiante reporta problemas al intentar inscribirse en ciertas materias.
          <br>
          <strong>Comentarios:</strong> El equipo de soporte está trabajando en la solución del problema.
        </li>
        <!-- Repetir este bloque para cada ticket -->
        <!-- Ejemplo de otro ticket -->
        <li>
          <strong>Asunto:</strong> Problema con el acceso a la plataforma virtual
          <br>
          <strong>Estado:</strong> Resuelto
          <br>
          <strong>Fecha:</strong> 20 de octubre, 2023
          <br>
          <strong>Nombre:</strong> Carlos Martínez
          <br>
          <strong>Apellido Materno:</strong> Pérez
          <br>
          <strong>Grado y Grupo:</strong> 4to Semestre, Grupo B
          <br>
          <!-- Detalles adicionales -->
          <strong>Descripción:</strong> El estudiante no puede acceder a la plataforma virtual para ver sus clases.
          <br>
          <strong>Comentarios:</strong> Se resolvió el problema actualizando la contraseña de acceso.
        </li>
        <!-- Repetir este bloque para cada ticket -->
        <!-- Agrega más tickets similares -->
      </ul>
    </section>

    <!-- Otras secciones con más detalles del historial de tickets -->

  </main>

  <footer>
    <p>© 2023 Historial de Tickets</p>
  </footer>
</body>
</html>
