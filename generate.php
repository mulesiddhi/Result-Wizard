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
                    <h3>Generate Result</h3>
                </div>
                <div class="card-body">
                    <form action="generate.php" method="post">
                    <div class="form-group">
                            <label for="">Enter Student Roll Number</label>
                            <input type="number" name="student_roll" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Enter Student Name</label>
                            <input type="text" name="student_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Enter Student Division</label>
                            <select name="student_division" class="form-control" required>
                                <option value="">Select Division</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="">Enter Marks for English</label>
                            <input type="number" name="eng" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Enter Marks for Hindi</label>
                            <input type="number" name="hindi" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Enter Marks for Maths</label>
                            <input type="number" name="math" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Enter Marks for Computer</label>
                            <input type="number" name="comp" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Enter Final Remarks</label>
                            <select name="remarks" class="form-control" required>
                                <option value="">Select Remarks</option>
                                <option value="pass">Pass</option>
                                <option value="fail">Fail</option>
                                </select>
                            <input type="submit" name="submit" class="btn btn-primary m-2" value="Submit">
                            <input type="reset" name="reset" class="btn btn-danger m-2" value="Reset">
                            <a href="success.php" class="btn btn-warning m-2">Back</a>
                            <?php
                                if(isset($_POST['submit'])){
                                    include_once 'mongodb_config.php';
                                    $dbname = 'resultdb';
                                    $collection = 'student';
                                    
                                    //DB connection
                                    $db = new DbManager();
                                    $conn = $db->getConnection();

                                    $student_name = $_POST['student_name'];
                                    $student_roll = $_POST['student_roll'];
                                    $student_division = $_POST['student_division'];
                                    $eng = $_POST['eng'];
                                    $hindi = $_POST['hindi'];
                                    $math = $_POST['math'];
                                    $comp = $_POST['comp'];
                                    $remarks = $_POST['remarks'];
                                    $total = $eng + $hindi + $math + $comp;
                                    $percentage = ($total/400)*100;
                                    $result = array(
                                        'student_name' => $student_name,
                                        'student_roll' => $student_roll,
                                        'student_division' => $student_division,
                                        'eng' => $eng,
                                        'hindi' => $hindi,
                                        'math' => $math,
                                        'comp' => $comp,
                                        'total' => $total,
                                        'percentage' => $percentage,
                                        'remarks' => $remarks
                                    );
                                    $filter = [];
                                    $option = [];

                                    $read = new MongoDB\Driver\Query($filter, $option);

                                    $all_users = $conn->executeQuery("$dbname.$collection", $read);
                                    $validate=0;
                                    foreach ($all_users as $user) {
	
    if($user->student_roll == $student_roll ){
       $validate=-1;
    }
	
}
if ($validate==0){
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->insert($result);
    $result = $conn->executeBulkWrite("$dbname.$collection", $bulk);
    if($result){
        echo ("<script LANGUAGE='JavaScript'>
        window. alert('Result Generated Successfully');
        window.location.href='success.php';
        </script>");
    }
    else{
        echo "<script>alert('Data Insertion Failed')</script>";
    }
}else{
    echo "<script>alert('Result for that Roll Number Already Exists.')</script>";
}

                                }




                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>





    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      
  

</body>


</html>
