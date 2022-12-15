<html lang="en">

<?php require APPROOT . '/views/includes/header.php'; ?>

<body>
    <form action="<?php echo URLROOT; ?>/users/login" method="POST">
        <div class="input-group mb-3">
            <input name="email" type="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" placeholder="Email" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['email_err'];  ?></span>
        </div>
        <div class="input-group mb-4">
            <input name="password" type="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" placeholder="password" value="<?php echo $data['password']; ?>">
            <span class="invalid-feedback"><?php echo $data['password_err'];  ?></span>
        </div>
        <button type="submit" name="login" class="btn btn-primary shadow-2 mb-4">Login</button>
        <p class="mb-0 text-muted">Don’t have an account? <a href="<?php echo URLROOT; ?>/users/signup">Signup</a></p>
    </form>
</body>

</html>