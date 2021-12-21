<?php 
$nombre = $_POST['nombre'];
$pass = $_POST['password'];

$host= getenv("MYSQL_SERVICE_HOST");
$port= getenv("MYSQL_SERVICE_PORT");
$user= getenv("MYSQL_USER");
$pass= getenv("MYSQL_PASSWORD");
$db= getenv("MYSQL_DATABASE");

$con = mysqli_connect($host,$user,$pass,$db);
$query = "select * from clientes where username='".$nombre."' and contra='".$pass."'";

if($con){
    $result = mysqli_query($con, $query);

    if ($result->num_rows = 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $nombre = $row['nombre'];
            $username = $row['username'];
            $password = $row['contra'];
            $correo = $row['correo'];

            echo '<!DOCTYPE html>
            <html lang="es">
            
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=1, initial-scale=1.0">
                <title>Sesion</title>
                <link rel="stylesheet" href="estilosesion.css">
                <link rel="shortcut icon" href="undraw_male_avatar_323b.svg" type="image/x-icon">
            </head>
            
            <body>
                <header>
                    <div class="contentheader">
                        <img class="imagenh" src="images/data_maintenance_isometric.svg">
                        <dir></dir>
                        <nav>
                            <ul class="menu">
                                <li><a href="index.html">Inicio</a></li>
                            </ul>
                        </nav>
                </header>
            
                <div class="formulario">
                    <form action="">
                        <div class="user">
                            <img src="images/undraw_male_avatar_323b.svg">
                            <h1>Nombre: '.$nombre.'</h1>
                        </div>
                        <div class="infouser">
                            <h2>Contraseña: '.$password.'</h2><br>
                            <h2>Correo: '.$correo.'</h2><br>
                            <h2>UserName: '.$username.'</h2><br>
                        </div>
                    </form>
                </div>
            
                <footer>
                    <div class="conteninfo">
                        <h1>Ruben Alba Gonzalez</h1>
                        <p>Pagina creada para probar los contenedores</p>
            
                    </div>
                </footer>
            </body>
            
            </html>';
        }
      } else {
        echo'<script type="text/javascript">
        alert("Usuario o contraseña incorrectos");
        window.location.href="index.html";
        </script>';
      }

    mysqli_close($con);
}else{
    echo "No se ha podido conectar";
}

?>
