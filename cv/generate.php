<?php
     include "../nav/navbar.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated CV</title>
    <link rel="stylesheet" href="rasel.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../footer/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="comp-container">
         <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_POST['name']);
            $title = htmlspecialchars($_POST['title']);
            $phone = htmlspecialchars($_POST['phone']);
            $website = htmlspecialchars($_POST['website']);
            $address = htmlspecialchars($_POST['address']);
            $inst1 = htmlspecialchars($_POST['inst1']);
            $deg1 = htmlspecialchars($_POST['deg1']);
            $year1 = htmlspecialchars($_POST['year1']);
            $inst2 = htmlspecialchars($_POST['inst2']);
            $deg2 = htmlspecialchars($_POST['deg2']);
            $year2 = htmlspecialchars($_POST['year2']);
            $refname = htmlspecialchars($_POST['refname']);
            $refaddress = htmlspecialchars($_POST['refaddress']);
            $refphone = htmlspecialchars($_POST['refphone']);
            $profile = htmlspecialchars($_POST['profile']);
            $jobtitle1 = htmlspecialchars($_POST['jobtitle1']);
            $jobdetails1 = htmlspecialchars($_POST['jobdetails1']);
            $jobtitle2 = htmlspecialchars($_POST['jobtitle2']);
            $jobdetails2 = htmlspecialchars($_POST['jobdetails2']);
            $jobtitle3 = htmlspecialchars($_POST['jobtitle3']);
            $jobdetails3 = htmlspecialchars($_POST['jobdetails3']);

            // Handle file upload
            $profile_picture_path = "";
            if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
                $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
                $file_ext = pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION);

                if (in_array(strtolower($file_ext), $allowed_types)) {
                    $upload_dir = 'uploads/';
                    if (!is_dir($upload_dir)) {
                        mkdir($upload_dir, 0777, true);
                    }
                    $profile_picture_path = $upload_dir . uniqid() . '.' . $file_ext;
                    move_uploaded_file($_FILES['profile_picture']['tmp_name'], $profile_picture_path);
                }
            }
        ?>

        <div class="left-content">
            <div class="left-content__container">
               
                <h1 class="name"><?php echo $name; ?></h1>
                <h3 class="title"><?php echo $title; ?></h3>

                 <?php if ($profile_picture_path): ?>
                    <img class="profile" src="<?php echo $profile_picture_path; ?>" alt="Profile Picture"/>
                <?php endif; ?>

                <div class="contact-div">
                    <img class="icon" src="../profile-icon.png" />
                    <h2 class="heading">CONTACT ME</h2>
                </div>

                <div class="hr-div">
                    <i class="fa-solid fa-phone-volume"></i>
                    <p><?php echo $phone; ?></p>
                </div>

                <div class="second-div">
                    <i class="fa-brands fa-firefox mini-icon"></i>
                    <p><?php echo $website; ?></p>
                </div>
                <div class="second-div">
                    <i class="fa-solid fa-location-dot mini-icon"></i>
                    <p><?php echo $address; ?></p>
                </div>

                <hr class="separator" />

                <div class="graduate-div">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <h2 class="heading">EDUCATION</h2>
                </div>

                <h4 class="versity-heading"><?php echo $inst1; ?></h4>
                <p class="degree"><?php echo $deg1; ?></p>
                <p class="degree"><?php echo $year1; ?></p>
                <h4 class="versity-heading"><?php echo $inst2; ?></h4>
                <p class="degree"><?php echo $deg2; ?></p>
                <p class="degree"><?php echo $year2; ?></p>

                <hr class="separator" />

                <div class="graduate-div">
                    <img class="icon" src="../reference.png" />
                    <h2 class="heading">REFERENCES</h2>
                </div>

                <h4 class="versity-heading"><?php echo $refname; ?></h4>
                <p class="degree addr"><?php echo $refaddress; ?></p>
                <p class="degree">Tel: <?php echo $refphone; ?></p>

              
            </div>
        </div>

        <hr />

        <div class="right-content">
            <div>
                <div class="profile-container">
                    <h2 class="name">Profile</h2>
                    <hr class="separator" />
                    <p class="profile-info"><?php echo $profile; ?></p>
                </div>

                <div class="work-container">
                    <h2>Work Experience</h2>
                    <hr class="separator" />
                    <div class="job-title">
                        <h3 class="job-role"><?php echo $jobtitle1; ?></h3>
                        <p class="profile-info"><?php echo $jobdetails1; ?></p>
                    </div>
                    <div class="job-title">
                        <h3 class="job-role"><?php echo $jobtitle2; ?></h3>
                        <p class="profile-info"><?php echo $jobdetails2; ?></p>
                    </div>
                    <div class="job-title">
                        <h3 class="job-role"><?php echo $jobtitle3; ?></h3>
                        <p class="profile-info"><?php echo $jobdetails3; ?></p>
                    </div>
                </div>
            </div>
        </div>
          <?php
                } else {
                    echo "<p>No data submitted.</p>";
                }
                ?>
    </div>



     <script>
        function printCV() {
            window.print();
        }
    </script>
    
    <?php
           include "../footer/footer.php"
      ?>



</body>
</html>
