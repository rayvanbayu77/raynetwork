<?php 

session_start();

include 'config.php';

if (empty($_SESSION['login']))
	header("Location: login.php");


if (isset($_SESSION['isi_pertanyaan'])) {
    header("Location: index.php");
}

if (isset($_POST['submit_prtyn'])) {
    $isi_prtyn = $_POST['isi_prtyn'];
    $username_prtyn = $_POST['username_prtyn'];
    $id_user = $_POST['id_user'];

    $sql = "SELECT * FROM pertanyaan WHERE isi_prtyn='$isi_prtyn'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows > 0) {
        $sql = "INSERT INTO pertanyaan (isi_prtyn, username_prtyn, id_user)
        VALUES ('$isi_prtyn', '$username_prtyn', '$id_user')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $isi_prtyn = "";
            $username_prtyn = "";
            $id_user = "";

            echo "<script>alert('Pertanyaan Berhasil Dibuat')</script> ";
            header("Location: index.php");
        } else {
                echo "<script>alert('Terjadi kesalahan.')</script>";
        }
    }
}



?>

<!doctype html>
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



    <!-- Custom styles for this template -->
    <link href="styles/pricing.css" rel="stylesheet">
  </head>
  <body>

    <header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white  border-bottom shadow-sm">
        <p class="h5 my-0 me-md-auto fw-normal">RayNetwork</p>
      <nav class="my-2 my-md-0 me-md-3">
        <a class="w-5 h-5 btn btn-sm btn-primary" type="submit" href="index.php">Home</a>
        <a class="w-5 h-5 btn btn-sm btn-danger" type="submit" href="logout.php">Log Out</a>
      </nav>

  </header>
   <main class="container">
     <div class="row">
        <div class="colo-lg-12">
        <form class="form" method="post" action="">
          <h4>Tulis Pertanyaan</h4><hr>
          <div class="mb-5">
          <input type="hidden" name="username_prtyn" value="<?php echo $_SESSION['username']; ?> " readonly>
          <input type="hidden" name="id_user" value="<?php echo $_SESSION['id']; ?> " readonly>
            </div>
          <b> Tuliskan Pertanyaanmu Disini : </b>
            <div class="mb-5">
              <textarea class="form-control" name="isi_prtyn" value="<?php echo $isi_prtyn; ?>" required></textarea>
            </div>
            <div class="mb-3">
            <button name="submit_prtyn" class="w-20 btn btn-md btn-primary"  type="submit" >Buat Pertanyaan</button>
            </div>
            </form>
        </div>
     </div>
   </main>
  </body>
</html>
