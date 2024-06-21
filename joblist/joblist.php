<?php
include '../config/db.php';
include '../nav/navbar.php';
include '../config/function.php';

// Initialize search variables
$searchTitle = '';
$searchType = '';

// Check if search form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['title'])) {
        $searchTitle = $con->real_escape_string($_GET['title']);
    }
    if (isset($_GET['type'])) {
        $searchType = $con->real_escape_string($_GET['type']);
    }
}

// Build SQL query with search parameters
$sql = "SELECT * FROM jobs WHERE 1";

if ($searchTitle !== '') {
    $sql .= " AND title LIKE '%$searchTitle%'";
}

if ($searchType !== '') {
    $sql .= " AND job_type = '$searchType'";
}

$result = $con->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Job Listings</title>
    <link rel="stylesheet" href="joblist.css">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="../footer/footer.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Job Listings</h2>
        <form method="get" action="" class="mb-4">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" name="title" class="form-control" placeholder="Search by job title" value="<?php echo htmlspecialchars($searchTitle); ?>">
                </div>
                <div class="form-group col-md-4">
                    <select name="type" class="form-control">
                        <option value="">Select job type</option>
                        <option value="full-time" <?php if ($searchType == 'Full-time') echo 'selected'; ?>>Full-time</option>
                        <option value="part-time" <?php if ($searchType == 'Part-time') echo 'selected'; ?>>Part-time</option>
                        <option value="internship" <?php if ($searchType == 'Internship') echo 'selected'; ?>>Internship</option>
                        <option value="contract" <?php if ($searchType == 'Contract') echo 'selected'; ?>>Contract</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
        <div class="row">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col-md-4">
                        <div class="job-card">
                            <div class="verified-badge">Verified Company</div>
                            <div class="company_container">
                                <img  src="../<?php echo htmlspecialchars($row['company_logo']); ?>" alt="Company Logo" class="img-fluid image-conatiner">
                                <div class="company_container_content">
                                    <div class="job-location"><?php echo htmlspecialchars($row['location']); ?></div>
                                    <div class="job-company"><?php echo htmlspecialchars($row['company']); ?></div>
                                </div>
                            </div>
                            <hr>
                            <div class="job-title"><?php echo htmlspecialchars($row['title']); ?></div>
                            <p id="limitedParagraph" class="job-description"><?php echo truncateText($row['description'], 30); ?></p>
                            <div class="salary">
                                <div>
                                    <div class="job-type"><i class="fas fa-clock"></i> <?php echo htmlspecialchars($row['job_type']); ?></div>
                                    <div class="job-salary"><i class="fas fa-dollar-sign"></i> <?php echo htmlspecialchars($row['salary_range']); ?></div>
                                </div>
                                <a id="btn" href="/webpro/apply/apply.php?job_id=<?php echo $row['job_id']; ?>" class="btn btn-primary apply-btn">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-warning" role="alert">
                        No job listings found.
                    </div>
                </div>
            <?php endif; ?>
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
