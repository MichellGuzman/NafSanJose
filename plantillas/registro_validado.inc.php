<div class="form-group">
    <label>Nombre de usuario:</label>
    <input type="text" class="form-control" name="nombre_usuario" placeholder="Nombre Usuario"<?PHP $validador->set_nombre() ?>>
    <?PHP $validador->mostrar_error_nombre() ?>
</div>
<div class="form-group">
    <label>Email:</label>
    <input type="email" class="form-control" name="email_usuario" placeholder="correo@mail.com"<?PHP $validador->set_email() ?>>
    <?PHP $validador->mostrar_error_email() ?>
</div>
<div class="form-group">
    <label>Clave:</label>
    <input type="password" class="form-control" name="clave_usuario">
    <?PHP $validador->mostrar_error_clave1() ?>
</div>
<div class="form-group">
    <label>Verificar clave:</label>
    <input type="password" class="form-control" name="clave2_usuario">
    <?PHP $validador->mostrar_error_clave2() ?>
</div>
<br>
<button type="reset" class="btn btn-default btn-danger">Linpiar campos</button>
<br>
<br>
<button type="submit" class="btn btn-default btn-primary" name="enviar">Enviar datos</button>
