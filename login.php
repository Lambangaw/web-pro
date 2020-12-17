<?php include "include/header.php"; ?>
<?php include "include/nav.php"; ?>
<?php include "include/db.php"; ?>
<br>&nbsp;<br>
<!-- ======= Frequently Asked Questions Section ======= -->
<section id="faq" class="faq section-bg">
  <?php
  if (isset($_POST['submit'])) {

    $email = $_POST['emailUser'];
    $pwd = $_POST['pwd'];
    var_dump($email, $pwd);
    if (
      !empty($email) && !empty($pwd)
    ) {
      $query = "SELECT * FROM `user` WHERE emailUser = '$email' ";
      $cekuser = mysqli_query($conn, $query);

      $count = mysqli_num_rows($cekuser);
      if ($count > 0) {

        while ($row = mysqli_fetch_assoc($cekuser)) {

          $uname = $row['namaUser'];
          $iduser = $row['IdUser'];
          $email = $row['emailUser'];
          $alamat = $row['alamatUser'];
          $phone = $row['nomorTelponUser'];
          $dbpwd = $row['pwd'];
          $role = $row['role'];
        }

        //die();
        $passver = password_verify($pwd, $dbpwd);
        if ($passver == TRUE) {
          session_start();
          $_SESSION["loggedin"] = true;
          $_SESSION["iduser"] = $iduser;
          $_SESSION["nama"] = $uname;
          $_SESSION["email"] = $email;
          $_SESSION["alamat"] = $alamat;
          $_SESSION["nomortelepon"] = $phone;
          $_SESSION["pwd"] = $dbpwd;
          $_SESSION["role"] = $role;
          header('Location:welcomeUser.php');
        } else {
          echo "password salah";
        }
      } else {
        echo "gaada user";
      }
    }
  }
  ?>

  <div class="container" data-aos="fade-up">
    <form action="" method="post">
      <div class="form-group">
        <label for="name">email</label>
        <input type="text" class="form-control" name="emailUser" id="subject" data-rule="minlen:4" data-msg="enter your email" />
        <div class="validate"></div>
      </div>
      <div class="form-group">
        <label for="name">Password</label>
        <input type="password" class="form-control" name="pwd" id="subject" data-msg="Please enter your password" />
        <div class="validate"></div>
      </div>

      <div class="text-center"><button class="button" name="submit" type="submit">Login</button></div>
    </form>
  </div>

  </div>


  </div>
</section><!-- End Frequently Asked Questions Section -->


<?php include "include/footer.php"; ?>