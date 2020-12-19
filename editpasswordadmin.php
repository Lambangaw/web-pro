<?php include "include/header.php" ?>
<?php include "include/navAdmin.php" ?>
<?php include "include/db.php" ?>
<?php if (isset($_POST['editpassword'])) {
    $current_password = $_POST['passwordlama'];
    $new_password = $_POST['passwordbaru'];
    $confirm_password = $_POST['konfirmasipassword'];
    if (!empty($current_password) && !empty($new_password) && !empty($confirm_password)) {

        if (isset($_SESSION['iduser'])) {
            $user_id = $_SESSION['iduser'];
        } else {
            header("Location: login.php");
        }
        if (strlen($new_password) > 4) {
            $query = "SELECT pwd FROM user WHERE `IdUser` = '$user_id'";
            $select_user = mysqli_query($conn, $query);


            while ($row = mysqli_fetch_assoc($select_user)) {
                $user_password = $row['pwd'];
            }
            $db_user_password = password_verify($current_password, $user_password);
            if ($new_password === $confirm_password) {
                if ($current_password == $db_user_password) {
                    $new_password = password_hash($new_password, PASSWORD_DEFAULT);
                    $query = "UPDATE user SET pwd = '$new_password' WHERE `IdUser` = '$user_id' ";
                    $change_password = mysqli_query($conn, $query);
                }
            }
        }
    }
}
?>
<div class="alert alert-primary col-lg-6" role="alert" style="margin-left: 10px;">
    Passwrod Changed
</div>

<!-- ======= Frequently Asked Questions Section ======= -->
<section id="faq" class="faq section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Edit Password</h2>
            <p>Silahkan anda memperbarui password anda demi keamanan</p>
        </div>

        <form action="" method="post">
            <label class="sr-only" for="foto">Photo</label>
            <div class="col-md-12 text-center">
                <br>&nbsp;<br>
                <label for="foto">Password Lama<br>
                    <input type="password" name="passwordlama">
                </label>
            </div>
            <div class="col-md-12 text-center">
                <label for="foto">Password Baru<br>
                    <input type="password" name="passwordbaru">
                </label>
            </div>
            <div class="col-md-12 text-center">

                <label for="foto">Konfirmasi Password Baru<br>
                    <input type="password" name="konfirmasipassword">
                </label>
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" name="editpassword" class="btn btn-primary justify">Submit</button>
            </div>
        </form>

    </div>


    <?php include "include/footer.php" ?>