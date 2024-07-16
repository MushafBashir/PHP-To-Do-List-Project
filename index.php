<?php

include "connect.php";

if(isset($_POST['add'])){
  $input = mysqli_real_escape_string($conn, $_POST["input"]);

  if(!empty($input)){
  date_default_timezone_set('Asia/Karachi');
 $dateAndTime = date('Y-m-d H:i:s');

 $sql = "INSERT INTO `to_do_list_table` (`Task`, `Date And Time`) VALUES ('$input', '$dateAndTime')";
 $result = mysqli_query($conn,$sql);
 if($result){
  header("location:index.php");
 }
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List Project</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="own.css?v=<?php echo time();?>">
</head>
<body>
  <nav class="navbar bg-success text-light justify-content-center">
    <h2 class="text-center">To Do List</h2>
  </nav>
   <!-- ############################################################################################################## -->
                                <!-- Search bar -->
  <div class="container-fluid mt-2">
    <div class="row justify-content-end">
      <div class="col-3">
        <form action="search.php" method="GET" role="search" class="d-flex">
          <input type="text" class="form-control me-2" placeholder="Search" name="search">
          <button class="btn btn-outline-success" type="submit" name="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
  <!-- ############################################################################################################## -->


    <div class="container mt-2">
        
        <div class="row">
            <div class="col-6">
              <form method="post">
                <h5>Work To Do</h5>
                <input type="text" class="form-control" name="input" autocomplete="off">
                <button class="btn btn-primary mt-2" name="add">Add</button>
              </form>
            </div>
        </div>

        <div class="row border-b mt-4 mb-4">

        </div>
    </div>


    <div class="container">
        <div class="row">
            <!-- <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Serial</th>
                    <th scope="col">Task        </th>
                    <th scope="col">Date And Time</th>
                    <th scope="col">Update / Delete</th>
                  </tr>
                </thead>
                <tbody> -->

                <?php
                $sql = "Select * from `to_do_list_table`";
                $result = mysqli_query($conn,$sql);
                $serialNumm = 1;
                if($result){

                  echo '<table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Serial</th>
                      <th scope="col">Task        </th>
                      <th scope="col">Date And Time</th>
                      <th scope="col">Update / Delete</th>
                    </tr>
                  </thead>
                  <tbody>';
                   while($row = mysqli_fetch_assoc($result)){
                         $serialNum = $row['Serial Number'];
                         $task = $row['Task'];
                         $date = $row['Date And Time'];

                        


                         echo '<tr>
                         <th scope="row">'.$serialNumm.'</th>
                         <td>'.$task.'</td>
                         <td>'.$date.'</td>
                         <td>
                              <button class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#modal'.$serialNum.'">Update</button>
                            <a href="delete.php?deleteid='.$serialNum.'"><button class="btn btn-danger">Delete</button></a>
                         </td>
                       </tr>';
                       $serialNumm++;


                       echo  '<div class="modal fade" id="modal'.$serialNum.'" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalmodal'.$serialNum.'">Update</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5>Work To Do</h5>
    <form action="up.php" method="post">
        <input type="text" class="form-control" value="'.$task.'" name="uptask">
        <input type="hidden" value="'.$serialNum.'" name="updateid">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button class="btn btn-primary text-white" type="submit" name="upd">save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>';

                   }
                }
                ?>
                </tbody>
              </table>
        </div>
    </div>


    <script src="bootstrap.js"></script>
</body>
</html>

