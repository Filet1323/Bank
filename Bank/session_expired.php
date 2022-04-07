<?php
    include "header.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
 <link rel="stylesheet" href="session_expired_style.css">
</head>


<body>
    <div class="flex-container">
        <div class="flex-item">
     
     
        </div>
        <div class="flex-item-message">
            <h1 id="session">Sesja wygasła !</h1>
 
           <p id="session">
                     <br>      NIEAKTYWNOŚĆ!!!!  <br> <br>
                     Ze względów bezpieczeństwa, jeśli Twoje konto pozostanie nieaktywne przez ponad 5 minut, nastąpi automatyczne wylogowanie.<br> <br>
                     Zaloguj się ponownie. :)
            </p>
        </div>
  
      <div class="flex-item">
            <a href="home.php" class="button">Wróć</a>
        </div>
    </div>

</body>
</html>
