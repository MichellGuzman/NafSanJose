<div class="row parte-gestor-entradas">
    <div class="col-md-12">
        <h2>Gestionar entradas</h2>
        <br>
        <a href="<?PHP echo RUTA_NUEVA_ENTRADA; ?>" class="btn btn-lg btn-primary" role="button" id="ge-boton-nueva-entrada">Agregar entrada</a>
        <br>
        <br>
    </div>
</div>
<div class="row parte-gestor-entradas">
    <div class="col-md-12">
        <?PHP
        if (count($array_entradas) > 0) {
            ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Título</th>
                        <th>Estado</th>
                        <th>Comentarios</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP
                    for ($i = 0; $i < count($array_entradas); $i++) {
                        $entrada_actual = $array_entradas[$i][0];
                        $comentarios_entrada_actual = $array_entradas[$i][1];
                        ?>
                        <tr>
                            <td><?PHP echo $entrada_actual->get_fecha(); ?></td>
                            <td><?PHP echo $entrada_actual->get_titulo(); ?></td>
                            <td>
                                <?PHP
                                $entrada_actual->is_activa();

                                if ($entrada_actual->is_activa() === 0) {
                                    ?>
                                    <form method="post" action="<?PHP echo RUTA_PUBLICAR_ENTRADA; ?>">
                                        <label>Pribada</label>
                                        <input type="hidden" name="id_publicar" value="<?PHP echo $entrada_actual->get_id(); ?>">
                                        <button type="submit" class="btn btn-default btn-xs" name="publicar_entrada">Publicar</button>
                                    </form>
                                    <?PHP
                                }
                                if ($entrada_actual->is_activa() === 1) {
                                    ?>
                                    <form method="post" action="<?PHP echo RUTA_PRIBATIZAR_ENTRADA; ?>">
                                        <label>Publica</label>
                                        <input type="hidden" name="id_privatizar" value="<?PHP echo $entrada_actual->get_id(); ?>">
                                        <button type="submit" class="btn btn-default btn-xs" name="privatizar_entrada">Ocultar</button>
                                    </form>
                                    <?PHP
                                }
                                if ($entrada_actual->is_activa() === 2) {
                                    ?>
                                    <label>Eliminada</label>
                                    <?PHP
                                }
                                if ($entrada_actual->is_activa() === 3) {
                                    ?>
                                    <label>ELIMINADA POR ADMINISTRADOR</label>
                                    <?PHP
                                }
                                ?>
                            </td>
                            <td><?PHP echo $comentarios_entrada_actual; ?></td>
                            <?PHP
                            if ($entrada_actual->is_activa() === 2) {
                                ?>
                                <td>
                                    <label>Eliminada</label>
                                </td>
                                <td></td>

                                <?PHP
                            } else if ($entrada_actual->is_activa() === 3) {
                                ?>
                                <td>
                                    <label>ELIMINADA POR ADMINISTRADOR</label>
                                </td>
                                <td></td>

                                <?PHP
                            } else {
                                ?>
                                <td>
                                    <button type="button" class="btn btn-default btn-xs">Editar</button>
                                </td>
                                <td>
                                    <form method="post" action="<?PHP echo RUTA_BORRAR_ENTRADA; ?>">
                                        <input type="hidden" name="id_borrar" value="<?PHP echo $entrada_actual->get_id(); ?>">
                                        <button type="submit" class="btn btn-default btn-xs" name="borrar_entrada">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            <?PHP
                        }
                    }
                    ?>
                </tbody>
            </table>
            <?PHP
        } else {
            ?>
            <h3 class="text-center">
                No has escrito ninguna entrada aun!!!
            </h3>
            <br>
            <br>
            <?PHP
        }
        ?>
    </div>
</div>