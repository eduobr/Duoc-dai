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
        <h1>Menu Principal</h1>
        <table border="1">
            <tr>
                <td><a href="{{url('formulario')}}">Agregar</a></td>
                <td><a href="{{route('pelicula.create')}}">Listar</a></td>
                <td>Eliminar</td>
                <td>Modificar</td>
                <td>Buscar</td>
            </tr>
        </table>
    </body>
</html>
