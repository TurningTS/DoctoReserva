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
                <a href="home.php" class="nav-link">Perfil</a>
                <a href="cita.php" class="nav-link">Citas</a>
                <a href="logout.php" class="nav-link">Cerrar sesión</a>
            </nav>
            <img src="img/Logo.png" alt="placeholder" class="fixed-top img-fluid" width="80px">
            <div class="view homeb">
            </div>
        </header>
        <main class="py-5" id="scroll">
            <div class="container col-lg-10">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="alert alert-danger"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <?php if (isset($_GET['success'])) { ?>
                    <p class="alert alert-success"><?php echo $_GET['success']; ?></p>
                <?php } ?>
                <h1>Citas realizadas</h1>
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
                            $query = $conecta->prepare("SELECT * FROM cita where Id_paciente = $id");
                            $query->execute();
                            $resultados = $query->fetchAll(PDO::FETCH_OBJ);
                            if ($query->rowCount() > 0) {
                                $query = $conecta->prepare("SELECT Nombre, Apellido FROM doctor");
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
                                <td>" . $_SESSION['nombre'] . ' ' . $_SESSION['apellido'] . "</td>
                                <td>" . $item->Sintomas . "</td>
                                <td>" . $doc[$item->Id_doctor] . "</td>
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
            <br>
            <div class="container col-lg-10">
                <h1>Diagnostico</h1>
                <p>Reserve una cita con su doctor de preferencia</p>
                <br>
                <h3>Llene los campos</h3>
                <div class="row">
                    <div class="container col-sm-8">
                        <form method="post" action="sintomas.php">
                            <h5>Síntomas</h5>
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" name="fiebre" value="Fiebre">
                                <label class="form-check-label">Fiebre</label>
                            </div>
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" name="escalofrios" value="Escalofrios">
                                <label class="form-check-label">Escalofrios</label>
                            </div>
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" name="gusto" value="Falta de gusto u olfato">
                                <label class="form-check-label">Falta de gusto u olfato</label>
                            </div>
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" name="muscular" value="Dolor muscular o articular">
                                <label class="form-check-label">Dolor muscular o articular</label>
                            </div>
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" name="tos" value="Tos seca">
                                <label class="form-check-label">Tos seca</label>
                            </div>
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" name="cabeza" value="Dolor de cabeza">
                                <label class="form-check-label">Dolor de cabeza</label>
                            </div>
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" name="diarrea" value="Diarrea">
                                <label class="form-check-label">Diarrea</label>
                            </div>
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" name="nausea" value="Nausea o vomito">
                                <label class="form-check-label">Náusea o vómito</label>
                            </div>
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" name="fatiga" value="Fatiga">
                                <label class="form-check-label">Fatiga</label>
                            </div>
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" name="cansancio" value="Cansancio">
                                <label class="form-check-label">Cansancio</label>
                            </div>
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" name="debilidad" value="Debilidad">
                                <label class="form-check-label">Debilidad</label>
                            </div>
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" name="respirar" value="Dificultad para respirar">
                                <label class="form-check-label">Dificultad para respirar</label>
                            </div>
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" name="garganta" value="Dolor de garganta">
                                <label class="form-check-label">Dolor de garganta</label>
                            </div>
                            <br>
                            <br>
                            <h5>Seleccione un doctor</h5>
                            <select name="Doctores" class="custom-select">
                                <option value="1">Dr. Mario Perez Benitez</option>
                                <option value="2">Dra. Karla Escobar Lopez</option>
                                <option value="3">Dr. Julian Martinez Torres</option>
                            </select>
                            <input type="submit" value="ok" class="btn btn-primary">
                        </form>
                    </div>
                    <div class="container col-sm-4">
                    </div>
                </div>
            </div>
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