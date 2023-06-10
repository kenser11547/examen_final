<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../modelos/Cita.php';
require '../../modelos/Paciente.php';
    try {
        $id = $_GET['cita_id'];
        $cita = new Cita($_GET);
        $paciente = new Paciente([
            'paciente_nombre' => $id
        ]);

        $citas = $venta->buscar();
        $pacientes = $detalle->buscar();
        // echo "<pre>";
        // var_dump($ventas);
        // echo "</pre>";
        // echo "<pre>";
        // var_dump($productos);
        // echo "</pre>";
        // echo strlen($ventas[0]['CLIENTE_NIT']) - 2;
        $subtotal = 0;
        $cantidades = 0;
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
                            <td>FECHA:</td>
                            <td colspan="4"><?= date('d/m/Y' , strtotime( $citas[0]['CITA_FECHA'])) ?></td>
                        </tr>
                        <tr>
                            <td>NOMBRE:</td>
                            <td colspan="4"><?= $pacientes[0]['PACIENTE_NOMBRE'] ?></td>
                        </tr>
                        <tr>
                            <td>NIT:</td>
                            <td colspan="4"><?= substr_replace($citas[0]['CITA_PACIENTE'], '-', strlen($citas[0]['CITA_NOMBRE']) - 1, 0 )?></td>
                        </tr>
                        <tr class="text-center table-dark" >
                            <th colspan="5">CLINICA</th>
                        </tr>
                        <tr>
                            <th>NO.</th>
                            <th>PRODUCTO</th>
                            <th>PRECIO</th>
                            <th>CANTIDAD</th>
                            <th>SUBTOTAL</th>
                        </tr>
                        <?php if(count($productos) > 0):?>

                        <?php foreach($productos as $key => $producto) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $producto['PRODUCTO_NOMBRE'] ?></td>
                            <td><?= $producto['PRODUCTO_PRECIO'] ?></td>
                            <td><?= $producto['CANTIDAD'] ?></td>
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