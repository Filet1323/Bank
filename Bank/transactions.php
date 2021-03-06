<?php

    if(!isset($_SESSION)) {
      
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

 
   $sql0 = "SELECT * FROM passbook".$_SESSION['cust_id'];


    if (isset($_GET['sort'])) {
        $sort = $_GET['sort'];
    }

 

    if (isset($_POST['search_term'])) {
        $_SESSION['search_term'] = $_POST['search_term'];
  
  }
    if (isset($_POST['date_from'])) {
        $_SESSION['date_from'] = $_POST['date_from'];
    }
    if (isset($_POST['date_to'])) {
      
  $_SESSION['date_to'] = $_POST['date_to'];
    }

    $filter_indicator = "Nic";


    if (!empty($_SESSION['search_term'])) {
       
 $sql0 .= " WHERE remarks COLLATE latin1_GENERAL_CI LIKE '%".$_SESSION['search_term']."%'";
        $filter_indicator = "Uwagi";


        if (!empty($_SESSION['date_from']) && empty($_SESSION['date_to'])) {
            $sql0 .= " AND trans_date > '".$_SESSION['date_from']." 00:00:00'";
  
          $filter_indicator = "Uwagi i data od";
        }
        if (empty($_SESSION['date_from']) && !empty($_SESSION['date_to'])) 
{
            $sql0 .= " AND trans_date < '".$_SESSION['date_to']." 23:59:59'";
            $filter_indicator = "Uwagi i data do";
        }
        
if (!empty($_SESSION['date_from']) && !empty($_SESSION['date_to'])) {
            $sql0 .=  " AND trans_date BETWEEN '".$_SESSION['date_from']." 00:00:00' AND 
'".$_SESSION['date_to']." 23:59:59'";
            $filter_indicator = "Uwagi, Uwagi i data do";
        }
    }

    if (empty($_SESSION['search_term'])) {
        if (!empty($_SESSION['date_from']) && empty($_SESSION['date_to']))
 {
            $sql0 .= " WHERE trans_date > '".$_SESSION['date_from']." 00:00:00'";
            $filter_indicator = "Data od";
        }
        
if (empty($_SESSION['date_from']) && !empty($_SESSION['date_to'])) {
            $sql0 .= " WHERE trans_date < '".$_SESSION['date_to']." 23:59:59'";
        
    $filter_indicator = "Data do";
        }
        if (!empty($_SESSION['date_from']) && !empty($_SESSION['date_to'])) {
         
   $sql0 .=  " WHERE trans_date BETWEEN '".$_SESSION['date_from']." 00:00:00' AND '".$_SESSION['date_to']." 23:59:59'";
        
    $filter_indicator = "Data od & Data do";
        }
    }


    
if (isset($_GET['sort'])) {
        if ($sort == 'tid_down') {
            $sql0 .= " ORDER BY trans_id ASC";
        }
        if ($sort == 'tid_up') {
 
           $sql0 .= " ORDER BY trans_id DESC";
        }
        if ($sort == 'date_down') {
            $sql0 .= " ORDER BY trans_date ASC";
        }
      
  if ($sort == 'date_up') {
            $sql0 .= " ORDER BY trans_date DESC";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
   
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="transactions_style.css">
</head>

<body>
    
<div class="search-bar-wrapper">
        <div class="search-bar" id="the-search-bar">
            <div class="flex-item-search-bar" id="fi-search-bar">
         
       <button id="search" onclick="document.getElementById('id01').style.display='block'">Filtr</button>

                <div class="flex-item-by">
                    <label id="sort">Sortuj wed??ug :</label>
                </div>

                <div class="flex-item-search-by">
                    <select name="by" onChange="window.location.href=this.value">
                        <option selected disabled hidden>
                            <?php if (empty($_GET['sort'])) {?>Tn. ID &darr;<?php } else { ?>
                                <?php if ($sort == 'tid_down') {?>Tn. ID &darr;<?php } ?>
                                <?php if ($sort == 'tid_up') {?>Tn. ID &uarr;<?php } ?>
                                <?php if ($sort == 'date_down') {?>Date &darr;<?php } ?>
                                <?php if ($sort == 'date_up') {?>Date &uarr;<?php } ?>
                            <?php } ?>
                        </option>
                        <option value="transactions.php?sort=tid_down">ID &darr;</option>
                        <option value="transactions.php?sort=tid_up">ID &uarr;</option>
                       
 <option value="transactions.php?sort=date_down">Data &darr;</option>
                       
 <option value="transactions.php?sort=date_up">Data &uarr;</option>
                    </select>
                </div>

            </div>
        </div>
 
   </div>

    <div id="id01" class="modal">

      <form class="modal-content animate" action="" method="post">
        <div class="imgcontainer">
     
     <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Filter">&times;</span>
        </div>

 
       <div class="container">
            <h1 id="filter">Filtr</h1>
            <p id="filter">Wy????czenie okienka resetuje filtr</p>
     
     <label>Uwagi :</label>
          <input type="text" placeholder="Wpisz uwagi" name="search_term">

         
 <label>Czas trwania (yyyy-mm-dd) :</label>
          <div class="duration-container">
              <div class="date-container">
     
             <input id="date" type="text" placeholder="Z" name="date_from">
              </div>
              <p id="minus">&minus;<b</p>
       
       <div class="date-container">
                  <input id="date" type="text" placeholder="Do" name="date_to">
              </div>
        
  </div>


          <button id="submit" type="submit">Szukaj</button>
        </div>

      </form>
    </div>

    <div class="flex-container">
      
  <p id="none">Filtr : <?php echo $filter_indicator ?></p>
    </div>

    <div class="flex-container">

        <?php
           
 $result = $conn->query($sql0);

            if ($result->num_rows > 1) {?>
                <table id="transactions">
                
    <tr>
                        <th>ID</th>
                        <th>Data i czas</th>
                        <th>Uwagi</th>
  
                      <th>Debet</th>
                        <th>Kredyt</th>
                        <th>Balans</th>
         
           </tr>
        <?php

            while($row = $result->fetch_assoc()) {?>
                   
 <tr>
                        <td><?php echo $row["trans_id"]; ?></td>
                        <td>
                          
  <?php
                                $time = strtotime($row["trans_date"]);
                                
$sanitized_time = date("d/m/Y, g:i A", $time);
                                echo $sanitized_time;
                            
 ?>
                        </td>
                        <td><?php echo $row["remarks"]; ?></td>
                      
  <td><?php echo number_format($row["debit"]); ?></td>
                        <td><?php echo number_format($row["credit"]); ?></td>
   
                     <td><?php echo number_format($row["balance"]); ?></td>
                    </tr>
           
 <?php } ?>
            </table>
            <?php
            } else {  ?>
                <p id="none"> Nie znaleziono :(</p>
 
           <?php }
            $conn->close(); ?>

    </div>

    <script>

    $(document).ready(function() {
        var curr_scroll;

  
      $(window).scroll(function () {
            curr_scroll = $(window).scrollTop();

        
    if ($(window).scrollTop() > 120) {
                $("#the-search-bar").addClass('search-bar-fixed');

    
          if ($(window).width() > 855) {
                  $("#fi-search-bar").addClass('fi-search-bar-fixed');
    
          }
            }

            if ($(window).scrollTop() < 121) {
                $("#the-search-bar").removeClass('search-bar-fixed');

 
             if ($(window).width() > 855) {
                  $("#fi-search-bar").removeClass('fi-search-bar-fixed');
              }
            }
        });

      
  $(window).resize(function () {
            var class_name = $("#fi-search-bar").attr('class');

           
 if ((class_name == "flex-item-search-bar fi-search-bar-fixed") && ($(window).width() < 856)) {
       
         $("#fi-search-bar").removeClass('fi-search-bar-fixed');
            }

      
      if ((class_name == "flex-item-search-bar") && ($(window).width() > 855) && (curr_scroll > 120)) {
        
        $("#fi-search-bar").addClass('fi-search-bar-fixed');
            }
        });

       

        var modal = document.getElementById('id01');

     

        window.onclick = function(event) {
   
         if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    });
   
 </script>

</body>
</html>
