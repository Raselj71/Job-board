
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <link rel="stylesheet" href="./style.css">
    <title>Navbar</title>
   
</head>

<body>
     <nav class="navbar">
        <h2 class="title">JOB <span class="second-title">Portal admin</span></h2>
        <ul class="list">
            <li><a href="/webpro/admin/index.php">Home</a></li>
             <li><a href="/webpro/index.php">client area</a></li>
            <!-- <li class="dropdown">
                <a href="javascript:void(0)">Category</a>
                <div class="dropdown-content">
                    <a href="/webpro/category/category.php?job-type=remote">Remote</a>
                    <a href="/webpro/category/category.php?job-type=full-time">Full-time</a>
                    <a href="/webpro/category/category.php?job-type=part-time">Part-time</a>
                    <a href="/webpro/category/category.php?job-type=contract">Contract</a>
                </div>
            </li> -->
            <!-- <li><a href="/webpro/cv/data.php">CV</a></li>
            <li><a href="/webpro/joblist/joblist.php">Job List</a></li> -->
           
            <li id="post-job"><a href="/webpro/postjob/postjob.php">POST A JOB</a></li>
            <?php if (isset($_SESSION['adminid'])): ?>
                <li><a href="/webpro/adminlogout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="/webpro/adminlogin.php">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</body>


</html>