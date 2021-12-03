<html>
   
   <head>
      <title>Student Signup</title>
      <link rel='stylesheet' href='style/login.css'>
   </head>
   
   <body>
 
      
<?php
session_start();

$rollerr=$pserr=$name_err='';
if(isset($_POST['submit']))
 {
     $rollno=$_POST['rollno'];
     $name=$_POST['name'];
     $email=$_POST['email'];
     $password=$_POST['password'];
     $_SESSION['rollno']=$rollno;
        $_SESSION['email']=$email;
        $_SESSION['password']=$password;
        $_SESSION['name']=$name;

    $success=0;
    //roll number validation
    if(!is_numeric($rollno)) {
        $rollerr = 'Data entered was not numeric';
        $success = 0;
    } else if(strlen($rollno) != 7) {
        $rollerr = ' The number entered was not 7 digits long';
        $success = 0;
    } else {
        /* Success */
        $success = 1;
    }
    //password validation
    if($success==1)
{    if(strlen($password) < 8) {
        $pserr = 'Password must be atleast 8 characters long';
        $success = 0;
    }elseif(!preg_match("#[0-9]+#",$password)) {
        $pserr = "Your Password Must Contain At Least 1 Number!";
        $success = 0;
    }else{
        /* Success */
        $success = 1;
    }
    if($success==1){
        if(is_numeric($name)) {
            $name_err = 'Name cannot be numeric';
            $success = 0;
        } else {
            /* Success */
            $success = 1;
        }
    }
}
    if($success == 1) {
        echo '<script>window.location.href="createdb.php"</script>';
    } 
}

?>
<div class="container" id="container">
	<div class="form-container sign-in-container">
    <form method="post" action="signup.php"> 
			<h1>SignUp <span>Student </span></h1>
            
			<br>
			<input type="number" placeholder="Enter your assigned Roll No *" name="rollno" required/>
            <span><?php echo $rollerr; ?></span>
			<input type="email" placeholder="Email *" name="email"  required />
           <input type='text' placeholder="Enter your  name *" name='name' required/>
           <span><?php echo $name_err; ?></span>
			<input type="password" placeholder="Create Password *" name="password"  required />
            <span><?php echo $pserr; ?></span>
           
            <br/>
			<button type='submit' name="submit">Activate</button>
			<br>
			<div>
			<a  href="login.php">Student Login</a><br>
			or
			<br>
            <a  href="admin.php">Admin Login</a>
</div>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
				<h1>Result Wizard</h1>
				<p>Enter your details to Activate your Account</p>
                <p><b><i>Get your results in just one click!</i></b></p>
			</div>
		</div>
	</div>
</div>

<footer>
	
</footer>

</body>
</html>