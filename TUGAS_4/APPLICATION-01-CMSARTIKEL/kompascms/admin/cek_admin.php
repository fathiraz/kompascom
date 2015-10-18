<?php
session_start();
$_SESSION['sesi'] = null;

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (!isset($password) || $password == "" || !isset($username) || $username == "") {
        echo "<script>alert('Salah satu form masih kosong atau belum lengkap.');</script>";
        echo "<meta http-equiv='refresh' content='0; url=../?page=login'>";
    } else {
        include "../include/koneksi.php";
        $query_cek_login = mysql_query("SELECT * FROM pengguna WHERE username = '$username' and password = '$password'");
        $hasil_cek_login = mysql_num_rows($query_cek_login);

        // cek apakah record tampil satu, kalo iya maka user ada
        if ($hasil_cek_login == 1) {
            $data_pengguna = mysql_fetch_array($query_cek_login);

            $_SESSION['sesi'] = $data_pengguna['username'];
            $_SESSION['idsesi'] = $data_pengguna['id'];
            echo "<meta http-equiv='refresh' content='0; url=index.php'>";
        } else {
            echo "<meta http-equiv='refresh' content='0; url=../?page=login'>";
            echo "<script>alert('Username atau Password salah.');</script>";
        }
        mysql_close();
    }
} else {
    echo "belom post";
}
?>