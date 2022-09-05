<?php
//titulo de la pagina
$titulo = "EL BLOG DE MAIK";
//inicio del html
include_once 'plantillas/documento-declaracion.inc.php';
//Barra de navegacion estatica
include_once 'plantillas/navbar.inc.php';

include_once 'app/mensajes.inc.php';

include_once 'app/EscritorEntradas.inc.php';
?>
<!-- Banner de principal -->
<div class="container">
    <div class="jumbotron">
        <h1>El blog de Maik</h1>
        <p>
            Blog para practicas de programacion y desarrollo.
        </p>
    </div>
</div>

<!-- Contenido de la pagina -->
<div class="container">
    <div class="row">
        <!-- Barra de herramientas izquierda -->
        <div class="col-md-4">
            <!-- Buscador -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Búsqueda
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <input type="search" class="form-control" placeholder="Buscar...">
                            </div>
                            <button class="form-control">
                                Buscar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin buscador -->

            <!-- Filtro -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-filter" aria-hidden="true"></span> Flitro
                        </div>
                        <div class="panel-body">

                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin filtro -->

            <!-- Archivo -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Archivo
                        </div>
                        <div class="panel-body">

                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin archivo -->

        </div>
        <!-- Fin barra de herramientas -->

        <!-- Barra de contenido derecha -->
        <div class="col-md-8">
            <?PHP
            EscritorEntradas::escribir_entradas();
            ?>
        </div>
        <!-- Fin barra de contenido -->
    </div>
</div>
<?PHP include_once 'plantillas/documento-cierre.inc.php'; ?>
