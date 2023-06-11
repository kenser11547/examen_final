<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
        <h1 class="text-center">Formulario de ingreso de citas</h1>
        <div class="row justify-content-center">
            <form action="/final_caaljuc/controladores/citas/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
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
                        <label for="cita_medico">Asignar Medico</label>
                        <select name="cita_medico" id="cita_medico" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($medicos as $key => $medico) : ?>
                                <option value="<?= $medico['MEDICO_ID'] ?>"><?= $medico['MEDICO_NOMBRE'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="cita_fecha">Fecha de la cita</label>
                        <input type="date" value="<?= date('Y-m-d') ?>" name="cita_fecha" id="cita_fecha" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="cita_hora">Horario</label>
                        <input type="datetime" value="<?= date('H:i') ?>" name="cita_hora" id="cita_hora" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="cita_referencia">¿Tiene referencia? </label>
                        <select name="cita_referencia" id="cita_referencia" class="form-control">
                            <option value="si">Sí</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-primary w-100">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="../../assets/js/ventas.js" ></script>
<?php include_once '../../includes/footer.php'?>