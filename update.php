<?php
session_start();
include 'conexion.php';
$id = $_SESSION['id'];
$connect = new Conexion();

if(isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $sql = "UPDATE paciente SET nombre=:nombre where id=:id";
    $stmt = $connect->prepare($sql);
    $stmt -> bindParam(':nombre',$nombre,PDO::PARAM_STR);
    $stmt -> bindParam(':id',$id,PDO::PARAM_STR);
    $stmt->execute();
    $_SESSION['nombre'] = $nombre;
}

if(isset($_POST['apellido'])){
    $apellido = $_POST['apellido'];
    $sql = "UPDATE paciente SET apellido=:apellido where id=:id";
    $stmt = $connect->prepare($sql);
    $stmt -> bindParam(':apellido',$apellido,PDO::PARAM_STR);
    $stmt -> bindParam(':id',$id,PDO::PARAM_STR);
    $stmt->execute();
    $_SESSION['apellido'] = $apellido;
}

if(isset($_POST['telefono'])) {
    $telefono = $_POST['telefono'];
    $sql = "UPDATE paciente SET telefono=:telefono where id=:id";
    $stmt = $connect->prepare($sql);
    $stmt -> bindParam(':telefono',$telefono,PDO::PARAM_STR);
    $stmt -> bindParam(':id',$id,PDO::PARAM_STR);
    $stmt->execute();
    $_SESSION['telefono'] = $telefono;
}

if(isset($_POST['direccion'])){
    $direccion = $_POST['direccion'];
    $sql = "UPDATE paciente SET direccion=:direccion where id=:id";
    $stmt = $connect->prepare($sql);
    $stmt -> bindParam(':direccion',$direccion,PDO::PARAM_STR);
    $stmt -> bindParam(':id',$id,PDO::PARAM_STR);
    $stmt->execute();
    $_SESSION['direccion'] = $direccion;
}

if(isset($_POST['correo'])) {
    $correo = $_POST['correo'];
    $sql = "UPDATE paciente SET correo=:correo where id=:id";
    $stmt = $connect->prepare($sql);
    $stmt -> bindParam(':correo',$correo,PDO::PARAM_STR);
    $stmt -> bindParam(':id',$id,PDO::PARAM_STR);
    $stmt->execute();
    $_SESSION['correo'] = $correo;
}
header("Location: home.php?success= Cambios guardados correctamente");
exit();
?>