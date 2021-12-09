<!-- Modal Nuevo Usuario-->
<div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalAgregarUsuarioLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalAgregarUsuarioLabel">Agregar nuevo usuario</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<?=Mensaje::controlAlerta();?>
					<!-- Formulario Nuevo Usuario -->
					<form id="form1" action="../controlador/controladorValidar.php" method="POST" class="needs-validation" novalidate>
						<input type="hidden" name="opcion" value="agregar-usuario">
						<div class="form-group">
							<div class="form-group">
								<label for="nombre">Nombre completo</label>
								<input name="nombre" type="text" class="form-control" id="nombre" placeholder="" value="" required>
								<div class="valid-feedback">¡Ok válido!</div>
								<div class="invalid-feedback">Complete el campo.</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-group">
								<label for="usuario">Usuario</label>
								<input name="usuario" type="text" class="form-control" id="usuario" placeholder="" value="" required>
								<div class="valid-feedback">¡Ok válido!</div>
								<div class="invalid-feedback">Complete el campo.</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-group">
								<label for="nueva-clave1">Nueva contraseña</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="nueva-clave1"><i class="fas fa-unlock-alt"></i></span>
									</div>
									<input name="nueva-clave1" type="password" class="form-control" id="nueva-clave1" placeholder="" aria-describedby="nueva-clave1" required>
									<div class="valid-feedback">¡Ok válido!</div>
									<div class="invalid-feedback">Complete el campo.</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-group">
								<label for="nueva-clave2">Vuelve a escribir la contraseña</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="nueva-clave2"><i class="fas fa-unlock-alt"></i></span>
									</div>
									<input name="nueva-clave2" type="password" class="form-control" id="nueva-clave2" placeholder="" aria-describedby="nueva-clave2" required>
									<div class="valid-feedback">¡Ok válido!</div>
									<div class="invalid-feedback">Complete el campo.</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-group">
								<label for="vigencia">Vigencia de inicios de sesión</label>
								<input name="vigencia" type="text" class="form-control" id="vigencia-agregar" placeholder="" value="" required>
								<div class="valid-feedback">¡Ok válido!</div>
								<div class="invalid-feedback">Complete el campo.</div>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary" name="btn-nuevo-usuario">Guardar cambios</button>
					</form>
					<!-- Fin del formulario Nuevo Usuario -->
				</div>
			</div>
		</div>
	</div>