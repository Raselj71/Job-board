<?php
     include "../nav/navbar.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="data.css">
    <link rel="stylesheet" href="../footer/footer.css">
   
</head>
<body>
      <section class="form-container">
              <h2 class="title">Create your portfolio</h2>
                
             <form class="form" action="generate.php" method="post" enctype="multipart/form-data">
             <div class="container"> 
                 <p class="heading">Personal information</p>
                   <hr>
                   <input required type="text" name="name" placeholder="Enter your name">
                   <input required type="text" name="title" placeholder="Enter your designation">
             </div>
             <div class="container"> 
                   <p  class="heading">Contact details</p>
                     <hr>
                    <input required type="text" name="phone" placeholder="Enter your phone number">
                   <input required type="text" name="website" placeholder="Enter your website">
                    <input required type="text" name="address" placeholder="Enter your address">
             </div>
             <div class="container">
                  <p  class="heading">University information</p>
                   <hr>
                  <input required type="text" name="inst1" placeholder="Enter your University">
                   <input required type="text" name="deg1" placeholder="Enter your degree">
                <input required type="text" name="year1" placeholder="Enter your session">
</div>
                <div class="container">

              
                 <p  class="heading">School information</p>
                   <hr>
                 <input required type="text" name="inst2" placeholder="Enter your school">
                   <input required type="text" name="deg2" placeholder="Enter your degree">
                <input required type="text" name="year2" placeholder="Enter your session">
                  </div>
             </div>
             <div class="container">
                  <p  class="heading">Reffereces</p>
                    <hr>

                   <input required type="text" name="refname" placeholder="Enter your refference's name">
                   <input required type="text" name="refaddress" placeholder="Enter address">
                <input required type="text" name="refphone" placeholder="Enter phone">
             </div>
              <div class="container">
                <p class="heading">Profile Picture</p>
                <hr>
                <input type="file" name="profile_picture" accept="image/*">
            </div>

              <div class="container">
                  <p  class="heading">Profile</p>
                    <hr>
                  <input required type="text" name="profile" placeholder="describe yourself">
              </div>
              <div class="container">
                   <p  class="heading">Work experience</p>
                     <hr>
                    
                   <div class="container">
                          <input required type="text" name="jobtitle1" placeholder="Enter job title">
                          <input required type="text" name="jobdetails1" placeholder="Enter job details">
                   </div>
                    <div class="container">
                          <input required type="text" name="jobtitle2" placeholder="Enter job title">
                          <input required type="text" name="jobdetails2" placeholder="Enter job details">
                   </div>
                    <div class="container">
                          <input required type="text" name="jobtitle3" placeholder="Enter job title">
                          <input required type="text" name="jobdetails3" placeholder="Enter job details">
                   </div> 

              </div>
                <input id="submit" type="submit" value="Generate your CV">

              </form>
      </section>


      <?php
           include "../footer/footer.php"
      ?>
</body>
</html>