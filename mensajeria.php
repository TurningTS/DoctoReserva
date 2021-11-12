<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['correo'])) {
    $_SESSION['cita'] = $_POST['cita'];
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
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous">
        </script>
    </head>

    <body class="home">
        <header>
            <nav class="navbar fixed-top navbar-expand-md scrolling-navbar justify-content-end">
                <?php if (!(isset($_SESSION['doc']))) { ?>
                    <a href="home.php" class="nav-link">Perfil</a>
                    <a href="cita.php" class="nav-link">Citas</a>
                <?php } else{?>
                    <a href="admin.php" class="nav-link">Citas</a>
                <?php } ?>
                <a href="logout.php" class="nav-link">Cerrar sesión</a>
            </nav>
            <img src="img/Logo.png" alt="placeholder" class="fixed-top img-fluid" width="80px">
            <div class="view homeb">
            </div>
        </header>
        <main class="py-5" id="scroll">
            <div class="container col-lg-10 border">
                <h1>Chat</h1>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="chatHistory bg-light"></div>
                    </div>
                    <div class="col-sm-4">
                        <div class="chatBox py-4">
                            <h4>Mensaje</h4>
                            <form action="" method="POST">
                                <textarea name="message" id="message" class="txtarea"></textarea>
                            </form>
                        </div>
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
        <script>
            $(document).ready(function(e) {
                loadChat();
            });

            $('#message').keyup(function(e) {
                var message = $(this).val();
                if (e.which == 13) {
                    $.post('ajax.php?action=SendMessage&message=' + message, function(response) {
                        loadChat();
                        $('#message').val('');
                    });
                }
            });

            function loadChat() {
                $.post('ajax.php?action=getChat', function(response) {
                    $('.chatHistory').html(response);
                });
            }
        </script>
    </body>

    </html>
<?php
} else {
    header("Location: LogDB.php");
    exit();
}
?>