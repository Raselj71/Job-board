

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="./style.css">
   <link rel="stylesheet" href="./joblist/joblist.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
     <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    
  />
</head>
<body>
    <?php 
    session_start();
    include("./nav/navbar.php");
	include("./config/db.php");
	include("./config/function.php");

	// $user_data = check_login($con);
$sql = "SELECT * FROM jobs limit 6";
$result = $con->query($sql);
?>

   <section class="intro-container">
         <div class="intro-container__left"> 
               <p class="intro-container__Left-title">lets start your careers here!</p>
              <h2 class="intro-container__Left-body" >Looking for a career <br> change? Browse our job<br> listings now!</h2>
              <p>Mus vehicula dignissim quis si lorem libero cras pulvinar orci dapibus.<br> Sagittis quisque orci pretium donec elit platea porta integer maecenas risus lobortis.</p>
              <div class="client">
                 <img src="./assets/happy client.png" alt="">
                 <p>540 K+ Member Active</p>
              </div>
              <a class="browse-job" href="/webpro/joblist/joblist.php">BROWSE JOB</a>
         </div>
         <div class="intro-container__right">
                    <img class="idol-picture" src="./assets/idol.png" alt="">
         </div>
   </section>
    <section class="entry-container">
            <div class="entry-container__content">
                   <div class="entry-item animate__animated animate__slideInUp">
                           <img  class ="entry-icon" src="./assets/hard-hat.png" alt="">
                           <h2>Talents Agency</h2>
                           <p class="entry-content">Facilisi etiam consectetur mi nibh bibendum posuere ultricies cubilia donec potenti si</p>
                   </div>
                   <div id="mid-entry" class="entry-item animate__animated animate__slideInUp">
                           <img  class ="entry-icon" src="./assets/resume.png" alt="">
                           <h2>Portal job</h2>
                           <p class="entry-content">Facilisi etiam consectetur mi nibh bibendum posuere ultricies cubilia donec potenti si</p>
                   </div>
                   <div  class="entry-item animate__animated animate__slideInUp">
                           <img  class ="entry-icon" src="./assets/group.png" alt="">
                           <h2>Careers Coaching</h2>
                           <p class="entry-content">Facilisi etiam consectetur mi nibh bibendum posuere ultricies cubilia donec potenti si</p>
                   </div>
            </div>
     
    </section>

    <section>
            <div class="mt-5 m-5">
        <h2 class="mb-4">Latest Jobs</h2>
        <div class="row">
            <?php while ($row = $result->fetch_assoc()): ?>
                  <div class="col-md-4">
                    <div class="job-card">
                        <div class="verified-badge">Verified Company</div>
                         <div class="company_container">
                             
                                  <img src="/webpro/<?php echo htmlspecialchars($row['company_logo']); ?>" alt="Company Logo" class="img-fluid">
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
        </div>
    </div>

                
                
    </section>



    <script>

</script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	  <?php
           include "./footer/footer.php"
      ?>
</body>
</html>