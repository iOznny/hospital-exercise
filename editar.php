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
            <h2 class="text-center">INFORMACIÓN DEL MEDICO</h2>
            
            <!-- Formulario de registro de Medico -->
            <br><br>
            <form class="was-validated" action="editarnew-pac.php" method="post">

                <?php
                    try {
                        $conid = $_POST['nm_Editar'];

                        $ObjetoConexion = new PDO('mysql:host=localhost;dbname=p10hospital', "root", "");

                        $stmt = $ObjetoConexion -> query('SELECT * from pacientes WHERE id_paciente = '.$conid.';');
                        $stmt -> setFetchMode(PDO::FETCH_NUM);
                        $stmt -> execute();
                        $row = $stmt->fetch();

                        /* Obtenemos los valores de las relaciones para poder extraer despues el nombre de esos numeros */
                        $numHospital = $row[6];
                        $numServicio = $row[7];

                        /* Conexion con hospitales para convertirlo en objeto y sacar el nombre dependiendo del id */
                        $hosp = $ObjetoConexion -> query('SELECT * from hospitales WHERE id = '.$numHospital.';');
                        $hosp -> setFetchMode(PDO::FETCH_NUM);
                        $hosp -> execute();
                        $h = $hosp->fetch();

                        /* Conexion con servicios para convertirlo en objeto y sacar el nombre dependiendo del id */
                        $serv = $ObjetoConexion -> query('SELECT * from servicios WHERE id_servicio = '.$numServicio.';');
                        $serv -> setFetchMode(PDO::FETCH_NUM);
                        $serv -> execute();
                        $s = $serv->fetch();

                        echo '
                            <div class="col-lg-12">
                                <h5 class="card-title">Nombre Completo</h5>
                                <input type="text" class="form-control is-invalid" id="customControlValidation1" name="Pac_Nombre" placeholder="Ingrese el nombre" value="'.$row[2].'" required maxlength="30" pattern="[a-zñA-Zá-ú ]{3,30}" onkeyup="javascript:this.value=this.value.toUpperCase()" autofocus>
                            </div><br>

                            <div class="col-lg-12">
                                <h5 class="card-title">Apellido Paterno</h5>
                                <input  type="text" class="form-control is-invalid" id="customControlValidation2" name="Pac_ApPat" placeholder="Apellido Paterno" value="'.$row[4].'" required maxlength="30" pattern="[a-zñA-Zá-ú ]{3,30}" onkeyup="javascript:this.value=this.value.toUpperCase()">
                            </div><br>

                            <div class="col-lg-12">
                                <h5 class="card-title">Apellido Materno</h5>
                                <input type="text" class="form-control is-invalid" id="customControlValidation3" name="Pac_ApMat"  placeholder="Apellido Materno" value="'.$row[3].'" required maxlength="30" pattern="[a-zñA-Zá-ú ]{3,30}" onkeyup="javascript:this.value=this.value.toUpperCase()">
                            </div><br>

                            <div class="col-lg-12">
                                <h5 class="card-title">INE</h5>
                                <input type="text" class="form-control is-invalid" id="customControlValidation4" name="Pac_INE" placeholder="Ingrese su INE" value="'.$row[1].'" required maxlength="10" pattern="[a-zA-Z0-9]{10,10}" onkeyup="javascript:this.value=this.value.toUpperCase()">
                            </div><br>

                            <div class="col-lg-12">
                                <h5 class="card-title">Fecha de Nacimiento</h5>
                                <input type="date" class="form-control is-invalid" id="customControlValidation5" name="Pac_Nacimiento" value="'.$row[5].'" required min="1970-01-01" max="2020-12-31" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
                            </div><br><br>';
                ?>

                            <div class="col-lg-12">
                                <h5 class="card-title">Hospital</h5>
                                <select class="custom-select browser-default" id="customControlValidation7" name="slcHospital" required>
                                    <option value="<?php echo $numHospital; ?>" select hidden><?php echo $h[1]; ?></option>
                                    <?php selectSQL("hospitales"); ?>
                                </select>
                            </div><br><br>

                            <div class="col-lg-12 form-group">
                                <h5 class="card-title">Servicio</h5>
                                <select class="custom-select browser-default" id="customControlValidation7" name="slcServicio" required>
                                    <option value="<?php echo $numServicio; ?>" select hidden><?php echo $s[1]; ?></option>
                                    <?php selectSQL("servicios"); ?>
                                </select>
                            </div><br><br>

                <?php
                            echo '<input type="hidden" value="'.$conid.'" name="conid_editar">
                            <div class="col-lg-12">
                                <button type="sumbit" class="btn btn-success">Guardar</button>
                            </div><br>';

                        
                        $ObjetoConexion = null;
                    } 
                    catch (PDOException $error) {
                        print "¡Error!: " . $error -> getMessage() . "<br/>";
                        die();
                    }
                ?>
            </form>
        </div>
    </body> 

    <!-- Scripts -->
    <script src="ssets/js/Script.js"></script> 
</html>






