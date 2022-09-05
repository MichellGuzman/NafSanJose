<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Boton de despliegue de barra de navegacion</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?PHP echo SERVIDOR ?>">El blog de Maik</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <?PHP
            if (!ControlSesion::sesion_iniciada()) {
                ?>
                <!-- lista de enlaces a la izquierda -->
                <ul class="nav navbar-nav">
                    <!--Elementos de lista de enlaces a la izquierda -->
                    <li>
                        <a href="<?PHP echo SERVIDOR ?>">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                            Entradas
                        </a>
                    </li>
                    <li>
                        <a href="<?PHP echo SERVIDOR ?>">
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            Favoritos
                        </a>
                    </li>
                    <li>
                        <a href="<?PHP echo SERVIDOR ?>">
                            <span class="glyphicon glyphicon-education" aria-hidden="true"></span>
                            Autores
                        </a>
                    </li>
                </ul>
                <?PHP
            } else {
                
            }
            ?>
            <!-- lista de enlaces a la derecha -->
            <ul class="nav navbar-nav navbar-right">

                <?PHP
                if (ControlSesion::sesion_iniciada()) {
                    ?>
                    <!--Elementos de lista de enlaces a la derecha usuarios-->
                    <li>
                        <a href="#">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <?PHP echo ' ' . $_SESSION['nombre_usuario']; ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?PHP echo RUTA_GESTOR; ?>">
                            <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>
                            Gestor
                        </a>
                    </li>
                    <li>
                        <a href="<?PHP echo RUTA_LOGOUT; ?>">
                            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                            Cerrar sesión
                        </a>
                    </li>
                    <?PHP
                } else {
                    ?>
                    <!--Elementos de lista de enlaces a la derecha invitados-->
                    <li>
                        <a href="<?PHP echo SERVIDOR ?>">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <?PHP echo $total_usuarios; ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?PHP echo RUTA_LOGIN ?>">
                            <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
                            Iniciar Seción
                        </a>
                    </li>
                    <li>
                        <a href="<?PHP echo RUTA_REGISTRO ?>">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            Registro
                        </a>
                    </li>
                    <?PHP
                }
                ?>


            </ul>
        </div>
    </div>
</nav>
