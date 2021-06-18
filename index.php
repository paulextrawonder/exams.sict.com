<?php
include_once 'config.php';

$errors = array();

$name = $designation = $hall = $department = $subject = $complaint ="";

if(isset($_POST["submit"])){

       //set parameters
    $name = trim($_POST['name']);
    $designation = trim($_POST['designation']);
    $hall = trim($_POST['hall']);
    $department = trim($_POST['department']);
    $subject = trim($_POST['subject']);
    $complaint = trim($_POST['complaint']);

    $fileDestination = "uploads/noimage.png";

    if (empty($name) || empty($designation) || empty($hall) || empty($department) || empty($subject) || empty($complaint)) {
      array_push($errors, "Field/s must not be empty");
      
    }
  
      if (empty($errors)) {


        // ------------------ Image validation ------------------

        $file =($_FILES['file']) ; // Checks and declares the file the file type 
        if (!empty($file)) {
        $img_name = $_FILES['file']['name']; // The name of uploaded image
        $tmp_name = $_FILES['file']['tmp_name']; // temporary storage name of the file
        $size = $_FILES['file']['size']; // size of the file to upload
        $error = $_FILES['file']['error']; // error of the file to be uploaded

        //explode from punctuation
        //explode function basically splits a string into separate arrays 
        //takes in two argurements, first is the point to split, second is the file to explode
        $tmpExtension = explode('.', $img_name);
        $fileExtension = strtolower(end($tmpExtension));

        //allowed extensions
        $isAllowed = array('jpg','jpeg','png'); // sets of allowwable image formats
            if (!empty($fileExtension)) {      
              if(in_array($fileExtension, $isAllowed)){
                if ($error === 0) {
                    if ($size<5 * 1024 * 1024) {
                        $newFileName = uniqid('', true).'.'.$fileExtension;
                        $fileDestination = "uploads/".$newFileName;
                        move_uploaded_file($tmp_name, $fileDestination);
                      
                                                 
                }else{
                       
                         array_push($errors, "sorry your file size is too big");
                         //exit();
                }
                }else{
                    
                        array_push($errors, "There was an error please try again");
                        //exit();
                }
                }else{
                    
                        array_push($errors, "Sorry your file type is not accepted");
                        //exit();
                } 
                }
          }
        }

       if (empty($errors)) {

        $sql = "INSERT INTO complaints (name, designation, hall, department, subject, complaint, upload) VALUES (?,?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($dbconnected, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $name, $designation, $hall, $department, $subject, $complaint, $fileDestination);
         
                    
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
            echo "<script>alert('complaint submitted successfully')</script>";
            echo "<script>window.open('index', '_self')</script>";
                            
            } else{
              array_push($errors, "Not successfull");
              header("location:index.php");
            }

            // Close statement
            mysqli_stmt_close($stmt);

}

}
}

?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>FUTO</title>

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
          <h2 class="form__title responsive-h2" style="color: #114111">EXAM COMPLAINT PORTAL</h2>
          <p class="form__text responsive-p">Fill in the form below to register a complaint about any examination issues</p>
        </div>

        <div>
          <center style="color: red; font-size: 14px;">
          <?php foreach ($errors as $err) {
            echo "$err".'<br>';
          } ?>
        </center>
        </div>

        <div class="form__group">
          <input type="text" name="name" placeholder="Full Name" class="form__input" id="name" required />
        </div>
        
         <div class="form__group">
         <select name= "designation" class="form__input" id="designation" required>
            <option value="">~ Select Designation ~</option>
            <option value="Professor">Prof.</option>
            <option value="Lecturer">Lecturer</option>
            <option value="Student">Student</option>
          </select>
        </div>

        <div class="form__group">
          <input type="text" name="hall" placeholder="Hall" class="form__input" id="hall" required />
          <label for="hall" class="form__label">Hall *</label>
        </div>

        <div class="form__group">
          <input type="text" name="department" placeholder="Department eg 'IFT'" class="form__input" id="department" required />
          <label for="department" class="form__label">Department *</label>
        </div>

        <div class="form__group">
          <input type="text" maxlength="50" name="subject" placeholder="Subject" class="form__input" id="subject" required />
          <label for="subject" class="form__label">Subject *</label>
        </div>

        <div class="form__group">
          <textarea rows="10" name="complaint" placeholder="Complaint" class="form__input" id="complaint" required /></textarea>
        </div>

        <div class="form__group">
          <input type="file" name="file" placeholder="ID Photo" class="form__input" id="id-photo">
          <label for="id-photo" class="form__label">Upload scene *optional</label>
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

