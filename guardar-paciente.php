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
                $nombrePA = $_POST['Pac_Nombre'];
                $ap = $_POST['Pac_ApPat'];
                $am = $_POST['Pac_ApMat'];
                $fchn = $_POST['Pac_Nacimiento'];
                $ine = $_POST['Pac_INE'];
                $idHospital = $_POST['slcHospital'];
                $idServicio = $_POST['slcServicio'];
           
                try {
                    $objeto_conexion = new PDO('mysql:host=localhost;dbname=p10hospital', "root", "");
                    $objeto_conexion -> query("INSERT INTO pacientes VALUES (null,'".$ine."' , '".$nombrePA."' , '".$am."' , '".$ap."' , '".$fchn."', '".$idHospital."', '".$idServicio."' );");

                    echo '
                       <br><br><br>
                       <div class="container">
                           <div class="card text-center">
                               <div class="card-body">
                                   <hr class="my-4">
                                   <h5 class="card-title">Guardando</h5>
                                   <p class="card-text">Datos creados con exito, redireccionando...</p>
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







