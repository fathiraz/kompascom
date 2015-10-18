<?php
$id = $_POST['id'];
$nama = $_POST['nama'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$konfirmasipass = $_POST['konfirmasipass'];

if (isset($_POST['submit'])) {
    if (!isset($pass) || $pass == "" || !isset($user) || $user == "" || !isset($konfirmasipass) || $konfirmasipass == "") {
        echo "<script>alert('Salah satu form masih kosong atau belum lengkap.');</script>";
        echo "<meta http-equiv='refresh' content='0; url=../admin/index.php?page=edit_pengguna&id=".$id."'>";
    } else {
        if ($pass != $konfirmasipass) {
            echo "<script>alert('Password tidak sesuai.');</script>";
            echo "<meta http-equiv='refresh' content='0; url=../admin/index.php?page=edit_pengguna&id=".$id."'>";
        } else {
            include "../include/koneksi.php";
            $query_input_pengguna = "UPDATE pengguna SET nama = '$nama', username = '$user', password = '$pass' WHERE id= " . $id;
            $eksekusi_query_input_pengguna = mysql_query($query_input_pengguna);
            
            if ($eksekusi_query_input_pengguna) {
                echo "<script>alert('Data berhasil diubah.');</script>";
                echo "<meta http-equiv='refresh' content='0; url=../admin/index.php?page=pengguna'>";
            } else {
                echo "<script>alert('Data tidak berhasil diubah.');</script>";
                echo "<meta http-equiv='refresh' content='0; url=../admin/index.php?page=edit_pengguna&id=".$id."'>";
            }
        }
    }
}
?>