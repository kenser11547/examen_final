<?php
require '../../modelos/Cita.php';



if($_POST['cita_paciente'] != '' && $_POST['cita_medico'] != '' && $_POST['cita_fecha'] != '' && $_POST['cita_hora'] != '' && $_POST['cita_referencia'] != ''){
    
//    $_POST['cita_fecha']= '2/2/2023';


$_POST['cita_fecha']= date('d/m/Y', strtotime($_POST['cita_fecha']));


    try {
        $cita = new Cita($_POST);
        // Formatear la fecha y hora en el formato correcto
      

        // Asignar el valor formateado al campo cita_fecha

        $resultado = $cita->guardar();
        $citas = $cita->buscarPorFecha();
        $error = "NO se guardó correctamente";
    //   echo "Fecha formateada: $cita_fecha";
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
<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Resultados</title>
</head><center>
<body><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php if($resultado): ?>
                    <div class="alert alert-danger" role="alert">
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
                <a href="/final_caaljuc/vistas/citas/index.php" class="btn btn-danger">Regresar al formulario</a>
            </div>
        </div>
    </div>
</body></center>
</html>
<?php include_once '../../includes/footer.php'?>