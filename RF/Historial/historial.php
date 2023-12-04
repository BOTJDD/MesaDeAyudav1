<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Historial de Tickets Revisados</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Historial de Tickets Revisados</h1>
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
          <option value="gradoGrupo">Grado y Grupo</option>
          <!-- Puedes añadir más opciones de filtro según sea necesario -->
        </select>

        <button type="submit">Aplicar Filtro</button>
      </form>
    </section>

    <section>
      <h2>Historial de Tickets Revisados</h2>
      <!-- Lista de tickets revisados -->
      <ul id="reviewedTicketList">
        <li>
          <strong>Asunto:</strong> Problema con la inscripción de materias
          <br>
          <strong>Estado:</strong> Resuelto
          <br>
          <strong>Fecha:</strong> 12 de noviembre, 2023
          <br>
          <strong>Nombre:</strong> María López
          <br>
          <strong>Grado y Grupo:</strong> 5to Semestre, Grupo A
        </li>
        <li>
          <!-- Detalles de otro ticket revisado -->
        </li>
        <!-- Puedes añadir más tickets revisados -->
      </ul>
    </section>

    <!-- Otras secciones con más detalles del historial de tickets revisados -->

  </main>

  <footer>
    <p>© 2023 Historial de Tickets Revisados</p>
  </footer>
</body>
</html>
