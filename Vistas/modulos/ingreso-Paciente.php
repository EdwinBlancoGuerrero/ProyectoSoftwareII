<body style="background-image:url(http://localhost/clinica/Fondo.jpg);">

    <div class="login-box">
        <div class="login-logo" style="background-color: ivory; border:3px inset blue;">
            <a href="#"><b><font face="Comic Sans MS,arial,verdana">IPS ACME</font></b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body" style="background-color: ivory; border:3px inset blue;">
            <p class="login-box-msg"><font face="Comic Sans MS,arial,verdana">Ingresar como Paciente</font></p>

            <form method="post">

                <?php

                echo '
            
                <div class="form-group has-feedback">

                    <input type="text" class="form-control" name="usuario-Ing" placeholder="Usuario">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>

                </div>

                <div class="form-group has-feedback">

                    <input type="password" class="form-control" name="clave-Ing" placeholder="Contraseña">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                </div>

                <div class="row">

                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat"><font face="Comic Sans MS,arial,verdana">Ingresar</font></button>
                    </div>
                    
                    <!-- /.col -->
                </div>';


                $ingreso = new PacientesC();
                $ingreso->IngresarPacienteC();


                ?>

                <br>


            </form>
            
            <?php

            echo '
                <div class="row">

                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-block btn-flat " data-toggle="modal" data-target="#CrearPaciente"><font face="Comic Sans MS,arial,verdana">Registrarse</font></button>
                    </div>

                    <div class="modal fade"  rol="dialog" id="CrearPaciente">
                        //<div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post" role="form" style="background-color:powderblue; border:3px inset blue;">
                                    <div class="modal-body">
                                    <div class="form-group">
                                                <h2> <font face="Comic Sans MS,arial,verdana">¡Eres un nuevo candidato a paciente!</font></h2>
                                            </div>
                                        <div class="box-body">
                                            <div class="form-group">
                                                <h2> <font face="Comic Sans MS,arial,verdana">Apellidos:</font></h2>
                                                <input type="text" class="form-control input-lg" name="apellido" required>
                                                <input type="hidden" name="rolP" value="Paciente">
                                            </div>
                                            <div class="form-group">
                                                <h2><font face="Comic Sans MS,arial,verdana">Nombre:</font></h2>
                                                <input type="text" class="form-control input-lg" name="nombre" required>
                                            </div>
                                            <div class="form-group">
                                                <h2><font face="Comic Sans MS,arial,verdana">Documento:</font></h2>
                                                <input type="text" class="form-control input-lg" name="documento" required>
                                            </div>
                                            <div class="form-group">
                                                <h2><font face="Comic Sans MS,arial,verdana">Correo:</font></h2>
                                                <input type="email" class="form-control input-lg" name="correo" required>
                                            </div>

                                            <div class="form-group">
                                                <h2><font face="Comic Sans MS,arial,verdana">Usuario:</font></h2>
                                                <input type="text" class="form-control input-lg" id="usuario" name="usuario" required>
                                            </div>
                                            <div class="form-group">
                                                <h2><font face="Comic Sans MS,arial,verdana">Contraseña:</font></h2>
                                                <input type="text" class="form-control input-lg" name="clave" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Registrarse</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- /.col -->
                </div>';

            $crear = new PacientesC();
            $crear->CrearPacienteRegistroC();

        ?>


        </div>
        <!-- /.login-box-body -->
    </div>

</body>