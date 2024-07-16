<?php
include "connect.php";

if(isset($_POST['upd'])){
   $serialNumber=$_POST['updateid'];
   $uptask = $_POST['uptask'];
   date_default_timezone_set('Asia/Karachi');
   $dateAndTime = date('Y-m-d H:i:s');

   $sql = "UPDATE `to_do_list_table` SET `Task` = '$uptask', `Date And Time` = '$dateAndTime' WHERE `to_do_list_table`.`Serial Number` = $serialNumber";
   $result = mysqli_query($conn, $sql);
   if($result){
     header("location:index.php");
   }
   }
?>