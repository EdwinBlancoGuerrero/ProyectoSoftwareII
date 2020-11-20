<header class="main-header">
  <!-- Logo -->
  <a href="http://localhost/clinica/inicio" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->

    
    <span class="logo-mini"><b>
    
    <?php

    $favicon = new InicioC();
    $favicon -> FaviconC(); 

    ?>  
    
    IPS</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><font face="Comic Sans MS,arial,verdana"><b>IPS</b>ACME</font>
  
  </span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">

            <?php
            if ($_SESSION["foto"] == "") {
              echo '<img src="http://localhost/clinica/Vistas/img/defecto.png" class="user-image" alt="User Image">';
            } else {
              echo '<img src="http://localhost/clinica/' . $_SESSION["foto"] . '" class="user-image" alt="User Image">';
            }

            if ($_SESSION["rol"] == "Secretaria") {
              echo $_SESSION["nombre"];
              echo " ";
              echo $_SESSION["apellidos"];
            } else {
              echo $_SESSION["nombre"];
              echo " ";
              echo $_SESSION["apellido"];
            }
            ?>

          </a>
          <ul class="dropdown-menu">

            <li class="user-footer">
              <div class="pull-left">

                <?php
                echo '<a href="http://localhost/clinica/perfil-' . $_SESSION["rol"] . '" class="btn btn-primary btn-flat">Perfil</a>';
                ?>
              </div>
              <div class="pull-right">
                <a href="http://localhost/clinica/salir" class="btn btn-danger btn-flat">Salir</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>