<?php
session_start();
include '../config/db.php';
include 'nav.php';
include '../config/function.php';

// Ensure the admin is logged in
check_admin_login($con);

// Fetch jobs with the number of applicants
$sql = "SELECT j.*, COUNT(a.application_id) as applicant_count 
        FROM jobs j 
        LEFT JOIN applications a ON j.job_id = a.job_id 
        GROUP BY j.job_id";
$jobs_result = $con->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Admin Panel - Job Listings</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Job ID</th>
                    <th>Title</th>
                    <th>Location</th>
                    <th>Company</th>
                    <th>Job Type</th>
                    <th>Salary Range</th>
                    <th>Deadline</th>
                    <th>Applicants</th>
                </tr>
            </thead>
            <tbody>
                <?php while($job = $jobs_result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($job['job_id']); ?></td>
                        <td><?php echo htmlspecialchars($job['title']); ?></td>
                        <td><?php echo htmlspecialchars($job['location']); ?></td>
                        <td><?php echo htmlspecialchars($job['company']); ?></td>
                        <td><?php echo htmlspecialchars($job['job_type']); ?></td>
                        <td><?php echo htmlspecialchars($job['salary_range']); ?></td>
                        <td><?php echo htmlspecialchars($job['deadline']); ?></td>
                        <td><a href="applicants.php?job_id=<?php echo $job['job_id']; ?>"><?php echo htmlspecialchars($job['applicant_count']); ?></a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
