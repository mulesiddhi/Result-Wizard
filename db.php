

<?php
session_start();
// include database file
include_once 'mongodb_config.php';
$dbname = 'resultdb';
$collection = 'profile';

//DB connection
$db = new DbManager();
$conn = $db->getConnection();


$rollno = $_POST['rollno'];
$password = $_POST['password'];
$_SESSION['rollno'] = $rollno;




$filter = [];
$option = [];

$read = new MongoDB\Driver\Query($filter, $option);

$all_users = $conn->executeQuery("$dbname.$collection", $read);

// echo nl2br("List of users:\n");

foreach ($all_users as $user) {
	
    if($user->rollnumber==$rollno && $user->password == $password){
        header('location:student.php');
    }else{
        echo ("<script LANGUAGE='JavaScript'>
        window. alert('Wrong Credentials or User does not exist');
        window.location.href='login.php';
        </script>");
    }
	
}





//admin email:admin@gmail.com
//admin password:admin123
?>