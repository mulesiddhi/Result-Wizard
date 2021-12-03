<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel='stylesheet' href='style/home.css'>

    <title>Document</title>
</head>
<body>
    <?php
	  
	 
    session_start();
    $_SESSION['id']=$_GET['id'];
    $_SESSION['name']=$_GET['name'];

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
$find=-1;

$all_users = $conn->executeQuery("$dbname.$collection", $read);
foreach ($all_users as $user) {
    if($user->student_roll==$_SESSION['id']){
        $eng=$user->eng;
        $math=$user->math;
        $hindi=$user->hindi;
        $comp=$user->comp;
        $total=$user->total;
        $percent=$user->percentage;
        $remark=$user->remarks;
        $div=$user->student_division;
        $find=0;
}
}
if($find==0){

    ?>
    <a href="student.php" ><i class="fas fa-arrow-circle-left"></i></a>
<center><table><tr><td><center><i class="fas fa-university"></i></center></td><td colspan='3'><b> UNIVERSITY RESULT</td></tr>
<tr><td>Name of Student: <?php echo $_SESSION['name']?></td><td>Division: <?php echo $div?></td><td>Roll Number: <?php echo $_SESSION['id']?></td></tr></table>
<table><tr><th>Subject Code</th><th>Subject Name</th><th>Marks</th></tr>
<tr><td>101</td><td>English</td><td><?php echo $eng?></td></tr>
<tr><td>102</td><td>Mathematics</td><td><?php echo $math?></td></tr>
<tr><td>103</td><td>Hindi</td><td><?php echo $hindi?></td></tr>
<tr><td>104</td><td>Computers</td><td><?php echo $comp?></td></tr>
<tr><th>Total Marks: <?php echo $total ?></th><th colspan='2'>Percentage: <?php echo $percent ?></th></tr>
<tr><td colspan='3'>Final Remarks : <b><?php echo $remark ?></b></td></tr>
</table>
</center>
<br>
<?php }
else{
    echo "<a href='student.php' ><i class='fas fa-arrow-circle-left'></i></a>";
    echo "<center><img src='images/error.png' alt='error''></center";
    echo "<center><h1>Your result is not declared yet !</h1></center>";
    echo "<center><h3>Please <a href='contact.php' >contact the admin</a> for further details.</h3></center>";
}
?>
</body>
</html>