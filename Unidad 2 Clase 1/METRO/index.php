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
        <script src="validaciones.js"></script>
        <div>
            <form action="proceso.php" method="post" onsubmit="return validaFormulario()">
                <table border="1">
                    <tr>
                        <td colspan="2" style="background-color: activecaption; text-align: center; font-size: 20px; font-family: cursive"><h2>Formulario de encuesta de servicio</h2></                                td>
                    </tr>
                    <tr>
                        <td>Rut:</td>
                        <td><input type="text" name="txtRut" id="txtRut" required placeholder="Ingrese Rut Ej. 11.111.111-1" maxlength="12" pattern="[0-9]{2}.[0-9]{3}.[0-9]{3}-[0-9kK]"></td>                        
                    </tr>
                    <tr>
                        <td>Nombre:</td>
                        <td><input type="text" name="txtRut" id="txtRut" required placeholder="Ingrese su Nombre" maxlength="40"></td>                      
                    </tr>
                    <tr>
                        <td>Genero:</td>
                        <td>
                            <input type="radio" name="genero" id="F" value="F" checked="true">F
                            <input type="radio" name="genero" id="M" value="M">M
                        </td>                       
                    </tr>
                    <tr>
                        <td>Frecuencia:</td>
                        <td>
                            <input type="radio" name="frecuencia" value="Nunca" checked="true"/>Nunca
                            <input type="radio" name="frecuencia" value="Poco" />Poco
                            <input type="radio" name="frecuencia" value="Regular" />Regularmente
                            <input type="radio" name="frecuencia" value="Siempre" />Siempre
                        </td>                       
                    </tr>
                    <tr>
                        <td>Horario:</td>
                        <td>
                            <select name="cboHorario" id="cboHorario">
                                <option>Horario Punta</option>
                                <option>Horario Valle</option>
                                <option>Horario Bajo</option>
                            </select>
                        </td> 
                    </tr>
                    <tr>
                        <td>Lineas:</td>
                        <td>
                            <input type="checkbox" name="Linea" value="Linea1" />Linea 1
                            <input type="checkbox" name="Linea" value="Linea2" />Linea 2
                            <input type="checkbox" name="Linea" value="Linea4" />Linea 4
                            <input type="checkbox" name="Linea" value="Linea4a" />Linea 4a
                            <input type="checkbox" name="Linea" value="Linea5" />Linea 5
                        </td> 
                    </tr>
                    <tr>
                        <td>Calidad del Servicio:</td>
                        <td>
                            <input type="radio" name="calidad" value="Malo" />Malo
                            <input type="radio" name="calidad" value="Regular" />Regular
                            <input type="radio" name="calidad" value="Bueno" checked="true"/>Bueno
                        </td> 
                    </tr>
                    <tr>
                        <td>Observaciones</td>
                        <td>
                            <textarea name="txtObservaciones" id="txtObservaciones" rows="5" cols="50">
                            </textarea>
                        </td> 
                    </tr>
                    <tr>
                        <td><input type="submit" value="Enviar"></td>
                        <td><input type="reset" value="Limpiar"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
