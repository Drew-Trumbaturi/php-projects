<?php
// Header
include('header.php');
?>

<!-- main content -->
<section id="register">
    <div class="row m-0">
        <div class="col-lg-4 offset-lg-2">
            <div class="text-center pb-5">
                <h1 class="login-title text-dark">Register</h1>
                <p class="p-1 m-0 font-ubuntu text-black-50">Register and enjoy your new account</p>
                <span class="font-ubuntu text-black-50">I already have an <a href="login.php">account</a></span>
            </div>

            <div class="upload-profile-image d-flex justify-content-center pb-5">
                <div class="text-center">
                    <div class="d-flex justify-content-center">
                        <img class="camera-icon" src="./assets/camera-solid.svg" alt="camera">
                    </div>
                    <img class="img rounded-circle" style="width: 200px; height: 200px;"
                        src="./assets/profile/beard.png" alt="profile">
                    <small class="form-text text-black-50">Choose Image</small>
                    <input type="file" class="form-control-file" name="profileUpload" id="upload-profile">
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <form action="register.php" method="post" enctype="multipart/form-data" id="registration-form">
                    <div class="form-row">
                        <div class="col">
                            <input type="text" name="firstName" id="firstName" class="form-control"
                                placeholder="First Name*">
                        </div>

                        <div class="col">
                            <input type="text" name="lastName" id="lastName" class="form-control"
                                placeholder="Last Name*">
                        </div>
                    </div>

                    <div class="form-row my-4">
                        <div class="col">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email*"
                                required>
                        </div>
                    </div>

                    <div class="form-row my-4">
                        <div class="col">
                            <input type="email" name="emailConfirm" id="emailConfirm" class="form-control"
                                placeholder="Confirm Email*">
                        </div>
                    </div>

                    <div class="form-row my-4">
                        <div class="col">
                            <small id="confirmation_error" class="text-danger"></small>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Password*" required>
                            <small class="text-black-50 font-ubuntu" style="font-size: x-small;">Password must
                                be at least 8 characters
                                long</small>
                        </div>
                    </div>

                    <div class="form-row my-4">
                        <div class="col">
                            <input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control"
                                placeholder="Confirm Password*" required>
                        </div>
                    </div>

                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" name="terms" id="terms"
                            value="I agree to the terms and conditions" required>
                        <label class="form-check-label font-ubuntu text-black-50" for="terms">I agree to the <a
                                href="#">terms and conditions</a>*</label>
                    </div>

                    <div class="submit-btn text-center my-5">
                        <button type="submit" class="btn btn-warning rounded-pill text-dark px-5">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- #main content -->

<?php
// Footer
include('footer.php');
?>