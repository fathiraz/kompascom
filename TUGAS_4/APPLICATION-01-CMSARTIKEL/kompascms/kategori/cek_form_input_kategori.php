<?php
$kategori = $_POST['kategori'];

if (isset($_POST['submit'])) {
    if (!isset($kategori) || $kategori == "") {
        echo "<script>alert('Salah satu form masih kosong atau belum lengkap.');</script>";
        echo "<meta http-equiv='refresh' content='0; url=../admin/index.php?page=input_kategori'>";
    } else {
        include "../include/koneksi.php";
        $query_input_kategori = "INSERT INTO kategori (kategori) VALUES ('$kategori')";
        $eksekusi_query_input_kategori = mysql_query($query_input_kategori);
        
        if ($eksekusi_query_input_kategori) {
            echo "<script>alert('Data berhasil masuk.');</script>";
            echo "<meta http-equiv='refresh' content='0; url=../admin/index.php?page=kategori'>";
        } else {
            echo "<script>alert('Data tidak berhasil masuk.');</script>";
            echo "<meta http-equiv='refresh' content='0; url=../admin/index.php?page=input_kategori'>";
        }
    }
}
?>