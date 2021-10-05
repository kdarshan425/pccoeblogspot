<?php
include '../partials/dbconnect.php';
session_start();

if(isset($_GET['token'])){
    $token = $_GET['token'];

    $existsql = "select * from `users` where `token` = '$token' ";
    $result = mysqli_query($conn, $existsql);
    $numRows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $dno = $row['sno'];
    $email = $row['user_email'];
    $present_token = $row['token'];
    $acc_status = $row['acc_status'];
    

    if($token==$present_token){

        $sql1 =  "UPDATE users SET `acc_status`= 'Active' WHERE `token` = '$token'";
        $result = mysqli_query($conn, $sql1);
        if($result){     
            $_SESSION['loggedin'] = true;
            $_SESSION['useremail'] = $email;
            $_SESSION['sno'] = $dno;
            echo "<script>window.location.href='https://pccoeblogspot.herokuapp.com/index.php?signupsuccess=true';</script>";
            exit();
        }
        else{
            echo' Not able to activate account, Please Contact Us.';
        }
    }
    else{
        echo'<h3>Your Link has been Expired, Please Resend Email Verification link By doing SignIn<h3>';
    }
}



?>