<?php
include 'template/header.php';
?>


    <section class="sign-up">
        <div class="container d-flex h-100 w-100">
            <div class="card w-50 justify-content-center align-self-center mx-auto p-5">
                <h2 class="text-center card-title ">Sign Up</h2>
                <form action="includes/sign_up.inc.php" method="post">
                    <div class="form-group mb-3">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email"
                               placeholder="Enter email" name="email">
                    </div>
                    <div class="form-group mb-3">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username"
                               placeholder="Enter username" name="username">

                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password"
                               name="password">
                    </div>
                    <div class="form-group mb-3">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" placeholder="confirm password"
                               name="confirm_password">

                    </div>
                    <button type="submit" name="submit" class="btn btn-danger">Sign Up</button>
                </form>
                <div class="d-flex justify-content-center align-item-center">
                    <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] === 'emptyinput') {
                            echo "<div class='alert alert-danger d-flex justify-content-center align-items-center w-50 p-2 mt-3'>Fill in all fields!</div>";
                        } elseif ($_GET['error'] === 'invaliduid') {
                            echo "<div class='alert alert-danger d-flex justify-content-center align-items-center w-50 p-2 mt-3'>Choose a proper username!</div>";
                        } elseif ($_GET['error'] === 'invalidemail') {
                            echo "<div class='alert alert-danger d-flex justify-content-center align-items-center w-50 p-2 mt-3'>Choose a proper email!</div>";
                        } elseif ($_GET['error'] === 'pwdnotmatch') {
                            echo "<div class='alert alert-danger d-flex justify-content-center align-items-center w-50 p-2 mt-3'>Passowrd doesn't match!</div>";
                        } elseif ($_GET['error'] === 'pwdWeak') {
                            echo "<div class='alert alert-danger d-flex justify-content-center align-items-center  p-2 mt-3'>Passowrd should contain at least 1 uppercase and 1 number!</div>";
                        } elseif ($_GET['error'] === 'stmtfailed') {
                            echo "<div class='alert alert-danger d-flex justify-content-center align-items-center w-50 p-2 mt-3'>Oops! Something went wrong!!</div>";
                        } elseif ($_GET['error'] === 'usernametaken') {
                            echo "<div class='alert alert-danger d-flex justify-content-center align-items-center w-50 p-2 mt-3'>Username is already taken!</div>";
                        } elseif ($_GET['error'] === 'emailtaken') {
                            echo "<div class='alert alert-danger d-flex justify-content-center align-items-center w-50 p-2 mt-3'>Email is already taken!</div>";
                        }
                        elseif ($_GET['error'] === 'none') {
                            echo "<div class='alert alert-success d-flex justify-content-center align-items-center w-50 p-2 mt-3'>You have signed up!</div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>


<?php include 'template/footer.php' ?>