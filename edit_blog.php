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
    <title>EDIT BLOG | PCCOE BLOGSPOT</title>
    <link rel="icon" href="img/pccoe.png">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Archivo:wght@300&family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <!-- include summernote-ko-KR -->
    <script src="lang/summernote-ko-KR.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre&family=Abril+Fatface&family=Quantico:ital@1&family=Raleway:wght@200&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <style>

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


        label[for="Picture"]
        {
            display:none;
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
        

        
        
    
        .note-insert.btn-group>.btn:not(:first-child):not(:last-child):not(.dropdown-toggle) {
            display:none;
        }

        .note-insert.btn-group>.btn:last-child:not(:first-child) {
            display:none;
        }
    
    label{
        font-family:'Raleway';
        font-weight:bold;
    }
    .alert {
  padding: 20px;
  background-color: #f44336; /* Red */
  color: white;
  margin-bottom: 15px;
}

.alert-success{
    padding: 20px;
    background-color: #00ba76eb; /* Red */
    color: white;
    margin-bottom: 15px;
    opacity: 1;
  transition: opacity 0.6s; /* 600ms to fade out */
}
/* The close button */
.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

/* When moving the mouse over the close button */
.closebtn:hover {
  color: black;
}

.alert {
  opacity: 1;
  transition: opacity 0.6s; /* 600ms to fade out */
}
    </style>
</head>
<body>
<?php include 'partials/dbconnect.php';?>
<?php
    $blog_id = $_GET['id'];    
    if (isset($_POST['submit'])) {
        $method = $_SERVER['REQUEST_METHOD'];
        if($method=='POST'){
            
            if($_FILES['image1']['size'] == 0){
                $blog = $_POST['blog'];
                $name = $_POST['name'];
                

                $blog = str_replace("'", "\\'", $blog);

                
                $name = str_replace("<", "&lt;", $name);
                $name = str_replace(">", "&gt;", $name); 
                $name = str_replace("'", "\\'", $name);

                

                

                $sql1 =  "UPDATE `blogs` SET `name` = '$name' , `content`= '$blog' WHERE `blogs`.`id` = $blog_id;";
                $result = mysqli_query($conn, $sql1);

                if($result){           
                    echo'
                    <div class="alert-success alert" role="alert">
                        ';?><span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <strong>Congrats!</strong> Field updated successfully !  <?php echo'                      
                    </div>
                    ';
                    
                } else {
                    echo '
                    <div class="alert " role="alert">
                        ';?><span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <strong>Nope!</strong> Some problem occured try again or contact us!
                    <?php echo'</div>
                    ' ;
                }
                
            }
            else{

                // Get image name
                $ch_image1 = $_FILES['image1']['name'];         
                

                $file_ext1 = explode('.',$ch_image1);
                $file_ext_check1 = strtolower(end($file_ext1));
                $valid_file_ext = array('png','jpg','jpeg');


                if(in_array($file_ext_check1, $valid_file_ext)){

                    // Insert into thread db
                    $blog = $_POST['blog'];
                    $heading = $_POST['heading'];
                    $name = $_POST['name'];
                    

                    
                    $blog = str_replace("'", "\\'", $blog);

                    $ch_image1 = str_replace("<", "&lt;", $ch_image1);
                    $ch_image1 = str_replace(">", "&gt;", $ch_image1); 
                    $ch_image1 = str_replace("'", "\\'", $ch_image1);

                    $heading = str_replace("<", "&lt;", $heading);
                    $heading = str_replace(">", "&gt;", $heading); 
                    $heading = str_replace("'", "\\'", $heading);                    

                    $name = str_replace("<", "&lt;", $name);
                    $name = str_replace(">", "&gt;", $name); 
                    $name = str_replace("'", "\\'", $name);

                    $target1 = "blogs/$heading$name/".basename($ch_image1);   
                    

                    $target1 = str_replace("<", "&lt;", $target1);
                    $target1 = str_replace(">", "&gt;", $target1); 
                    $target1 = str_replace("'", "\\'", $target1);

                    if(!is_dir("blogs/$heading$name")){
                        mkdir("blogs/$heading$name",0777,true);               
                    }

                    

                    

                    // $sql1 =  "INSERT INTO `blogs` (`id`, `Heading`, `name`, `image`, `content`, `timestamp`) VALUES (NULL, '$heading', '$name', '$ch_image1', '$blog', current_timestamp());";
                    $sql1 = "UPDATE `blogs` SET `name` = '$name' , `image`= '$ch_image1', `content`= '$blog' WHERE `blogs`.`id` = $blog_id;";
                    $result = mysqli_query($conn, $sql1);

                    if ((move_uploaded_file($_FILES['image1']['tmp_name'], $target1)) and ($result)) {                    
                        $msg = "Your Blog has been updated successfully!";
                        $showAlert = true;
                        if($showAlert){
                            echo '<div class="alert-success alert ">';?>
                                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                                        <strong>Success!<?php echo$msg;?></strong>                                         
                            <?php echo' </div>';
                        } 
                    }else{
                        $msg = "Error in uploading";                
                        $showAlert = true;
                        if($showAlert){
                            ?><div class="alert " role="alert">
                                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                                <strong><?php echo$msg;?></strong> 
                                        
                                </div><?php
                        } 
                    }
                }
                else{
                    $msg = "Extension is not equal to jpg jpeg or png";
                    $showAlert = true;
                        if($showAlert){
                            ?><div class="alert ">
                                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                                        <strong><?php echo$msg;?></strong> 
                                        
                                </div><?php
                        }                
            
                }               

            }
        }
    }

?>

    <div>
       <div class="container">
           <div style="padding:50px;">
               <center>
               <h1 class="bar" style="font-family: 'Orbitron', sans-serif;">Edit Your BLOG</h1>
               </center>
           </div>
       </div>
       <?php
    $sql = "SELECT * FROM `blogs` where `id` = $blog_id";
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
        <div class="container">   
            <div class="container">
            <form method="post" action=" '.$_SERVER["REQUEST_URI"].'" enctype="multipart/form-data">                
                <div class="form-group" style="margin-top:0px;margin-bottom:20px;">
                    <label for="exampleInputEmail1"><b>Blog Heading</b><span style="color:red;font-size:18px;">*</span></label>
                    <input type="text" class="form-control"  value="'.$heading.'" disabled>
                    <input type="hidden" class="form-control" id="heading" value="'.$heading.'" name="heading" >
                </div>
                <div class="form-group" style="margin-top:0px;margin-bottom:20px;">
                    <label for="exampleInputEmail1"><b>Your Name</b><span style="color:red;font-size:18px;">*</span></label>
                    <input type="text" class="form-control" id="name" value="'.$name.'" name="name" disabled >
                    <input type="hidden" class="form-control" id="name" value="'.$name.'" name="name"  >
                </div>
                

                <div class="mb-3" style="margin-top:0px;margin-bottom:40px;">
                    <label for="formFileMultiple" class="form-label">Upload Image here </label>
                    <input class="form-control" name="image1" value="'.$image.'" type="file" id="formFileMultiple1" >
                    <small id="emailHelp" class="form-text text-muted">Image should be .jpg or .png format only! </small>
                </div>

                
                <div class="mb-3">
                    <textarea id="summernote" name="blog" ">'.$blog.'</textarea>
                </div>
                <div style="margin-bottom:70px;margin-top:40px;">
                    <center>
                    <button style="background:#63C8FF;" class="exp-btn btn--voi" type="submit" name="submit" >Edit</button>
                    </center>
                </div>                
            </form>
            </div>
        </div>
    </div>';
}
?>
   
    <script>
        
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true     
            });
        });
    </script>
    <script>
// Get all elements with class="closebtn"
var close = document.getElementsByClassName("closebtn");
var i;

// Loop through all close buttons
for (i = 0; i < close.length; i++) {
  // When someone clicks on a close button
  close[i].onclick = function(){

    // Get the parent of <span class="closebtn"> (<div class="alert">)
    var div = this.parentElement;

    // Set the opacity of div to 0 (transparent)
    div.style.opacity = "0";

    // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>

</body>
</html>
<?php
}
else{
    include 'notregister.php';
}
?>