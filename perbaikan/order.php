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

                <div class="wrap-table100">
                    <div class="table100">
                        <table class="table">
                            <thead class="thead-light">
                                <tr class="table100-head">
                                    <th>No</th>
                                    <th>Pemesanan</th>
                                    <th>Biaya</th>
                                    <th>Tanggal Order</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php for ($x = 1; $x < $i; $x++) {
                                ?>
                                    <tr>
                                        <td><?php echo $x ?></td>
                                        <td><?php echo $pekerjaan[$x] ?></td>
                                        <td><?php echo $biaya[$x] ?></td>
                                        <td><?php echo $tanggalorder[$x] ?></td>
                                        <td><?php echo $catatan[$x] ?></td>
                                        <td><?php
                                            if ($status[$x] == 0) { ?>
                                                <a href="pembayaran.php?id=<?php echo $idorder[$x] ?>" target="_blank"> Klik untuk bayar </a>
                                            <?php } elseif ($status[$x] == 1) {
                                                echo "Tukang kami sedang menuju ke hunianmu.";
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

        </div>
    </section>

</main><!-- End #main -->

<?php include "../include/footer.php" ?>