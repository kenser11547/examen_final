<?php
require_once '../../modelos/Paciente.php';
require_once '../../modelos/Medico.php';
    try {
        $paciente = new Paciente();
        $medico = new Medico();
        $pacientes = $paciente->buscar();
        $medicos = $medico->buscar();
            // var_dump($clientes);
            // exit;
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
    <div class="container">
        <h1 class="text-center">Formulario de citas</h1>
        <div class="row justify-content-center">
            <form action="/final_caaljuc/controladores/citas/buscar.php" method="GET" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                        <label for="cita_paciente">Paciente</label>
                        <select name="cita_paciente" id="cita_paciente" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($pacientes as $key => $paciente) : ?>
                                <option value="<?= $paciente['PACIENTE_ID'] ?>"><?= $paciente['PACIENTE_NOMBRE'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="venta_fecha">Fecha de la venta</label>
                        <input type="date-local" value="<?= date('Y-m-d') ?>" name="venta_fecha" id="venta_fecha" class="form-control">
                    </div>
                </div>
               
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-info w-100">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>