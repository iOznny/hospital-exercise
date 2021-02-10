<?php

function Redireccion($time, $url) {
    header("refresh:".$time."; url=".$url."");
}


function SQL_Search ($aux1, $aux2) {
    
    $objeto_conexion = new PDO('mysql:host=localhost;dbname=p10hospital', "root", "");

    switch ($aux1)
    {
        case "NHospital":
        {

            $hospitales = $objeto_conexion -> query("SELECT * from hospitales WHERE Nombre LIKE '".$aux2."%'"); 
            $hospitales -> setFetchMode(PDO::FETCH_NUM);
            $hospitales -> execute();
            $hs = $hospitales->fetch();
            $hs = $hs[0];

            foreach ($objeto_conexion -> query("SELECT * from pacientes WHERE NHospital LIKE '".$hs."%'") as list($id, $ine, $name, $am, $ap, $fch, $nhosp, $nserv)) {

                /* Conexion con hospitales para convertirlo en objeto y sacar el nombre dependiendo del id */
                $hosp = $objeto_conexion -> query('SELECT * from hospitales WHERE id = '.$nhosp.';');
                $hosp -> setFetchMode(PDO::FETCH_NUM);
                $hosp -> execute();
                $h = $hosp->fetch();
                $h = $h[1];

                /* Conexion con servicios para convertirlo en objeto y sacar el nombre dependiendo del id */
                $serv = $objeto_conexion -> query('SELECT * from servicios WHERE id_servicio = '.$nserv.';');
                $serv -> setFetchMode(PDO::FETCH_NUM);
                $serv -> execute();
                $s = $serv->fetch();
                $s = $s[1];
                
                    echo "
                        <tr>
                            <td>".$id."</td>
                            <td>".$name."</td>
                            <td>".$ap."</td>
                            <td>".$am."</td>
                            <td>".$ine."</td>
                            <td>".$h."</td>
                            <td>".$s."</td>
                            <td>
                                <form action='eliminar.php' method='post'>
                                    <input type='hidden' value=".$id." name='nm_Eliminar'>
                                    <input type='submit' class='form-control btn btn-danger' value='Eliminar'>
                                </form>
                            </td>
                            <td >
                                <form action='editar.php' method='post'>
                                    <input type='hidden' value=".$id." name='nm_Editar'>
                                    <input type='submit' class='form-control btn btn-primary' value='Editar'>
                                </form>
                            </td>
                        </tr>";              
            }
            break;
        }

        case "NServicio":
        {
            $servicios = $objeto_conexion -> query("SELECT * from servicios WHERE Nombre LIKE '".$aux2."%'"); 
            $servicios -> setFetchMode(PDO::FETCH_NUM);
            $servicios -> execute();
            $sv = $servicios->fetch();
            $sv = $sv[0];

            foreach ($objeto_conexion -> query("SELECT * from pacientes WHERE NServicio LIKE '".$sv."%'") as list($id, $ine, $name, $am, $ap, $fch, $nhosp, $nserv)) {

                /* Conexion con hospitales para convertirlo en objeto y sacar el nombre dependiendo del id */
                $hosp = $objeto_conexion -> query('SELECT * from hospitales WHERE id = '.$nhosp.';');
                $hosp -> setFetchMode(PDO::FETCH_NUM);
                $hosp -> execute();
                $h = $hosp->fetch();
                $h = $h[1];

                /* Conexion con servicios para convertirlo en objeto y sacar el nombre dependiendo del id */
                $serv = $objeto_conexion -> query('SELECT * from servicios WHERE id_servicio = '.$nserv.';');
                $serv -> setFetchMode(PDO::FETCH_NUM);
                $serv -> execute();
                $s = $serv->fetch();
                $s = $s[1];
                
                    echo "
                        <tr>
                            <td>".$id."</td>
                            <td>".$name."</td>
                            <td>".$ap."</td>
                            <td>".$am."</td>
                            <td>".$ine."</td>
                            <td>".$h."</td>
                            <td>".$s."</td>
                            <td>
                                <form action='eliminar.php' method='post'>
                                    <input type='hidden' value=".$id." name='nm_Eliminar'>
                                    <input type='submit' class='form-control btn btn-danger' value='Eliminar'>
                                </form>
                            </td>
                            <td >
                                <form action='editar.php' method='post'>
                                    <input type='hidden' value=".$id." name='nm_Editar'>
                                    <input type='submit' class='form-control btn btn-primary' value='Editar'>
                                </form>
                            </td>
                        </tr>";              
            }
            break;
        }

        default :
        {
            try {
         
                $stmt = $objeto_conexion -> query("SELECT * from pacientes WHERE ".$aux1." LIKE '".$aux2."%'"); 
                $stmt -> setFetchMode(PDO::FETCH_NUM);
                $stmt -> execute();
                $row = $stmt->fetch();
        
                /* Obtenemos los valores de las relaciones para poder extraer despues el nombre de esos numeros */
                $numHospital = $row[6];
                $numServicio = $row[7];
        
                /* Conexion con hospitales para convertirlo en objeto y sacar el nombre dependiendo del id */
                $hosp = $objeto_conexion -> query('SELECT * from hospitales WHERE id = '.$numHospital.';');
                $hosp -> setFetchMode(PDO::FETCH_NUM);
                $hosp -> execute();
                $h = $hosp->fetch();
        
                /* Conexion con servicios para convertirlo en objeto y sacar el nombre dependiendo del id */
                $serv = $objeto_conexion -> query('SELECT * from servicios WHERE id_servicio = '.$numServicio.';');
                $serv -> setFetchMode(PDO::FETCH_NUM);
                $serv -> execute();
                $s = $serv->fetch();
                  
                 
                if (!$row == 0) {
                    echo "
                        <tr>
                            <td>".$row[0]."</td>
                            <td>".$row[2]."</td>
                            <td>".$row[4]."</td>
                            <td>".$row[3]."</td>
                            <td>".$row[1]."</td>
                            <td>".$h[1]."</td>
                            <td>".$s[1]."</td>
                            <td>
                                <form action='eliminar.php' method='post'>
                                    <input type='hidden' value=".$row[0]." name='nm_Eliminar'>
                                    <input type='submit' class='form-control btn btn-danger' value='Eliminar'>
                                </form>
                            </td>
                            <td >
                                <form action='editar.php' method='post'>
                                    <input type='hidden' value=".$row[0]." name='nm_Editar'>
                                    <input type='submit' class='form-control btn btn-primary' value='Editar'>
                                </form>
                            </td>
                        </tr>";
                }
                else {
                    echo '
                        <div class="container">
                            <div class="card text-center">
                                <div class="card-body alert alert-danger">
                                    <hr class="my-4">
                                    <h5 class="card-title"><a class="alert-link">ERROR</a></h5>
                                    <p class="card-text">NO ENCONTRADO EN LA BASE DE DATOS, VERIFIQUE.</p>
                                    <hr class="my-4">
                                </div>
                            </div>
                        </div>';
                }
        
                $objeto_nuevo = null;
            }
            catch (PDOException $error) {
                print "¡Error!: " . $error -> getMessage() . "<br/>";
                die();
            } 
        }   
    }  
}


function selectSQL ($table) {
    try {
                                    
        $objeto_nuevo = new PDO('mysql:host=localhost;dbname=p10hospital', "root", "");
        foreach ($objeto_nuevo -> query('SELECT * from '. $table) as list($id, $nombre)) {
            echo "<option value=".$id.">".$nombre."</option>";
        }
        $objeto_nuevo = null;
    }
    catch (PDOException $error) {
        print "¡Error!: " . $error -> getMessage() . "<br/>";
        die();
    }   
}


?>