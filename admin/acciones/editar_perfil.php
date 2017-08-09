<?php
    include("../../setup/config.php");

    $nombre = $_POST['nombre'];
    $email = $_POST['mail'];
    $nick = $_POST['nick'];
    $password = $_POST['password'];
    $edad = $_POST['edad'];
    $password_confirm = $_POST['password_confirm'];

    $er_nombre = "/^[\w\s]{3,50}$/i";   
    $er_email = "/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i";  
    $er_nick = "/^[\d\w\s]{3,50}$/";
    $er_edad = "/^[0-9]{1,3}$/";
    $er_pass = "/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])\S{8,15}$/";

    $val_nombre = preg_match($er_nombre, $nombre);
    $val_email = preg_match($er_email, $email);
    $val_edad = preg_match($er_edad, $edad);
    $val_nick = preg_match($er_nick, $nick);
    $val_pass = preg_match($er_pass, $password);    
    
    if($val_nombre && $val_email && $val_nick){
        if (!empty($password) && !empty($password_confirm)) {
            if ($password == $password_confirm) {
                $password = md5($password);
                $actualizar_datos = "UPDATE usuarios SET NOMBRE_COMPLETO = '$nombre', CONTRASENIA = '$password', EMAIL = '$email', NICK = '$nick' WHERE EMAIL = '$_SESSION[IDUSUARIOS]' LIMIT 1";
                var_dump('Actualizar con contraseña nueva');
            }
        } else {
            $actualizar_datos = "UPDATE usuarios SET NOMBRE_COMPLETO = '$nombre', EMAIL = '$email', NICK = '$nick' WHERE EMAIL = '$_SESSION[IDUSUARIOS]' LIMIT 1";
                var_dump('Actualizar SIN contraseña nueva');
        }

        mysqli_query($conexion, $actualizar_datos);
        var_dump($actualizar_datos);

        $rta = 'ok';
        //header("Location: ../index.php?s=mi_cuenta&rta=$rta");

        var_dump($rta);
    } else {
        $rta = 'error';
        //header("Location: ../index.php?s=mi_cuenta&rta=$rta");
        var_dump($rta);
    }

    echo mysqli_error($conexion);
?>