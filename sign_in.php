<?php include 'template/header.php' ?>

    <section class="sign-up">
        <div class="container d-flex h-100 w-100">
            <div class="card w-50 justify-content-center align-self-center mx-auto p-5">
                <h2 class="text-center card-title ">Sing In</h2>
                <form action="includes/sign_in.inc.php" method="post">
                    <div class="form-group mb-3">
                        <label for="name">Username</label>
                        <input type="text" class="form-control" id="name"
                               placeholder="Enter username" name="name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password"
                               name="password">
                    </div>
                    <button type="submit" name="submit" class="btn btn-danger">Sign In</button>
                </form>

                <div class="d-flex justify-content-center align-item-center">
                    <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] === 'emptyinput') {
                            echo "<div class='alert alert-danger d-flex justify-content-center align-items-center w-50 p-2 mt-3'>Fill in all fields!</div>";
                        } elseif ($_GET['error'] === 'wrongname') {
                            echo "<div class='alert alert-danger d-flex justify-content-center align-items-center w-50 p-2 mt-3'>Username is not exist!</div>";
                        } elseif ($_GET['error'] === 'wrongpwd') {
                            echo "<div class='alert alert-danger d-flex justify-content-center align-items-center w-50 p-2 mt-3'>Wrong password!</div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php include 'template/footer.php' ?>