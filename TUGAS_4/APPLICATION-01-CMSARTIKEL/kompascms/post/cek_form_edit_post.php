<?php
$judul = $_POST['judul'];
$kategori = $_POST['kategori'];
$isi = $_POST['isi'];
$id = $_POST['id'];
$tanggal = date("Y-m-d H:i:s");

if (isset($_POST['submit'])) {
    if (!isset($judul) || $kategori == "" || !isset($kategori) || $kategori == "" || !isset($isi) || $isi == "") {
        echo "<script>alert('Salah satu form masih kosong atau belum lengkap.');</script>";
        echo "<meta http-equiv='refresh' content='0; url=../admin/index.php?page=edit_post&id=" . $id . "'>";
    } else {
        include "../include/koneksi.php";
        $query_edit_post = "UPDATE post SET judul = '$judul', kategori = '$kategori', isi = '$isi', updated='$tanggal' WHERE id=" . $id;
//        $querynya = "UPDATE post SET judul = '$judul', kategori = '$kategori', isi = '$isi', updated='$tanggal' WHERE id=" . $id;

        $eksekusi_query_edit_post = mysql_query($query_edit_post);

        if ($eksekusi_query_edit_post) {
            echo "<script>alert('Data berhasil masuk.');</script>";
            echo "<meta http-equiv='refresh' content='0; url=../admin/index.php?page=post'>";
        } else {
            echo "<script>alert('Data tidak berhasil masuk." . mysql_error() . "');</script>";
            echo "<meta http-equiv='refresh' content='0; url=../admin/index.php?page=edit_post&id=" . $id . "'>";
        }
    }
}
?>