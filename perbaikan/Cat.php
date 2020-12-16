<?php include "/web-pro/include/header.php" ?>
<?php include "/web-pro/include/navLogin.php" ?>
<?php include "/web-pro/include/db.php" ?>

<section id="faq" class="faq section-bg">
    <div class="container d-flex justify-content-center" data-aos="fade-up ">

        <?php
        if (isset($_POST['submit'])) {
            echo "masuk isset";
            $work = $_POST['pekerjaan'];
            $alamat = $_POST['alamatPekerjaan'];
            $date = $_POST['tanggalSelesai'];
            $catatan = $_POST['catatan'];

            $iduser = $_SESSION['iduser'];
            if (
                !empty($work) && !empty($alamat) && !empty($date)
            ) {

                $query = "INSERT INTO `airconditioner`
                    ( `IdUser`, `pekerjaan`, `biaya`, `tanggalOrder`, `tanggalSelesai`, `catatan`) 
                    VALUES ('$iduser','$work','200000',now(),'$date','$catatan'";
                $input = mysqli_query($conn, $query);
                if (!$input) {
                    die("STRING QUERY " . mysqli_error($conn));
                }
            } else {
                echo "jangan kosong";
            }
        }
        ?>


        <div class="col-lg-7 mt-5 mt-lg-0 d-flex content-align-center flex-center justify-content-center">
            <form action="" method="post">

                <div class="form-group ">
                    <label for="name">Uraian Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control" id="name" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <label for="name">address</label>
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
                <div class="text-center"><button name="submit" type="submit">Submit</button></div>
            </form>
        </div>

    </div>


    </div>
</section>


<?php include "../include/footer.php" ?>