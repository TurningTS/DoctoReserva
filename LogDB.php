<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/mdb.min.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon-32x32.png">
    <title>Login</title>
</head>

<body>
    <form action="login.php" method="post">
        <h2>Login</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="alert alert-danger"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <div class="form-group">
            <label>Correo</label>
            <input type="text" placeholder="@" name="correo" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Contraseña</label>
            <input type="password" placeholder="*****" name="password" class="form-control">
        </div>
        <div class="form-check-inline">
            <input type="checkbox" class="form-check-input" name="doc">
            <label class="form-check-label">Soy un doctor</label>
        </div>
        <br>
        <a href="index.html" class="btn">Inicio</a>
        <input type="submit" class="btn" value="Ingresar" name="ingreso" style="float: right;">
    </form>
</body>

</html>