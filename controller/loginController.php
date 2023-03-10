<?php
require_once "../model/usersModel.php";

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
