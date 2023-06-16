<?php
    function consultar_email($conexion, $email){
        $consulta = "SELECT nombre, email FROM usuario WHERE email = '$email'";
        $datos = mysqli_query($conexion, $consulta); 
        if (mysqli_num_rows($datos) < 1){
            return false;
        } else {
            return $datos;
        }
    }

    function consultar_usuarios($conexion){
        $consulta = "SELECT nombre, primer_apellido, segundo_apellido, email FROM usuario";
        $resultado = mysqli_query($conexion, $consulta);
    
        $usuarios = [];
        while($row = mysqli_fetch_assoc($resultado)) {
            $usuarios[] = $row;
        }
    
        return $usuarios;
    }
?>