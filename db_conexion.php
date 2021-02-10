<!DOCTYPE html>
<html lang="es">
    <?php 
        include("libs/head.html");
        include("libs/nav.html");
    ?>

    <style>
        div.dataTables_wrapper {
            width: 100%;
            margin: 0 auto;
        }
    </style>

    <body>
        <!-- Table de Medicos -->
        <div class="container table-responsive">
            <table id="example" class="display nowrap " style="width:100%">
                <br>
                <!-- Encabezado de tabla -->
                <thead class="thead-dark">
                    <tr>
                        <div class="form-row">
                            <form action='buscar.php' method='post'>
                                <div class="form-group col-md-6">
                                    <label>Buscar</label>
                                    <input type="search" class="form-control" name="ipn_buscar" placeholder="Buscar paciente..." maxlength="30" pattern="{1,30}" onkeyup="javascript:this.value=this.value.toUpperCase()" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Propiedad</label>
                                    <select name="slc_buscar"  class="form-control" required>
                                        <option value="" hidden selected disabled>Seleccione una opción...</option>
                                        <option value="id_paciente">ID</option>
                                        <option value="INE">INE</option>
                                        <option value="Nombre">Nombre</option>
                                        <option value="Apellido_Paterno">Apellido Paterno</option>
                                        <option value="Apellido_Materno">Apellido Materno</option>   
                                        <option value="NHospital">Hospital</option>
                                        <option value="NServicio">Servicio</option>                                 
                                    </select>
                                </div>

                                <div class="form-group col-md-2">
                                    <label>Continuar</label>
                                    <button type="sumbit" class="form-control btn btn-success">Buscar</button>
                                </div>
                            </form>
                        </div>
                    </tr>
                </thead>

                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>INE</th>
                        <th>Hospital</th>
                        <th>Servicio</th>
                        <th>Eliminar</th>
                        <th>Editar</th> 
                    </tr>
                </thead>

                <tbody>
                    <?php
                        try {
                            $objeto_conexion = new PDO('mysql:host=localhost;dbname=p10hospital', "root", "");
                            foreach ($objeto_conexion -> query('SELECT * from pacientes') as list($idpac, $dni, $nombre, $am, $ap, $fch, $idHosp, $idServ)) {
                                
                                $numHospital = $idHosp;
                                $numServicio = $idServ;

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
                                
                                echo "
                                    <tr>
                                        <td>".$idpac."</td>
                                        <td>".$nombre."</td>
                                        <td>".$ap."</td>
                                        <td>".$am."</td>
                                        <td>".$dni."</td>
                                        <td>".$h[1]."</td>
                                        <td>".$s[1]."</td>                        
                                        <td>
                                            <form action='eliminar.php' method='post'>
                                                <input type='hidden' value=".$idpac." name='nm_Eliminar'>
                                                <input type='submit' class='form-control btn btn-danger' value='Eliminar'>
                                            </form>
                                        </td>
                                        <td>
                                            <form action='editar.php' method='post'>
                                                <input type='hidden' value=".$idpac." name='nm_Editar'>
                                                <input type='submit' class='form-control btn btn-primary' value='Editar'>
                                            </form>
                                        </td>
                                    </tr>";
                            }
                                $objeto_conexion = null;
                        }
                        catch (PDOException $error) {
                            print "¡Error!: " . $error -> getMessage() . "<br/>";
                            die();
                        } 
                    ?> 
                </tbody>
            </table>
        </div> 
    </body> 

    <!-- Scripts -->
    <script src="ssets/js/Script.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                "scrollX": true
            } );
        } );
    </script>
</html>






