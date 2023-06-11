<?php
require '../../modelos/Medico.php';
require_once '../../modelos/Especialidad.php';
require_once '../../modelos/Clinica.php';
try {
    $medico = new Medico($_GET);
    $especialidad = new Especialidad();
    $clinica = new Clinica();
    $medicos = $medico->buscar();
    $especialidades = $especialidad->buscar();
    $clinicas = $clinica->buscar();
    // echo "<pre>";
    // var_dump($clientes);
    // echo "</pre>";
    // exit;
    // $error = "NO se guardó correctamente";
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Resultados de busqueda</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>NO. </th>
                            <th>NOMBRE</th>
                            <th>ESPECIALIDAD</th>
                            <th>CLINICA</th>
                            <th>MODIFICAR</th>
                            <th>ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($medicos) > 0):?>
                        <?php foreach($medicos as $key => $medico) : ?>
                            <?php
                            // Obtener la especialidad del médico
                            $especialidad = $especialidades[$key];
        
                            // Obtener la clínica del médico
                            $clinica = $clinicas[$key];
                            ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $medico['MEDICO_NOMBRE'] ?></td>
                            <td><?= $especialidad['ESPECIALIDAD_NOMBRE'] ?></td>
                            <td><?= $clinica['CLINICA_NOMBRE'] ?></td>
                            <td><a class="btn btn-warning w-100" href="/final_caaljuc/vistas/medicos/modificar.php?medico_id=<?= $medico['MEDICO_ID']?>">Modificar</a></td>
                            <td><a class="btn btn-danger w-100" href="/final_caaljuc/controladores/medicos/eliminar.php?medico_id=<?= $medico['MEDICO_ID']?>">Eliminar</a></td>
                        </tr>
                        <?php endforeach ?>
                        <?php else :?>
                            <tr>
                                <td colspan="3">NO EXISTEN REGISTROS</td>
                            </tr>
                        <?php endif?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <a href="/final_caaljuc/vistas/medicos/buscar.php" class="btn btn-info w-100">Regresar a la busqueda</a>
            </div>
        </div>
    </div>
</body>
</html>