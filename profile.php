<?php include "include/headerlogin.php" ?>
<?php include "include/navLogin.php" ?>
<?php include "include/db.php" ?>
<?php
if (isset($_POST['userImage'])) {
  $id = $_SESSION['iduser'];
  $foto = $_FILES["userImage"]["name"];
  $profileImageName = time() . '-' . $_FILES["userImage"]["name"] . ".jpg";
  $temp_name = $_FILES["userImage"]["tmp_name"];
  move_uploaded_file($temp_name, "image/profile/$profileImageName");
  $query = "UPDATE user SET userImage = '$profileImageName'    
  WHERE idUser = '$id'";
  $data = mysqli_query($conn, $query);
}
?>
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
    $_SESSION['alamat'] = $alamatupdate;
    header('Location:profile.php');
  }
} ?>
<?php
if (isset($_POST['submitnomor'])) {
  $id = $_SESSION['iduser'];
  $nomorupdate = $_POST['nomortelpon'];
  $query = "UPDATE user SET nomorTelponUser = '$nomorupdate'    
                WHERE idUser = '$id'";
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  if ($result) {
    $_SESSION['nomortelepon'] = $nomorupdate;
    header('Location:profile.php');
  }
} ?>

<?php
$id = $_SESSION['iduser'];
$query = "SELECT * FROM `user` WHERE IdUser = '$id' ";
$db = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($db)) {
  $uname = $row['namaUser'];
  $iduser = $row['IdUser'];
  $email = $row['emailUser'];
  $alamat = $row['alamatUser'];
  $phone = $row['nomorTelponUser'];
  $dbpwd = $row['pwd'];
  $foto = $row['userImage'];
}

?>

<br>&nbsp;<br>
<!-- ======= Frequently Asked Questions Section ======= -->
<section id="faq" class="faq section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Profile</h2>
      <p>Anda dapat mengganti profile anda disini</p>
    </div>

    <div class="faq-list">
      <div class="text-center">
        <img src="image/profile/<?php echo $foto ?>" class="img-fluid rounded" width="250" height="250">
        <form action="" method="post" class="form-inline" enctype="multipart/form-data">
          <label class="sr-only" for="foto">Photo</label>
          <div class="col-md-12 text-center">
            <br>&nbsp;<br>
            <input type="file" name="userImage">
            <button type="submit" name="userImage" class="btn btn-primary justify">Edit Photo</button>
          </div>
        </form>
        <br>&nbsp;<br>
      </div>
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
          <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2" class="collapsed">Email <br> <?php echo $_SESSION['email'] ?><i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
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
                <input type="text" name="alamat" class="form-control" id="name" data-msg="Please enter at least 4 chars" placeholder="<?php echo $_SESSION['alamat'] ?>" />
                <button name="submitalamat" class="btn btn-primary" type="submit"> Submit </button>
              </form>
            </p>
          </div>
        </li>

        <li data-aos="fade-up" data-aos-delay="500">
          <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-5" class="collapsed">Nomor Telepon <br> <?php echo $_SESSION['nomortelepon'] ?><i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
          <div id="faq-list-5" class="collapse" data-parent=".faq-list">
            <p>
              <label for="name">Nomor Telepon</label>
              <form action="" method="post" class="form-inline">
                <input type="text" name="nomortelpon" class="form-control" id="name" data-msg="Please enter at least 4 chars" placeholder="<?php echo $_SESSION['nomortelepon'] ?>" />
                <button name="submitnomor" class="btn btn-primary" type="submit"> Submit </button>
              </form>
            </p>
          </div>
        </li>

        <li data-aos="fade-up" data-aos-delay="300">
          <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-3" class="collapsed">Password <br> **********<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
          <div id="faq-list-3" class="collapse" data-parent=".faq-list">
            <p>
              <label for="name">Password</label>
              <form action="editpassword.php" class="form-inline" method="post">
                <label for="editpassword"></label>
                <button type="submit" class="btn btn-primary" href="editpasswd.php"> Edit Password </button>
                <small id="passwordHelpInline" class="text-muted">
                  Klik disini untuk ubah password anda.
                </small>
              </form>
            </p>
          </div>
        </li>





      </ul>
    </div>


  </div>
</section><!-- End Frequently Asked Questions Section -->
}

<?php include "include/footer.php" ?>