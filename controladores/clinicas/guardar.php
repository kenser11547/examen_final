<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
<?php
require '../../modelos/Clinica.php';


if($_POST['clinica_nombre'] != ''){



    try {
        $clinica = new Clinica($_POST);
        $resultado = $clinica->guardar();
        $error = "NO se guardó correctamente";
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
}else{
    $error = "Debe llenar todos los datos";
}


// if($resultado){
//     echo "Guardado exitosamente";
// }else{
//     echo "Ocurrió un error: $error";
// }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Resultados</title>
</head><br><center>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php if($resultado): ?>
                    <div class="alert alert-success" role="alert">
                        Guardado exitosamente!
                    </div>
                <?php else :?>
                    <div class="alert alert-danger" role="alert">
                        Ocurrió un error: <?= $error ?>
                    </div>
                <?php endif ?>
              
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <a href="/final_caaljuc/vistas/clinicas/index.php" class="btn btn-success">Regresar al formulario</a>
            </div>
        </div>
    </div>
</body></center>
</html>
<?php include_once '../../includes/footer.php'?>