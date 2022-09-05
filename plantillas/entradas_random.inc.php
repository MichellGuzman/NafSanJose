<div class="row">
    <div class="col-md-12">
        <hr>
        <h3>Otras entradas</h3>
    </div>
    <?PHP
    include_once 'app/EscritorEntradas.inc.php';
    for ($i = 0; $i < count($entradas_random); $i++) {
        $entrada_actual = $entradas_random[$i];
        ?>
        <div class="col-md-4">
            <p>
                <?PHP
                EscritorEntradas::escribir_entrada($entrada_actual);
                ?>
            </p>
        </div>
        <?PHP
    }
    ?>
</div>
