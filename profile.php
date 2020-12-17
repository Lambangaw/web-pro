<?php include "include/header.php" ?>
<?php include "include/navLogin.php" ?>
<?php include "include/db.php" ?>

<?php
if (isset($_POST['submitnama'])) {
  $id = $_SESSION['iduser'];
  $namaupdate = $_POST['namaUser'];
  $query = "UPDATE user SET namaUser = '$namaupdate'    
                WHERE idUser = '$id'";
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  if ($result) {
    $_SESSION['nama'] = $namaupdate;
    header('Location:profile.php');
  }
} ?>
<?php
if (isset($_POST['submitemail'])) {
  $id = $_SESSION['iduser'];
  $emailupdate = $_POST['email'];
  $query = "UPDATE user SET emailUser = '$emailupdate'    
                WHERE idUser = '$id'";
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  if ($result) {
    $_SESSION['email'] = $emailupdate;
    header('Location:profile.php');
  }
} ?>
<?php
if (isset($_POST['submitalamat'])) {
  $id = $_SESSION['iduser'];
  $alamatupdate = $_POST['alamat'];
  $query = "UPDATE user SET alamatUser = '$alamatupdate'    
                WHERE idUser = '$id'";
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  if ($result) {
    $_SESSION['alamat'] = $emailupdate;
    header('Location:profile.php');
  }
} ?>

<br>&nbsp;<br>
<!-- ======= Frequently Asked Questions Section ======= -->
<section id="faq" class="faq section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Profile</h2>
      <p>Anda dapat mengganti profile anda disini</p>
    </div>

    <div class="faq-list">
      <ul>
        <li data-aos="fade-up" data-aos-delay="100">
          <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-1">Nama <br> <?php echo $_SESSION['nama'] ?><i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
          <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
            <p>
              <label for="name">Your Name</label>

              <form action="" method="post" class="form-inline ">

                <label class="sr-only" for="inlineFormInputName2">Name</label>
                <input type="text" name="namaUser" class="form-control" id="name" data-msg="Please enter at least 4 chars" placeholder="<?php echo $_SESSION['nama'] ?>">

                <button type="submit" name="submitnama" class="btn  btn-primary ">Submit</button>

              </form>


            </p>
          </div>
        </li>

        <li data-aos="fade-up" data-aos-delay="200">
          <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2" class="collapsed">email <br> <?php echo $_SESSION['email'] ?><i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
          <div id="faq-list-2" class="collapse" data-parent=".faq-list">
            <p>

              <label for="name">Email</label>
              <form action="" method="post" class="form-inline">
                <label class="sr-only" for="name">Email</label>
                <input type="text" name="email" class="form-control" id="name" data-msg="Please enter at least 4 chars" placeholder="<?php echo $_SESSION['email'] ?>" />
                <button name="submitemail" class="btn  btn-primary" type="submit"><i class="fa fa-search">Submit</i></button>
              </form>
            </p>
          </div>
        </li>

        <li data-aos="fade-up" data-aos-delay="400">
          <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-4" class="collapsed">Alamat <br><br> <?php echo $_SESSION['alamat'] ?><i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
          <div id="faq-list-4" class="collapse" data-parent=".faq-list">
            <p>

              <label for="name">Alamat</label>
              <form action="" method="post" class="form-inline">
                <input type="text" name="alamat" class="form-control" id="name" data-msg="Please enter at least 4 chars" placeholder="<?php echo $_SESSION['alamatuser'] ?>" />
                <button name="submitalamat" class="btn btn-primary" type="submit"> Submit </button>
              </form>
            </p>
          </div>
        </li>

        <li data-aos="fade-up" data-aos-delay="300">
          <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-3" class="collapsed">Password <br> **********<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
          <div id="faq-list-3" class="collapse" data-parent=".faq-list">
            <p>
              <label for="name">Password</label>
              <form action="editpasswd.php" class="form-inline" method="post">
                <label for="editpassword"></label>
                <button type="submit" class="btn btn-primary" href="editpasswd.php"> Edit Password </button>
                <small id="passwordHelpInline" class="text-muted">
                  Klik disini untuk ubah password anda.
                </small>
              </form>
            </p>
          </div>
        </li>



        <li data-aos="fade-up" data-aos-delay="500">
          <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-5" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
          <div id="faq-list-5" class="collapse" data-parent=".faq-list">
            <p>
              <label for="name">Your Name</label>
              <input type="text" name="namaUser" class="form-control" id="name" data-msg="Please enter at least 4 chars" placeholder="<?php echo $_SESSION['namaUser'] ?>" />
            </p>
          </div>
        </li>

      </ul>
    </div>


  </div>
</section><!-- End Frequently Asked Questions Section -->
}

<?php include "include/footer.php" ?>