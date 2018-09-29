<?php require APPROOT . '/views/includes/header.php'; ?>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <?php flash('register_success'); ?>
                <h2>Login</h2>
                <p>Please fill in your credentials to login</p>
                <form action="<?php echo URLROOT; ?>/users/login" method="post">

                    <div class="form-group">
                        <label for="email">Email:<sup>*</sup></label>
                        <input type="email" name="email"
                               class="form-control form-control-lg <?php !empty($data['email_err']) ? 'is_invalid' : ''; ?>"
                               value="<?= $data['email']; ?>">
                        <span class="invalid-feedback d-block">
                        <?= $data['email_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">password:<sup>*</sup></label>
                        <input type="password" name="password"
                               class="form-control form-control-lg <?php !empty($data['password_err']) ? 'is_invalid' : ''; ?>"
                               value="<?= $data['password']; ?>">
                        <span class="invalid-feedback d-block">
                        <?= $data['password_err']; ?></span>
                    </div>

                    <div class="row">
                        <div class="col"><input type="submit" value="Login" class="btn btn-success btn-block"></div>
                        <div class="col"></div>
                        <a href="<?= URLROOT ?>./users/register" class="btn btn-light ">don't have an account? Register
                            now!</a>

                    </div>


                </form>
            </div>


        </div>


    </div>

<?php require APPROOT . '/views/includes/footer.php'; ?>