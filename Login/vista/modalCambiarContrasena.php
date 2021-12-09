<link rel="stylesheet" href="../css/estilosContrasena.css">
<!-- Modal Cambiar Contraseña -->
<div class="modal fade" id="modalCambiarClave" tabindex="-1" role="dialog" aria-labelledby="modalCambiarClaveLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalCambiarClaveLabel">Cambiar la contraseña</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- Formulario Cambiar Contraseña -->
				<?= Mensaje::controlAlerta(); ?>
				<form id="formCambiarClave" action="../controlador/controladorValidar.php" method="POST" class="needs-validation" novalidate>
					<input type="hidden" name="opcion" value="cambiar-contrasena">
					<input type="hidden" name="id-usuario" value="<?= $valor->id_usuario; ?>">
					<div class="form-group">
						<div class="form-group">
							<label for="editar-usuario">Usuario</label>
							<input name="editar-usuario" type="text" class="form-control" id="mostrar-usuario" value="<?= $valor->usuario; ?>" disabled>
							<div class="valid-feedback">¡Ok válido!</div>
							<div class="invalid-feedback">Complete el campo.</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-group">
							<label for="cambiar-clave1">Nueva contraseña</label>
							<div class="input-group">

								<input name="cambiar-clave1" type="password" class="form-control" id="cambiar-clave1" placeholder="" aria-describedby="cambiar-clave1" required>
								<div class="valid-feedback">¡Ok válido!</div>
								<div class="invalid-feedback">Complete el campo.</div>
							</div>
						</div>
					</div>
					<div id="message">
						<h5>La contraseña debe contener lo siguiente:</h5>
						<p id="letter" class="invalid">Una letra minúscula</p>
						<p id="capital" class="invalid">Una letra mayúscula</p>
						<p id="number" class="invalid">Un número</p>
						<p id="length" class="invalid">Mínimo 8 caracteres</b></p>
					</div>
					<div class="form-group">
						<div class="form-group">
							<label for="cambiar-clave2">Vuelve a escribir la contraseña</label>
							<div class="input-group">
								<input name="cambiar-clave2" type="password" class="form-control" id="cambiar-clave2" placeholder="" aria-describedby="cambiar-clave2" required>
								<div class="valid-feedback">¡Ok válido!</div>
								<div class="invalid-feedback">Complete el campo.</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-group">
							<label for="vigencia">Vigencia de inicios de sesión</label>
							<input name="vigencia" type="text" class="form-control" id="vigencia-cambiar" placeholder="" value="" required>
							<div class="valid-feedback">¡Ok válido!</div>
							<div class="invalid-feedback">Complete el campo.</div>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary" name="btn-cambiar-clave">Guardar cambios</button>
				</form>
				<!-- Fin del formulario Cambiar Contraseña -->
			</div>
		</div>
	</div>
</div>
<!-- Validar contraseña segura javascript -->
<!-- <script src="../js/validarContrasena.js"></script> -->