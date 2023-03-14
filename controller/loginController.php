<?php
//Aca es donde llamamos al modelo y este hace que conecte con la base de datos
require_once "../model/usersModel.php";
//usuarioExiste es una funcion del modelo: obtien la descripcion de ese usuario.
$autDescription=usuarioExiste($_POST['name'],$_POST['pass']);

if ($autDescription=="admin"){
    header("Location: ../view/adminView.php");
}
if ($autDescription=="accounting" || $autDescription=="marketing" ){
    header("Location: ../view/accountView.php");    
}
if ($autDescription==""){
    header("Location: ../view/loginView.php");
}
