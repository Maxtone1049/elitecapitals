<?php
session_start();
error_reporting(0);
include('../includes/dbconnect.php');

        
      if(isset($_POST['submit']))
    {
             
    //storind the data in your database
      
      $fname=$_POST['fname'];
      $lname=$_POST['lname'];
      $phone=$_POST['phone'];
      $email=$_POST['email'];
      $password=$_POST['password'];
      $nok=$_POST['nok'];
      $country=$_POST['country'];
      $state=$_POST['state'];
      $city=$_POST['city'];
      $trade=$_POST['trade'];
      
    $sql="INSERT INTO users(fname,lname,phone,email,password,nok,country,state,city,trade_account) VALUES(:fname,:lname,:phone,:email,:password,:nok,:country,:state,:city,:trade)";
      
        $query = $dbh->prepare($sql); 
    $query->bindParam(':fname',$fname,PDO::PARAM_STR);
    $query->bindParam(':lname',$lname,PDO::PARAM_STR);
    $query->bindParam(':phone',$phone,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':password',$password,PDO::PARAM_STR);
    $query->bindParam(':nok',$nok,PDO::PARAM_STR);
    $query->bindParam(':country',$country,PDO::PARAM_STR);
    $query->bindParam(':state',$state,PDO::PARAM_STR);
    $query->bindParam(':city',$city,PDO::PARAM_STR);
    $query->bindParam(':trade',$trade,PDO::PARAM_STR);
    
$query->execute();
$lastInsertId=$dbh->lastInsertId();
    if ($lastInsertId) {
    echo '<script>alert("User has been created")</script>';
    echo "<script>window.location.href ='dashboard'</script>";
 }
else {
    $msg="Error updating Post, try again!";
 }
  
 
}
  
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="shortcut icon" href="../img/favicon.png" type="image/png">
    <link rel="apple-touch-icon" href="assets/images/logoIcon/logo.png">
    <title>ELITE CAPITALS || User Form</title>
    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="lib/jquery-toggles/toggles-full.css" rel="stylesheet">
    <link href="lib/highlightjs/github.css" rel="stylesheet">
    <link href="lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="lib/spectrum/spectrum.css" rel="stylesheet">
    <!-- Amanda CSS -->
    <link rel="stylesheet" href="css/amanda.css">
  </head>

  <body>
 
<?php include_once('includes/header.php');
include_once('includes/sidebar.php');

 ?>
      
    <div class="am-mainpanel">
      <div class="am-pagebody">

        <div class="row row-sm mg-t-20">
          <div class="col-xl-12">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
              <h3>Registration Form</h3>
              <p style="font-size:13px; border-radius:12px;color:red; width:70%; margin:auto; text-align:center; margin-bottom:30px; background-color:yellow;"> 
                <?php if($msg){
    echo $msg;
  }  ?> </p>
               <form id="basic-form" method="post">
       <div class="row">
                <label class="col-sm-4 form-control-label">First Name: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                 <input type="text" class="form-control" name="fname" required="true">
                </div>
              </div><br/>
     <div class="row">
                <label class="col-sm-4 form-control-label">Last Name: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                 <input type="text" class="form-control" name="lname" required="true">
                </div>
              </div><br/>
            <div class="row">
                <label class="col-sm-4 form-control-label">Phone: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                 <input type="text" class="form-control" name="phone" required="true">
                </div>
              </div><br/>
              <div class="row">
                <label class="col-sm-4 form-control-label">Email: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                 <input type="email" class="form-control" name="email" required="true">
                </div>
              </div><br/>
                  <div class="row">
                <label class="col-sm-4 form-control-label">Password: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                 <input type="password" class="form-control" name="password" required="true">
                </div>
              </div><br/>
              <div class="row">
                <label class="col-sm-4 form-control-label">Next of Kin: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                 <input type="text" class="form-control" name="nok" required="true">
                </div>
              </div><br/>
              <div class="row">
                <label class="col-sm-4 form-control-label">Country: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                 <input type="text" class="form-control" name="country" required="true">
                </div>
              </div><br/>
              <div class="row">
                <label class="col-sm-4 form-control-label">State: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                 <input type="text" class="form-control" name="state" required="true">
                </div>
              </div><br/>
              <div class="row">
                <label class="col-sm-4 form-control-label">City: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                 <input type="text" class="form-control" name="city" required="true"></div>
              </div><br/>
                 <div class="row">
                <label class="col-sm-4 form-control-label">Trade Account: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                 <input type="text" class="form-control" name="trade" required="true"></div>
              </div><br/>
            <!-- row -->
 <div class="form-layout-footer mg-t-30">
             <p style="text-align: center;"><button class="btn btn-info mg-r-5"  name="submit" id="submit">Register User</button></p>
                </form>
              </div><!-- form-layout-footer -->
            </div><!-- card -->
          </div><!-- col-6 -->
        
        </div><!-- row -->


      </div><!-- am-pagebody -->
     <?php include_once('includes/footer.php');?>
    </div><!-- am-mainpanel -->

    <script src="lib/jquery/jquery.js"></script>
   <script src="lib/jquery-ui/jquery-ui.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="lib/jquery-toggles/toggles.min.js"></script>
    <script src="lib/highlightjs/highlight.pack.js"></script>
    <script src="lib/select2/js/select2.min.js"></script>
        <script src="lib/spectrum/spectrum.js"></script>

    <script src="js/amanda.js"></script>
    <script>
      $(function(){
        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });
      })

        // Datepicker
        $('.fc-datepicker').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true
        });

$('#datepickerNoOfMonths').datepicker({
  showOtherMonths: true,
  selectOtherMonths: true,
  numberOfMonths: 2
})
$('.hdob').datepicker({
  multidate: true,
  format: 'yyyy-mm-dd'
});



    </script>
    
  </body>
</html>
