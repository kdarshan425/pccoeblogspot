/* Open */
function openNav() {
    document.getElementById("myNav").style.height = "100%";
  }
  
  /* Close */
  function closeNav() {
    document.getElementById("myNav").style.left = "100%";
    document.getElementById("myNav1").style.left = "-100%";
  }
 
  
  function myFunction() {
   var x = document.getElementById("myTopnav");
   if (x.className === "topnav") {
     x.className += " responsive";
   } else {
     x.className = "topnav";
   }
 }
     // Toggle between showing and hiding the sidebar when clicking the menu icon
 var mySidebar = document.getElementById("mySidebar");
 
 function dk_open() {
   if (mySidebar.style.display === 'block') {
     mySidebar.style.display = 'none';
   } else {
     mySidebar.style.display = 'block';
   }
 }
 
 // Close the sidebar with the close button
 function dk_close() {
     mySidebar.style.display = "none";
 }
 
 //sticky navbar
 // When the user scrolls the page, execute myFunction
 window.onscroll = function() {myFunction()};
 
 // Get the navbar
 var navbar = document.getElementById("myTopnav");
 
 // Get the offset position of the navbar
 var sticky = navbar.offsetTop;
 
 // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
 function myFunction() {
   if (window.pageYOffset >= sticky) {
     navbar.classList.add("sticky")
   } else {
     navbar.classList.remove("sticky");
   }
 }
 
 var dropdown = document.getElementsByClassName("dropdown-btn-dk");
 var i;
 
 for (i = 0; i < dropdown.length; i++) {
   dropdown[i].addEventListener("click", function() {
   this.classList.toggle("active");
   var dropdownContent4 = this.nextElementSibling;
   if (dropdownContent4.style.display === "block") {
   dropdownContent4.style.display = "none";
   } else {
   dropdownContent4.style.display = "block";
   }
   });
 }
 
     //sidebar drop down
     var dropdown = document.getElementsByClassName("dropdown-btn");
     var i;
 
     for (i = 0; i < dropdown.length; i++) {
     dropdown[i].addEventListener("click", function() {
     this.classList.toggle("active");
     var dropdownContent = this.nextElementSibling;
     if (dropdownContent.style.display === "block") {
     dropdownContent.style.display = "none";
     } else {
     dropdownContent.style.display = "block";
     }
     });
     }
 
     
 