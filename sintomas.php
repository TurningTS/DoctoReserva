<?php
session_start();
$sintomas = ['fiebre','escalofrios','gusto','muscular','tos','cabeza',
'diarrea','nausea','fatiga','cansancio','debilidad','respirar','garganta'];
$cosas = null;
for ($i=0; $i < 13; $i++) { 
    if(isset($_POST[$sintomas[$i]])){
        $cosas .= $_POST[$sintomas[$i]].', ';
    }
}
$cut = strlen($cosas) - 2;
$fin = substr($cosas,0,$cut) . '.';
if(is_null($cosas)){
    header("Location: cita.php?error= Rellene los campos faltantes");
    exit();
}
else{
    include 'conexion.php';
    $connect = new Conexion();
    $doctor = $_POST['Doctores'];
    $paciente = $_SESSION['id'];
    $sql = "INSERT INTO cita(Id_paciente, Sintomas, Id_doctor) VALUES(:paciente, :fin, :doctor)";
    $query = $connect->prepare($sql);
    $query -> bindParam(':paciente',$paciente,PDO::PARAM_STR);
    $query -> bindParam(':fin',$fin,PDO::PARAM_STR);
    $query -> bindParam(':doctor',$doctor,PDO::PARAM_STR);
    $query -> execute();
    $ultimoID = $connect->lastInsertId();

    header("Location: cita.php?success= Registro exitoso");
    exit();
}
?>