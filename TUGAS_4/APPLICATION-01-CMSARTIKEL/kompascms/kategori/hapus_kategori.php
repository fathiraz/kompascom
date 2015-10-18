<?php

  include "../include/koneksi.php";

  $querydeletepost = mysql_query("DELETE FROM kategori WHERE id=".$_GET['id']);

    if ($querydeletepost) {
        echo "<script>alert('Data berhasil dihapus.');</script>";
        echo "<meta http-equiv='refresh' content='0; url=../admin/index.php?page=kategori'>";
    } else {
        echo "<script>alert('Data tidak berhasil dihapus.');</script>";
        echo "<meta http-equiv='refresh' content='0; url=../admin/index.php?page=kategori'>";
    }

?>