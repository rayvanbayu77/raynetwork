<?php

include("config.php");

$id_prtyn = $_GET["id"];

$conn->query("DELETE FROM pertanyaan WHERE id_prtyn = $id_prtyn") or die(mysqli_error($conn));

echo "<script>
alert('Pertanyaan dihapus'); document.location.href = 'index.php'
</script>"
?>