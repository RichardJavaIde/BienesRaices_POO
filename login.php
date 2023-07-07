<?php
// Importar la conxion
require "includes/config/datebase.php"; 
$db = conectarDB();

$errores=[];
//Autenticacion de usuario
if($_SERVER["REQUEST_METHOD"]==="POST"){

    $email = mysqli_real_escape_string($db, filter_var($_POST['email'],FILTER_VALIDATE_EMAIL));
    $password =  mysqli_real_escape_string($db,  $_POST['password']);

    if(!$email){
  $errores[]='Email obligatorio.';
}

if(!$password){
  $errores[]="Password obligatorio.";
}

if(empty($errores)){
  //Revisar si el usuario existe.

  $query = "SELECT * FROM usuarios WHERE email = '$email';";
  $resultado = mysqli_query($db, $query);

  if($resultado->num_rows){
    //Verificar el poassword.
    $usuario = mysqli_fetch_assoc($resultado);
     

     $auth = password_verify($password,$usuario['password']);

     if($auth){
        //Autenticar el usuario.
        session_start();
        //Llenar el areglo de la sesion

        $_SESSION['id']=$usuario['id'];
        $_SESSION['usuario']= $usuario['email'];
        $_SESSION['login']=true;
        
        /* echo "<pre>";
        var_dump($_SESSION);
        echo "</pre>"; */
      header('location: /bienesraices_inicio/admin/index.php');

     }
     else{
      $errores[]= "El password es incorecto.";
     }

  }
  else{
    $errores[]= "El usuario no existe.";
  }
}

}

//Incluye el header
require"includes/funciones.php";
incluirTemplate("header");
?>
    <main class="contenedor seccion contenido-centrado">
      <h1>Login</h1>
 <?php foreach($errores as $error): ?>
   <div class="alerta error">
    <?php echo $error;?>
  </div>
      
      <?php endforeach;?>
      <form method="POST" class="formulario">

       <fieldset>
          <legend>Email y password para iniciar sesion</legend>
          

          <label for="email">E-mail</label>
          <input type="email" name="email" placeholder="Tu email" id="emal" />

          <label for="password">password</label>
          <input type="password" name="password" placeholder="Tu password" id="password"/>

          
        </fieldset>
        <input type="submit"  value="Iniciar Sesion" class="boton boton-verde">
      </form>

    </main>

    <?php

    incluirTemplate("footer");
?>
