<?php
    include "header.php";

  
  if (isset($_GET['loginFailed'])) {
        $message = "Proszę spróbuj ponownie.";
    
    echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>

<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="admin_login_style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body>
  
  <form action="admin_login_action.php" method="post">
        <div class="flex-container-1">
          
  <div class="flex-item">
                <h2>Administrator Login</h2>
     
       </div>

            <label><b>Nazwa użytkownika</b></label>
            <div class="flex-item">
                <input type="text" name="admin_uname" required>
   
         </div>

            <label><b>Hasło</b></label>
            <div class="flex-item">
                <input type="password" name="admin_psw" required>
  
          </div>
        </div>

        <div class="flex-container-2">
            <div class="flex-item">
                <button type="submit">Zaloguj</button>
   
         </div>

            <div class="flex-item">
                <button>
                <a href="home.php" type="button">Wróć</a>
</button>
            </div>
   
     </div>
    </form>


</body>

</html>
