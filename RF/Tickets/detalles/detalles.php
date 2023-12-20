<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Detalles del Ticket</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    require '../../../plantilla/funciones.php';
    $auth = estaAutenticado();
    if (!$auth) {
        header('Location: ../../../Login/index.php');
    }

    //Imprime errores que pueden salir
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    //Importar Base De Datos
    require '../../../BaseDeDatos/database.php';
    $db = conectarDB();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['marcar_revisado'])) {
            $ticket_id = $_POST['ticket_id'];

            $query = "UPDATE tickets SET REVISION = 1 WHERE FOLIO_TICKET = $ticket_id";
            $result = mysqli_query($db, $query);

            if ($result) {
                header('Location: ../../../Dashboard/index.php');
            } else {
                echo "Error al marcar el ticket como revisado.";
            }
        } elseif (isset($_POST['agregar_comentario'])) {
            $ticket_id = $_POST['ticket_id'];
            $comentario = $_POST['comentario'];
        
            // Realizar la inserción del comentario en la base de datos
            $query_insert_comentario = "INSERT INTO COMENTARIOS (TICKET_ID, COMENTARIO) VALUES ($ticket_id, '$comentario')";
            $resultado_insert_comentario = mysqli_query($db, $query_insert_comentario);
        
            if ($resultado_insert_comentario) {
                echo "Comentario agregado exitosamente.";
            } else {
                echo "Error al agregar el comentario.";
            }
        }
    }

    $ticket_id = $_GET['id'];

    $consulta_ticket = "SELECT * FROM tickets WHERE FOLIO_TICKET = $ticket_id";
    $resultado_ticket = mysqli_query($db, $consulta_ticket);
?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Detalles del Ticket</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    if ($resultado_ticket->num_rows > 0) {
        $ticket = $resultado_ticket->fetch_assoc();

        echo "<div class='ticket'>";
        echo "<div class='ticket-info'>Folio: " . $ticket["FOLIO_TICKET"] . "</div>";
        echo "<div class='ticket-info'>Opciones: " . $ticket["OPCIONES"] . "</div>";
        echo "<div class='ticket-info'>Asunto: " . $ticket["ASUNTO"] . "</div>";
        echo "<div class='ticket-info'>Descripción: " . $ticket["DESCRIPCION"] . "</div>";
        echo "<div class='ticket-info'>Fecha de Creación: " . $ticket["FECHA_CREACION"] . "</div>";

        echo "<form method='post' action='detalles.php'>";
        echo "<input type='hidden' name='ticket_id' value='" . $ticket["FOLIO_TICKET"] . "'>";
        echo "<input type='submit' name='marcar_revisado' value='Marcar como Revisado'>";
        echo "</form>";

        echo "<form method='post' action='detalles.php'>";
        echo "<input type='hidden' name='ticket_id' value='" . $ticket["FOLIO_TICKET"] . "'>";
        echo "<textarea name='comentario' placeholder='Agregar comentario'></textarea>";
        echo "<input type='submit' name='agregar_comentario' value='Agregar Comentario'>";
        echo "</form>";

        echo "</div>";
    } else {
        echo "No se encontró el ticket.";
    }
    ?>
</body>

</html>
