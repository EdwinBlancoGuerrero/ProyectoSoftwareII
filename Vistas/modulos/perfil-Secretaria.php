<?php
if ($_SESSION["rol"] != "Secretaria") {

    echo '<script>
    window.location = "inicio";
    </script>';
    return;
}

?>

<div class="content-wrapper">

    <section class="content-header">
        <h1><font face="Comic Sans MS,arial,verdana">Gestor de perfil</font></h1>
    </section>

    <section class="content">

        <div class="box">
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Identificacion</th>
                            <th>Tipo Documento</th>
                            <th>Correo</th>
                            <th>EPS</th>
                            <th>Foto</th>
                            <th>Editar</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $perfil = new SecretariasC();
                        $perfil->VerPerfilSecretariaC();

                        ?>

                    </tbody>

                </table>
            </div>
        </div>

    </section>

</div>