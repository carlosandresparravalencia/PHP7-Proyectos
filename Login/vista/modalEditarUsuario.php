<!-- Modal Editar Usuario-->
<div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalEditarUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarUsuarioLabel">Editar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?=Mensaje::controlAlerta();?>
                <!-- Formulario Editar Usuario-->
                <form id="formEditarUsuario" action="../controlador/controladorValidar.php" method="POST" class="needs-validation" novalidate>
                    <input type="hidden" name="opcion" value="actualizar-usuario">
                    <input type="hidden" name="id-usuario" value="<?= $valor->id_usuario; ?>">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="editar-nombre">Nombre completo</label>
                            <input name="editar-nombre" type="text" class="form-control" id="editar-nombre" value="<?= $valor->nombre_completo; ?>" required>
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">Complete el campo.</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="editar-usuario">Usuario</label>
                            <input name="editar-usuario" type="text" class="form-control" id="editar-usuario" value="<?= $valor->usuario; ?>" required>
                            <div class="valid-feedback">¡Ok válido!</div>
                            <div class="invalid-feedback">Complete el campo.</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="fecha-registro">Fecha de registro</label>
                            <input name="fecha-registro" type="text" class="form-control" id="fecha-registro" value="<?= date_format(date_create($valor->fecha_registro), 'd-M-Y'); ?>" disabled>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" name="btn-editar-usuario">Guardar cambios</button>
                </form>
                <!-- Fin del formulario -->
            </div>
        </div>
    </div>
</div>