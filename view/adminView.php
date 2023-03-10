<?php
session_start();
require_once "../config.php";

if(isset($_SESSION["name"])==false){
    //Redireccionamos hacia dashboard
    header("Location: ../view/loginView.php");
    //Matamos esto para evitar que se ejecute lo de mas abajo
    die();
}
//Si se recibe la variable de carrar sesion cerramos la sesion y redireccionamos al login
if(isset($_GET["cerrar"])==true){
    //Destruimos la sesion para borrar la sesion del usuario
    session_destroy();
    //Redireccionamos hacia login
    header("Location: ../view/loginView.php");
    //Matamos esto para evitar que se ejecute lo de mas abajo
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <form action="?" method="get">
        <div style="text-align: center;">
            Login successful!! User:<?php echo $_SESSION["name"]." Role:".$_SESSION["description"]; ?>
            <input type="submit" name="cerrar" value="Cerrar sesión">
        </div>
        <div style="text-align: center;">
            Tu correo <?php echo $_SESSION["email"] ?>
        </div>
        <div style="text-align: center;">
            <table style="margin-left: auto;margin-right: auto;">
                <tr>
                    <th>id</th><th>name</th><th>authorization</th>
                </tr>
            <?php
            require_once "../model/usersModel.php";
            listaUsuarios();
            ?>
            </table>
        </div>
    </form>
</body>
</html>
