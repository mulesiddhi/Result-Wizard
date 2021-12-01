<?php

session_start(); 
$_SESSION['id']=$_GET['id'];
// echo $_SESSION['id'];

// include database file
include_once 'mongodb_config.php';

$dbname = 'resultdb';
$collection = 'student';

//DB connection
$db = new DbManager();
$conn = $db->getConnection();
$deletes = new MongoDB\Driver\BulkWrite();
$deletes->delete(['_id' => new MongoDB\BSON\ObjectId($_SESSION['id'])], ['limit' => 1]);


$result = $conn->executeBulkWrite("$dbname.$collection", $deletes);

if($result) {
    echo "<script>alert('Record deleted successfully  ')</script>";
    echo "<script>location.replace('success.php')</script>";

}else{
    echo "<script>alert('Record not deleted successfully  ')</script>";
    echo "<script>location.replace('success.php')</script>";
}
?>
