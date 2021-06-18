<?php

 include_once('config.php');
 include_once('startsession.php');

function strip_bad_chars($input){
  $output = preg_replace("/[^a-zA-Z0-9_-]/", "", $input);
  return $output;
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

    <!-- Shamcey CSS -->
    <link rel="stylesheet" href="css/shamcey.css">

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

    <style>
  .textbr {
   overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 5; /* number of lines to show */
   -webkit-box-orient: vertical;
}
</style>
  </head>

  <body>

<?php

?>
<div class="container">
      <center>
      <img class="img-fluid mg-5" src="img/logo.jpg" height="70px" width="70px">
    </center>
     <span class="btn btn-success"><a class="text-white" href="logout">Logout</a></span>
<div class="card bd-pink mg-t-20">
           <h2 class="card-header bg-pink tx-white text-center">FUTO EXAMINATION COMPLAINT PORTAL LOGS</h2>
          <div class="card-body pd-sm-30">
            <p class="mg-b-20 mg-sm-b-30 alert alert-success"><strong>Alert!</strong> These are logs of complains from different students/lecturers of different departments with a timestamp. Kindly treat as urgent!</p>

            
            <div class="row">

              <?php

                    $sql = "SELECT * FROM `complaints` ORDER BY id DESC";
                    if($result = mysqli_query($dbconnected, $sql)){
                      $rowCount = mysqli_num_rows($result);
                        if($rowCount > 0){

                                $index = 0;

                                while($row = mysqli_fetch_array($result)){
                                    
                                   $index++;

                                   ?>

                                    <div class="col-md-4 mg-t-20 mg-md-t-0">
                                    <div class="card bd-0">
                                      <div class="card-header bg-pink tx-white">
                                        <?php echo $row["name"];?> - <?php echo $row["department"];?>
                                        <span class="contestant-id"><?php echo $row["designation"];?></span>
                                        <br><?php echo $row["date"];?>
                                      </div><!-- card-header -->
                                      <div class="card-body bd bd-t-0">
                                       <p class="text-center font-weight-bold" style="text-transform: uppercase;"><?php echo $row["subject"];?> <br>( <?php echo $row["hall"];?> )</p>
                                      <p class="mg-b-0 alert textbr"><?php echo $row["complaint"];?></p>
                                        <br><a href='complaints.php?id=<?php echo $row['id'];?>' class = "img-hover badge badge-success" style="font-size: 14px;">Full Read...</a>
                                      </div><!-- card-body -->
                                    </div><!-- card -->
                                    <hr >
                                  </div><!-- col -->
                                
                                <?php
                               
                            // Free result set
                            //mysqli_free_result($result);
                        } 
                       
                    } else{
                        echo "No complain yet";
                    }
                  }else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbconnected);
                    }
 
                    // Close connection
                    mysqli_close($dbconnected);
                    ?>

              

              

                           

            </div><!-- row -->
          </div><!-- card-body -->
        </div><!-- card -->
      </div><!-- container -->
      </div><!-- sh-pagebody -->
      <div class="sh-footer">
        <div>&copy; <?php echo date("Y")?> All Rights Reserved. FUTO</div>
        <div class="mg-t-10 mg-md-t-0">Designed by: <a href="https://www.twitter.com/PaulHack">Exam Management team</a></div>
      </div><!-- sh-footer -->
    </div><!-- sh-mainpanel -->

    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>

    <script src="js/shamcey.js"></script>
    <script src="js/sweetalert2.min.js"></script>

   <?php
    include_once 'sweetalert2.php';
    ?>



      </body>
      </html>

