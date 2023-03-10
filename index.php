<?php
session_start();
//Si la sesion del usuario es admin lo manda al la vista del admin
if ( $_SESSION["description"]=="admin"  ){
    header("Location: view/adminView.php");
}
//Si la sesion del usuario es admin lo manda al la vista del account
if ( $_SESSION["description"]=="accounting" ||  $_SESSION["description"]=="marketing"  ){
    header("Location: view/accountView.php");
}
//Si la sesion del usuario no tiene nada lo manda al login
if ( isset( $_SESSION["description"])==false ){
    header("Location: view/loginView.php");
}

