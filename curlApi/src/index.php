<?php
    #Direccion de al api
    const API_URL = "https://whenisthenextmcufilm.com/api";
    //Inicializar nueva sesion de curl; ch = cURL handle
    $ch = curl_init(API_URL);
    //Indicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla, hace un echo el wwey
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

    //ejecutar peticion y guardar
    $result = curl_exec($ch);

    $data = json_decode($result, true);

    curl_close($ch);

    //var_dump($data);

    //Si solo quieres hacer GET de la API
    #result = file_get_contents(API_URL);







?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelicula de marvel</title>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>
<body>
    <style>

        body{
            display: grid;
            place-content: center;
            text-align: center;
        }

        section{
            display: flex;
            justify-content: center;
        }

        hgroup{
            display: flex;
            justify-content: center;
            flex-direction: column;
            text-align: center;
        }
    </style>
    <main>
        <h1>La proxima pelicula del mcu</h1>
        <section>
            <img src="<?= $data["poster_url"]; ?>" alt="Poster de <?= $data["title"]; ?>" width="300"
            style="border-radius: 16px;">
        </section>
        
        <hgroup>
            <h3><?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> días</h3>
            <p>Fecha de estreno: <?= $data["release_date"]; ?></p>
            <p>La siguiete es: <?= $data["following_production"]["title"]; ?></p>
        </hgroup>
        <br><br><br><br>
        <h2>Array asociativo</h2>
        <pre style="font-size: 10px; overflow: scroll; height: 200px;">
            <?php var_dump($data); ?>
        </pre>
    </main>
</body>
</html>