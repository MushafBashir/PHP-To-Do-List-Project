<?php
 include "connect.php";

 if(isset($_GET['deleteid'])){
    $serialNum = $_GET['deleteid'];

    $sql = "delete from `to_do_list_table` where `Serial Number`=$serialNum";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "OK";
        header("location:index.php");
    }else{
        echo "Not";
    }

 }



?>