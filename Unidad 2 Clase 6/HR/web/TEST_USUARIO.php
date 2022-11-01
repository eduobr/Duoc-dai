<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
          $USUARIO="JUAN";
          $PASS="HOLA";
          echo 'Usuario:'.$USUARIO.' / Password:'.$PASS;
          $hash= password_hash($PASS,PASSWORD_DEFAULT);
          echo '<br>Password Hash:'.$hash;
          if (password_verify("juanita", $hash)) {
              echo 'Constraseña Correcta';
          } else {
              echo 'Contraseña Incorrecta';
          }
        ?>
    </body>
</html>
