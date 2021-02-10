<!DOCTYPE html>
<html lang="es">
    <?php 
        include("libs/head.html");
        include("libs/nav.html");
        include("metodos.php");
    ?>

    <body>
        <div class="container">
            <?php
                $conid = $_POST['conid_editar'];
                $nombrePA = $_POST['Pac_Nombre'];
                $ap = $_POST['Pac_ApPat'];
                $am = $_POST['Pac_ApMat'];
                $fchn = $_POST['Pac_Nacimiento'];
                $dni = $_POST['Pac_INE'];
                $nhosp = $_POST['slcHospital'];
                $nserv = $_POST['slcServicio'];
                
                try {
                    $objeto_conexion = new PDO('mysql:host=localhost;dbname=p10hospital', "root", "");  
                    $objeto_conexion -> query("UPDATE `pacientes` SET `INE` = '".$dni."' , `Nombre` = '".$nombrePA."' , `Apellido_Materno` = '".$am."' , `Apellido_Paterno` = '".$ap."' 
                        , `Fecha_Nacimiento` = '".$fchn."', `NHospital` = '".$nhosp."', `NServicio` = '".$nserv."' WHERE `id_paciente` = ".$conid.";");

                    echo '
                        <br><br><br>
                        <div class="container">
                            <div class="card text-center">
                                <div class="card-body">
                                    <hr class="my-4">
                                    <h5 class="card-title">Actualización</h5>
                                    <p class="card-text">Datos actualizados con exito, redireccionando...</p>
                                    <hr class="my-4">
                                </div>
                            </div>
                        </div>';
                        
                        Redireccion(3, "index.php");
                        $objeto_conexion = null;
                } 
                catch (PDOException $error) {
                        print "¡Error!: " . $error -> getMessage() . "<br/>";
                        die();
                }
            ?>
        </div>
    </body>

    <!-- Scripts -->
    <script src="ssets/js/Script.js"></script> 
</html>
