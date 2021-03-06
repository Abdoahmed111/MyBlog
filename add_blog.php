<?php include 'template/header.php'; ?>
<?php
include 'includes/dbh.inc.php';

$errors = array('title' => '', 'body' => '');
$title = $body = '';

$created_by = $_SESSION['usersUid'];

if (isset($_POST['submit'])) {
    //check email
    if (empty($_POST['title'])) {
        $errors['title'] = 'An Title is required <br/>';
    } else {
        $title = $_POST['title'];
    }

    //check title
    if (empty($_POST['body'])) {
        $errors['body'] = 'A body is required <br/>';
    } else {
        $title = $_POST['body'];
    }


    if (!array_filter($errors)) {
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $body = mysqli_real_escape_string($conn, $_POST['body']);

        $sql = "INSERT INTO blogs(title, body, created_by) VALUES('$title','$body', '$created_by')";

        if (mysqli_query($conn, $sql)) {
            header('Location: index.php');
        } else {
            echo 'query error' . mysqli_error($conn);
        }

    }
}

?>



<section class="sign-up">
    <div class="container d-flex w-100 h-100">
        <div class="card w-50 justify-content-center align-self-center mx-auto p-5">
            <h2 class="text-center card-title ">Add Blog</h2>
            <form action="add_blog.php" method="post">
                <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title"
                           placeholder="Enter Title" name="title">
                    <small class="text-danger"><?php echo $errors['title']; ?></small>
                </div>
                <div class="form-group mb-3">
                    <label for="body">Body</label>
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
                    <small class="text-danger"><?php echo $errors['body']; ?></small>
                </div>
                <button type="submit" name="submit" class="btn btn-danger">Add blog</button>
            </form>
        </div>
    </div>
</section>
<?php include 'template/footer.php' ?>
