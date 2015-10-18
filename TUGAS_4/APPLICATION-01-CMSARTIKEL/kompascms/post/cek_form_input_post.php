<?php
$judul = $_POST['judul'];
$kategori = $_POST['kategori'];
$isi = $_POST['isi'];
$tanggal = date("Y-m-d H:i:s");

if (isset($_POST['submit'])) {
    if (!isset($judul) || $kategori == "" || !isset($kategori) || $kategori == "" || !isset($isi) || $isi == "") {
        echo "<script>alert('Salah satu form masih kosong atau belum lengkap.');</script>";
        echo "<meta http-equiv='refresh' content='0; url=../admin/index.php?page=input_post'>";
    } else {
        include "../include/koneksi.php";
        $query_input_post = "INSERT INTO post (judul, kategori, isi, updated) VALUES ('$judul', '$kategori','$isi', '$tanggal')";
        $eksekusi_query_input_post = mysql_query($query_input_post);

        if ($eksekusi_query_input_post) {
            echo "<script>alert('Data berhasil masuk.');</script>";
            echo "<meta http-equiv='refresh' content='0; url=../admin/index.php?page=post'>";
        } else {
            echo "<script>alert('Data tidak berhasil masuk.');</script>";
            echo "<meta http-equiv='refresh' content='0; url=../admin/index.php?page=input_post'>";
        }
    }
}
?>