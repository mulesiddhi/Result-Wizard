<html>
   
   <head>
      <title>Student Login</title>
      <link rel='stylesheet' href='style/login.css'>
   </head>
   
   <body>
  

<div class="container" id="container">
	<div class="form-container sign-in-container">
    <form method="post" action="db.php"> 
			<h1>Login <span>As student</span></h1>
            
			<br>
			<input type="number" placeholder="Roll No *" name="rollno" required/>
            
			<!-- <input type="text" placeholder="Email *" name="email"  required /> -->
           
			<input type="password" placeholder="Password *" name="password"  required />
            <br/>
			<button>Login</button>
			<br>
			<div>
			<a  href="signup.php">Activate Your Student Account</a> <br>
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
				<p>Enter your details and start your journey with us</p>
                <p><b><i>Get your results in just one click!</i></b></p>
			</div>
		</div>
	</div>
</div>

<footer>
	
</footer>

</body>
</html>