<?php
    include "validate_admin.php";
    include "header.php";
    include "user_navbar.php";
    include "admin_sidebar.php";
   
 include "session_timeout.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="customer_add_style.css">
</head>

<body>
    <form class="add_customer_form" action="customer_add_action.php" method="post">
 
       <div class="flex-container-form_header">
            <h1 id="form_header">Proszę podać następujące dane . . .</h1>
        </div>

  
      <div class="flex-container">
            <div class=container>
                <label>Imię :</label><br>
              
  <input name="fname" size="30" type="text" required />
            </div>
            <div  class=container>
               
 <label>Nazwisko :</b></label><br>
                <input name="lname" size="30" type="text" required />
            </div>
        </div>

     
   <div class="flex-container">
            <div class=container>
                <label>Płeć :</label>
            </div>
       
     <div class="flex-container-radio">
                <div class="container">
                 
   <input type="radio" name="gender" value="male" id="male-radio" checked>
                  
  <label id="radio-label" for="male-radio"><span class="radio">Mężczyzna</span></label>
                </div>
           
     <div class="container">
                    <input type="radio" name="gender" value="female" id="female-radio">
        
            <label id="radio-label" for="female-radio"><span class="radio">Kobieta</span></label>
                </div>
     
           <div class="container">
                    <input type="radio" name="gender" value="others" id="other-radio">
         
           <label id="radio-label" for="other-radio"><span class="radio">Inne</span></label>
                </div>
            </div>
        </div>

      
  <div class="flex-container">
            <div class=container>
                <label>Data urodzenia :</label><br>
               
 <input name="dob" size="30" type="text" placeholder="yyyy-mm-dd" required />
            </div>
        </div>

        <div class="flex-container">
 
           <div class=container>
                <label>ID :</label><br>
                <input name="aadhar" size="25" type="text" required />
  </div>
 
       </div>

        <div class="flex-container">
            <div class=container>
                <label>Email :</label><br>
       
         <input name="email" size="30" type="text" required />
            </div>
            <div  class=container>
             
   <label>Numer telefonu :</b></label><br>
                <input name="phno" size="30" type="text" required />
            </div>
        </div>

       
 <div class="flex-container">
            <div class=container>
                <label>Adres :</label><br>
              
  <textarea name="address" required /></textarea>
            </div>
        </div>

        <div class="flex-container">
         
   <div class=container>
                <label>Oddział banku :</label>
            </div>
            <div  class=container>
          
      <select name="branch">
                    <option value="Krakow">Kraków</option>
                    <option value="Rzeszow">Rzeszów</option>
      
              <option value="Warszawa">Warszawa</option>
                    <option value="Sanok">Sanok</option>
                 
   <option value="Inne">inne</option>
                </select>
            </div>
        </div>

        <div class="flex-container">
   
         <div class=container>
                <label>Nr konta :</label><br>
                <input name="acno" size="25" type="text" required />
            </div>
  

      </div>

        <div class="flex-container">
            <div class=container>
                <label>Kwota :</label><br>
           
     <input name="o_balance" size="20" type="text" required />
            </div>
            <div  class=container>
     <label>PIN(4 Cyfry) :</b></label><br>
        
        <input name="pin" size="15" type="password" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
 
               <label>Nazwa użytkownika :</label><br>
                <input name="cus_uname" size="30" type="text" required />
            </div>
       
     <div  class=container>
                <label>Hasło :</b></label><br>
                <input name="cus_pwd"  type="password" required />
  </div>
  </div>

 
       <div class="flex-container">
            <div class="container">
                <button type="submit">Wyślij</button>
            </div>

          
  <div class="container">
                <button type="reset" class="reset" onclick="return confirmReset();">Reset</button>
            </div>
    </div>

    </form>

 
   <script>
    function confirmReset() {
        return confirm('Czy na pewno chcesz zresetować?')
    }
    </script>

</body>
</html>
