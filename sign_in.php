<?php include 'template/header.php' ?>

    <section class="sign-up">
        <div class="container d-flex h-100 w-100">
            <div class="card w-50 justify-content-center align-self-center mx-auto p-5">
                <h2 class="text-center card-title ">Sing In</h2>
                <form action="sign_in.inc.php" method="post">
                    <div class="form-group mb-3">
                        <label for="name">Username/Email</label>
                        <input type="email" class="form-control" id="name"
                               placeholder="Enter username/email" name="name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password"
                               name="password">
                    </div>
                    <button type="submit" class="btn btn-danger">Sign In</button>
                </form>
            </div>
        </div>
    </section>
<?php include 'template/footer.php' ?>