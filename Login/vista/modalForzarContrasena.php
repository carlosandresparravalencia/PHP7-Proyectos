<!-- Modal forzar Contraseña -->
<div class="modal fade" id="modalForzarContrasena" tabindex="-1" role="dialog" aria-labelledby="modalForzarContrasenaLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalForzarContrasenaLabel">Cambiar la contraseña</h5>
			</div>
			<div class="modal-body">

				<?=Mensaje::controlAlerta();?>

				<!-- Formulario forzar Contraseña -->
				<form id="formForzarClave" action="../controlador/controladorValidar.php" method="POST" class="needs-validation" novalidate>
					<input type="hidden" name="opcion" value="cambiar-contrasena">
					<input type="hidden" name="id-usuario" value="<?= $valor->id_usuario; ?>">
					<div class="form-group">
						<div class="form-group">
							<label for="editar-usuario">Usuario</label>
							<input name="editar-usuario" type="text" class="form-control" id="mostrar-usuario-forzar" value="<?= $valor->usuario; ?>" disabled>
							<div class="valid-feedback">¡Ok válido!</div>
							<div class="invalid-feedback">Complete el campo.</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-group">
							<label for="forzar-clave1">Nueva contraseña</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="forzar-clave1"><i class="fas fa-unlock-alt"></i></span>
								</div>
								<input name="cambiar-clave1" type="password" class="form-control" id="forzar-clave1" placeholder="" aria-describedby="forzar-clave1" required>
								<div class="valid-feedback">¡Ok válido!</div>
								<div class="invalid-feedback">Complete el campo.</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-group">
							<label for="forzar-clave2">Vuelve a escribir la contraseña</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="forzar-clave2"><i class="fas fa-unlock-alt"></i></span>
								</div>
								<input name="cambiar-clave2" type="password" class="form-control" id="forzar-clave2" placeholder="" aria-describedby="forzar-clave2" required>
								<div class="valid-feedback">¡Ok válido!</div>
								<div class="invalid-feedback">Complete el campo.</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-group">
							<label for="vigenciaForzar">Vigencia de inicios de sesión</label>
							<input name="vigencia" type="text" class="form-control" id="vigenciaForzar" placeholder="" value="" required>
							<div class="valid-feedback">¡Ok válido!</div>
							<div class="invalid-feedback">Complete el campo.</div>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" name="btn-forzar-clave">Guardar cambios</button>
				</form>
				<!-- Fin del formulario forzar Contraseña -->
			</div>
		</div>
	</div>
</div>