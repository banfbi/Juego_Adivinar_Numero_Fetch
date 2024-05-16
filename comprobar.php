<?php
    $numeroSecreto = 15;
    $data = json_decode(file_get_contents('php://input'), true); // Esta línea sirve para recibir el contenido de un archivo
    $numeroEnviado = $data['numeroEnviado'];
    if ($numeroEnviado == $numeroSecreto) {
        $tiempo = $data['tiempo'];
        $intentosFallidos = $data['intentosFallidos'];
        $contenido = "Tiempo: " . $tiempo . " segundos, Intentos fallidos: " . $intentosFallidos;

        $file = fopen("fichero.txt", "a");
        fwrite($file, $contenido . PHP_EOL);
        fclose($file);

        echo '{"mensaje":"¡Enhorabuena, has acertado el número!","acertado":true}';
    } else {
        echo '{"mensaje":"Lo siento, has fallado. El número secreto era ' . $numeroSecreto . '","acertado":false}';
    }
/*=======================================================
Copyright (c) 2024. Alejandro Alberto Jiménez Brundin
=======================================================*/
