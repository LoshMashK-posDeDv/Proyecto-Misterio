<?php
  include("../../setup/config.php");

  $nombre = $_POST['nombre'];
  $email = $_POST['mail'];
  $nick = $_POST['nick'];
  /*
  Como el campo de la contraseña no es obligatorio, primero quiero saber si me llegó algo.
  Si llegó algo, lo tengo que pasar por el md5 para la BD.
  Después, adentro del if que hace el UPDATE mi idea era comparar $pass con $pass_confirm y solo en caso de que fueran iguales (si existen), hacer el update.

    if(!empty($_POST['password'])){
      $pass = md5($_POST['password']);
    }

    if(!empty($_POST['password_confirm'])){
      $pass_confirm = md5($_POST['password_confirm']);
    }
  */
  $er_nombre = "/^[\w\s]{5,50}$/i";
  $val_nombre = preg_match($er_nombre, $nombre, $coincidencia_nombre);

  $er_email = "/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/";
  $val_email = preg_match($er_email, $email, $coincidencia_email);

  $er_nick = "/^[\d\w\s]{5,50}$/";
  $val_nick = preg_match($er_nick, $nick, $coincidencia_nick);

  //$er_pass = "/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])\S{8,15}$/";
  //$val_pass = preg_match($er_pass, $pass, $coincidencia_pass);

  if($val_nombre && $val_email && $val_nick){
      $actualizar_datos = "UPDATE
          usuarios
      SET
          NOMBRE_COMPLETO = '$nombre',
          EMAIL = '$email',
          NICK = '$nick'
      WHERE
          IDUSUARIOS = '$_SESSION[IDUSUARIOS]'
      LIMIT 1";

      mysqli_query($conexion, $actualizar_datos);

      $rta = 'ok';
      header("Location: ../index.php?s=mi_cuenta&rta=$rta");
  } else {
      $rta = 'error';
      header("Location: ../index.php?s=mi_cuenta&rta=$rta");
  }

  echo mysqli_error($conexion);
?>
