<?php include "include/header.php" ?>

<?php include "include/nav.php" ?>

<?php include "include/db.php" ?>



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

          $query = "INSERT INTO `user`( `namaUser`, `emailUser`, `alamatUser`, `nomorTelponUser`, `pwd`) 
    VALUES ('$namauser','$emailuser','$nomorTeleponUser','$alamatUser','$pwdhash')";
          $input = mysqli_query($conn, $query);
          header("Location:login.php");
          if (!$input) {
            die("STRING QUERY " . mysqli_error($conn));
          }
        } else {
          echo "password tidak sama";
        }
      } else {
        echo "jangan kosong";
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
        <div class="mb-3">
          <div class="loading">Loading</div>
          <div class="error-message"></div>
          <div class="sent-message">Your data has been sent. Thank you!</div>
        </div>
        <div class="text-center"><button name="submit" type="submit">Sign Up</button></div>
      </form>
    </div>

  </div>


  </div>
</section><!-- End Frequently Asked Questions Section -->
<?php include "include/footer.php" ?>