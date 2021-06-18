<?php
$password = "";

$errors = array();

if(isset($_POST["submit"])){
  $passwords = array('futo-exam()portal', 'serial()admins');

       //set parameters
    $password = trim($_POST['password']);

    if (empty($password)) {
      array_push($errors, "Field/s must not be empty");  
    }

    if (!in_array($password, $passwords)) {
     array_push($errors, "Incorrect password");  
    }

    if (empty($errors)) {
      session_start();
     $_SESSION["loggedin"] = true;
     header('location:dean');

    }

  }
  


?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>LOGIN</title>

    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link rel="stylesheet" href="css/sweetalert2.min.css">

      

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/main2.css">

       <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  

    <style type="text/css">
      .background-overlay{
        background: rgb(0, 0, 0, 0.5);
      }
      .img-hover{
        color: #000;
      }
      .img-hover:hover{
        background: rgb(204,0,102,0.5);
        
      }
      .contestant-id{
       float: right; 
       font-weight: bolder;

      }

      .votecount{
        position: relative;
        float: right;
        bottom: -10px;
        border-radius: 4px;

      }

    </style>
  </head>

  <body>


<center style="color: #fff; margin-top: 30px;">
  <div>
    <img src="img/logo.png" height="100px" width="100px">
  </div>
    <div style="text-align: center !important; font-size: 20px; margin: 10px;">
      FEDERAL UNIVERSITY OF TECHNOLOGY, OWERRI
    </div>
  </center>
      

  <!-- Registration Container Section -->
  <div class="registration-container" style="background: #e1e6fa;">
    <div class="registration__box">
      <i class="wave"></i>

      <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data" class="form responsive-width">
        <div class="form__group">
          <h2 class="form__title responsive-h2" style="color: #114111">ADMIN LOGIN</h2>
          <p class="form__text responsive-p">Exam complaints portal</p>
        </div>

        <div>
          <center style="color: red; font-size: 14px;">
          <?php foreach ($errors as $err) {
            echo "$err".'<br>';
          } ?>
        </center>
        </div>

        <div class="form__group">
          <input type="password" name="password" placeholder="Password" class="form__input" id="password" autosave="off" autocomplete="off" required />
        </div>
        
                 
        <div class="form__group">
          <button type="submit" name="submit" class="btn__submit" style="font-size: 1.6rem; font-weight: 700; background: #114111; ">Submit</button>
          </div>
      </form>
    </div>
  </div>
  <!--End of Registration Container Section -->


 
  <!--Footer Section -->
  <footer class="footer responsive-padding"  style="color:#fff">
    <div class="footer__social">
      <p class="footer__social--p">Social media handles</p>
      <div class="social">
        <a href="#">
          <i style="color:#fff" class="fab fa-whatsapp"></i>
        </a>
       <a href="">
          <i style="color:#fff" class="fab fa-instagram"></i>
        </a>

        <a href="">
          <i style="color:#fff" class="fab fa-telegram-plane"></i>
        </a>
       
      </div>
    </div>
    <div class="footer__text" style="text-align: center !important;">
      &copy; Information Technology - FUTO 2021. All Rights Reserved.
    </div>
  </footer>
  <!--End of Footer Section -->


      </body>
      </html>

