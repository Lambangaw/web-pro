<?php include "../include/header.php" ?>
<?php include "../include/navLogin.php" ?>
<?php include "../include/db.php" ?>
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="../welcomeUser.php">Home</a></li>
        <li>Pembayaran</li>
      </ol>
      <h2>Pembayaran Berhasil!</h2>

    </div>
  </section><!-- End Breadcrumbs -->

  <section class="inner-page">
    <div class="container">
      <p>
        Pembayaran anda telah berhasil, klik tombol dibawah ini untuk kembali ke Beranda.
        <form action="../welcomeUser.php">
          <button type="submit" class="btn btn-primary">Home</button>
        </form>
      </p>
    </div>
  </section>

</main><!-- End #main -->

<?php include "../include/footer.php" ?>