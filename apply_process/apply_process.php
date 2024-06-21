<?php
session_start();
include '../config/db.php';
include '../config/function.php';

check_login($con);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $job_id = isset($_POST['job_id']) ? intval($_POST['job_id']) : 0;
    $user_id = $_SESSION['id'];

    
    $sql = "SELECT * FROM jobs WHERE job_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $job_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "<div class='alert alert-danger'>Job not found.</div>";
        exit;
    }

    $job = $result->fetch_assoc();
    $stmt->close();

    
    $current_date = date("Y-m-d");
    if ($current_date > $job['deadline']) {
        echo "<div class='alert alert-danger'>The application deadline for this job has passed.</div>";
        exit;
    }

   
    $application_date = date("Y-m-d");
    $sql = "INSERT INTO applications (user_id, job_id, application_date) VALUES (?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("iis", $user_id, $job_id, $application_date);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>You have successfully applied for the job.</div>";
    } else {
        echo "<div class='alert alert-danger'>There was an error submitting your application.</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Application Status</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <a href="../category/category.php?job-type=<?php echo urlencode($job['job_type']); ?>" class="btn btn-secondary">Back to Jobs</a>
    </div>
</body>
</html>

<?php
$con->close();
?>
