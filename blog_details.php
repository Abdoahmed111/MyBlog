<?php include 'template/header.php' ?>
<?php

if (!$_SESSION['usersUid']) {
    header('location: sign_in.php');
}


include "includes/dbh.inc.php";

if (isset($_POST['delete'])) {
    $id = mysqli_real_escape_string($conn, $_POST['blogId']);

    $sql = "DELETE FROM blogs WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
//        success
        header('Location: index.php');
    } else {
//        failure
        echo 'query error : ' . mysqli_error($conn);
    }
}

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM blogs WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    $blog = mysqli_fetch_assoc($result);

    mysqli_close($conn);

    mysqli_free_result($result);
}
?>

    <section class="sign-up">
        <div class="container">
            <?php if ($blog): ?>
                <h4 class="text-center mt-5"><?php echo htmlspecialchars($blog['title']); ?></h4>
                <div class="card w-50 mx-auto mt-3 p-5 pb-0 rounded-3">
                    <p class="lead"><?php echo htmlspecialchars($blog['body']); ?></p>
                    <div class="d-flex justify-content-between align-item-center">
                        <p>Created by: <?php echo htmlspecialchars($blog['created_by']); ?></p>
                        <p class="card-text"><?php echo date($blog['created_at']); ?></p>
                    </div>

                    <?php if ($_SESSION['usersUid'] === $blog['created_by']): ?>
                        <!--Form-->
                        <form action="blog_details.php" method="POST">
                            <input type="hidden" name="blogId" value="<?php echo $blog['id'] ?>">
                            <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                            <a href="update.php?blogId=<?php echo $blog['id'] ?>" class="btn btn-warning m-2">Update</a>
                        </form>
                    <?php endif; ?>

                </div>
            <?php else : ?>
                <h5>No such blog exists</h5>
            <?php endif; ?>
        </div>
    </section>

<?php include 'template/footer.php' ?>