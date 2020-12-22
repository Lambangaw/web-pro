<?php include "../include/header.php" ?>
<?php include "../include/navLogin.php" ?>
<?php include "../include/db.php" ?>
<?php
$iduser = $_SESSION['iduser'];
$query = "SELECT * FROM perbaikan 
LEFT JOIN kategoriperbaikan ON perbaikan.IdKategori = kategoriperbaikan.IdKategori
 WHERE IdUser = '$iduser'";
$order = mysqli_query($conn, $query);
$i = 1;
while ($row = mysqli_fetch_assoc($order)) {
    $idorder[$i] = $row['IdPerbaikan'];
    $pekerjaan[$i] = $row['pekerjaan'];
    $biaya[$i] = $row['biayaKategori'];
    $tanggalorder[$i] = $row['tanggalOrder'];
    $tanggalselesai[$i] = $row['tanggalSelesai'];
    $catatan[$i] = $row['catatan'];
    $status[$i] = $row['status'];
    $i++;
}
?>
<?php
if (isset($_POST['verifikasi'])) {
    $idset = $_POST['id'];
    $set = "UPDATE perbaikan SET status = 3 WHERE IdPerbaikan = '$idset' ";
    $update = mysqli_query($conn, $set);
    if (!$update) {
        die("STRING QUERY " . mysqli_error($conn));
    }
    if (headers_sent()) {
        die("Redirect failed. Please click on this link: <a href=sukses.php> this");
    } else {
        exit(header("Location:order.php"));
    }
}
?>
<br>&nbsp;<br>
<br>&nbsp;<br>

<br>&nbsp;<br>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="perbaikan.php">Home</a></li>
                <li>Order</li>
            </ol>
            <h2>Pemesanan</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <div class="container">
            <p>
                rencananya tabel gitu
            </p>
            <div class="table-responsive">
                <div>
                    <div>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Pemesanan</th>
                                    <th>Biaya</th>
                                    <th>Tanggal Order</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <?php for ($x = 1; $x < $i; $x++) {
                            ?>
                                <tbody class="bg-light">

                                    <tr>
                                        <td scope="row"><?php echo $x ?></td>
                                        <td><?php echo $pekerjaan[$x] ?></td>
                                        <td><?php echo $biaya[$x] ?></td>
                                        <td><?php echo $tanggalorder[$x] ?></td>
                                        <td><?php echo $catatan[$x] ?></td>
                                        <td><?php
                                            if ($status[$x] == 0) { ?>
                                                <a href="pembayaran.php?id=<?php echo $idorder[$x] ?>" target="_blank"> Klik untuk bayar </a>
                                            <?php } elseif ($status[$x] == 1) {
                                                echo "Tukang kami sedang menuju ke hunianmu.";
                                            } elseif ($status[$x] == 2) { ?>
                                                <form action="" method="post">
                                                    <input type="hidden" id="custId" name="id" value="<?php echo $idorder[$x] ?>">
                                                    <button class="btn btn-primary" type="submit" name="verifikasi">Verifikasi Selesai</button>
                                                </form>
                                            <?php
                                            } elseif ($status[$x] == 3) {
                                                echo "Pemesanan Selesai \n";
                                                echo "Terimakasih telah menggunakan jasa tukangku";
                                            }
                                            ?></td>
                                    </tr>
                                <?php } ?>

                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<?php include "../include/footer.php" ?>