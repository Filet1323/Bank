<?php

    if(!isset($_SESSION)) 
{
        session_start();
    }

    include "validate_admin.php";
    include "connect.php";
    include "header.php";
   
 include "user_navbar.php";
    include "admin_sidebar.php";
    include "session_timeout.php";

    if (isset($_GET['cust_id'])) {
   
     $_SESSION['cust_id'] = $_GET['cust_id'];
    }

    $sql0 = "SELECT * FROM customer WHERE cust_id=".$_SESSION['cust_id'];
   
 $sql1 = "SELECT * FROM passbook".$_SESSION['cust_id']." WHERE trans_id=(
                    SELECT MAX(trans_id) FROM passbook".$_SESSION['cust_id'].")";

  
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
    <form class="add_customer_form" action="edit_customer_action.php" method="post">
    
    <div class="flex-container-form_header">
            <h1 id="form_header">Edytuj/Zobacz szczegóły. . .</h1>
        </div>

     
   <div class="flex-container">
            <div class=container>
                <label>ID Klienta : <label id="info_label"> 
<?php echo $_SESSION['cust_id'] ?> </label></label>
            </div>
        </div>

        <div class="flex-container">
          
  <div class=container>
                <label>Imię :</label><br>
                <input name="fname" size="30"
 type="text" value="<?php echo $fname ?>" required />
            </div>
            <div  class=container>
               
 <label>Nazwisko :</b></label><br>
                <input name="lname" size="30" type="text" value="<?php echo $lname ?>" required />
     
       </div>
        </div>

        <div class="flex-container">
            <div class=container>
               
 <label>Balans : <label id="info_label"> <?php echo number_format($balance) ?> </label></label>
       
     </div>
        </div>

        <div class="flex-container">
            <div class=container>
          
      <label>Płeć :
                    <label id="info_label">
                  
  <?php
                        if ($gender == "male") {echo "Male";}
                  
      elseif ($gender == "female") {echo "Female";}
                        else {echo "Others";}
        
            ?>
                    <label>
                </label>
            </div>
        </div>

      
  <div class="flex-container">
            <div class=container>
                <label>Data urodzenia :</label><br>
          
      <input name="dob" size="30" type="text" placeholder="yyyy-mm-dd" value="<?php echo $dob ?>" required />
            </div>
     
   </div>

        <div class="flex-container">
            <div class=container>
                <label>Własne ID :</label><br>
            
    <input name="aadhar" size="25" type="text" value="<?php echo $aadhar ?>" required />
            </div>
        </div>

     
   <div class="flex-container">
            <div class=container>
                <label>Email :</label><br>
           
     <input name="email" size="30" type="text" value="<?php echo $email ?>" required />
            </div>
            <div  class=container>
     
           <label>Numer telefonu :</b></label><br>
                <input name="phno" size="30" type="text" value="<?php echo $phno ?>" required />
       
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
                <label>Oddział banku :</label>
            </div>
            <div  class=container>
          
      <select name="branch">
                    <option value="Krakow" <?php if ($branch == 'Krakow') {?> selected="selected" <?php }?>>Kraków</option>
  
                  <option value="Rzeszow" <?php if ($branch == 'Rzeszow') {?> selected="selected" <?php }?>>Rzeszów</option>
                 
   <option value="Warszawa" <?php if ($branch == 'Warszawa') {?> selected="selected" <?php }?>>Warszawa</option>
                  
  <option value="Sanok" <?php if ($branch == 'Sanok') {?> selected="selected" <?php }?>>Sanok</option>
                   
 <option value="Inne" <?php if ($branch == 'Inne') {?> selected="selected" <?php }?>>Inny</option>
                </select>
    
        </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Numer konta :</label><br>
 
               <input name="acno" size="25" type="text" value="<?php echo $acno ?>" required />
            </div>
        </div>

     
   <div class="flex-container">
            <div  class=container>
                <label>PIN(4 Cyfry) :</b></label><br>
             
   <input name="pin" size="15" type="text" value="<?php echo $pin ?>" required />
 
   
        </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Nazwa użytkownika :</label><br>
           
   
  <input name="cus_uname" size="30" type="text" value="<?php echo $cus_uname ?>" required />
            </div>
            <div  class=container>
             
   <label>Hasło :</b></label><br>
                <input name="cus_pwd" size="30" type="text" value="<?php echo $cus_pwd ?>" required />
            </div>
  
      </div>

        <div class="flex-container">
            <div class="container">
                <a href="manage_customers.php" class="button">Wróć</a>
    
        </div>
            <div class="container">
                <button type="submit">Aktualizuj</button>
            </div>
        </div>

    </form>

</body>
</html>

