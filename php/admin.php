<?php
 include ("get_from_database.php"); //path
 include ("base.php") ; //path

?>
 <html>
   <head>
    //κανουμε τα references των css.
   </head>
   
   <body>
    <div id = "number_1">
      <button id = "addtobase" class = "buttons" >proionta</button>  //add style to the button
        
       <script>     
        document.getElementById("addtobase").onclick = function() {
        location.href = "base.php"; //path
        }; 
       </script>  //ελεγχος αν λειτουργει σωστα , αν ναι παμε στο base.php και συνεχιζουμε την διαδικασια και για τα υπολοιπα. 
    </div>





   </body>


</html>