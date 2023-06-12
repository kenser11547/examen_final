<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
<?php

require '../../modelos/Cita.php';

    try {
   
   $fecha = date('d/m/Y');
   $buscar = new Cita();

   $busqueda= $buscar->busqueda();


//    var_dump($fecha);
//    exit;
       
        // var_dump($ventas);
        // echo "</pre>";
        // echo "<pre>";
        // var_dump($productos);
        // echo "</pre>";
        // exit;
        // $error = "NO se guardó correctamente";
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } 
?>
<br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 table-responsive">
                <table class="table table-bordered custom-bordered-table">
                    <thead>
                        <tr class="text-center table-light">
                            <th colspan="6">HOSPITAL "LA ESPERANZA" CITAS</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr class="text-center table-dark">
                        <td colspan="6"><center>CITAS PARA EL DÍA DE HOY (<?= $fecha ?>)</center></td>
                    </tr>
                    <?php if (!empty($busqueda)): ?>
                        <?php $clinicaActual = ''; $medicoActual = ''; ?>
                        <?php foreach ($busqueda as $key => $fila) : ?>
                            <?php if ($clinicaActual != $fila['CLINICA_NOMBRE'] || $medicoActual != $fila['MEDICO_NOMBRE']): ?>
                                <?php if ($key > 0): ?>
                               <?php endif; ?>
                                    <thead>
                                        <tr class="text-center table-primary">
                                            <th colspan="6">CLÍNICA: <?= $fila['CLINICA_NOMBRE'] ?> (<?= $fila['MEDICO_NOMBRE'] ?>)</th>
                                        </tr>
                                        <tr class="text-center table-secondary">
                                            <th>NO</th>
                                            <th>PACIENTE</th>
                                            <th>DPI</th>
                                            <th>TELÉFONO</th>
                                            <th>HORA DE LA CITA</th>
                                            <th>REFERIDO (SI/NO)</th>
                                        </tr>
                                    </thead>
                            <?php endif; ?>
                            <tr class="text-center table-light">
                                <td><?= $key + 1 ?></td>
                                <td><?= $fila['PACIENTE_NOMBRE'] ?></td>
                                <td><?= $fila['PACIENTE_DPI'] ?></td>
                                <td><?= $fila['PACIENTE_TELEFONO'] ?></td>
                                <td><?= $fila['CITA_HORA'] ?></td>
                                <td><?= $fila['CITA_REFERENCIA'] ?></td>
                            </tr class="text-center table-secondary">
                            <?php $clinicaActual = $fila['CLINICA_NOMBRE']; $medicoActual = $fila['MEDICO_NOMBRE']; ?>
                        <?php endforeach ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6"><center>SIN CITAS</center></td>
                        </tr>
                    <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php include_once '../../includes/footer.php'?>
<center>
<div class="row">
        <div class="col-lg-12">
            <a href="/final_caaljuc/vistas/citas/index.php" class="btn btn-success">Regresar al formulario</a>
        </div>
    </div></center><br><br>
