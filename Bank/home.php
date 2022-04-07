<?php
    include "header.php";
    include "navbar.php";

    if (isset($_GET['loginFailed'])) {
     
   $message = "Proszę spróbuj ponownie.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
 <link rel="stylesheet" href="home_style.css">
</head>

<body>
 
    <div class="flex-container-background">
        <div class="flex-container">
      
      <div class="flex-item-0">
                <h1 id="form_header">LOGOWANIE</h1>
           
 </div>
        </div>

        <div class="flex-container">
            <div class="flex-item-1">
            
    <form action="customer_login_action.php" method="post">
                
    <div class="flex-item-login">
                        <h2>Witamy</h2>
     
               </div>

                    <div class="flex-item">
                       
 <input type="text" name="cust_uname" placeholder="Wpisz nazwę użytkownika" required>
                 
   </div>

                    <div class="flex-item">
                    
    <input type="password" name="cust_psw" placeholder="Wpisz hasło" required>
      
              </div>

                    <div class="flex-item">
                       
 <button type="submit">Zaloguj</button>
                    </div>
                </form>
            </div>
 
       </div>

    </div>

</body>
</html>

<?php include "easter_egg.php"; ?>
