<?php include "include/headerlogin.php" ?>
<?php include "include/nav.php" ?>
<?php include "include/db.php" ?>
<br>&nbsp;<br>


<!-- ======= Frequently Asked Questions Section ======= -->
<section id="faq" class="faq section-bg">
  <div class="container d-flex justify-content-center" data-aos="fade-up ">

    <?php
    if (isset($_POST['submit'])) {
      $namauser = $_POST['namaUser'];
      $emailuser = $_POST['emailUser'];
      $nomorTeleponUser = $_POST['nomorTeleponUser'];
      $alamatUser = $_POST['alamatUser'];
      $pwd = $_POST['pwd'];
      $pwdconfirm = $_POST['pwdconfirm'];
      if (
        !empty($namauser) && !empty($emailuser) && !empty($nomorTeleponUser) && !empty($alamatUser)
        && !empty($alamatUser) && !empty($pwd)
      ) {

        if ($pwd == $pwdconfirm) {
          $pwdhash = password_hash($pwd, PASSWORD_DEFAULT);
          $select = "SELECT * from user where emailUser = '$emailuser' ";
          $dbselect = mysqli_query($conn, $query);
          if (mysqli_num_rows($dbselect) > 0) {
            $msg = "email sudah digunakan";
          } else {
            $query = "INSERT INTO `user`( `namaUser`, `emailUser`, `alamatUser`, `nomorTelponUser`, `pwd`,`role`) 
    VALUES ('$namauser','$emailuser','$alamatUser','$nomorTeleponUser','$pwdhash','user')";
            $input = mysqli_query($conn, $query);
          }
          if (!$input) {
            die("STRING QUERY " . mysqli_error($conn));
          } else {
            header("Location:login.php");
          }
        } else {
    ?>
          <div class="col-md-8 col-lg-7 text-center align-content-center mx-auto ">
            <div class="alert alert-danger" role="alert">
              Signup Failed ! <strong> Password confirmation Incorrect </strong>
            </div>
          </div>
        <?php
        }
      } else {
        ?>
        <div class="col-md-8 col-lg-7 text-center align-content-center mx-auto ">
          <div class="alert alert-danger" role="alert">
            Signup Failed ! <strong> Please fill this form completely </strong> </div>
        </div>
    <?php
      }
    }
    ?>


    <div class="col-lg-7 mt-5 mt-lg-0 d-flex content-align-center flex-center justify-content-center">
      <form action="" method="post">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="name">Your Name</label>
            <input type="text" name="namaUser" class="form-control" id="name" data-msg="Please enter at least 4 chars" />
            <div class="validate"></div>
          </div>
          <div class="form-group col-md-6">
            <label for="name">Your Email</label>
            <input type="text" class="form-control" name="emailUser" id="email" data-msg="Please enter a valid email" />
            <div class="validate"></div>
          </div>
        </div>
        <div class="form-group">
          <label for="name">Phone Number</label>
          <input type="text" class="form-control" name="nomorTeleponUser" id="subject" data-msg="Please enter at least 8 chars of subject" />
          <div class="validate"></div>
        </div>
        <div class="form-group">
          <label for="name">address</label>
          <input type="text" class="form-control" name="alamatUser" id="subject" data-msg="Please write your address" />
          <div class="validate"></div>
        </div>
        <div class="form-group">
          <label for="name">Password</label>
          <input type="password" class="form-control" name="pwd" id="subject" data-msg="Please enter your password" />
          <div class="validate"></div>
        </div>
        <div class="form-group">
          <label for="name">confirm password</label>
          <input type="password" class="form-control" name="pwdconfirm" id="subject" data-msg="Please rewrite your password" />
          <div class="validate"></div>
        </div>

        <div class="text-center"><button class="bttn" name="submit" type="submit">Sign Up</button></div>
      </form>
    </div>

  </div>


  </div>
</section><!-- End Frequently Asked Questions Section -->
<?php include "include/footer.php" ?>