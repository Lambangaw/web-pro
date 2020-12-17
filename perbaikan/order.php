<?php include "../include/header.php" ?>
<!-- <?php include "../include/navLogin.php" ?> -->
<?php include "../include/db.php" ?>
<?php
$iduser = $_SESSION['iduser'];
$query = "SELECT * FROM perbaikan WHERE IdUser = '$iduser'";
$order = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($order)) {
    var_dump($row);
}
die();
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
                <li>Inner Page</li>
            </ol>
            <h2>Inner Page</h2>

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
                                    <th class="column1">Date</th>
                                    <th class="column2">Order ID</th>
                                    <th class="column3">Category</th>
                                    <th class="column4">Price</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="column1">2017-09-29 01:22</td>
                                    <td class="column2">200398</td>
                                    <td class="column3">iPhone X 64Gb Grey</td>
                                    <td class="column4">$999.00</td>

                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center"><button href="order.php" class="get-started-btn" type="submit">Submit</button></div>
        </div>
    </section>

</main><!-- End #main -->

<?php include "../include/footer.php" ?>