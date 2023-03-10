<?php
session_start();
require_once "../config.php";
//conn es donde tengo la conexion.
$conn = new mysqli($host,$user ,$pass , $db);
//Si se ingresa una clave incorrectano habria coneccion por lo cual nos daria un mensaje con Error de conexion
if ($conn->connect_error) {
    die("ERROR: conexión server: " . $conn->connect_error);
} 
//validate if the user whit the pass exist
function usuarioExiste($name,$pass){
    global $conn;
    $query="SELECT 
    users.id,
    users.`name`,
    users.email,
    users.pass,
    users.id_authorizations,
    authorizations.description
    FROM
    users
    INNER JOIN authorizations ON authorizations.id = users.id_authorizations
    WHERE users.`name` =  '".$name."'  AND users.pass = '".$pass."'
    ";
    //aca hacemos la busqueda de la base de datos pero colocamos el usuario y contraseña que vienen desde el formulario.
    $result = $conn->query($query);
    //mediante foreach hago un ciclo, que se cicla si hay dato
    foreach ($result as $row) {
        //Guardamos el ususario y el email en la sesion para validar que ya se registro
        $_SESSION["id"] = $row["id"];
        $_SESSION["name"] = $row["name"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["description"] = $row["description"];
        return $row["description"];
        //Detenemos el ciclo foreach
        break;
    }
    return "";
}
//show a list from database
function listaUsuarios(){
    global $conn;
    $query="SELECT 
    users.id,
    users.`name`,
    users.email,
    users.pass,
    users.id_authorizations,
    authorizations.description
    FROM
    users
    INNER JOIN authorizations ON authorizations.id = users.id_authorizations";
    $result = $conn->query($query);
    foreach ($result as $row) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["description"]."</td>";
        echo "</tr>";
    }
}
//show a list from api json
function listaUsuariosApi(){
  $url = "https://reqres.in/api/users";
  $ch = curl_init();
  $array_options = array(
    CURLOPT_URL=>$url,
    CURLOPT_RETURNTRANSFER=>true,
  );
  curl_setopt_array($ch,$array_options);
  $resp = curl_exec($ch);
  $final_decoded_data = json_decode($resp,true);
  //print_r($final_decoded_data);
  foreach($final_decoded_data["data"] as $key => $val){
    echo $val["first_name"] . $val["last_name"];
    echo "<tr>";
    echo "<td>".$val["id"]."</td>";
    echo "<td>".$val["first_name"] ." ". $val["last_name"]."</td>";
    echo "<td><img src=\"".$val["avatar"]."\"></td>";
    echo "</tr>";
  }
  curl_close($ch);
}
?>