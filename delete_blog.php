<?php
function deleteDirectory($dir) {
    if (!file_exists($dir)) {
        return true;
    }

    if (!is_dir($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }

    }

    return rmdir($dir);
}


$blog_id = $_GET['id'];    
include 'partials/dbconnect.php';         
$sql = "SELECT * FROM `blogs` WHERE `blogs`.`id` = $blog_id; ";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    $noResult = false;
    $id = $row['id'];
    $blog_owner = $row['blog_owner'];    
    $heading = $row['Heading'];
    $blog = $row['content'];
    $name = $row['name'];
    $image = $row['image'];
    $timestamp = $row['timestamp'];
}


$sql4 =  " DELETE FROM `blogs` WHERE `blogs`.`id` = '$blog_id';";
$result4 = mysqli_query($conn, $sql4);   


if($result4){

    $sql5 =  " DELETE FROM `threads` WHERE `th_blog_id`= '$blog_id' ;";
    $result5 = mysqli_query($conn, $sql5);      

    if($result5){ 

        $sql6 =  " DELETE FROM `reply` WHERE `blog_id`= '$blog_id' ;";
        $result6 = mysqli_query($conn, $sql6);

        if($result6){  

            // $sql7 =  " DELETE FROM `comments` WHERE `cat_id`= '$chal_id' ;";
            // $result7 = mysqli_query($conn, $sql7);

            // if($result7){  

                $dir = "blogs/$heading$name";

                $result_del = deleteDirectory($dir);           
                if($result_del){
                    echo "<script>window.location.href='https://pccoeblogspot.herokuapp.com/my_blog.php?Challenge_deleted=true';</script>";
                    exit;
                    // header("Location: my_blog.php?Challenge_deleted=true"); 
                }
                else{
                    echo"not able to delete";
                } 
            // }
            // else{
            //     echo'not deleted from comments database';
            // }  
        }
        else{
            echo'not deleted from users_challenges database';
        }
    }
    else{
        echo'not deleted from threads database';
    }
}
else{
    echo'Not deleted from challenges database';
}    




?>