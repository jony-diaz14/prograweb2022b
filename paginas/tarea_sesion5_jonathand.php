<!doctype html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <title>Práctica de la Sesión 5</title>
    
    <script language="javascript">
        function validar_funciones_usuario() {
            //Recuperamos el contenido de la caja de seleccion BoxNumbers para hacer una verificación de que no este 
            //vacía
            var valorBoxNumbers = document.getElementById("BoxNumbers").selectedIndex;

            if (valorBoxNumbers == null || valorBoxNumbers == 0) {
                alert("No seleccionaste ningún número, seleccionalo!");
                document.getElementById("BoxNumbers").focus();
                return false;
            }
            return true;
        }
    </script>

</head>


<body style="background-color:green">
    <div>
        <h1> FORMULARIO </h1>
        <h3>Jonathan Jesus Diaz Jimenez</h3>
        <fieldset>
            <legend>Captura de selección de un número entero: </legend>
            <form action="funciones_usuario_2022b.php" method="post" id="frm_datos" onsubmit="return validar_funciones_usuario()">

                <p>Seleccionar un número: </p>
                <select id="BoxNumbers" name="BoxNumbers">
                    <option value="0"> --- Selecciona un número --- </option>
                    <option value="10"> 10 </option>
                    <option value="20"> 20 </option>
                    <option value="30"> 30 </option>
                    <option value="40"> 40 </option>
                    <option value="50"> 50 </option>
                </select>

                <input type="hidden" name="txtjesus" id="txtjesus" size="15" value="Jonathan Jesus Diaz Jimenez" />
                </br> </br>
                <input type="submit" value=".:Enviar estos datos:." />
            </form>
        </fieldset>
    </div>
</body>

</html>