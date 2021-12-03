<html>
   
   <head>
      <title>Admin Login</title>
      <link rel='stylesheet' href='style/login.css'>
   </head>
   
   <body>
     

<div class="container" id="container">
	<div class="form-container sign-in-container">
    <form method="post" action="admindb.php"> 
			<h1>Login <span>Admin</span></h1>
            
			<br>
			<!-- <input type="text" placeholder="Name *" name="name" required/> -->
            
			<input type="email" placeholder="Email *" name="email"  required />
           
			<input type="password" placeholder="Password *" name="password"  required />
            <br/>
			<button type='submit'>Login</button>
            <a  href="login.php">Student Login</a>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
				<h1>Result Wizard</h1>
				<p>Enter your details and start your journey with us</p>
                <p><b><i>Generate Results in just one click!</i></b></p>
			</div>
		</div>
	</div>
</div>

<footer>
	
</footer>

</body>
</html>