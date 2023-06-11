<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../modelos/Cita.php';
require '../../modelos/Detalle.php';
require '../../modelos/Medico.php';
    try {
        $id = $_GET['cita_id'];
        $cita = new Cita($_GET);
        $medico = new Medico($_GET);
        $detalle = new Detalle([
            'detalle_cita' => $id
        ]);

        $citas = $cita->buscar();
        $pacientes = $detalle->buscar();
        $medicos = $medico->buscar();
        // echo "<pre>";
        // var_dump($ventas);
        // echo "</pre>";
        // echo "<pre>";
        // var_dump($productos);
        // echo "</pre>";
        // echo strlen($ventas[0]['CLIENTE_NIT']) - 2;
        //$subtotal = 0;
        //$cantidades = 0;
        // exit;
        // $error = "NO se guardó correctamente";
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center table-dark">
                            <th colspan="5">DETALLE DE CITA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="4">CITAS PARA EL DIA DE HOY <?= date('d/m/Y' , strtotime( $citas[0]['CITA_FECHA'])) ?></td>
                        </tr>
                        <tr>
                            <td><?= $medicos[0]['MEDICO_CLINICA'] ?><?= $citas[0]['CITA_MEDICO'] ?></td>
                        </tr>
                        <tr>
                        <tr>
                            <th>NO.</th>
                            <th>PACIENTE</th>
                            <th>DPI</th>
                            <th>TELEFONO</th>
                            <th>HORA DE LA CITA</th>
                            <th>REFERIDO SI/NO</th>
                        </tr>
                        <?php if(count($pacientes) > 0):?>

                        <?php foreach($pacientes as $key => $paciente) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $paciente['PACIENTE_NOMBRE'] ?></td>
                            <td><?= $paciente['PACIENTE_DPI'] ?></td>
                            <td><?= $paciente['PACIENTE_TELEFONO'] ?></td>
                            <td>Q. <?= $producto['TOTAL'] ?></td>
                            <?php $subtotal += $producto['TOTAL'] ?>
                            <?php $cantidades += $producto['CANTIDAD'] ?>
                        </tr>
                        <?php endforeach ?>
                        <tr class="fw-bold bg-light">
                            <td colspan="3">TOTAL</td>
                            <td ><?= $cantidades ?></td>
                            <td >Q. <?= $subtotal ?></td>
                        </tr>
                        <?php else :?>
                            <tr>
                                <td colspan="5">NO EXISTEN REGISTROS</td>
                            </tr>
                        <?php endif?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>