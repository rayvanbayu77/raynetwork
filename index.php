<?php

session_start();

include 'config.php';

if (empty($_SESSION['login']))
	header("Location: login.php");
?>

<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
    <title>RayNetwork</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/pricing/">
    <link href="css/pricing.css" rel="stylesheet" >
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet" >
    
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <link href="css/pricing.css" rel="stylesheet">
  </head>
  <body>

    <header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white  border-bottom shadow-sm">
        <p class="h5 my-0 me-md-auto fw-normal">RayNetwork</p>
      <nav class="my-2 my-md-0 me-md-3">
      <a href="pengaturan.php?id=<?= $_SESSION['id']?>" class="w-5 h-5 btn btn-sm btn-primary" type="submit" >Pengaturan</a>
      <a class="w-5 h-5 btn btn-sm btn-primary" type="submit" href="pertanyaan.php">Ajukan Pertanyaan</a>
        <a class="w-5 h-5 btn btn-sm btn-danger" type="submit" href="logout.php">Log Out</a>
      </nav>
  </header>

   <main class="container">
     <div class="row">
        <div class="colo-lg-12">
          <h4>Selamat Datang,
          <?php echo $_SESSION['username']; ?></a>!
          </h4>
          <div class="mb-3">
        </div>
     </div>
     <hr style="margin:10px">
     <div class="row">
       <div class="col-lg-12">
         <p>
          <?php
             $query = "SELECT * FROM pertanyaan ORDER BY id_prtyn DESC"; 
             $result = mysqli_query($conn, $query);
             while(
               $row = mysqli_fetch_assoc($result)) :?>
               
          <b><?= $row['username_prtyn'] ?></b> |
          <?= $row['waktu_prtyn'] ?><br>
          <?= $row['isi_prtyn'] ?><br>
          <a href="jawaban.php?id=<?= $row['id_prtyn']; ?>">Jawab</a>  
          <?php
          if ($_SESSION['id'] == $row['id_user'])
          {?>
          | <a href="hapus.php?id=<?= $row['id_prtyn']; ?>">Hapus</a>
          <?php }?>
          <hr>
          
        </p>
        <?php endwhile; ?>
       </div>
     </div>
   </main>
  </body>
</html>
