<?php
session_start();
// include database file
include_once 'mongodb_config.php';
$dbname = 'resultdb';
$collection = 'profile';

//DB connection
$db = new DbManager();
$conn = $db->getConnection();

$rollno=$_SESSION['rollno'];
$email=$_SESSION['email'];
$password=$_SESSION['password'];
$name=$_SESSION['name'];

$result=array(
    'rollnumber'=>$rollno,
    'email'=>$email,
    'password'=>$password,
    'name'=>$name
);
$filter = [];
$option = [];

$read = new MongoDB\Driver\Query($filter, $option);

$all_users = $conn->executeQuery("$dbname.$collection", $read);
$userc=0;
foreach ($all_users as $user) {
	
    if($user->rollnumber == $rollno){
      $userc=-1;
      break;
    }
	
}
if($userc==0){
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->insert($result);
    $result = $conn->executeBulkWrite("$dbname.$collection", $bulk);
    if($result){
        echo ("<script LANGUAGE='JavaScript'>
        window. alert('Account Activated Successfully. Login to continue.');
        window.location.href='login.php';
        </script>");
    }
    else{
        echo ("<script LANGUAGE='JavaScript'>
        window. alert('Account Activation Failed. Try Again.');
        window.location.href='signup.php';
        </script>");

    }
}else{
    echo ("<script LANGUAGE='JavaScript'>
    window. alert('This Roll Number is Already Registered. Try Again.');
    window.location.href='signup.php';
    </script>");
}
session_unset();


?>