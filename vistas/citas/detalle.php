<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
<br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 table-responsive">
                <table class="table table-bordered custom-bordered-table">
                    <thead>
                        <tr class="text-center table-primary">
                            <th colspan="6">HOSPITAL "LA ESPERANZA" CITAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center table-primary">
                            <td colspan="6"><center>CITAS PARA EL DIA DE HOY (<?= $fecha?>) </center></td>
                            
                        </tr>
                        </tr>
                        <tr class="text-center table-dark">
                            <td colspan="6"><?= $busqueda[1]['CLINICA_NOMBRE'] ?>(DOCTOR <?= $busqueda[1]['MEDICO_NOMBRE'] ?>)</td>
                        </tr>
                        <tr class="text-center table-light">
                            <th>NO.</th>
                            <th>PACIENTE</th>
                            <th>DPI</th>
                            <th>TELEFONO</th>
                            <th>HORA DE LA CITA</th>
                            <th>REFERIDO SI / NO</th>
                        </tr >
                        <?php if (!empty($busqueda) && count($busqueda) > 0) : ?>
                            <?php $citasEncontradas = false; ?>
                            <?php foreach($busqueda as $key => $fila) : ?>
                                <?php if ($fila['CITA_MEDICO'] == 1 && $fila['MEDICO_CLINICA'] = 1) : ?>
                                    <?php $citasEncontradas = true; ?>
                                    <tr class="text-center table-secondary">
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $fila['PACIENTE_NOMBRE'] ?></td>
                                        <td><?= $fila['PACIENTE_DPI'] ?></td>
                                        <td><?= $fila['PACIENTE_TELEFONO'] ?></td>
                                        <td><?= $fila['CITA_HORA'] ?></td>
                                        <td><?= $fila['CITA_REFERENCIA'] ?></td>
                                    </tr>
                                <?php endif ?>
                            <?php endforeach ?>
                            <?php if (!$citasEncontradas) : ?>
                                <tr class="text-center table-secondary">
                                    <td colspan="6"><center>SIN CITAS</center></td>
                                </tr>
                            <?php endif ?>
                        <?php else : ?>
                            <tr class="text-center table-secondary">
                                <td colspan="6"><center>SIN CITAS</center></td>
                            </tr>
                        <?php endif ?>
                        <tr class="text-center table-dark">
                            <td colspan="6"><?= $busqueda[3]['CLINICA_NOMBRE'] ?>(DOCTOR <?= $busqueda[3]['MEDICO_NOMBRE'] ?>)</td>
                        </tr>
                        <tr class="text-center table-light">
                            <th>NO.</th>
                            <th>PACIENTE</th>
                            <th>DPI</th>
                            <th>TELEFONO</th>
                            <th>HORA DE LA CITA</th>
                            <th>REFERIDO SI / NO</th>
                        </tr>
                        <?php if (!empty($busqueda) && count($busqueda) > 0) : ?>
                            <?php $citasEncontradas = false; ?>
                            <?php $key = 0; ?>
                            <?php foreach($busqueda as $key => $fila) : ?>
                                <?php if ($fila['CITA_MEDICO'] == 2 && $fila['MEDICO_CLINICA'] = 2) : ?>
                                    <?php $citasEncontradas = true; ?>
                                    <tr class="text-center table-secondary">
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $fila['PACIENTE_NOMBRE'] ?></td>
                                        <td><?= $fila['PACIENTE_DPI'] ?></td>
                                        <td><?= $fila['PACIENTE_TELEFONO'] ?></td>
                                        <td><?= $fila['CITA_HORA'] ?></td>
                                        <td><?= $fila['CITA_REFERENCIA'] ?></td>
                                    </tr>
                                <?php endif ?>
                            <?php endforeach ?>
                            <?php if (!$citasEncontradas) : ?>
                                <tr class="text-center table-secondary">
                                    <td colspan="6"><center>SIN CITAS</center></td>
                                </tr>
                            <?php endif ?>
                        <?php else : ?>
                            <tr class="text-center table-secondary">
                                <td colspan="6"><center>SIN CITAS</center></td>
                            </tr>
                        <?php endif ?>
                        <tr class="text-center table-dark">
    <?php if ($busqueda[4]['CLINICA_ID'] == 4 && $busqueda[4]['MEDICO_ID'] == 4): ?>
        <td colspan="6"><?= $busqueda[4]['CLINICA_NOMBRE'] ?>(DOCTOR <?= $busqueda[4]['MEDICO_NOMBRE'] ?>)</td>
    <?php elseif ($busqueda[4]['CLINICA_ID'] == 4): ?>
        <td colspan="6"><?= $busqueda[4]['CLINICA_NOMBRE'] ?></td>
    <?php else: ?>
        <td colspan="6">DOCTOR <?= $busqueda[4]['MEDICO_NOMBRE'] ?></td>
    <?php endif; ?>
</tr>
                        <tr class="text-center table-light">
                            <th>NO.</th>
                            <th>PACIENTE</th>
                            <th>DPI</th>
                            <th>TELEFONO</th>
                            <th>HORA DE LA CITA</th>
                            <th>REFERIDO SI / NO</th>
                        </tr>
                        <?php if (!empty($busqueda) && count($busqueda) > 0) : ?>
                            
                            <?php $citasEncontradas = false; ?>
                            <?php $key = 0; ?>
                            <?php foreach($busqueda as $key => $fila) : ?>
                                <?php if ($fila['CITA_MEDICO'] == 3 && $fila['MEDICO_CLINICA'] = 3) : ?>
                                    <?php $citasEncontradas = true; ?>
                                    <tr class="text-center table-secondary">
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $fila['PACIENTE_NOMBRE'] ?></td>
                                        <td><?= $fila['PACIENTE_DPI'] ?></td>
                                        <td><?= $fila['PACIENTE_TELEFONO'] ?></td>
                                        <td><?= $fila['CITA_HORA'] ?></td>
                                        <td><?= $fila['CITA_REFERENCIA'] ?></td>
                                    </tr>
                                <?php endif ?>
                            <?php endforeach ?>
                            <?php if (!$citasEncontradas) : ?>
                                <tr class="text-center table-secondary">
                                    <td colspan="6"><center>SIN CITAS</center></td>
                                </tr>
                            <?php endif ?>
                        <?php else : ?>
                            <tr class="text-center table-secondary">
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
            <a href="/final_caaljuc/vistas/citas/index.php" class="btn btn-info">Regresar al formulario</a>
        </div>
    </div></center>