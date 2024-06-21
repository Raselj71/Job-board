<?php
session_start();
include '../config/db.php';
include 'nav.php';
include '../config/function.php';


check_admin_login($con);


$job_id = isset($_GET['job_id']) ? intval($_GET['job_id']) : 0;


$job_sql = "SELECT * FROM jobs WHERE job_id = $job_id";
$job_result = $con->query($job_sql);
$job = $job_result->fetch_assoc();


$app_sql = "SELECT a.application_id, u.username, u.email, a.application_date 
            FROM applications a 
            JOIN users u ON a.user_id = u.id 
            WHERE a.job_id = $job_id";
$applicants_result = $con->query($app_sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Applicants for <?php echo htmlspecialchars($job['title']); ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Applicants for <?php echo htmlspecialchars($job['title']); ?></h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Applicant ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Application Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while($applicant = $applicants_result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($applicant['application_id']); ?></td>
                        <td><?php echo htmlspecialchars($applicant['username']); ?></td>
                        <td><?php echo htmlspecialchars($applicant['email']); ?></td>
                        <td><?php echo htmlspecialchars($applicant['application_date']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="/webpro/admin/index.php" class="btn btn-primary">Back to Job Listings</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>