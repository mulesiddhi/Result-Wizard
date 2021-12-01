<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
     <title>Result Wizard</title>
</head>
<body >
  <?php
  // $name=$rollnumber=$email='' ;
  session_start();
  // include database file
  include_once 'mongodb_config.php';
  $dbname = 'resultdb';
  $collection = 'profile';
  
  //DB connection
  $db = new DbManager();
  $conn = $db->getConnection();

  $filter = [];
  $option = [];
  $read = new MongoDB\Driver\Query($filter, $option);

$all_users = $conn->executeQuery("$dbname.$collection", $read);
foreach ($all_users as $user) {
	
  if($user->rollnumber==$_SESSION['rollno']){
    $name=$user->name;
    $rollnumber=$user->rollnumber;
    $email=$user->email;
    $id=$user->_id;
  }

}

  ?>
    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-2">
  <a class="navbar-brand" href="student.php"><u><b><i>Result Wizard</i></b></u></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-white m-3 " href="result.php?id=<?php echo $rollnumber; ?>&name=<?php echo $name?>">Result</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white m-3" href="contact.php">Contact Admin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white m-3" href="student.php">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white m-3" href="logout.php">Logout</a>
      </li>
      </ul>
         
  </div>
</nav>
<div class='m-3 '>
<div class="container ">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header bg-dark">
<h3 class="text-center text-light"> Your Profile</h3>
</div>
<div class="card-body">
<div class="row">
<div class="col-md-4">
<!-- <img src="" class="img-fluid" alt=""> -->
</div>
<div class="card shadow-sm">
<div class="card-header bg-transparent border-0">
  <h3 class="mb-0"><i class="far fa-clone pr-1"></i> General Information</h3>
</div>
<div class="card-body pt-0">
  <table class="table table-bordered">
    <tbody>
      <tr>
      <th width="30%">Name</th>
      <td width="2%">:</td>
      <td><?php echo $name ?></td>
    </tr>
    <tr>
      <th width="30%">Roll Number	</th>
      <td width="2%">:</td>
      <td><?php echo $rollnumber ?></td>
    </tr>
    <tr>
      <th width="30%">Email</th>
      <td width="2%">:</td>
      <td><?php echo $email ?></td>
    </tr>
    
  </tbody></table>
</div>
</div>

</div>
</div>
</div>
</div>
  
</div>
</div>




    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      
  

</body>


</html>
