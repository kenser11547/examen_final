<?php
require_once '../../modelos/Cita.php';
require_once '../../modelos/Detalle.php';

$pacientes = array_filter($_POST['pacientes']);
$medicos = array_filter($_POST['medicos']);
$_POST['cita_fecha'] = str_replace('T',' ', $_POST['cita_fecha']);
if($_POST['cita_paciente'] != '' && $_POST['cita_fecha'] != '' && count($pacientes)>0 && count($medicos)>0){

    


    try {
        $cita = new Cita($_POST);
        $resultado = $cita->guardar();
        $idInsertado = $resultado['id'];
        $i = 0;
        foreach ($pacientes as $key => $paciente) {
            $detalle = new Detalle([
                'detalle_cita' => $idInsertado,
                'detalle_paciente' => $paciente,
                'detalle_medico' => $medicos[$i]
            ]);
            $detalle->guardar();
            $i++;

        }

        
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
}else{
    $error = "Debe llenar todos los datos y seleccionar al menos un producto";
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
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
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
            <div class="col-lg-4">
                <a href="/final_caaljuc/vistas/ventas/index.php" class="btn btn-info">Volver al formulario</a>
            </div>
        </div>
    </div>
</body>
</html>

