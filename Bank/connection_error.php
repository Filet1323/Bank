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
            <img id="session" src="/images/error.png">
        </div>
      
  <div class="flex-item-message">
            <h1 id="session-sub">Błąd !</h1>
    
        <p id="session-sub">
        Wystąpił błąd podczas łączenia się z bazą danych !<br>
            </p>
          
  <p id="session">
                <b>Wiadomość: </b>
           
     <?php
                    if (isset($_GET['error'])) {
                        echo $_GET['error'];
          
          }
                ?>
            </p>
        </div>
        <div class="flex-item">
      
      <a href="home.php" class="button">START</a>
  
      </div>
    </div>

</body>
</html>
