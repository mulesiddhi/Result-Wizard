

<?php
// include database file
include_once 'mongodb_config.php';
$dbname = 'resultdb';
$collection = 'admin';

//DB connection
$db = new DbManager();
$conn = $db->getConnection();


$email = $_POST['email'];
$password = $_POST['password'];
// $user1 = array(
//     'email' => $email,
//     'password' => $password
// );
// $single_insert = new MongoDB\Driver\BulkWrite();
// $single_insert->insert($user1);

// if($conn->executeBulkWrite("$dbname.$collection", $single_insert)){
//     header('location:success.php');
// };

$filter = [];
$option = [];

$read = new MongoDB\Driver\Query($filter, $option);

$all_users = $conn->executeQuery("$dbname.$collection", $read);

// echo nl2br("List of users:\n");

foreach ($all_users as $user) {
	
    if($user->email == $email && $user->password == $password){
        header('location:success.php');
    }else{
        echo ("<script LANGUAGE='JavaScript'>
        window. alert('Wrong Credentials');
        window.location.href='admin.php';
        </script>");
    }
	
}





//admin email:admin@gmail.com
//admin password:admin123
?>