
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
                $valor = $_POST['nm_Eliminar'];

                try {

                    $objeto_conexion = new PDO('mysql:host=localhost; dbname=p10hospital', "root", "");
                    $objeto_conexion -> query("DELETE FROM pacientes WHERE id_paciente = ".$valor."");
                    $objeto_conexion = null;
                    
                    echo '
                        <br><br><br>
                        <div class="container">
                            <div class="card text-center">
                                <div class="card-body">
                                    <hr class="my-4">
                                    <h5 class="card-title">Eliminaión</h5>
                                    <p class="card-text">Datos eliminados con exito, redireccionando...</p>
                                    <hr class="my-4">
                                </div>
                            </div>
                        </div>';
                    
                    Redireccion(1, "index.php");
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

