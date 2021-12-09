<?php
session_start();

if (!isset($_SESSION["sesion-usuario"])) {
	header('Location: ../index.php');
}

require_once './superior.php';
require_once '../controlador/controladorUsuario.php';
require_once '../modelo/Mensaje.php';
?>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<h1 class="h3 mb-2 text-gray-800">Perfil</h1>


					<!-- Button modal agregar usuario -->
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
						<i class="fas fa-user-plus"></i> Agregar Usuario
					</button>
					<br><br>
					<!-- Mensaje de bienvenida -->
					<?= Mensaje::controlAlerta(); ?>

					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Administrar usuario</h6>
						</div>
						<div class="table-responsive">
							<?php
							$ctrlUsuario = new controladorUsuario();
							if (count($ctrlUsuario->listarUsuarios())) :
							?>
								<table class="table table-hover table-striped">
									<thead>
										<tr>
											<th scope="col">ID</th>
											<th colspan="2" scope="col">Nombres y apellidos</th>
											<th scope="col">Usuario</th>
											<th scope="col">Vigencia inicios</th>
											<th scope="col">Fecha registro</th>
											<th scope="col">Acciones</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($ctrlUsuario->listarUsuarios() as $valor) : ?>
											<tr>
												<th scope="row"><?= $valor->id_usuario; ?></th>
												<td colspan="2"><?= $valor->nombre_completo; ?></td>
												<td><?= $valor->usuario; ?></td>
												<td><?= $valor->vigencia; ?></td>
												<td><?= date_format(date_create($valor->fecha_registro), 'd-M-Y') ?></td>

												<td>
													<div class="btn-group mr-2" role="group" aria-label="Second group">
														<button type="button" class="btn btn-secondary" title="Editar Usuario" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fas fa-edit"></i></button>
													</div>

													<div class="btn-group" role="group" aria-label="Third group">
														<button type="button" class="btn btn-secondary" title="Cambiar Contraseña" data-toggle="modal" data-target="#modalCambiarClave"><i class="fas fa-unlock-alt"></i></button>
													</div>
												</td>
											</tr>
										<?php endforeach; ?>
									<?php
								else :
									echo '<h5>No hay usuarios registrados</h5>';
								endif;
									?>
								</table>
						</div>
					</div>
				</div>
				<!-- /.container-fluid -->
			</div>
			<!-- End of Main Content -->
		</div>
	</div>


	<?php include('modalAgregarUsuario.php'); ?>
	<?php include('modalEditarUsuario.php'); ?>
	<?php include('modalCambiarContrasena.php'); ?>
	<script src="../js/validarForm.js"></script>

	<?php require_once './inferior.php'; ?>

	<?php
	if (isset($_GET['msg_cambiar']) && $_GET['msg_cambiar'] == true) {
		include('modalForzarContrasena.php');
		echo '<script src="../js/forzar.js"></script>';
	}
	?>