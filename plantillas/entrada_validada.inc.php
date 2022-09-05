<div class="form-group">
        <label for="titulo">Titulo</label>
        <input type="text" class="form-control" id="titulo" name="titulo" 
               placeholder="Titulo de la entrada" <?PHP $validador->set_Titulo(); ?> >
               <?PHP echo $validador->get_Error_titulo(); ?> 
        <br>
        <label for="url">URL</label>
        <input type="text" class="form-control" id="url" name="url" 
               placeholder="Direccion unica para su entrada sin espacios, para separar las palabras puede usar el gion bajo (_)"
               <?PHP $validador->set_Url(); ?>>
               <?PHP echo $validador->get_Error_url(); ?> 
    
</div>
<div class="form-group">
    <label for="contenido">Contenido</label>
    <textarea class="form-control" rows="4" id="contenido" name="texto" 
              placeholder="En esta seccion puedes ingresar tu articulo..."><?PHP echo $validador->get_Texto(); ?></textarea>
              <?PHP echo $validador->get_Error_texto(); ?> 
</div>
<div class="checkbox">
    <label>
        <input type="checkbox" value="si" name="publicar"
        <?PHP
        if ($entrada_publica) {
            echo 'checked';
        }
        ?>>
        Publicar entrada
    </label>
</div>
<br>
<button type="submit" class="btn btn-primary" name="guardar">Guardar entrada</button>
