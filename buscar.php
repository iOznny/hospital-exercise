<!DOCTYPE html>
<html lang="es">
    <?php 
        include("libs/head.html");
        include("libs/nav.html");
        include("metodos.php");
    ?>

    <style>
        div.dataTables_wrapper {
            width: 100%;
            margin: 0 auto;
        }
    </style>

    <body>    
        <div class="container table-responsive">
            <table id="example" class="display nowrap" style="width:100%">
                <br>
                <!-- Encabezado de tabla -->
                <thead class="thead-dark">
                    <tr>
                        <div class="form-row">
                            <form action='buscar.php' method='post'>
                                <div class="form-group col-md-6">
                                    <label>Texto</label>
                                    <input type="search" class="form-control" name="ipn_buscar" placeholder="Buscar paciente..." maxlength="30" pattern="{1,30}" onkeyup="javascript:this.value=this.value.toUpperCase()" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Dato</label>
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
                        $inpSearchSQL = $_POST['ipn_buscar'];
                        $slcSearchSQL = $_POST['slc_buscar'];
                        SQL_Search ($slcSearchSQL, $inpSearchSQL);
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






