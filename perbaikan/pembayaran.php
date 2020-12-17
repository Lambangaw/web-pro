<?php include "../include/header.php" ?>
<?php include "../include/nav.php" ?>
<?php include "../include/db.php" ?>
<?php
$idorder = $_GET['id'];
var_dump($idorder);
die();
?>
<br>&nbsp;<br>
<section id="faq" class="faq section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Pembayaran</h2>
            <p>Silahkan mengunggah bukti pembayaran.</p>
        </div>

        <div class="faq-list">
            <div class="text-center">
                <form action="" method="post" class="form-inline" enctype="multipart/form-data">
                    <label class="sr-only" for="foto">Photo</label>
                    <div class="col-md-12 text-center">
                        <br>&nbsp;<br>
                        <input type="file" name="bukti">
                        <button type="submit" name="buktibayar" class="btn btn-primary justify">Submit</button>
                    </div>
                </form>
                <br>&nbsp;<br>
            </div>
        </div>
    </div>
</section>
<?php include "../include/footer.php" ?>