<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <ul class="sidebar-menu">

            <li>
                <a href="http://localhost/clinica/inicio">
                    <i class="fa fa-home"></i>
                    <span><font face="Comic Sans MS,arial,verdana">Inicio</font></span>
                </a>
            </li>

            <li>
                <a href="http://localhost/clinica/Ver-consultorios">
                    <i class="fa fa-medkit"></i>
                    <span><font face="Comic Sans MS,arial,verdana">Consultorios</font></span>
                </a>
            </li>

            <li>
                <?php
                echo '  <a href="http://localhost/clinica/historial/' . $_SESSION["id"] . '">';
                ?>
                <i class="fa fa-calendar-check-o"></i>
                <span><font face="Comic Sans MS,arial,verdana">Historial</font></span>
                </a>
            </li>

        </ul>

    </section>
    <!-- /.sidebar -->
</aside>