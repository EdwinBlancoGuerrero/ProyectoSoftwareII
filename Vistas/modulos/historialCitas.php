<?php
if ($_SESSION["rol"] != "Secretaria" && $_SESSION["rol"] != "Doctor"  && $_SESSION["rol"] != "Administrador") {
    echo '<script>
    window.location = "inicio";
    </script>';
    return;
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <font face="Comic Sans MS,arial,verdana">Historial de Citas</font>
        </h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped dt-responsive DT">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>ID unico de Cita</th>
                            <th>ID Doctor</th>
                            <th>ID Consultorio</th>
                            <th>ID Paciente</th>
                            <th>Documento paciente</th>
                            <th>Nombre Paciente</th>
                            <th>Inicio cita</th>
                            <th>Fin cita</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $columna = null;
                        $valor = null;

                        $resultado = CitasC::VerCitasC($columna, $valor);
                        foreach ($resultado as $key => $value) {

                            echo '<tr>
                
                                <td>' . ($key + 1) . '</td>
                                <td>' . $value["id"] . '</td>
                                <td>' . $value["id_doctor"] . '</td>
                                <td>' . $value["id_consultorio"] . '</td>
                                <td>' . $value["id_paciente"] . '</td>
                                <td>' . $value["documento"] . '</td>
                                <td>' . $value["nyaP"] . '</td>
                                <td>' . $value["inicio"] . '</td>
                                <td>' . $value["fin"] . '</td>';
                        }
                        ?>

                    </tbody>
                    <td>

                    </td>
                </table>
            </div>
        </div>
    </section>
</div>