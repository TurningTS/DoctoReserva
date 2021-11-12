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
    <body>
        <header>
            <nav class="navbar fixed-top navbar-expand-md scrolling-navbar justify-content-end">
                <a class="nav-link" href="index.html"><strong>Inicio</strong></a>
                <a href="LogDB.php" class="nav-link">Login</a>
                <a href="contacto.html" class="nav-link">Contacto</a>
                <a href="Registro.php" class="nav-link">Registro</a>
                <a href="acerca.html" class="nav-link">Acerca de</a>
            </nav>
            <img src="img/Logo.png" alt="placeholder" class="fixed-top img-fluid" width="80px">
            <div class="view registro">
                <div class="flex-center">
                    <a href="#scroll" class="btn">Registro</a>
                </div>
            </div>
        </header>
        <main class="py-5" id="scroll">
            <form action="signup.php" method="post">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                            <?php if(isset($_GET['success'])){ ?>
                                <p class="alert alert-success"><?php echo $_GET['success']; ?></p>
                            <?php } ?>
                            <?php if(isset($_GET['error'])){?>
                                <p class="alert alert-danger"><?php echo $_GET['error']; ?></p>
                            <?php } ?>
                            <div class="form-group">
                                <label><h5>Nombre(s)</h5></label>
                                <input type="text" class="form-control" placeholder="Nombre(s)" name="nombre">
                            </div>
                            <div class="form-group">
                                <label><h5>Apellidos</h5></label>
                                <input type="text" class="form-control" placeholder="Apellidos" name="apellido">
                            </div>
                            <div class="form-group">
                                <label><h5>Telefono</h5></label>
                                <input type="number" class="form-control" placeholder="Telefono" name="telefono">
                            </div>
                            <div class="form-group">
                                <label><h5>Dirección</h5></label>
                                <input type="text" class="form-control" placeholder="Dirección" name="direccion">
                            </div>
                            <div class="form-group">
                                <label><h5>Correo</h5></label>
                                <input type="email" class="form-control" placeholder="@" name="correo">
                            </div>
                            <div class="form-group">
                                <label><h5>Contraseña</h5></label>
                                <input type="password" class="form-control" placeholder="*****" name="password">
                            </div>
                            <input type="submit" value="Registrarse" class="btn btn-primary">
                        </div>
                        <div class="col-sm-4 text-center">
                            <img src="img/banner.jpeg" alt="" class="img-fluid rounded">
                        </div>
                    </div>
                </div>
            </form>
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