<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./footer/footer.css">
</head>
<body>
    <?php
   
// include '../config/db.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['newsletter'])) {
        $email = $_POST['newsletter'];

     
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
         
            $sql = "INSERT INTO newsletter (email) VALUES ('$email')";

            if ($con->query($sql) === TRUE) {
                echo "<div class='alert alert-success'>Thank you for signing up!</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $con->error . "</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Please enter a valid email address.</div>";
        }
    }
    ?>
    <section class="footer">
        <div class="hero">
            <h1>Job Board</h1>
            <p>Discover your dream job, one click away</p>
        </div>

        <div class="category">
            <h2>Category</h2>
            <ul>
                <li><a href="/webpro/category/category.php?job-type=remote">Remote</a></li>
                <li><a href="/webpro/category/category.php?job-type=full-time">Full-time</a></li>
                <li><a href="/webpro/category/category.php?job-type=part-time">Part-time</a></li>
                <li><a href="/webpro/category/category.php?job-type=contact">Contact</a></li>
            </ul>
        </div>

        <div class="newsletter">
            <h2>Newsletter</h2>
            <p>Get exclusive deals by signing up to our Newsletter.</p>
            <form action="" method="post">
                <input type="email" name="newsletter" placeholder="Email">
                <input class="footer-submit" type="submit" value="Sign Up">
            </form>
        </div>
    </section>
</body>
</html>
