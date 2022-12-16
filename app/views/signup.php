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
						<a href="<?php echo URLROOT; ?>"><img class="logo-img" src="<?php echo URLROOT; ?>/assets/images/logo1.png" alt="Logo"></a>
					</div>
					<h1 class="auth-title">Sign Up.</h1>

					<form action="<?php echo URLROOT; ?>/users/signup" method="POST">
						<div class="form-group position-relative has-icon-left mb-4">
							<input name="name" type="text" class="form-control form-control-xl <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" placeholder="Enter your name" value="<?php echo $data['name']; ?>">
							<span class="invalid-feedback"><?php echo $data['name_err'];  ?></span>
							<div class="form-control-icon">
								<i class="bi bi-person"></i>
							</div>
						</div>
						<div class="form-group position-relative has-icon-left mb-4">
							<input name="birthday" type="date" class="form-control form-control-xl <?php echo (!empty($data['birthday_err'])) ? 'is-invalid' : ''; ?>" placeholder="Enter your birthday" value="<?php echo $data['birthday']; ?>">
							<span class="invalid-feedback"><?php echo $data['birthday_err'];  ?></span>
							<div class="form-control-icon">
								<i class="bi bi-person"></i>
							</div>
						</div>
						<div class="form-group position-relative has-icon-left mb-4">
							<input name="email" type="email" class="form-control form-control-xl <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" placeholder="Enter email" value="<?php echo $data['email']; ?>">
							<span class="invalid-feedback"><?php echo $data['email_err'];  ?></span>
							<div class="form-control-icon">
								<i class="bi bi-envelope"></i>
							</div>
						</div>
						<div class="form-group position-relative has-icon-left mb-4">
							<input name="password" type="password" class="form-control form-control-xl <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" placeholder="Enter password" value="<?php echo $data['password']; ?>">
							<span class="invalid-feedback"><?php echo $data['password_err'];  ?></span>
							<div class="form-control-icon">
								<i class="bi bi-shield-lock"></i>
							</div>
						</div>
						<div class="form-group position-relative has-icon-left mb-4">
							<input name="cin" type="text" class="form-control form-control-xl <?php echo (!empty($data['cin_err'])) ? 'is-invalid' : ''; ?>" placeholder="Enter cin" value="<?php echo $data['cin']; ?>">
							<span class="invalid-feedback"><?php echo $data['cin_err'];  ?></span>
							<div class="form-control-icon">
								<i class="bi bi-shield-lock"></i>
							</div>
						</div>
						<button type="submit" name="add" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Sign Up</button>
					</form>
					<div class="text-center mt-5 text-lg fs-4">
						<p class='text-gray-600'>Already have an account? <a href="auth-login.html" class="font-bold">Log
								in</a>.</p>
					</div>
				</div>
			</div>

		</div>
	</div>

	<?php require APPROOT . '/views/includes/footer.php'; ?>
</body>

</html>