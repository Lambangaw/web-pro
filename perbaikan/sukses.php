<?php include "../include/headerlogin.php" ?>
<?php include "../include/navLogin.php" ?>
<?php include "../include/db.php" ?>

<br>&nbsp;<br>
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="../perbaikan.php">Home</a></li>
        <li>Inner Page</li>
      </ol>
      <h2>Inner Page</h2>

    </div>
  </section><!-- End Breadcrumbs -->

  <section class="inner-page">
    <div class="container">
      <p class="justify">
        Selamat Anda berhasil melakukan order silahkan klik tombol dibawah untuk mengecek pemesanan anda.
      </p>
      <form action="order.php">
        <div class="text-center">
          <button class="btn btn-primary" type="submit">Submit</button>
        </div>
      </form>
    </div>
  </section>

</main><!-- End #main -->

<?php include "../include/footer.php" ?>