<?php include './nav/navbar.php'; 
session_start();
include("./config/db.php");
	include("./config/function.php");
   if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
        $email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($username) && !empty($password) && !empty($email))
		{

			//save to database
			
			$query="SELECT * FROM users WHERE username='$username' OR email='$email'";
            $result=mysqli_query($con,$query);
            if(mysqli_num_rows($result)>0){
                echo "<script>alert('Username or email already exitst! please choose another');</script>";

            }else{
                $query = "insert into users (username,password,email) values ('$username','$password','$email')";

			    mysqli_query($con, $query);
                header("Location: login.php");
                	die;
            }

			
		
		}else
		{
			echo "Please enter some valid information!";
		}
	}

?>
 
<section class="login-container">
   <form class="form-container" method="POST">
    <p class="form-heading">Welcome back</p>
       <div>
         <input class="login-input" type="text" name="username" id="username" placeholder="username">
       </div>
       <div>
         <input class="login-input" type="email" name="email" id="email" placeholder="email">
       </div>
         <div>
         <input class="login-input" type="password" name="password" id="password" placeholder="password">
       </div>
        <input class="login-input login-button" type="submit" value="Create an account">
         <p class="signup-text">Already have an Account? <a href="login.php">login</a></p>
   </form>
</section> 