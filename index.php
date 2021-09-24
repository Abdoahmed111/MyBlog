<?php
include 'template/header.php';
include 'includes/dbh.inc.php';

//write query for all pizzas
$sql = 'SELECT id, title, body, created_by, created_at FROM blogs ORDER BY created_at';

//make query & and get the result
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$blogs = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);

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
                <?php foreach ($blogs as $blog) : ?>
                    <div class="col-md-3 col-sm-6 col-xs-12 my-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($blog['title']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($blog['body']); ?></p>
                                <a href="blog_details.php?id=<?php echo $blog['id']?>" class="btn btn-info">more
                                    info!</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<?php include_once 'template/footer.php' ?>