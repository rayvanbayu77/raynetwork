<?php
include 'config.php';

if (isset($_POST['submit_jawab'])) {
    $isi_jwbn = $_POST['isi_jwbn'];
    $username_jwbn = $_POST['username_jwbn'];
    $id_prtyn = $_POST['id_prtyn'];
    $user_id = $_POST['user_id'];

    $sql = "INSERT INTO jawaban (isi_jwbn, username_jwbn, id_prtyn, user_id)
            VALUES ('$isi_jwbn', '$username_jwbn', '$id_prtyn' , '$user_id')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $isi_jwbn = "";
        $username_jwbn = "";
        $id_prtyn = "";      
        $user_id = "";

        echo "<script>alert('Jawaban Berhasil Dibuat')</script> ";
        header("Location: jawaban.php?id=". $_POST['submit_jawab']);
    }
}
?>