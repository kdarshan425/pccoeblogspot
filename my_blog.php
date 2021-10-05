<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY BLOG | PCCOE BLOGSPOT</title>
    <link rel="icon" href="img/pccoe.png">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Raleway:wght@200&display=swap" rel="stylesheet">
    <style>
        .regimg{
            width:500px;
            height:auto;
        }
        @media (max-width: 568px){
            .regimg{
            width:100%;
            height:auto;
        }
        }

        .nb{
            width:400px;
            height:auto;
        }
        @media (max-width: 568px){
            .nb{
            width:90%;
            height:auto;
        }
        }
        .exp-btn{
            position: relative;
            border: 2px solid;
            border-radius: 0px;
            padding: 1rem 1rem;
            font-size: 1rem;
            font-weight: 500;
            letter-spacing: 0.25px;
            line-height: 1.5rem;
            cursor: pointer;
            overflow: hidden;
            transition: all .3s, outline 0s;
            transition: all .3s, outline 0s;
            width: 150px;
            font-family: 'Orbitron', sans-serif;
        }
        
        .exp-btn.btn--voi{
            background-color:#6c63ff;
            color:white;
        }
    
    .blog-info {
        background: #fff;
        padding: 30px;
        margin-top: 1em;
        position: relative;
        
        box-shadow: 0 3px 5px -1px rgb(0 0 0 / 8%), 0 5px 8px 0 rgb(0 0 0 / 12%), 0 1px 14px 0 rgb(0 0 0 / 6%);
    }
    
    
    
    .blog-info a{
        font-family: 'Raleway', sans-serif;
        font-weight:bold;
        color:black;
        text-decoration:none;
    }
    
    .blog-info a:hover{
        font-family: 'Raleway', sans-serif;
        color:black;
        text-decoration:none;
    }
    
    .exp-btn{
        position: relative;
        border: 2px solid;
        border-radius: 0px;
        padding: 1rem 1rem;
        font-size: 1rem;
        font-weight: 500;
        letter-spacing: 0.25px;
        line-height: 1.5rem;
        cursor: pointer;
        overflow: hidden;
        transition: all .3s, outline 0s;
        transition: all .3s, outline 0s;
        width: 150px;
        font-family: 'Orbitron', sans-serif;
    }
    
    .exp-btn.btn--voi{
        background-color:#6c63ff;
        color:white;
    }
    
    .raleway{
                font-family: 'Raleway', sans-serif;
                font-weight:bold;
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
    <div style="background:url('img/bg1.jpg') repeat;background-size:cover;">
        <div style="width:100%;height:100%;background:rgba(0,0,0,0.3)">
            <div style="padding-top:70px;">
                <div class="container ch-head" style="text-align: center;">
                    <div style="padding:100px 0px 100px 0px;">
                        <h2 style="font-family: 'Orbitron', sans-serif;color:white;">My BLOGS</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-4" style="padding-bottom:100px;">
        <div class="row ">

        <?php
            $blog_owner = $_SESSION['sno'];
            $sql = "SELECT * FROM `blogs` WHERE `blog_owner`= '$blog_owner' ORDER BY `timestamp` DESC;";
            $result = mysqli_query($conn, $sql);
            $noResult = true;
            while($row = mysqli_fetch_assoc($result)){  
                $noResult = false;                     
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
                <div class="col-md-6 col-lg-4">
                    <div class="blog-info">';?>
                    <a href="https://pccoeblogspot.herokuapp.com/delete_blog.php?id=<?php echo$id?>" onclick="return confirm('Are you sure to delete?')"><img src="img/delete.png" style="height:30px;width:30px;right:60px;top:10px;border-radius:40%;position:absolute;z-index:5;" alt=""></a>
                    <?php echo'
                    <a href="https://pccoeblogspot.herokuapp.com/edit_blog.php?id='.$id.'"><img src="img/edit.png" style="height:30px;width:30px;right:20px;top:10px;border-radius:40%;position:absolute;z-index:5;" alt=""></a>
                    <a href="https://pccoeblogspot.herokuapp.com/display.php?id='.$id.'">
                    <div>
                        <h4 class="raleway">'.$heading.'</h4>
                        <p style="color:gray;" class="mt-2 raleway"><B>Blog by - </b>'.$name.'</p>                        
                    </div>
                    </a>                    
					</div>
                </div>

                
			
                ';
                
            }

            
            
            if($noResult){
                echo '
                <div style="width:100%;">
                    <div>
                    <div style="padding-top:30px;">
                        <center>
                            <img class="nb" src="img/noblog.svg" alt="">
                        </center>
                    </div>
                    </div>
                    <div style="padding-top:40px;">
                        <center>
                            <h3 style="font-family: "Bree Serif", serif;">You have not created any blog, create your first</h3>
                        </center>
                    </div>
                    <center>
                        <a style="color:#63C8FF" href="https://pccoeblogspot.herokuapp.com/create_blog.php"><p>Write a Blog</p></a>
                    </center>
                </div>
                      ';
            }
            
         ?>
        
        
         </div>
    </div>  

<script type="text/javascript" src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
<?php
}
else{
    include 'notregister.php';
}
?>