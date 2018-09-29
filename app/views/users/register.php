<?php require APPROOT . '/views/includes/header.php'; ?>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light">
                <?php flash("wrong_code"); ?>

                <h2>Create an Account</h2>
                <p>Please fill out this form to register with us</p>
                <form action="<?php echo URLROOT; ?>/users/register" method="post">
                    <div class="form-group">
                        <label for="name">Name:<sup>*</sup></label>
                        <input type="text" name="name"
                               class="form-control form-control-lg <?php !empty($data['name_err']) ? 'is_invalid' : ''; ?>"
                               value="<?= $data['name']; ?>">
                        <span class="invalid-feedback d-block">
                        <?= $data['name_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:<sup>*</sup></label>
                        <input type="email" name="email"
                               class="form-control form-control-lg <?php !empty($data['email_err']) ? 'is_invalid' : ''; ?>"
                               value="<?= $data['email']; ?>">
                        <span class="invalid-feedback d-block">
                        <?= $data['email_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="name">password:<sup>*</sup></label>
                        <input type="password" name="password"
                               class="form-control form-control-lg <?php !empty($data['password_err']) ? 'is_invalid' : ''; ?>"
                               value="<?= $data['name']; ?>">
                        <span class="invalid-feedback d-block">
                        <?= $data['password_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="name">Confirm Password:<sup>*</sup></label>
                        <input type="password" name="confirm_password"
                               class="form-control form-control-lg <?php !empty($data['confirm_password_err']) ? 'is_invalid' : ''; ?>"
                               value="<?= $data['confirm_password']; ?>">
                        <span class="invalid-feedback d-block">
                        <?= $data['confirm_password_err']; ?></span>
                    </div>
                    <div class="row">
                        <div class="col">
                            <img src="../public/images/security_img.php" alt="security_img">
                            <!--                            <br>-->
                            <!--                            <br>-->
                            <input type="text" name="code" placeholder="Enter the code here" style="margin-top: 5px;">
                            <!--                            <br>-->
                            <!--                            <br>-->
                            <span class="invalid-feedback d-block">

                            <input type="submit" value="Register" class="btn btn-success" style="margin-top: 5px;">
                        </div>
                        <div class="col">
                            <a href="<?= URLROOT ?>./users/login" class="btn btn-light">Have an account? Login!</a>
                        </div>

                    </div>


                </form>
            </div>


        </div>


    </div>

<?php require APPROOT . '/views/includes/footer.php'; ?>