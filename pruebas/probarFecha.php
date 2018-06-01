<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <?php
            setlocale(LC_TIME, 'es_CO.UTF-8'); //Se establece el servidor en la hora que corresponde a la zona
            ?>

            <form method="GET">
                <input type="datetime-local" name="fecha" value="<?php echo date('Y-m-d\TH:i:s'); ?>"/>
                <input type="submit"  value="Enviar"/>

            </form>
            <?php
            if (isset($_GET['fecha'])) {
                echo $_GET['fecha'];
            }
            ?>

        </div>
    </body>
</html>


