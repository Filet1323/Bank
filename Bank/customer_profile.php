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

    $id = $_SESSION['loggedIn_cust_id'];

    $sql0 = "SELECT * FROM customer WHERE cust_id=".$id;
   
 $sql1 = "SELECT * FROM passbook".$id." WHERE trans_id=(
                    SELECT MAX(trans_id) FROM passbook".$id.")";

  
  $result0 = $conn->query($sql0);
    $result1 = $conn->query($sql1);

    if ($result0->num_rows > 0) {
        

        while($row = $result0->fetch_assoc()) {
            $fname = $row["first_name"];
      
      $lname = $row["last_name"];
            $gender = $row["gender"];
            $dob = $row["dob"];
           
 $aadhar = $row["aadhar_no"];
            $email = $row["email"];
            $phno = $row["phone_no"];
         
   $address = $row["address"];
            $branch = $row["branch"];
            $acno = $row["account_no"];
    
        $pin = $row["pin"];
            $cus_uname = $row["uname"];
            $cus_pwd = $row["pwd"];
      
  }
    }

    if ($result1->num_rows > 0) {

        while($row = $result1->fetch_assoc()) {
  
          $balance = $row["balance"];
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
   <link rel="stylesheet" href="customer_add_style.css">
</head>

<body>
    <form class="add_customer_form" action="customer_profile_action.php" method="post">
       
 <div class="flex-container-form_header">
            <h1 id="form_header">Szczegóły Twojego konta. . .</h1>
        </div>

        <div class="flex-container">
        
    <div class=container>
                <label>Imię : <label id="info_label"><?php echo $fname ?></label></label>
            </div>
           
 <div class=container>
                <label>Nazwisko : <label id="info_label"><?php echo $lname ?></label></label>
            </div>
        </div>

  
      <div class="flex-container">
            <div class=container>
                <label>Numer konta : <label id="info_label">
<?php echo $acno ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
           
     <label>Bilans : <label id="info_label"><?php echo number_format($balance) ?></label></label>
            </div>
        </div>

       
 <div class="flex-container">
            <div class=container>
                <label>Płeć :
                    <label id="info_label">
     
               <?php
                        if ($gender == "male") {echo "Mężczyzna";}
                        elseif ($gender == "female") {echo "Kobieta";}
    
                    else {echo "Others";}
                    ?>
                    <label>
                </label>
            </div>
        </div>

 
       <div class="flex-container">
            <div class=container>
                <label>Data urodzenia : <label id="info_label"><?php echo $dob ?></label></label>
 
           </div>
        </div>

        <div class="flex-container">
            <div class=container>
             
   <label>ID : <label id="info_label"><?php echo $aadhar ?></label></label>
            </div>
        </div>

   
     <div class="flex-container">
            <div class=container>
                <label>Email :</label><br>
          
      <input name="email" size="30" type="text" value="<?php echo $email ?>" required />
            </div>
           
 <div class=container>
                <label>Nazwa użytkownika :</label><br>
              
  <input name="cus_uname" size="30" type="text" value="<?php echo $cus_uname ?>" required />
            </div>
        </div>

  
      <div class="flex-container">
            <div  class=container>
                <label>Telefon : <label id="info_label">
<?php echo $phno ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                
<label>Adres :</label><br>
                <textarea name="address" required /><?php echo $address ?></textarea>
            </div>
        </div>

        
<div class="flex-container">
            <div class=container>
                <label>Bank :
                    <label id="info_label">
           
             <?php
                            if ($branch == "Krakow") {echo "Kraków";}
                            elseif ($branch == "Rzeszów")
 {echo "Rzeszow";}
                            elseif ($branch == "CHIRADURGA") {echo "Warszawa";}
                            elseif ($branch == "Sanok") 
{echo "Sanok";}
                            elseif ($branch == "Inne") {echo "Inne";}
                        ?>
                    </label>
              
  </label>
            </div>
        </div>

        <div class="flex-container">
            <div class="container">
            
    <a href="customer_home.php" class="button">Wróć</a>
            </div>
            <div class="container">
              
  <button type="submit">Aktualizuj</button>
            </div>
            <div class="container">
          
      <a href="pass_change.php" class="password-button">Zmień hasło/PIN</a>
            </div>
      
  </div>

    </form>

</body>
</html>
