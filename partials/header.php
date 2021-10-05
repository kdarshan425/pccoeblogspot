<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
?>
<nav style="background: black">       
        <div style="background-color: white;height:70px;font-size: 30px;padding: 5px;" class="topnav" id="myTopnav">
            <a href="index.php" style="padding: 10px 16px;float:left;font-weight: 900;font-family: 'Raleway', sans-serif;">
                <img style="width:60px;height:auto;" src="img/pccoe.png"> 
            </a>
            <a style="height: 60px;"></a>                                 
            <a  href="admin/logout.php">Logout</a>   
            <a  href="my_blog.php">My Blog</a>           
                         
            <a href="javascript:void(0);" style="padding:22px;" class="icon"  onclick="dk_open()">
            <div class="hamburger-menu">
                <div class="line line1"></div>
                <div class="line line2"></div>
                <div class="line line3"></div>
            </div> 
            </a>
        
        </div>
    </nav>
    <!-- Sidebar on small screens when clicking the menu icon -->
    <nav class="sidebar animate-left" style="display:none" id="mySidebar">
        <a href="javascript:void(0)" onclick="dk_close()" style="padding-top: 30px;font-size: 20px;">Close x</a>
        <a  href="index.php" onclick="dk_close()">Home</a>      
        <a  href="admin/logout.php" onclick="dk_close()">Logout</a>   
        <a  href="my_blog.php" onclick="dk_close()">My Blog</a>   
        
       
    </nav>
    <?php 
} 
else{
    ?>
    <nav style="background: black">       
        <div style="background-color: white;height:70px;font-size: 30px;padding: 5px;" class="topnav" id="myTopnav">
            <a href="index.php" style="padding: 10px 16px;float:left;font-weight: 900;font-family: 'Raleway', sans-serif;">
                <img style="width:60px;height:auto;" src="img/pccoe.png"> 
            </a>
            <a style="height: 60px;"></a>                                 
            <a href="admin/login.php">Signin</a>   
            <a href="admin/signup.php">Signup</a>          
                      
            <a href="javascript:void(0);" style="padding:22px;" class="icon"  onclick="dk_open()">
            <div class="hamburger-menu">
                <div class="line line1"></div>
                <div class="line line2"></div>
                <div class="line line3"></div>
            </div> 
            </a>
        
        </div>
    </nav>
    <!-- Sidebar on small screens when clicking the menu icon -->
    <nav class="sidebar animate-left" style="display:none" id="mySidebar">
        <a href="javascript:void(0)" onclick="dk_close()" style="padding-top: 30px;font-size: 20px;">Close x</a>
        <a  href="index.php" onclick="dk_close()">Home</a>      
        <a href="admin/login.php" onclick="dk_close()">Signin</a>   
        <a href="admin/signup.php" onclick="dk_close()">Signup</a>    
       
    </nav>
<?php
}
?>