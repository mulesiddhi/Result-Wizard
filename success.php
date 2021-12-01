<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <title>Result Wizard</title>
</head>
<body >
    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-2">
  <a class="navbar-brand" href="success.php"><u><b><i>Result Wizard</i></b></u></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-white m-3 " href="success.php">Details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white m-3" href="generate.php">Generate</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white m-3" href="logout.php">Logout</a>
      </li>
      </ul>
         
  </div>
</nav>
<div class='m-3'>
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h3 class="text-center"> Students Details</h3>
<h5 class='text-center'>Class: 9th</h5>
</div>
<div class="card-body">
<table class="table table-bordered">
<thead>
<tr>
<th>Roll No</th>
  <th>Name</th>
  <th>Division</th>
  <th>Actions</th>
</tr>
</thead>
<tbody>
<?php
session_start();
// include database file
include_once 'mongodb_config.php';

$dbname = 'resultdb';
$collection = 'student';

//DB connection
$db = new DbManager();
$conn = $db->getConnection();

$filter = [];
$option = [];

$read = new MongoDB\Driver\Query($filter, $option);

$all_users = $conn->executeQuery("$dbname.$collection", $read);


foreach ($all_users as $user) {?>
  <tr>
       <td><?php echo $user->student_roll;  ?></td>
       <td><?php echo $user->student_name; ?></td>
       <td><?php echo $user->student_division;  ?></td>     
      <td><a href="delete.php?id=<?php echo $user->_id; ?>" class='btn btn-danger'>Delete</a></td> 
             
       </tr>
 <?php } ?>

</div>
</div>




    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      
  

</body>


</html>
