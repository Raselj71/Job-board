<?php
session_start();
include '../config/db.php';
include '../admin/nav.php';
include '../config/function.php';

check_admin_login($con);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $company = $_POST['company'];
    $job_type = $_POST['job_type'];
    $salary_range = $_POST['salary_range'];
    $deadline = $_POST['deadline'];
    $user_id = $_SESSION['adminid'];

    $company_logo = '';
    if ($_FILES['company_logo']['name']) {
        $target_dir = "../uploads/";
        $file_name = basename($_FILES["company_logo"]["name"]);
        $target_file = $target_dir . $file_name;
        
        if (move_uploaded_file($_FILES["company_logo"]["tmp_name"], $target_file)) {
           
            $company_logo = 'uploads/' . $file_name;
        } else {
            echo "<div class='alert alert-danger'>Error uploading the file.</div>";
        }
    }

    $stmt = $con->prepare("INSERT INTO jobs (title, description, location, company, company_logo, job_type, salary_range, deadline, user_id)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssi", $title, $description, $location, $company, $company_logo, $job_type, $salary_range, $deadline, $user_id);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>New job posted successfully</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Job</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Add Job</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="6" required></textarea>
                <script>
                    CKEDITOR.replace('description');
                </script>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>
            <div class="form-group">
                <label for="company">Company</label>
                <input type="text" class="form-control" id="company" name="company" required>
            </div>
            <div class="form-group">
                <label for="company_logo">Company Logo</label>
                <input type="file" class="form-control-file" id="company_logo" name="company_logo">
            </div>
            <div class="form-group">
                <label for="job_type">Job Type</label>
                <select class="form-control" id="job_type" name="job_type" required>
                    <option value="remote">Remote</option>
                    <option value="full-time">Full-Time</option>
                    <option value="part-time">Part-Time</option>
                    <option value="internship">Internship</option>
                    <option value="contract">Contract</option>
                </select>
            </div>
            <div class="form-group">
                <label for="salary_range">Salary Range</label>
                <input type="text" class="form-control" id="salary_range" name="salary_range" required>
            </div>
            <div class="form-group">
                <label for="deadline">Deadline</label>
                <input type="date" class="form-control" id="deadline" name="deadline" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Job</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
