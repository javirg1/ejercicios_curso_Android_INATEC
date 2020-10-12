<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario agencia de viajes</title>
</head>

<body>
    <center>
        <h2>Presupuesto del viaje</h2>

        <form method="post" action="procesar_formulario.php">
            <!-- Aqui vienen bloques 1 y 2  -->
            <fieldset>
                <legend>Datos personales:</legend>
                <p>
                    <input type="radio" id="inp_sexo_0" name="inp_sexo" value="0" required="true"><label
                        for="inp_sexo_0">Sr.</label>
                    <input type="radio" id="inp_sexo_1" name="inp_sexo" value="1" required="true"><label
                        for="inp_sexo_1">Sra.</label>
                </p>
                <p>
                    <label for="inp_nombre">Nombre:</label>
                    <input type="text" placeholder="Introduce nombre" required="true" id="inp_nombre"
                        name="inp_nombre" />
                </p>
                <p>
                    <label for="inp_apellidos">Apellidos:</label>
                    <input type="text" placeholder="Introduce apellidos" id="inp_apellidos" name="inp_apellidos" />
                </p>


                <p>
                    <label for="inp_dni">DNI sin letra:</label> <input type="number" placeholder="DNI" id="inp_dni"
                        name="inp_dni" size="10" required="true" />
                </p>
                <p>
                    <label for="inp_contrasena">Password:</label> <input type="password" placeholder="Contraseña"
                        id="inp_contrasena" name="inp_contrasena" size="10" required="true" />
                </p>
            </fieldset>
            <br>
            <!-- Aqui viene el bloque 3  -->
            <fieldset>
                <legend>Tipo de viaje:</legend>
                <p>
                    <label for="inp_viajeros">Número de viajeros:</label> <input type="number" min="1" id="inp_viajeros"
                        name="inp_viajeros" required="true" size="4" />
                </p>
                <label for="inp_fecha">Fecha de inicio</label> <input type="date" id="inp_fecha" name="inp_fecha"
                    required="true">

                <select name="inp_duracion" required="true">
                    <option selected="true" disabled="true">Duración de la estancia</option>
                    <option value="1" required="true">1 semana</option>
                    <option value="2" required="true">2 semana</option>
                    <option value="3" required="true">3 semana</option>
                    <option value="4" required="true">4 semana</option>
                    <option value="5" required="true">5 semana</option>
                    <option value="6" required="true">6 semana</option>
                    <option value="7" required="true">7 semana</option>
                    <option value="8" required="true">8 semana</option>
                </select>
                <p>
                    <label>Destino:</label>
                    <input type="radio" id="inp_destino_0" name="inp_destino" value="0" required="true"><label
                        for="inp_destino_0">Playa</label>
                    <input type="radio" id="inp_destino_1" name="inp_destino" value="1" required="true"><label
                        for="inp_destino_1">Montaña</label>
                    <input type="radio" id="inp_destino_2" name="inp_destino" value="2" required="true"><label
                        for="inp_destino_2">Aventura</label>
                </p>
                <p>
                    <label>Extras:</label>
                    <input type="checkbox" id="inp_excursiones" name="inp_excursiones" value="1">
                    <label for="inp_excursiones">Excursiones</label>
                    <input type="checkbox" id="inp_lavanderia" name="inp_lavanderia" value="2">
                    <label for="inp_lavanderia">lavandería</label>
                    <input type="checkbox" id="inp_transporte" name="inp_transporte" value="3">
                    <label for="inp_transporte">Transporte</label>
                </p>

            </fieldset>
            <br>
            <!-- El último bloque -->
            <fieldset>
                <legend>Información:</legend>
                <p><label>A sabido de nosotros principalmente por:</label></p>
                <p>
                    <input type="radio" id="inp_referencia_0" name="inp_referencia" value="0" required> <label
                        for="inp_referencia_0">Publicidad en facebook</label>
                    <input type="radio" id="inp_referencia_1" name="inp_referencia" value="1" required> <label
                        for="inp_referencia_1">A través del email</label>
                    <input type="radio" id="inp_referencia_2" name="inp_referencia" value="2" required> <label
                        for="inp_referencia_2">Publicidad en prensa</label>
                    <input type="radio" id="inp_referencia_3" name="inp_referencia" value="3" required> <label
                        for="inp_referencia_3">Otros</label>
                </p>

                <label>¿Quiere recibir información sobre ofertas y otras comunicaciones?</label>

                <p>
                    <select name="inp_info">
                        <option value="0">Si</option>
                        <option value="1">No</option>
                    </select>
                </p>

            </fieldset>
            <p><input type="submit" value="Enviar datos" /></p>
        </form>
    </center>

</body>

</html>