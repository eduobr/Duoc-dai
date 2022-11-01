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
        $user="juan";
        $pass="12345";
        echo 'Usuario:'.$user."<br>";
        echo 'Pass:'.$pass."<br>";
        echo 'Password Convertida con codificacion hash:'. password_hash($pass, PASSWORD_DEFAULT)."<br>";
        $hash=password_hash($pass, PASSWORD_DEFAULT);
        //preguntar por la password
        if (password_verify("12345", $hash)) {
            echo 'Es la clave';
        }else{
            echo 'No es la clave';
            mail("To:jua@loco.com","pass mala","pinche el sq");//envia mail al usuario
        }
        ?>
    </body>
</html>
