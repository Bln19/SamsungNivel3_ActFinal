<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Practica Final</title>
        <link rel="stylesheet" href="actividad_final_style.css">
        <!-- Añadimos Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"><link rel="stylesheet" href="formulario_style.css">
    </head>
    <body>
        <div class="container">
            <div class="col-6">
                <div class="group mt-5">
                    <form method="POST" action="">
                    <?php
                        $mostrar_mensaje = false;
                        $mensaje = '';
                    ?>

                        <h2 class="mb-3"><em>Formulario de Registro</em></h2>
                        <div class="mb-3">
                            <label class="form-label">Nombre <span><em>(requerido)</em></span></label>
                            <input type="text" maxlength="20" id="nombre" name="nombre" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Primer apellido <span><em>(requerido)</em></span></label>
                            <input type="text" maxlength="30" id="primer_apellido" name="primer_apellido" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Segundo apellido <span><em>(requerido)</em></span></label>
                            <input type="text" maxlength="30" id="segundo_apellido" name="segundo_apellido" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email <span><em>(requerido)</em></span></label>
                            <input type="email" maxlength="30" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Login <span><em>(requerido)</em></span></label>
                            <input type="text" maxlength="30" id="login" name="login" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password <span><em>(requerido)</em></span></label>
                            <input type="password" minlength="4" maxlength="8" id="password" class="form-control" name="password" class="form-control" required>
                        </div>
                        <input class="btn btn-primary" type="submit" name="submit" value="Suscribirse">
                        </form>
                        <?php
                            if (isset($_SESSION['usuario_anadido']) && $_SESSION['usuario_anadido'] && isset($_SESSION['mensaje']) && $_SESSION['mensaje'] == "Usuario dado de alta correctamente") {
                        ?>
                            <br>
                            <form method="POST" action="">
                                <input class="btn btn-primary" type="submit" name="consulta" value="Consulta">
                            </form>
                        <?php
                            }
                        ?>
                    <?php if($_SESSION['usuario_anadido'] == true): ?>
                        
                        <div class="alert alert-success" role="alert">
                            <?php echo $_SESSION['mensaje'] ; ?>
                        </div>
                    <?php endif; ?> 

                    <?php
                        require 'funciones.php';

                        // Crear conexion a la Base de datos
                        $servername = "localhost";
                        $username = "root";
                        $password_db = "";
                        $dbname = "cursosql";

                        // Chequeamos la conexion
                        try {
                            $conexion = mysqli_connect($servername, $username, $password_db, $dbname);
                        } 
                        catch (mysqli_sql_exception $e) {
                            $mostrar_mensaje = true;
                            $_SESSION['usuario_anadido'] = false;
                            $mensaje = 'Error: ' . $e->getMessage();
                            $_SESSION['mensaje'] = $mensaje;
                        }

                        if ($_POST) {
                            // Comprobamos si se envio el formulario de registro
                            if (isset($_POST['submit'])) {
                                $nombre = $_POST['nombre'];
                                $primer_apellido = $_POST['primer_apellido'];
                                $segundo_apellido = $_POST['segundo_apellido'];
                                $email = $_POST['email'];
                                $login = $_POST['login'];
                                $password = $_POST['password'];      
                                
                                $limite_nombre = 30; 
                                $limite_primer_apellido = 30; 
                                $limite_segundo_apellido = 30; 
                                $limite_email = 30; 
                                $limite_login = 30;
                                $limite_password = 8;

                                // Verificamos la longitud de las cadenas (aunque ya lo limitamos con HTML5)
                                if(strlen($nombre) > $limite_nombre || strlen($primer_apellido) > $limite_primer_apellido || strlen($segundo_apellido) > $limite_segundo_apellido || strlen($email) > $limite_email || strlen($login) > $limite_login || strlen($password) > $limite_password) {
                                    $mostrar_mensaje = true;
                                    $_SESSION['usuario_anadido'] = false;
                                    $mensaje = 'El valor ingresado supera el límite de caracteres permitidos';
                                    $_SESSION['mensaje'] = $mensaje;
                                }

                                // Verificamos si el usuario ya existe
                                if ($datos = consultar_email($conexion, $email)) {
                                    $mostrar_mensaje = true;
                                    $_SESSION['usuario_anadido'] = false;
                                    $mensaje = "El usuario ya existe";
                                    $_SESSION['mensaje'] = $mensaje;
                                } else {
                                    try {
                                        // Almacenamos el usuario
                                        $insertar_usuario = "INSERT INTO usuario (nombre, primer_apellido, segundo_apellido, email, login, password) VALUES ('$nombre', '$primer_apellido', '$segundo_apellido', '$email', '$login', '$password')";
                                        if ($datos = mysqli_query($conexion, $insertar_usuario)) {
                                            $mostrar_mensaje = true;
                                            // Almacenamos la variable de sesion usuario_anadido a true para cuando haga el POST aparezca el boton Consultar
                                            $_SESSION['usuario_anadido'] = true;
                                            $mensaje = 'Usuario dado de alta correctamente';
                                            $_SESSION['mensaje'] = $mensaje;
                                            header("Location: {$_SERVER['REQUEST_URI']}", true, 303);
                                        }
                                    } 
                                    catch (mysqli_sql_exception $e) {
                                        $mostrar_mensaje = true;
                                        $_SESSION['usuario_anadido'] = false;
                                        $mensaje = 'Error: ' . $e->getMessage();
                                        $_SESSION['mensaje'] = $mensaje;
                                    }
                                }
                            }
                        }
                    ?>

                    <?php
                        // Comprobamos si se envió el formulario de consulta
                        if (isset($_POST['consulta'])) {

                            // Al hacer click en Consultar, se deben borrar las variables de sesion para el siguiente inicio
                            // En este punto ya no las necesitamos
                            $_SESSION['usuario_anadido'] = false;
                            $_SESSION['mensaje'] = '';

                            $usuarios = consultar_usuarios($conexion);
                            if(isset($usuarios) && count($usuarios) > 0):
                    ?>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Primer Apellido</th>
                                    <th scope="col">Segundo Apellido</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($usuarios as $usuario): ?>
                                    <tr>
                                        <td><?php echo $usuario['nombre']; ?></td>
                                        <td><?php echo $usuario['primer_apellido']; ?></td>
                                        <td><?php echo $usuario['segundo_apellido']; ?></td>
                                        <td><?php echo $usuario['email']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    <?php else: ?>
                        <p>No hay usuarios</p>
                    <?php endif; } ?>
                </div>
            </div>
        </div>
    </body>
</html>
