<?php
require '../../modelos/Medico.php';
    try {
        $medico = new Medico($_GET);

        $medicos = $medico->buscar();
       
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
    <div class="container">
        <h1 class="text-center">Modificar pacientes</h1>
        <div class="row justify-content-center">
            <form action="/final_caaljuc/controladores/medicos/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="medico_id">
                <div class="row mb-3">
                    <div class="col">
                        <label for="medico_nombre">Nombre del medico</label>
                        <input type="text" name="medico_nombre" id="medico_nombre" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="medico_especialidad">Especialidad</label>
                        <input type="text" name="medico_especialidad" id="medico_especialidad" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="medico_clinica">Clinica</label>
                        <input type="text" name="medico_clinica" id="medico_clinica" class="form-control" required>
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