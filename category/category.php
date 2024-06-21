<?php
include '../config/db.php';
include '../nav/navbar.php';
include '../config/function.php';


$job_type = isset($_GET['job-type']) ? $_GET['job-type'] : '';

$sql = "SELECT * FROM jobs WHERE job_type = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $job_type);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" type="text/css" href="../style.css">
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
       <link rel="stylesheet" href="/webpro/joblist/joblist.css">
       <link rel="stylesheet" href="/webpro/footer/footer.css">
</head>
<body>
      <section>
            <div class="mt-5 m-5">
        <h2 class="mb-4"><?php echo $job_type?> Jobs</h2>
        <div class="row">
            <?php while ($row = $result->fetch_assoc()): ?>
                  <div class="col-md-4">
                    <div class="job-card">
                        <div class="verified-badge">Verified Company</div>
                         <div class="company_container">
                             
                                   <img src="../<?php echo htmlspecialchars($row['company_logo']); ?>" alt="Company Logo" class="img-fluid">
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

                     
                        <a id="btn" href="/webpro/apply/apply.php?job_id=<?php echo $row['job_id']; ?>" class="btn btn-primary apply-btn">Apply Now</a>
                         </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

                
                
    </section>

      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

     
     <?php
           include "../footer/footer.php"
      ?>
</body>
</html>