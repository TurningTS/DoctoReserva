<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['correo'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>DoctoReserva</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/mdb.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon-32x32.png">
    </head>

    <body class="home">
        <header>
            <nav class="navbar fixed-top navbar-expand-md scrolling-navbar justify-content-end">
                <a href="admin.php" class="nav-link">Citas</a>
                <a href="logout.php" class="nav-link">Cerrar sesión</a>
            </nav>
            <img src="img/Logo.png" alt="placeholder" class="fixed-top img-fluid" width="80px">
            <div class="view homeb">
            </div>
        </header>
        <main class="py-5" id="scroll">
            <section>
                <div class="container col-lg-10">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th>Cita</th>
                                <th>Paciente</th>
                                <th>Sintomas</th>
                                <th>Doctor</th>
                                <th>Chat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="mensajeria.php" method="post">
                                <?php
                                include 'conexion.php';
                                $conecta = new Conexion();
                                $id = $_SESSION['id'];
                                $cita = 1;
                                $doc = [];
                                $query = $conecta->prepare("SELECT * FROM cita where Id_doctor = $id");
                                $query->execute();
                                $resultados = $query->fetchAll(PDO::FETCH_OBJ);
                                if ($query->rowCount() > 0) {
                                    $query = $conecta->prepare("SELECT Nombre, Apellido FROM paciente");
                                    $query->execute();
                                    $dcname = $query->fetchAll(PDO::FETCH_OBJ);
                                    foreach ($dcname as $name) {
                                        $doc[$cita] = $name->Nombre . ' ' . $name->Apellido;
                                        $cita++;
                                    }
                                    $cita = 1;
                                    foreach ($resultados as $item) {
                                        echo "<tr>
                                        <td>" . $cita++ . "</td>
                                        <td>" . $doc[$item->Id_paciente] . "</td>
                                        <td>" . $item->Sintomas . "</td>
                                        <td>" . $_SESSION['nombre'] . ' ' . $_SESSION['apellido'] . "</td>
                                        <td><button class='btn btn-primary' name='cita' value='$item->Id'>Chat</button></td>
                                        <tr>";
                                    }
                                } else {
                                    echo "<tr><td>No hay citas</td></tr>";
                                }
                                ?>
                            </form>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
        <footer class="footer bg-primary py-2">
            <div class="container text-light">
                <p>Link</p>
                <nav class="justify-content">
                    <a href="https://www.un.org/es/coronavirus" class="text-light"><u>Mas información</u></a>
                </nav>
                <hr style="background-color: white;">
                <p>&copy;2021 DoctoReserva</p>
            </div>
        </footer>
        <script src="js/scroll.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location: LogDB.php");
    exit();
}
?>