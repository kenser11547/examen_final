<?php
require '../../modelos/Medico.php';
require '../../modelos/Especialidad.php';
require '../../modelos/Clinica.php';


    try { if(isset($_GET['medico_id']) && $_GET['medico_id'] != ''){
    
        $medico_id = $_GET['medico_id'];
        $medico = new Medico(["medico_id" => $medico_id]);
        $especialidad = new Especialidad($_GET);
        $clinica = new Clinica($_GET);


        $medicos = $medico->buscar();
        $especialidades = $especialidad->buscar();
        $clinicas = $clinica->buscar();
    }
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
    <div class="container">
        <h1 class="text-center">Modificar pacientes</h1>
        <div class="row justify-content-center">
            <form action="/final_caaljuc/controladores/medicos/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="medico_id" value="<?= $medicos[0]['MEDICO_ID'] ?>">
                <div class="row mb-3">
                    <div class="col">
                        <label for="medico_nombre">Nombre del medico</label>
                        <input type="text" name="medico_nombre" id="medico_nombre" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="medico_especialidad">Especialidad</label>
                        <select name="medico_especialidad" id="medico_especialidad" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($especialidades as $key => $especialidad) : ?>
                                <option value="<?= $especialidad['ESPECIALIDAD_ID'] ?>"><?= $especialidad['ESPECIALIDAD_NOMBRE'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="medico_clinica">Clinica</label>
                        <select name="medico_clinica" id="medico_clinica" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($clinicas as $key => $clinica) : ?>
                                <option value="<?= $clinica['CLINICA_ID'] ?>"><?= $clinica['CLINICA_NOMBRE'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-warning w-100">Modificar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>