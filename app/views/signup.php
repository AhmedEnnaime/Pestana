<html lang="en">
<?php require APPROOT . '/views/includes/header.php'; ?>

<body>

    <form action="<?php echo URLROOT; ?>/users/signup" method="POST">
        <div class="input-group mb-3">
            <input name="name" type="text" class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" placeholder="Username" value="<?php echo $data['name']; ?>">
            <span class="invalid-feedback"><?php echo $data['name_err'];  ?></span>
        </div>
        <div class="input-group mb-3">
            <input name="birthday" type="date" class="form-control <?php echo (!empty($data['birthday_err'])) ? 'is-invalid' : ''; ?>" placeholder="Birthday" value="<?php echo $data['birthday']; ?>">
            <span class="invalid-feedback"><?php echo $data['birthday_err'];  ?></span>
        </div>
        <div class="input-group mb-3">
            <input name="email" type="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" placeholder="Email" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['email_err'];  ?></span>
        </div>
        <div class="input-group mb-4">
            <input name="password" type="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" placeholder="password" value="<?php echo $data['password']; ?>">
            <span class="invalid-feedback"><?php echo $data['password_err'];  ?></span>
        </div>
        <div class="input-group mb-3">
            <input name="cin" type="text" class="form-control <?php echo (!empty($data['cin_err'])) ? 'is-invalid' : ''; ?>" placeholder="CIN" value="<?php echo $data['cin']; ?>">
            <span class="invalid-feedback"><?php echo $data['cin_err'];  ?></span>
        </div>

        <button type="submit" name="add" class="btn btn-primary shadow-2 mb-4">Sign up</button>

    </form>

</body>

</html>