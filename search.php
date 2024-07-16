<?php
 include "connect.php";

?>
 
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="bootstrap.css">
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
            <div class="col">
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
            if(isset($_GET['submit']) && !empty($_GET['search'])){
            //  $workStr = $_GET['search'];
             $workStr = mysqli_real_escape_string($conn,$_GET['search']);

             $sql = "SELECT * from `to_do_list_table` where Task LIKE '%$workStr%'";
             $result = mysqli_query($conn, $sql);
             $queryResult = mysqli_num_rows($result);
             if($queryResult > 0){
                $num=1;
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
                $dat = $row['Date And Time'];
                
                
                echo'<tr>
                    <th scope="col">'.$num.'</th>
                    <td scope="col">'.$task.'</td>
                    <td scope="col">'.$dat.'</td>
                    <td scope="col">
                    <button class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#modal'.$serialNum.'">Update</button>
                    <a href="delete.php?deleteid='.$serialNum.'"><button type="button" class="btn btn-danger">Delete</button></a>
                    </td>
                    </tr>';
                    $num++;

                    echo '<div class="modal fade" id="modal'.$serialNum.'" tabindex="-1">
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
             }else{
                echo 'Not record found for '.$workStr.'';
             }

            }else{
                header("location:index.php");
            }
            ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
    



    <script src="bootstrap.js"></script>
</body>
</html>