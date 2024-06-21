<?php include './admin/nav.php'; 
  session_start();
  include("./config/db.php");
  include("./config/function.php");
  
  

  if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($email) && !empty($password))
		{

			//read from database
			$query = "select * from admin where email = '$email' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$admin_data = mysqli_fetch_assoc($result);
					
					if($admin_data['password'] === $password)
					{
                       echo "login successfull";
						$_SESSION['adminid'] = $admin_data['adminid'];
						header("Location: /webpro/admin/index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>




 
<section class="login-container">
   <form class="form-container" method="POST">
    <p class="form-heading">Welcome Admin</p>
       <div>
         <input class="login-input" type="email" required name="email" id="email" placeholder="email">
       </div>
         <div>
         <input class="login-input" type="password" required name="password" id="password" placeholder="password">
       </div>
        <input class="login-input login-button" type="submit" value="Login">
        
   </form>
</section> 