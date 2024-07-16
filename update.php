<?php
include "connect.php";


if(isset($_GET['updateid'])){
    $serialNum = $_GET['updateid'];
    $sql1 = "SELECT * from `to_do_list_table` where `Serial Number` = $serialNum";
    $result1 = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result1);
    $task = $row['Task'];
if(isset($_POST['update'])){
    $input = mysqli_real_escape_string($conn, $_POST["input"]);
  
    if(!empty($input)){
    date_default_timezone_set('Asia/Karachi');
   $dateAndTime = date('Y-m-d H:i:s');
  
   $sql = "UPDATE `to_do_list_table` SET `Task` = '$input', `Date And Time` = '$dateAndTime' WHERE `to_do_list_table`.`Serial Number` = $serialNum";
   $result = mysqli_query($conn,$sql);
   if($result){
     header("location:index.php");
   }
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
    <link rel="stylesheet" href="own.css">
</head>
<body>
<div class="container mt-2">
        <div class="row">
            <h2 class="text-center">To Do List Project</h2>
        </div>

        <div class="row">
            <div class="col-6">
              <form method="post">
                <h5>Work To Do</h5>
                <input type="text" class="form-control" name="input" value="<?php echo $task?>">
                <button class="btn btn-primary mt-2" name="update">update</button>
              </form>
            </div>
        </div>

        <div class="row border-b mt-4 mb-4">

        </div>
    </div>

    <script src="bootstrap.js"></script>
</body>
</html>