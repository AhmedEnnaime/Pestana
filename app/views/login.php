<!doctype html>
<html lang="en">
<?php require APPROOT . '/views/includes/head.php'; ?>

<body>

	<div id="auth">

		<div class="row h-100">
			<div class="col-lg-7 d-none d-lg-block">
				<div id="auth-left">
				</div>
			</div>
			<div class="col-lg-5 col-12">
				<div id="auth-right">
					<div class="auth-logo">
						<a href="<?php echo URLROOT; ?>"><img src="<?php echo URLROOT; ?>/assets/images/logo1.png" alt="Logo"></a>
					</div>
					<?php flash('register_success'); ?>
					<h1 class="auth-title">Log in.</h1>

					<form action="<?php echo URLROOT; ?>/users/login" method="POST">
						<div class="form-group position-relative has-icon-left mb-4">
							<input name="email" type="email" class="form-control form-control-xl <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" placeholder="Email" value="<?php echo $data['email']; ?>">
							<span class="invalid-feedback"><?php echo $data['email_err'];  ?></span>
							<div class="form-control-icon">
								<i class="bi bi-envelope"></i>
							</div>
						</div>
						<div class="form-group position-relative has-icon-left mb-4">
							<input name="password" type="password" class="form-control form-control-xl <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" placeholder="Password" value="<?php echo $data['password']; ?>">
							<span class="invalid-feedback"><?php echo $data['password_err'];  ?></span>
							<div class="form-control-icon">
								<i class="bi bi-shield-lock"></i>
							</div>
						</div>

						<button type="submit" name="login" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
					</form>
					<div class="text-center mt-5 text-lg fs-4">
						<p class="text-gray-600">Don't have an account? <a href="<?php echo URLROOT; ?>/users/signup" class="font-bold">Sign
								up</a>.</p>
					</div>
				</div>
			</div>

		</div>
	</div>
	<?php require APPROOT . '/views/includes/footer.php'; ?>
</body>

</html>