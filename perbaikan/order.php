<?php include "../include/header.php" ?>
<?php include "../include/navLogin.php" ?>
<?php include "../include/db.php" ?>
<?php
$iduser = $_SESSION['iduser'];
$query = "SELECT * FROM perbaikan WHERE IdUser = '$iduser'";
$order = mysqli_query($conn, $query);
$i = 0;
while ($row = mysqli_fetch_assoc($order)) {
    $pekerjaan[$i] = $row['pekerjaan'];
    $biaya[$i] = $row['biaya'];
    $tanggalorder[$i] = $row['tanggalOrder'];
    $tanggalselesai[$i] = $row['tanggalSelesai'];
    $catatan[$i] = $row['catatan'];
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

                                </tr>
                            </thead>

                            <tbody>
                                <?php for ($x = 0; $x < $i; $x++) {
                                ?>
                                    <tr>
                                        <td><?php echo $x ?></td>
                                        <td><?php echo $pekerjaan[$x] ?></td>
                                        <td><?php echo $biaya[$x] ?></td>
                                        <td><?php echo $tanggalorder[$x] ?></td>
                                        <td><?php echo $catatan[$x] ?></td>
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