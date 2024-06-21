<?php
include '../config/db.php';
include '../nav/navbar.php';
include "../config/function.php";

$job_id = isset($_GET['job_id']) ? intval($_GET['job_id']) : 0;

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
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($job['title']); ?> - Job Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" type="text/css" href="../footer/footer.css">
    <style>
        .job-details {
            border: 1px solid #e3e3e3;
            border-radius: 5px;
            padding: 20px;
            margin-top: 20px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .job-details img {
            max-height: 100px;
            margin-bottom: 15px;
        }
        .job-title {
            font-size: 2rem;
            font-weight: bold;
        }
        .job-location, .job-company, .job-type, .job-salary {
            font-size: 1rem;
            color: #777;
        }
        .verified-badge {
            background: #dff0d8;
            color: #3c763d;
            padding: 3px 5px;
            border-radius: 3px;
            font-size: 0.8rem;
            margin-bottom: 10px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class=" mt-5 mb-5 container">
        <div class="job-details">
            <div class="verified-badge">Verified Company</div>
            <img src="../<?php echo htmlspecialchars($job['company_logo']); ?>" alt="Company Logo" class="img-fluid">
            <div class="job-location"><?php echo htmlspecialchars($job['location']); ?></div>
            <div class="job-company"><?php echo htmlspecialchars($job['company']); ?></div>
            <div class="job-title"><?php echo htmlspecialchars($job['title']); ?></div>
            <div><?php echo $job['description']; // Directly echo HTML ?></div>
            <div class="job-type"><i class="fas fa-clock"></i> <?php echo htmlspecialchars($job['job_type']); ?></div>
            <div class="job-salary"><i class="fas fa-dollar-sign"></i> <?php echo htmlspecialchars($job['salary_range']); ?></div>
            <p class="card-text"><?php echo htmlspecialchars(date('F d, Y', strtotime($job['deadline']))); ?></p>
            <form method="POST" action="/webpro/apply_process/apply_process.php">
                <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
                <button type="submit" class="btn btn-primary">Apply Now</button>
            </form>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
     <?php
           include "../footer/footer.php"
      ?>
</body>
</html>
