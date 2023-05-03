<?php
// Establish a connection to the database
$mysqli = new mysqli("localhost", "root", "", "Project");

// Check if the connection was successful
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Perform a query to get the count of all users
$result = $mysqli->query("SELECT COUNT(*) as total_users FROM users");
$result1 = $mysqli->query("SELECT sum(time1) as t1, sum(time2) as t2,sum(time3) as t3 FROM users");
$result2 = $mysqli->query("SELECT sum(score1) as s1, sum(score2) as s2,sum(score3) as s3 FROM users");
$result3 = $mysqli->query("SELECT COUNT(*) as solved FROM users where score1 >= 300 and score2 >= 100 and score2 >= 100");


// Retrieve the count of all users from the result set
$row = $result->fetch_assoc();
$row1 = $result1->fetch_assoc();
$row2 = $result2->fetch_assoc();
$row3 = $result3->fetch_assoc();
$total_users = $row["total_users"];
$s1 = $row2["s1"];
$s2 = $row2["s2"];
$s3 = $row2["s3"];
$s4 = $s1 + $s2 + $s3;
$t1 = $row1["t1"];
$t2 = $row1["t2"];
$t3 = $row1["t3"];
$t4 = $t1 + $t2 + $t3;
$avg = floor($s4/$total_users);




// Free up memory by closing the result set and the database connection
$result->close();
$mysqli->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Dashboard</title>
  <!-- plugins:css -->

  
  
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../css/themify-icons.css">
  
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/admin.css">
  <!-- endinject -->

</head>
<body>
  

      <div class="main-panel" style="width:100%;">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Total users</p>
                      <p class="fs-30 mb-2" style="font-size:40px;"><?php echo"$total_users";?></p>
                     
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Average Score</p>
                      <p class="fs-30 mb-2" style="font-size:40px;"><?php echo"$avg";?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

   
      
          
                

                    <div>
    <h1>Agents Data</h1>
    <table id="userTable" class="table table-striped table-bordered" style="width:auto">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Password</th>
          <th>Level-1 Score</th>
          <th>Level-1 Time</th>
          <th>Level-2 score</th>
          <th>Level-2 Time</th>
          <th>Level-3 score</th>
          <th>Level-3 Time</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
                    
                    
                  
              
 
      </div>
  
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#userTable').DataTable({
        "ajax": "getData.php",
        "columns": [
          {"data": "id"},
          {"data": "name"},
          {"data": "email"},
          {"data": "password"},
          {"data": "score1"},
          {"data": "time1"},
        {"data": "score2"},
          {"data": "time2"},
            {"data": "score3"},
          {"data": "time3"}
        ]
      });
    });
  </script>
</body>

</html>

