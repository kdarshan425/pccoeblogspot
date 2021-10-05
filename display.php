<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG | PCCOE BLOGSPOT</title>
    <link rel="icon" href="img/pccoe.png">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Raleway:wght@200&display=swap" rel="stylesheet">
    <style>
        .blog_body{
            max-width:900px;
            box-shadow: 0 1px 4px 0 rgb(60 64 67 / 30%);
        }

        .blog_body_div{
            padding:40px;
        }

        @media (max-width: 768px){
            .blog_body_div{
            padding:20px;
         }
        }

        @media (max-width: 568px){
            .blog_body_div{
            padding-top:40px;
            padding-bottom:50px;
         }
        }

        .blog_image{
            max-height:500px;
            max-width:100%;
        }

        @media (max-width: 768px){
            .blog_image{
            max-height:fit-content !important;
            width:auto !important;
        }
        }

        @media (max-width: 568px){
            .blog_image{
            height:fit-content !important;
            width:100% !important;
        }
        }

        .bree{
            font-family: 'Bree Serif', serif;
        }

        .raleway{
            font-family: 'Raleway', sans-serif;
        }

        .bar::after {
            width: 180px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 40px;
            display: block;
            content: "";
            background: #16f4d3;
            height: 2px;
            }
    </style>
</head>
<body>
<?php include 'partials/dbconnect.php';?>
<?php include 'partials/header.php';?>
<?php
    // $sql = "SELECT * FROM `blogs`";
    // $result = mysqli_query($conn, $sql);
    // while($row = mysqli_fetch_assoc($result)){                       
    //     $id = $row['id'];
    //     $Name = $row['content'];

    //     if (!empty($Name)){
    //         echo'
    //         <div class="container">
    //         '.$Name.'
    //         </div>
            
    //         ';
    //     }
    // }
?>

<div>
<?php
    $blog_id = $_GET['id'];
    $sql = "SELECT * FROM `blogs` where `id`='$blog_id'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){                       
        $id = $row['id'];
        $heading = $row['Heading'];
        $blog = $row['content'];
        $name = $row['name'];
        $image = $row['image'];
        $timestamp = $row['timestamp'];
        $datetime = explode(" ",$timestamp);
        $date = $datetime[0];
        $time = $datetime[1];

    echo'
    <div style="padding-top:70px;">
    <div class="container">
        <div style="margin-top:60px;margin-bottom:80px;margin-left: auto;  margin-right: auto;" class="blog_body">
            <div style="border-bottom:solid #80808052 1px;" class="blog_head">
                <div style="padding:40px;" class="container">
                    <h3 class="bree">'.$heading.'</h3>
                    <p class="raleway"><b>Date</b> - '.$date.'</p>
                </div>
            </div>
            <div class="blog">
                <div class="blog_body_div">';
                if (!empty($image)){
                    echo'
                    <div style="padding-top:20px;padding-bottom:20px;">
                        <center>
                        
                            <img class="blog_image" src="blogs/'.$heading.''.$name.'/'.$image.'" alt="">
                                                       
                        
                        </center>
                    </div>
                    ';
                }
                

                        if (!empty($blog)){
                            echo'
                            <div class="container">
                            '.$blog.'
                            </div>
                            
                            ';
                        }
                    echo'
                </div>
            </div>
            <div style="border-top:solid #80808052 1px;" class="blog_footer">
                <div style="padding:40px;">
                <p class="raleway"><b>Blog By</b> - '.$name.'</p>
                </div>
            </div>
        </div>
    </div>
    </div>';

}
?>

<center>
<div style="padding-top:20px;padding-bottom:70px;max-width:900px;text-align: left;">
    <div class="container">
        <div  style="padding:30px;">
        <h3 class="raleway"><b>Comments</b></h3>
        </div>
    </div>
    <div class="container">
    <?php
    $noResult = true;
        $sql = "SELECT * FROM `threads` where `th_blog_id`='$blog_id' "; 
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $noResult = false;
            $thread_id = $row['th_id'];
            $desc = $row['th_desc'];
            $th_by = $row['th_by'];
            $timestamp = $row['timestamp'];  

            $sql2 = "SELECT * FROM `users` WHERE `sno`='$th_by '";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $posted_by_email = $row2['user_email'];  
            $posted_by_username = $row2['user_name'];  

            echo'
            <div class="container">
                <div class="media my-3">
                    <img src="img/user.png" width="54px" class="mr-3" alt="...">
                    <div class="media-body">
                        <p class="font-weight-bold my-0 raleway">'. $posted_by_username .' <br> <i style="color:#80808070;">'. $timestamp . ' <a href="https://pccoeblogspot.herokuapp.com/reply.php?threadid='.$thread_id.'">   Reply</a></i> <br> '. $desc . ' </p> 
                    </div>
                </div>
            </div>
            ';

        }
        if($noResult){
            echo '<div class="jumbotron jumbotron-fluid">
                    <div style="padding-left:20px;padding-right:20px;">
                    <div class="container">
                        <p style="font-size:30px;">No Comments Found</p>
                        <p class="lead"> Be the first person to comment</p>
                    </div>
                    </div>
                 </div> ';
        }?>
    </div>
</div>
</center>
<?php
$showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        //Insert into comment db
        $comment = $_POST['comment']; 
        $thname = $_POST['heading']; 

        $comment = str_replace("<", "&lt;", $comment);
        $comment = str_replace(">", "&gt;", $comment); 
        $comment = str_replace("'", "\\'", $comment);

        $thname = str_replace("<", "&lt;", $thname);
        $thname = str_replace(">", "&gt;", $thname); 
        $thname = str_replace("'", "\\'", $thname);

         
        $sql = "INSERT INTO `threads` (`th_id`, `th_desc`, `th_blog_id`, `th_by`, `timestamp`) VALUES (NULL, '$comment', '$blog_id', '$thname', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        
        $showAlert = true;
        if($showAlert){
            
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Your comment has been added!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                  </div>';
                  ?>
                  <script>window.history.go(-1)</script>                  
                  <?php
                  exit();
        } 
    }
?>



<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    $blog_owner = $_SESSION['sno'];
?>
<div class="container">
       <center>
       <div  style="padding:30px;max-width:900px">
            <h3 class="raleway"><b>Add Comment</b></h3>
        </div>
       </center>
    </div>
<?php
echo'
        <div class="container">            
        <center>
        <div style="max-width:900px;padding-bottom:90px;">
        <form action= "'. $_SERVER['REQUEST_URI'] . '" method="post"> 
                <div class="form-group">
                    <div class="form-group" style="margin-top:0px;margin-bottom:20px;">
                    <input type="hidden" id="heading" name="heading" value="'. $blog_owner. '">
                    </div>
                    <!-- <label for="exampleFormControlTextarea1">Post comment</label> -->
                    <textarea class="form-control" placeholder="Enter Comment" id="comment" name="comment" rows="3" required ></textarea>                    
                </div>
                <center>
                <button style="background:#63C8FF;border-radius:0px;" type="submit" class="btn btn-success">Post Comment</button>
                </center>
        </form> 
        </div>
        </center>
        </div>';
}
else{    
    
    echo'
    <div style="padding-bottom:70px;">
        <div class="container">
            <center><p class="lead">You are not logged in. Please login to  start a Discussion</p></center>          
        </div>
    </div>
    ';
}
?>
</div>
<script type="text/javascript" src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>