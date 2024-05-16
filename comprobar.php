<?php
    $numeroSecreto = 15;
    $data = json_decode(file_get_contents('php://input'), true); // Esta línea sirve para recibir el contenido de un archivo
    $numeroEnviado = $data['numeroEnviado'];

    $intentos = $data['intentosFallidos'];
    $tiempo = $data['segundos'];

    if ($numeroEnviado == $numeroSecreto) {

        $archivo = 'fichero.txt';
        $contenido = "Número: $numeroEnviado - Intentos: $intentos - Tiempo: $tiempo\n";
        file_put_contents($archivo, $contenido, FILE_APPEND);

        echo '{"mensaje":"¡Enhorabuena, has acertado el número!","acertado":true}';
    } else {
        echo '{"mensaje":"Lo siento, has fallado.","acertado":false}';
    }
/*=======================================================
Copyright (c) 2024. Alejandro Alberto Jiménez Brundin
=======================================================*/
