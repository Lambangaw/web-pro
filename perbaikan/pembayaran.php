<?php include "../include/header.php" ?>
<?php include "../include/navLogin.php" ?>
<?php include "../include/db.php" ?>
<?php
$idorder = $_GET['id'];
$iduser = $_SESSION['iduser'];
$queryselect = "SELECT * FROM perbaikan 
LEFT JOIN kategoriperbaikan on kategoriperbaikan.IdKategori = perbaikan.IdKategori 
WHERE perbaikan.IdPerbaikan ='$idorder' ";
$dataorder = mysqli_query($conn, $queryselect);
while ($row = mysqli_fetch_assoc($dataorder)) {
    $pekerjaan = $row['pekerjaan'];
    $biaya = $row['biayaKategori'];
    $catatan = $row['catatan'];
    $tanggalorder = $row['tanggalOrder'];
    $kategori = $row['namaKategori'];
}

?>
<?php
if (isset($_POST['buktibayar'])) {

    $bukti = $_FILES["buktibayar"]["name"];
    $filename = time() . '-' . $_FILES["buktibayar"]["name"] . ".jpg";
    $temp_name = $_FILES["buktibayar"]["tmp_name"];
    move_uploaded_file($temp_name, "../image/bukti/$filename");
    $query = "INSERT INTO `pembayaran`
    ( `IdPerbaikan`, `IdUser`, `bukti`, `tanggalpembayaran`, `jumlah`, `statusPembayaran`) 
    VALUES ('$idorder','$iduser','$filename',now(),'$biaya',1)";
    $data = mysqli_query($conn, $query);
    $set = "UPDATE perbaikan SET status = 1 WHERE IdPerbaikan = '$idorder' ";
    $connset = mysqli_query($conn, $set);
    if (!$data) {
        die("STRING QUERY " . mysqli_error($conn));
    } else {
        header('Location:pembayaransukses.php');
    }
}
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
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Perbaikan</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=": <?php echo $kategori ?>">
                        </div>
                        <label for="staticEmail" class="col-sm-2 col-form-label">Pesanan</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=": <?php echo $pekerjaan ?>">
                        </div>
                        <label for="staticEmail" class="col-sm-2 col-form-label">Biaya</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=": <?php echo $biaya ?>">
                        </div>
                        <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal pemesanan</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=": <?php echo $tanggalorder ?>">
                        </div>
                        <label for="staticEmail" class="col-sm-2 col-form-label">Catatan</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=": <?php echo $catatan ?>">
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <br>&nbsp;<br>
                        <input type="file" name="buktibayar">
                        <button type="submit" name="buktibayar" class="btn btn-primary justify">Submit</button>
                    </div>
                </form>
                <br>&nbsp;<br>
            </div>
        </div>
    </div>
</section>
<?php include "../include/footer.php" ?>