<?php include "../include/headerlogin.php" ?>
<?php include "../include/db.php" ?>
<?php include "../include/navLogin.php" ?>
<?php
if (isset($_POST['submit'])) {
    $work = $_POST['pekerjaan'];
    $alamat = $_POST['alamatPekerjaan'];
    $date = $_POST['tanggalSelesai'];
    $catatan = $_POST['catatan'];
    $iduser = (int) $_SESSION['iduser'];
    if (
        !empty($work) && !empty($alamat) && !empty($date)
    ) {
        $queryperbaikan = "INSERT INTO `perbaikan`
                    ( `IdUser`, `pekerjaan`, `IdKategori`, `tanggalOrder`, `tanggalSelesai`, `catatan`,`status`) 
                    VALUES ('$iduser','$work',3,now(),'$date','$catatan',0)
                    ";
        $input = mysqli_query($conn, $queryperbaikan);
        if (!$input) {
            die("STRING QUERY " . mysqli_error($conn));
        }
        if (headers_sent()) {
            die("Redirect failed. Please click on this link: <a href=sukses.php> this");
        } else {
            exit(header("Location:sukses.php"));
        }
        if (!$input) {
            die("STRING QUERY " . mysqli_error($conn));
        }
    } else {
        echo "jangan kosong";
    }
}
?>
<br>&nbsp;<br>
<section id="faq" class="faq section-bg">
    <div class="container d-flex justify-content-center" data-aos="fade-up ">

        <div class="col-lg-7 mt-5 mt-lg-0 d-flex content-align-center flex-center justify-content-center">
            <form action="" method="post">

                <div class="form-group ">
                    <label for="name">Uraian Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control" id="name" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <label for="name">alamat</label>
                    <input type="text" class="form-control" name="alamatPekerjaan" id="subject" data-msg="Please write your address" />
                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <label for="name">tanggal</label>
                    <div></div>
                    <input type="date" name="tanggalSelesai" id="date">
                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <label for="name">Catatan (opsional)</label>
                    <input type="text" class="form-control" name="catatan" id="subject" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validate"></div>
                </div>
                <div class="text-center"><button class="btn btn-primary" name="submit" type="submit">Submit</button></div>
            </form>
        </div>

    </div>


    </div>
</section>


<?php include "../include/footer.php" ?>