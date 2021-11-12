<?php
session_start();
include 'conexion.php';
if(isset($_REQUEST['action'])){
    $conect = new Conexion();
    switch($_REQUEST['action']){
        case 'SendMessage':
            $query = $conect->prepare("INSERT INTO chat SET cita=?, message=?, sent=?");
            $query -> execute([$_SESSION['cita'], $_REQUEST['message'], $_SESSION['nombre'].' '.$_SESSION['apellido']]);
        break;

        case 'getChat':
            $query = $conect->prepare("SELECT * FROM chat where cita=".$_SESSION['cita']);
            $query -> execute();
            $resultados = $query ->fetchAll(PDO::FETCH_OBJ);
            $chat = null;
            if($query->rowCount()>0){
                foreach($resultados as $item){
                    $chat .= $item->sent. ': ' .$item->message.'<hr />';
                }
            }
            echo $chat;
        break;
    }
}
?>