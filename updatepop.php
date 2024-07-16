<?php
include "connect.php";
if(isset($_POST['updatepop'])){
    $updateInput = $_POST['updateInput'];
    $sql1 = "UPDATE `to_do_list_table` SET `Task` = '$input', `Date And Time` = '$dateAndTime' WHERE `to_do_list_table`.`Serial Number` = $serialNum";
    $result1 = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result1);
    $taskk = $row['Task'];
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