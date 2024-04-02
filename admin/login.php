<?php
     $u = $_POST['username'];
     $p = $_POST['password'];
     $db = mysqli_connect("localhost", "root", "", "dacsn-n12");
     $sql = "select * from admins where username='$u' and password='$p'";
     $rs = mysqli_query($db, $sql);

     if (mysqli_num_rows($rs) > 0){
        header("Location: trangadmin.html");

     } else {
        require_once 'login.html';
     }
?>  