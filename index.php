<?php
include_once 'template/header.php';

?>

    <!--Main Section-->
    <section>
        <div class="container">
            <h3 class="text-center">Welcome to your Blog</h3>
            <?php
            if (isset($_SESSION['usersUid'])) {
                echo "<h4 class='text-center' >" . $_SESSION['usersUid'] . "</h4>";
            }
            ?>
            <p class="lead text-center mb-5 ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi ex in iure
                obcaecati, quasi rerum sunt? At rem tenetur voluptatum?</p>
        </div>
    </section>

    <!--Blogs-->
    <section>
        <div class="container">
            <h4 class="text-center">Some Basics Blogs</h4>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12 my-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">First Blog</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque error
                                fugiat harum iure nemo nihil nisi nobis quis quos sunt?</p>
                            <a href="blog_details.php" class="btn btn-primary">Details</a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

<?php include_once 'template/footer.php' ?>