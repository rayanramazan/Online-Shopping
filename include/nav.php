<?php 
include'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>بکارهاتى</title>
</head>

<body>
    
    <?php
      $profile = "<a href='login.php'><i class='fa-solid fa-right-to-bracket'></i>چوونە ژوور / تۆمار کرن</a>";
      $logout_btn = "";
      if(isset($_SESSION['userid'])){
      $userid = $_SESSION['userid'];
      $UserQuery = mysqli_query($db , "SELECT * FROM `user` WHERE `id` = '$userid'");
      while($UserRow = mysqli_fetch_assoc($UserQuery)){
        $out = strlen(sec($UserRow['fullname'])) > 10 ? substr(sec($UserRow['fullname']),0,10)."..." : sec($UserRow['fullname']);
        $profile = "<a href='index.php'><i class='fas fa-user-tie'></i>".sec($out)."</a>";
        $logout_btn = "<li><a href='?logout' style='color: tomato; transition: .4s;'><i class='fal fa-sign-out'></i>".sec($lang['logout'])."</a></li>";
      }
    }
    ?>
     <div class="wrapper">
    <nav>
      <input type="checkbox" id="show-search">
      <input type="checkbox" id="show-menu">
      <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
      <div class="content">
        <div class="logo"><a href="index.php"><img src="assets/img/logo.png"  id="logo" alt="" srcset=""></a></div>
        <ul class="links">
          <li><a href="index.php"><i class="fa-solid fa-house"></i> دەستپێک</a></li>
          <li><?php echo $profile; ?></li>
          <li><a href="about.php"> <i class="fa-solid fa-fingerprint"></i> دەربارەى</a></li>
          <li><a href="contact.php"><i class="fa-solid fa-phone"></i> پەیوەندى</a></li>
          <li><span class="view-modal" id="open-popup-btn1"> <i class="fa-solid fa-language"></i> زمان</span></li>
          <li>
          <?php 
           if(isset($_SESSION['userid'])){
            echo $logout_btn;
           }
          ?>
          </li>
        </ul>
      </div>
      <div class="theme">
      <label id="favorite" for="show-search" class="search-icon"><i class="far fa-heart" style="color: tomato; font-size: 1.5rem; background: rgba(0,0,0,0.10); padding: 4px; border-radius: 6px;"></i></label>
      </div>
      <script>
        $("#favorite").on("click" , function(){
          window.location.href = "myfavorite.php";
        })
      </script>
      
    </nav>
  </div>

    <div class="popup-overlay1"></div>
    <div class="popup1">
        <div class="head-popup1">
            <h1>بەڵاڤ کرنا کەل و پەلا</h1>
            <div class="popup-close-btn1">&times;</div>
        </div>
        <hr style="margin-top: 12px;">
        <div class="language">
            <a href="<?php echo sec($_SERVER['PHP_SELF']);?>?lang=ba" class="btn-badini">بادینى</a>
            <a href="<?php echo sec($_SERVER['PHP_SELF']);?>?lang=so" class="btn-sorani">سۆڕانى</a>
        </div>  
    </div>
    <script>
        var openPopupBtn = document.querySelector("#open-popup-btn1");
        var closePopupBtn = document.querySelector(".popup-close-btn1");

        openPopupBtn.addEventListener("click" , function(){
            document.body.classList.add("popup1-active");
        });
        closePopupBtn.addEventListener("click" , function(){
            document.body.classList.remove("popup1-active");
        });

    </script>