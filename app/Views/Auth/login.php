<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="container">
	<div class="row">
		<div class="col-sm-6 offset-sm-3">

			<div class="card">
				<h2 class="card-header">Inicio de sesión</h2>
				<div class="card-body">

					<?= view('App\Views\Auth\_message_block') ?>

					<form action="<?= url_to('login') ?>" method="post">
						<?= csrf_field() ?>

						<?php if ($config->validFields === ['email']) : ?>
							<div class="form-group">
								<label for="login">Email</label>
								<input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="email...">
								<div class="invalid-feedback">
									<?= session('errors.login') ?>
								</div>
							</div>
						<?php else : ?>
							<div class="form-group">
								<label for="login">Email</label>
								<input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="email...">
								<div class="invalid-feedback">
									<?= session('errors.login') ?>
								</div>
							</div>
						<?php endif; ?>

						<div class="form-group">
							<label for="password">Contraseña</label>
							<input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="Contraseña...">
							<div class="invalid-feedback">
								<?= session('errors.password') ?>
							</div>
						</div>

						<?php if ($config->allowRemembering) : ?>
							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
									<?= lang('Auth.rememberMe') ?>
								</label>
							</div>
						<?php endif; ?>

						<br>

						<button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
					</form>

					<hr>

					<?php if ($config->allowRegistration) : ?>
						<p><a href="<?= url_to('register') ?>">¿Necesitas una cuenta?</a></p>
					<?php endif; ?>
					<?php if ($config->activeResetter) : ?>
						<p><a href="<?= url_to('forgot') ?>">¿Perdiste tu contraseña?</a></p>
					<?php endif; ?>
				</div>
			</div>

		</div>
	</div>
</div>




<?= $this->endSection() ?>