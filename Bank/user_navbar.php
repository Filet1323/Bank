<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
 <link rel="stylesheet" href="user_navbar_style.css">
    <script src="jquery-3.2.1.min.js"></script>
</head>

<body>
   
 <div class="nav-wrapper">
        <div class="topnav" id="theTopNav">
            <a href="javascript:void(0);
" class="icon" onclick="openNav()" id="hamburger">
                &#9776;
            </a>
            <a id="user">Witaj, admin!</a>
  
          <a id="logout" href="logout_action.php" style="border-top-left-radius: 3px;" 
                 
   onclick="return confirm('Jesteś pewien ?')">Wyloguj</a>
        </div>
    </div>

<script>

$(document).ready(function() {
  $(window).scroll(function () {
 
   if ($(window).scrollTop() > 120) {
      $("#theTopNav").addClass('navbar-fixed');
    }
    if ($(window).scrollTop() < 121)
 {
      $("#theTopNav").removeClass('navbar-fixed');
  }
  });
});
</script>

</body>
</html>
