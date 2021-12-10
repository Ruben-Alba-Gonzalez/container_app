<?php 

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$username = $_POST['username'];
$contra = $_POST['contra'];

$host= getenv("MYSQL_SERVICE_HOST");
$port= getenv("MYSQL_SERVICE_PORT");
$user= getenv("MYSQL_USER");
$pass= getenv("MYSQL_PASSWORD");
$db= getenv("MYSQL_DATABASE");

$con = mysqli_connect($host,$user,$pass,$db);
$query = "insert into clientes values('$username', '$nombre','$correo','$contra')";

if($con){
    $result = mysqli_query($con, $query);
    if($result){
        echo'<script type="text/javascript">
        alert("Registro Correcto");
        window.location.href="index.html";
        </script>';
    }else{
        echo'<script type="text/javascript">
        alert("Algo salio mal :/");
        window.location.href="registro.html";
        </script>';
    }
}else{
    echo "Sin conexion";
}

?>
