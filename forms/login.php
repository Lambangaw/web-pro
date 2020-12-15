<?php
  if (isset($_POST['submit'])) {
    $email = $_POST['emailUser'];
    $pwd = $_POST['pwd'];
    if (
      !empty($email) && !empty($pwd)
    ) {
      $query = "SELECT * FROM `user` WHERE emailUser = '$email' ";
      $cekuser = mysqli_query($conn, $query);

      $count = mysqli_num_rows($cekuser);
      if ($count > 0) {
        echo "ada";
        while ($row = mysqli_fetch_assoc($cekuser)) {
          $dbpwd = $row['pwd'];
        }
        $passver = password_verify($pwd, $dbpwd);
        if ($passver) {
          echo "password benar";
          session_start();
          header("Location: https://www.google.com");
        } else {
          echo "password salah";
        }
      } else {
        echo "gaada user";
      }
    }
  }
