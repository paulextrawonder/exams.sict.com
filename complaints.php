<?php
 include_once('config.php');
 include_once('startsession.php');

function strip_bad_chars($input){
  $output = preg_replace("/[^a-zA-Z0-9_-]/", "", $input);
  return $output;
}

$id = strip_bad_chars($_GET['id']);

$error = array();

 
    $sql = "SELECT * FROM complaints WHERE id = '$id'";
        if($result = mysqli_query($dbconnected, $sql)){
                      $rowCount = mysqli_num_rows($result);
                        if($rowCount > 0){

                                $index = 0;

                                while($row = mysqli_fetch_array($result)){
                                  $index++;
                                   $name = $row['name'];
                                   $upload = $row['upload'];
                                   $hall = $row['hall'];
                                   $subject = $row['subject'];
                                   $complaint = $row['complaint'];
                            }
                               
                          
                            mysqli_free_result($result);
                        } else{
                             echo "<p class='lead spinner-border text-secondary' role='status'><em>No records were found.</em></p>";
                             

                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbconnected);
                    }
 
                    // Close connection
                    mysqli_close($dbconnected);
                    ?>


<!DOCTYPE html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>FUTO</title>

    <!-- Shamcey CSS -->
    <link rel="stylesheet" href="css/shamcey.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
  </head>
<style>
  .textbr {
   overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 2; /* number of lines to show */
   -webkit-box-orient: vertical;
}
</style>
  <body>

<div class="container">
<div class="card bd-pink mg-t-20">
           <h2 class="card-header bg-pink tx-white text-center">FUTO EXAMINATION COMPLAINT PORTAL</h2>
          <div class="card-body pd-sm-30">
            <p class="mg-b-20 mg-sm-b-30 alert alert-success"><strong>Full details here!</strong> </p>

              
        <div id="contestant">
            <div class="row row-sm mg-t-50">
          <div class="col-lg-6">
            <div class="card bd-0">
              <div class="card-header bg-pink tx-white"><?php echo $name;?></div>
              <div class="card-body pd-sm-30">
                         
                  <img class="card-img-top img-fluid" src='<?php echo $upload;?>'>
                  <p class="btn btn-success"><a class="text-white" download="<?php echo $upload;?>" href="<?php echo $row["upload"];?>">Download Image</a></p>
                                
              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col-6 -->
          <div class="col-lg-6 mg-t-25 mg-lg-t-0">
       
              <div class="card-body pd-sm-30">
                <p class="text-center font-weight-bold" style="text-transform: uppercase; text-decoration: underline;"><?php echo $subject;?> - (<?php echo $hall;?>)</p>

                <p class="mg-b-20 mg-sm-b-30"><?php echo $complaint;?></p>

                <div class="badge badge-success"><a style="color: #fff; font-size: 14px" href="../examcomplaint/dean">Back</a></div>
                        
                
              
              </form>
               <div class="card wd-xs-300">
                  
                  
                </div><!-- card -->
              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col-6 -->
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



</body>
</html>
