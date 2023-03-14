<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../controller/loginController.php" method="post">
        <div style="text-align: center;">
        Ingrese su usuario y contraseña
        </div>
        <div style="text-align: center;">
            <input type="text" name="name" placeholder="name" >
            <input type="password" name="pass" placeholder="pass" >
            <input type="submit" value="login">
        </div>
    </form>
</body>
</html>