<?php
  include_once("config.php");
  $adminCount = $mysqli->query("SELECT * FROM tblLogin where position = '0'");
  $adminCount = mysqli_num_rows($adminCount);
  $juniorAdminCount = $mysqli->query("SELECT * FROM tblLogin where position = '1'");
  $juniorAdminCount = mysqli_num_rows($juniorAdminCount);
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>WestArt Ventures Register form</title>
  
  
  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <div class="login-wrap">
  <h2>SignUp</h2>
  <form method = "post" action = "addNewUser.php">
   <?php if(isset($_GET['err']))
          {
              if($_GET['err']=='passMissMatch')
                {
                  echo "<p class='text-danger' style='text-align: center;'> Password does not match.</p>";
                }
              else if($_GET['err']=='indexNoLen')
                {
                  echo "<p class='text-danger' style='text-align: center;'> Something wrong with your index number, Please Check!</p>";
                }
              else if($_GET['err']=='indexNotNo')
                {
                  echo "<p class='text-danger' style='text-align: center;'> Something wrong with your index number, Please Check!</p>";
                }
              else if($_GET['err']=='duplicate')
                {
                  echo "<p class='text-danger' style='text-align: center;'> You are already registered, Please Check!</p>";
                }
          }  

          else if(isset($_GET['success']))
          {
              if($_GET['success']=='saved')
              {
                  echo "<p class='text-success' style='text-align: center;'> Thank you for the Registration. <a href='index.php'> Go to Login</a></p>";
              }
          }

      if(!isset($_GET['success']))   {    ?>
    <div class="form" >
    <input type="text" placeholder="First name" name="firstName" required/>
    <input type="text" placeholder="Last name" name="lastName" required/>
    <input type="email" placeholder="E-Mail" name="email" required/>
    <input type="text" placeholder="Contact No" name="contactNo" required/>
    <input type="password" placeholder="Password" name="password" required/>
    <input type="password" placeholder="Retype Password" name="confirmPassword" required/>
    <select id="position" name="position" placeholder = "Select your position" required>
                            <?php 
                               if ($adminCount == '0'){  ?>
                            <option value="0" <?php if(isset($_GET['position'])) { if($_GET['position']==0) {echo "Selected";}}?>> Admin </option>
                            <?php } 
                               if ($juniorAdminCount == '0'){ ?>

                            <option value="1" <?php if(isset($_GET['position'])) { if($_GET['position']==1) {echo "Selected";}}?>> Junior admin </option>
                            <?php } ?>
                            <option value="2" <?php if(isset($_GET['position'])) { if($_GET['position']==2) {echo "Selected";}}?>> Sales person </option>
                            <option value="3" <?php if(isset($_GET['position'])) { if($_GET['position']==3) {echo "Selected";}}?>> Delivery person </option>
    </select>
    
    
    <button> Sign Up </button>
     <?php } ?>
    <a href="index.php"> <p> Already Registered? Login </p></a>
  </div>
  </form>
</div>
  <script src='https://code.jquery.com/jquery-1.10.0.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
