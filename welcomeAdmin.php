<?php include "include/headerlogin.php" ?>
<?php include "include/navAdmin.php" ?>
<?php include "include/db.php" ?>
<?php
$iduser = $_SESSION['iduser'];
$query = "SELECT perbaikan.IdPerbaikan, perbaikan.IdUser, perbaikan.pekerjaan,
perbaikan.tanggalOrder, perbaikan.tanggalSelesai, perbaikan.catatan, perbaikan.status, pembayaran.IdPembayaran,
pembayaran.bukti, pembayaran.tanggalPembayaran, pembayaran.jumlah, 
kategoriperbaikan.namaKategori, kategoriperbaikan.biayaKategori FROM perbaikan 
           LEFT JOIN pembayaran on pembayaran.IdPerbaikan = perbaikan.IdPerbaikan
           INNER JOIN kategoriperbaikan on perbaikan.IdKategori = kategoriperbaikan.IdKategori
            ";
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
  $bukti[$i] = $row['bukti'];
  $i++;
}
if (isset($_POST['verifikasibukti'])) {
  $idset = $_POST['id'];
  $set = "UPDATE perbaikan SET status = 2 WHERE IdPerbaikan = '$idset' ";
  $update = mysqli_query($conn, $set);
  if (!$update) {
    die("STRING QUERY " . mysqli_error($conn));
  }
  if (headers_sent()) {
    die("Redirect failed. Please click on this link: <a href=sukses.php> this");
  } else {
    exit(header("Location:welcomeAdmin.php"));
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
        <li><a href="welcomeAdmin.php">Home</a></li>
        <li>Order</li>
      </ol>
      <h2>Pemesanan</h2>

    </div>
  </section><!-- End Breadcrumbs -->

  <section class="inner-page">
    <div class="container">
      <div class="table-responsive">
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">ID Pemesanan</th>
              <th scope="col">Pemesanan</th>
              <th scope="col">Biaya</th>
              <th scope="col">Tanggal Order</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <?php for ($x = 1; $x < $i; $x++) {
          ?>
            <tbody class="bg-white">

              <tr>
                <td><?php echo $idorder[$x] ?></td>
                <td><?php echo $pekerjaan[$x] ?></td>
                <td><?php echo $biaya[$x] ?></td>
                <td><?php echo $tanggalorder[$x] ?></td>
                <td><?php echo $catatan[$x] ?></td>
                <td><?php
                    if ($status[$x] == 0) { ?>
                    <div>
                      Belum dibayar user.
                    </div>
                  <?php } elseif ($status[$x] == 1) { ?>
                    <form method="post" action="image/bukti/<?php echo $bukti[$x]  ?>">
                      <button name="downloadbukti" type="submit" class="btn btn-info">Download!</button>
                      <small>Download bukti bayar disini.</small>
                    </form>
                    <br>
                    <form action="" method="post">
                      <input type="hidden" id="custId" name="id" value="<?php echo $idorder[$x] ?>">
                      <button name="verifikasibukti" type="submit" class="btn btn-success">Verifikasi Bukti bayar</button>
                    </form>
                  <?php  } elseif ($status[$x] == 2) {
                  ?>
                    <p>
                      Menunggu pesanan dikonfirmasi User
                    </p>
                  <?php } elseif ($status[$x] == 3) {
                      echo "Pemesanan Selesai \n";
                    }
                  ?>
                </td>
              </tr>
            <?php } ?>

            </tbody>
        </table>
      </div>
    </div>


    </div>
  </section>

</main><!-- End #main -->

<?php include "include/footer.php" ?>