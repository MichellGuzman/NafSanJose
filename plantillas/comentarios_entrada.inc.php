<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary form-control" data-toggle="collapse" data-target="#comentarios">
            <?PHP echo "Ver comentarios(" . count($comentarios) . ")";?>
        </button>
        <br>
        <br>
        <div id="comentarios" class="collapse" >
            <?PHP
            for ($i = 0; $i < count($comentarios); $i++) {
                $comentario = $comentarios[$i];
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?PHP echo $comentario->get_titulo(); ?>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-2">
                                    <?PHP echo $comentario->get_autor_id(); ?>
                                </div>
                                <div class="col-md-10">
                                    <p>
                                        <?PHP echo $comentario->get_fecha(); ?>
                                    </p>
                                    <p>
                                        <?PHP echo nl2br($comentario->get_texto()); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?PHP
            }
            ?>
        </div>
    </div>
</div>

