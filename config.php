<!doctype html>
<?php 
    $no_of_channels = 20;
    $my_json = "canales.json";
    $arr_data = array();
    $msgError = null;
    $msgSuccess = null;
    $canales = (isset($_POST['canales']) ? $_POST['canales'] : file_get_contents("channels.json"));

    if (isset($_POST['canales'])){
        $arr_data = json_decode($canales, true);
        if ($arr_data===null ) {
            $msgError = "Error. Formato incorrecto de lista de canales.";
        } else {
            if ( count($arr_data) > $no_of_channels - 1) {
                $arr_data = array_slice($arr_data, 0, $no_of_channels);
            } 
            $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
            if (file_put_contents($my_json, $jsondata)) {
                $msgSuccess = "El archivo se guardó correctamente.";  
            }   else {
                $msgError = "Error. Al guardar el formato.";
            }
        }
    }
?>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Configurar!</title>
</head>

<body>
    <div class="container">
        <main>
            <h1>Pancho Gráficas!</h1>
<?php if ($msgSuccess) {?>
            <div class="alert alert-success" role="alert">
              <?= $msgSuccess ?><a href="index.html" class="alert-link">Ver tablero</a>
            </div>
<?php } ?>
<?php if ($msgError) {?>
    <div class="alert alert-warning" role="alert">
               <?= $msgError ?>
            </div>
<?php } ?>

            <form action="config.php" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="nombre@correo.com">
                </div>
                <div class="mb-3">
                    <label for="canales" class="form-label">Pega los canales</label>
                    <textarea class="form-control" id="canales" name="canales" rows="10" style="font-family:monospace;" required><?php echo $canales; ?></textarea>
                </div>
                <button class="w-100 btn btn-primary btn-lg" type="submit">Guardar</button>
            </form>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>