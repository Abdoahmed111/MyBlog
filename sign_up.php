<?php include 'template/header.php' ?>

    <section class="sign-up">
        <div class="container d-flex h-100 w-100">
            <div class="card w-50 justify-content-center align-self-center mx-auto p-5">
                <h2 class="text-center card-title ">Sign Up</h2>
                <form action="sign_up.inc.php" method="post">
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
                        <label for="confirm_password">Password</label>
                        <input type="password" class="form-control" id="confirm_password" placeholder="confirm password"
                               name="confirm_password">
                    </div>
                    <button type="submit" class="btn btn-danger">Sign Up</button>
                </form>
            </div>
        </div>
    </section>

<?php include 'template/footer.php' ?>