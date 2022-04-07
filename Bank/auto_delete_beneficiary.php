<?php

 if(!isset($_SESSION)) {
        session_start();
    }

    include "validate_customer.php";
   
 include "connect.php";
    include "header.php";
    include "customer_navbar.php";
   
 include "customer_sidebar.php";
    include "session_timeout.php";

   
 $_SESSION['auto_delete_benef'] = false;
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="action_style.css">
</head>

<body>
    <div class="flex-container">
        <div class="flex-item">
         
   <p id="info" style="font-size:36px;">
                <b>Co najmniej jeden z Twoich beneficjentów został usunięty ! :(</b><br>
            </p>
        </div>

   
     <div class="flex-item">
            <p id="info" style="margin-top:-40px;">
        
<br><br>
                Proszę ponownie dodać dane beneficjenta. :)
            </p>
        </div>
        <?php $conn->close(); ?>

 
       <div class="flex-item">
            <a href="beneficiary.php" class="button">Przejdź do przelewu środków</a>
        </div>

 
   </div>

</body>
</html>
