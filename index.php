<!DOCTYPE html>
<html lang="es">
    <?php 
        include("libs/head.html");
        include("libs/nav.html");
        include("metodos.php");
    ?>
    
    <body>
        <div class="container">
            <br>
            <h2 class="text-center">REGISTRO MEDICOS</h2>
            
            <!-- Formulario de registro de Medico -->
            <form class="was-validated" action="guardar-paciente.php" method="post">
                <br><br>
                <div class="col-lg-12">
                    <h5 class="card-title">Nombre Completo</h5>
                    <input type="text" class="form-control is-invalid" id="customControlValidation1" name="Pac_Nombre" placeholder="Ingrese el nombre" required maxlength="30" pattern="[a-zñA-Zá-ú ]{3,30}" onkeyup="javascript:this.value=this.value.toUpperCase()" autofocus>
                </div><br>

                <div class="col-lg-12">
                    <h5 class="card-title">Apellido Paterno</h5>
                    <input  type="text" class="form-control is-invalid" id="customControlValidation2" name="Pac_ApPat" placeholder="Apellido Paterno" required maxlength="30" pattern="[a-zñA-Zá-ú ]{3,30}" onkeyup="javascript:this.value=this.value.toUpperCase()">
                </div><br>

                <div class="col-lg-12">
                    <h5 class="card-title">Apellido Materno</h5>
                    <input type="text" class="form-control is-invalid" id="customControlValidation3" name="Pac_ApMat"  placeholder="Apellido Materno" required maxlength="30" pattern="[a-zñA-Zá-ú ]{3,30}" onkeyup="javascript:this.value=this.value.toUpperCase()">
                </div><br>

                <div class="col-lg-12">
                    <h5 class="card-title">INE</h5>
                    <input type="text" class="form-control is-invalid" id="customControlValidation4" name="Pac_INE" placeholder="Ingrese su INE" required maxlength="10" pattern="[a-zA-Z0-9]{10,10}" onkeyup="javascript:this.value=this.value.toUpperCase()">
                </div><br>

                <div class="col-lg-12">
                    <h5 class="card-title">Fecha de Nacimiento</h5>
                    <input type="date" class="form-control is-invalid" id="customControlValidation5" name="Pac_Nacimiento" required min="1970-01-01" max="2020-12-31" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
                </div><br><br>

                <div class="col-lg-12">
                    <h5 class="card-title">Hospital</h5>
                    <select class="custom-select browser-default" id="customControlValidation7" name="slcHospital" required>
                        <option value="" select hidden>Seleccione su hospital...</option>
                        <?php selectSQL('hospitales'); ?>
                    </select>
                </div><br><br>

                <div class="col-lg-12 form-group">
                    <h5 class="card-title">Servicio</h5>
                    <select class="custom-select browser-default" id="customControlValidation7" name="slcServicio" required>
                        <option value="" select hidden>Seleccione su servicio...</option>
                        <?php selectSQL('servicios'); ?>
                    </select>
                </div><br><br>

                <div class="col-lg-12">
                    <button type="sumbit" class="btn btn-success">Guardar</button>
                </div><br>
            </form>
        </div>
    </body>
    
    <!-- Scripts -->
    <script src="ssets/js/Script.js"></script>
</html>